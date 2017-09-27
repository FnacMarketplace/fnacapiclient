<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * --------------------------
 * Fnac Api Gui : Incident Model
 *
 * @desc Class used to retrieve Incident query response
 * @author Armelle Lutz
 *
 */

namespace FnacApiGui\Model;

// Load required classes
use FnacApiClient\Service\Request\MessageQuery;

class MessagesQueryModel extends Model
{

  public function __construct()
  {
    $this->template = __DIR__ ."/../templates/messages_query.tpl.php"; // Set default template

    parent::__construct();
  }

  /**
   * Retrieves Incident query response
   *
   * @param SimpleClient $client
   * @return ResponseService
   */
  public function retrieveMessagesResponse($client, $options = array())
  {
    $defaults = array(
        'sort_by' => 'date',
        'sort_by_type' => 'DESC'
    );
    $options = array_merge($defaults, $options);
    extract($options);

    $messageQuery = new MessageQuery();
//    $messageQuery->setSortBy($sort_by);
//    $messageQuery->setSortByType($sort_by_type);

    $messageQueryResponse = $client->callService($messageQuery);

    return $messageQueryResponse;
  }

}

