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
 * Fnac Api Gui : Batch Query View
 *
 * @desc Class used to diplay batch query related data
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\View;


class BatchQueryView extends View
{
  /**
   * Constructor.
   *
   * @param Controller $controller controller to use for the view
   * @param Model $model $model model class to use to retrieve wanted data
   *
   */
  public function __construct($controller, $model)
  {
    parent::__construct($controller, $model);
  }

  /***
   * Retrieves data and display them into a dedicated template
   */
  public function output()
  {
    $data = $this->controller->getData();

    // Display batch details of a given batch_id (BatchStatus response)
    if(isset($_GET['batch_id']))
    {
      $batch_id = $data->getBatchId();
      $status = $data->getStatus();

      $offers = $data->getOffersUpdate();
      $errors = $data->getErrors();

      $this->model->setTemplate(__DIR__ . "/../templates/batch_status.tpl.php");
    }
    // Display currently running or enqueued (active) batches (BatchQuery response)
    else
    {
      $nb_active_batches = $data->getNbBatchActive();
      $nb_running_batches = $data->getNbBatchRunning();

      $batches = $data->getBatchs();
    }

    $xml_request = self::xml_highlight($this->controller->getRequest(), true);
    $xml_response = self::xml_highlight($this->controller->getResponse());

    require_once($this->model->template);
  }
}