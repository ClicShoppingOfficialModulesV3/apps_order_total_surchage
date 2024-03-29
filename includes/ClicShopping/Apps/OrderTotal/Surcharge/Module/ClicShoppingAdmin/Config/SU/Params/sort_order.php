<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\Surcharge\Module\ClicShoppingAdmin\Config\SU\Params;

  class sort_order extends \ClicShopping\Apps\OrderTotal\Surcharge\Module\ClicShoppingAdmin\Config\ConfigParamAbstract
  {

    public $default = '1000';
    public bool $app_configured = false;

    protected function init()
    {
      $this->title = $this->app->getDef('cfg_surcharge_sort_order_title');
      $this->description = $this->app->getDef('cfg_surcharge_sort_order_description');
    }
  }
