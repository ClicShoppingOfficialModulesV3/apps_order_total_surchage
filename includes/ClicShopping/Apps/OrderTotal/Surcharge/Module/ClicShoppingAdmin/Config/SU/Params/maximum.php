<?php
  /*
   * status.php
   * @copyright Copyright 2008 - http://www.innov-concept.com
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @license GPL 2 License & MIT Licencse

  */


  namespace ClicShopping\Apps\OrderTotal\Surcharge\Module\ClicShoppingAdmin\Config\SU\Params;

  class maximum extends \ClicShopping\Apps\OrderTotal\Surcharge\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {
    public $default = '0';
    public $sort_order = 30;

    protected function init() {
      $this->title = $this->app->getDef('cfg_surcharge_maximum_title');
      $this->description = $this->app->getDef('cfg_surcharge_maximum_description');
    }
  }