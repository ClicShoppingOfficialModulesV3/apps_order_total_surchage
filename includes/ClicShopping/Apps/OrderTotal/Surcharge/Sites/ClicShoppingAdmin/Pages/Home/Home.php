<?php
/*
 * Home.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse

*/

  namespace ClicShopping\Apps\OrderTotal\Surcharge\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\OrderTotal\Surcharge\Surcharge;

  class Home extends \ClicShopping\OM\PagesAbstract {
    public $app;

    protected function init() {
      $CLICSHOPPING_Surcharge = new Surcharge();
      Registry::set('Surcharge', $CLICSHOPPING_Surcharge);

      $this->app = $CLICSHOPPING_Surcharge;

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
