<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\Surcharge\Module\Total;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\OrderTotal\Surcharge\Surcharge as SurchargeApp;

  class SU implements \ClicShopping\OM\Modules\OrderTotalInterface
  {
    public $code;
    public $title;
    public $description;
    public $enabled;
    public $group;
    public $output;
    public $sort_order = 0;
    public $app;
    public $surcharge;
    public $maximum;
    public $signature;
    public $public_title;
    protected $api_version;

    public function __construct()
    {

      if (!Registry::exists('Surcharge')) {
        Registry::set('Surcharge', new SurchargeApp());
      }

      $this->app = Registry::get('Surcharge');
      $this->app->loadDefinitions('Module/Shop/SU/SU');

      $this->signature = 'surcharge|' . $this->app->getVersion() . '|1.0';
      $this->api_version = $this->app->getApiVersion();

      $this->code = 'SU';
      $this->title = $this->app->getDef('module_su_title');
      $this->public_title = $this->app->getDef('module_su_public_title');

      $this->enabled = defined('CLICSHOPPING_APP_SURCHARGE_SU_STATUS') && (CLICSHOPPING_APP_SURCHARGE_SU_STATUS == 'True') ? true : false;
      $this->sort_order = defined('CLICSHOPPING_APP_SURCHARGE_SU_SORT_ORDER') && ((int)CLICSHOPPING_APP_SURCHARGE_SU_SORT_ORDER > 0) ? (int)CLICSHOPPING_APP_SURCHARGE_SU_SORT_ORDER : 0;

      if (defined('CLICSHOPPING_APP_SURCHARGE_SU_STATUS')) {
        $this->surcharge = CLICSHOPPING_APP_SURCHARGE_SU_PERCENTAGE;
        $this->maximum = CLICSHOPPING_APP_SURCHARGE_SU_MAXIMUM;
      }

      $this->output = [];
    }

    public function process()
    {
      $CLICSHOPPING_Order = Registry::get('Order');
      $CLICSHOPPING_Currencies = Registry::get('Currencies');

      $order_total = $CLICSHOPPING_Order->info['subtotal'];

      if ($order_total < $this->maximum && $this->surcharge > 0) {
        $percentage = (($this->surcharge * 1 / 100) * 100) . '%';
        $od_amount = ($this->surcharge * 1 / 100) * $order_total;

        $CLICSHOPPING_Order->info['total'] = $CLICSHOPPING_Order->info['subtotal'] + $od_amount;

        $this->output[] = ['title' => $this->title . '  - ' . $percentage . ' :',
          'text' => $CLICSHOPPING_Currencies->format($od_amount),
          'value' => $od_amount
        ];
      }
    }

    public function check()
    {
      return defined('CLICSHOPPING_APP_SURCHARGE_SU_STATUS') && (trim(CLICSHOPPING_APP_SURCHARGE_SU_STATUS) != '');
    }

    public function install()
    {
      $this->app->redirect('Configure&Install&module=SU');
    }

    public function remove()
    {
      $this->app->redirect('Configure&Uninstall&module=SU');
    }

    public function keys()
    {
      return array('CLICSHOPPING_APP_SURCHARGE_SU_SORT_ORDER');
    }
  }
