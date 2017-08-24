<?php
/***
 * Fnac Api Gui : View class
 */

namespace FnacApiGui\View;

class View
{
  public $model;
  public $controller;

  public function __construct($controller, $model) {
    $this->controller = $controller;
    $this->model = $model;
  }

  /**
   * Returns a tags highlighted and correctly indented xml string
   *
   * @param type $xml source file
   * @param type $clean set to 'true' if source is not indented yet
   * @return string
   */
  public static function xml_highlight($xml, $indent = false)
  {
    if($indent)
    {
      // Source : http://www.daveperrett.com/articles/2007/04/05/format-xml-with-php/
      // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
      $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);

      // now indent the tags
      $token      = strtok($xml, "\n");
      $pad        = 0; // initial indent
      $result     = '';
      $matches    = array(); // returns from preg_matches()

      // scan each line and adjust indent based on opening/closing tags
      while ($token !== false)
      {
        // test for the various tag states

        // 1. open and closing tags on same line - no change
        if (preg_match('/.+<\/\w[^>]*>$/', trim($token), $matches))
        {
          $indent= 0;
        }
        elseif(preg_match('/<(.*)(\[)(.*)(\])>$/', trim($token), $matches))
        {
          $indent= 0;
        }
        // 2. closing tag - outdent now
        elseif (preg_match('/^<\/\w/', $token, $matches))
        {
          $pad--;
        }
        // 3. opening tag - don't pad this one, only subsequent tags
        elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches))
        {
          $indent = 1;
        }
        // 4. no indentation needed
        else
        {
          $indent = 0;
        }

        // pad the line with the required number of leading spaces
        $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
        $result .= $line . "\n"; // add to the cumulative result, with linefeed
        $token   = strtok("\n"); // get the next token
        $pad    += $indent; // update the pad size for subsequent lines
      }
    }
    else
    {
      $result = $xml;
    }

    // Tags highlighting
    $result = htmlspecialchars($result);
    $result = preg_replace("#&lt;([/]*?)(.*)([\s]*?)&gt;#sU"         , "<span class=\"bracket\">&lt;\\1\\2\\3&gt;</span>", $result);
    $result = preg_replace("#&lt;([\?])(.*)([\?])&gt;#sU"            , "<span class=\"xmlbracket\">&lt;\\1\\2\\3&gt;</span>", $result);
    $result = preg_replace("#&lt;([^\s\?/=])(.*)([\[\s/]|&gt;)#iU"   , "&lt;<span class=\"tag\">\\1\\2</span>\\3", $result);
    $result = preg_replace("#&lt;([/])([^\s]*?)([\s\]]*?)&gt;#iU"    , "&lt;\\1<span class=\"tag\">\\2</span>\\3&gt;", $result);
    $result = preg_replace("#([^\s]*?)\=(&quot;|')(.*)(&quot;|')#isU", "<span class=\"attr\">\\1</span>=<span class=\"value\">\\2\\3\\4</span>", $result);
    $result = preg_replace("#&lt;(.*)(\[)(.*)(\])&gt;#isU"           , "&lt;\\1<span class=\"attr\">\\2\\3\\4</span>&gt;", $result);

    return $result;
  }

  public function buildPager($page, $total_paging, $displayed_pages_number = 10)
  {
    $pager_info = array();

    // defaults
    $pager_info['pager_limit'] = $displayed_pages_number;
    $pager_info['i'] = 1;

    // processing smart pager : typically display (previous pages) .. PAGE .. (next pages) when possible
    $displayed_pages_side = round($displayed_pages_number / 2);

    for ($index = $page - $displayed_pages_side; $index <= $total_paging; $index++) {
      if ($index > 0) {
        // first pager page found
        $i = $index;
        $pager_limit = $index + $displayed_pages_number - 1;

        if ($pager_limit > $total_paging) {
          // we went too far ! rewinding
          $pager_limit = $total_paging;
          $i = max(1, $total_paging - $displayed_pages_number + 1);
        }

        break;
      }
    }

    $pager_info['pager_limit'] = $pager_limit;
    $pager_info['i'] = $i;

    return $pager_info;
  }

}