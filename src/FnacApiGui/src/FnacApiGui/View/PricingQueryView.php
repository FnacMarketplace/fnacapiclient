<?php
/***
 *
 * This file is part of the fnacMarketPlace API Client GUI.
 * (c) 2014 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * --------------------------------
 * Fnac Api Gui : Pricing Query View
 *
 * @desc Class used to display pricing query related data
 * @author Somaninn Prok <sprok@fnac.com>
 *
 */

namespace FnacApiGui\View;


class PricingQueryView extends View
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
  public function output($options)
  {
    $data = $this->controller->data;

    require_once($this->model->template);

  }
}