<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2013 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * -------------------------------
 * Fnac Api Gui : Batch Controller
 *
 * @desc Class used to manage batch query related data
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\Controller;


class BatchController extends Controller
{

  const DELAY_RECENT_BATCHES = 2; // retrieve batches of the last DELAY_RECENT_BATCHES days

  /**
   * Constructor.
   *
   * @param Model $model $model model class to use to manage wanted data
   * @param SimpleClient $client instanciated client to call services
   *
   */
  public function __construct($model, $client = null)
  {
    parent::__construct($model, $client);
  }

  /**
   * Loads data BatchQuery data in controller object
   */
  public function loadBatchQueryData()
  {
    $this->data = $this->model->retrieveBatchResponse($this->client);

    $this->loadXmlData();
  }

  /**
   * Loads data BatchQuery data in controller object
   */
  public function loadRecentBatchQueryData()
  {
    $this->data = $this->model->retrieveRecentBatchResponse($this->client, self::DELAY_RECENT_BATCHES);

    $this->loadXmlData();
  }

  /**
   * Loads data BatchStatus data in controller object
   */
  public function loadBatchStatusData($batch_id)
  {
    $this->data = $this->model->retrieveBatchStatus($this->client, $batch_id);

    $this->loadXmlData();
  }
}