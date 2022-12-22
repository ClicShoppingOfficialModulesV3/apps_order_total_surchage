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

  class percentage extends \ClicShopping\Apps\OrderTotal\Surcharge\Module\ClicShoppingAdmin\Config\ConfigParamAbstract
  {
    public $default = '0';
    public ?int $sort_order = 30;

    protected function init()
    {
      $this->title = $this->app->getDef('cfg_surcharge_percentage_title');
      $this->description = $this->app->getDef('cfg_surcharge_percentage_description');
    }
  }