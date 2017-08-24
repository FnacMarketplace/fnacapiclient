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
 * Fnac Api Gui : Home Model
 * 
 * @author Somaninn Prok <sprok@fnac.com>
 * 
 */

namespace FnacApiGui\Model;

class HomeModel extends Model
{
  
  public function __construct()
  {      
    $this->template = __DIR__ ."/../templates/home.tpl.php";
    
    parent::__construct();
  }  
  
}
