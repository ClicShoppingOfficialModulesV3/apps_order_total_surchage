<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\Surcharge\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\OrderTotal\Surcharge\Surcharge;

  class Home extends \ClicShopping\OM\PagesAbstract
  {
    public mixed $app;

    protected function init()
    {
      $CLICSHOPPING_Surcharge = new Surcharge();
      Registry::set('Surcharge', $CLICSHOPPING_Surcharge);

      $this->app = $CLICSHOPPING_Surcharge;

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
