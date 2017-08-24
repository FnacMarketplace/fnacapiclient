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
use FnacApiClient\Entity\Incident;
use FnacApiClient\Service\Request\IncidentQuery;

class IncidentsQueryModel extends Model
{

  public function __construct()
  {
    $this->template = __DIR__ ."/../templates/incidents_query.tpl.php"; // Set default template

    parent::__construct();
  }

  /**
   * Retrieves Incident query response
   *
   * @param SimpleClient $client
   * @return ResponseService
   */
  public function retrieveIncidentsResponse($client, $options = array())
  {
    $defaults = array(
        'status' => null,
        'sort_by' => 'DESC'
    );
    $options = array_merge($defaults, $options);
    extract($options);

    $incidentQuery = new IncidentQuery();
    $incidentQuery->setSortBy($sort_by);
    if (isset($status))
    {
      $incidentQuery->setStatus($status);
    }

    $incidentQueryResponse = $client->callService($incidentQuery);

    return $incidentQueryResponse;
  }

}

