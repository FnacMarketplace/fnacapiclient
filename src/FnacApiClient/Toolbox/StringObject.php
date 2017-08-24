<?php
/*
 * This file is part of the FnacApiClient.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Toolbox;

/**
 * Class to handle some string functions
 *
 * @author     Fnac
 * @version    1.0.0
 */
class StringObject
{
    /**
     * Translates a camel case string into a string with underscores (e.g. firstName -&gt; first_name)
     * @param    string   $str    String in camel case format
     * @return   string   String translated into underscore format
     */
    public static function fromCamelCase($str)
    {
        $str[0] = strtolower($str[0]);
        $func = create_function('$c', 'return "_" . strtolower($c[1]);');

        return preg_replace_callback('/([A-Z])/', $func, $str);
    }

    /**
     * Translates a string with underscores into camel case (e.g. first_name -&gt; firstName)
     * @param    string   $str                     String in underscore format
     * @param    bool     $capitalise_first_char   If true, capitalise the first char in $str
     * @return   string                            String translated into camel caps
     */
    public static function toCamelCase($str, $capitalise_first_char = false)
    {
        if ($capitalise_first_char) {
            $str[0] = strtoupper($str[0]);
        }
        $func = create_function('$c', 'return strtoupper($c[1]);');

        return preg_replace_callback('/_([a-z])/', $func, $str);
    }

    /**
     * Transform xml raw text into a pretty xml formatter
     *
     * @param string $xml
     * @return string
     * @author gperier
     */
    public static function prettyXml($xml)
    {
        $dom = new \DomDocument;
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        if (!@$dom->loadXML($xml)) {
            return $xml;
        }

        return $dom->saveXML();
    }

}
