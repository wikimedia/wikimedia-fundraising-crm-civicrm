<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Financial/FinancialTrxn.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:857c64b471d1872d98141aefa56aecb6)
 */

/**
 * Database access object for the FinancialTrxn entity.
 */
class CRM_Financial_DAO_FinancialTrxn extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.3';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_financial_trxn';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * @var int
   */
  public $id;

  /**
   * FK to financial_account table.
   *
   * @var int
   */
  public $from_financial_account_id;

  /**
   * FK to financial_financial_account table.
   *
   * @var int
   */
  public $to_financial_account_id;

  /**
   * date transaction occurred
   *
   * @var datetime
   */
  public $trxn_date;

  /**
   * amount of transaction
   *
   * @var float
   */
  public $total_amount;

  /**
   * actual processor fee if known - may be 0.
   *
   * @var float
   */
  public $fee_amount;

  /**
   * actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.
   *
   * @var float
   */
  public $net_amount;

  /**
   * 3 character string, value from config setting or input via user.
   *
   * @var string
   */
  public $currency;

  /**
   * Is this entry either a payment or a reversal of a payment?
   *
   * @var bool
   */
  public $is_payment;

  /**
   * Transaction id supplied by external processor. This may not be unique.
   *
   * @var string
   */
  public $trxn_id;

  /**
   * processor result code
   *
   * @var string
   */
  public $trxn_result_code;

  /**
   * pseudo FK to civicrm_option_value of contribution_status_id option_group
   *
   * @var int
   */
  public $status_id;

  /**
   * Payment Processor for this financial transaction
   *
   * @var int
   */
  public $payment_processor_id;

  /**
   * FK to payment_instrument option group values
   *
   * @var int
   */
  public $payment_instrument_id;

  /**
   * FK to accept_creditcard option group values
   *
   * @var int
   */
  public $card_type_id;

  /**
   * Check number
   *
   * @var string
   */
  public $check_number;

  /**
   * Last 4 digits of credit card
   *
   * @var string
   */
  public $pan_truncation;

  /**
   * Payment Processor external order reference
   *
   * @var string
   */
  public $order_reference;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_financial_trxn';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Financial Trxns') : ts('Financial Trxn');
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'from_financial_account_id', 'civicrm_financial_account', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'to_financial_account_id', 'civicrm_financial_account', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'payment_processor_id', 'civicrm_payment_processor', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction ID'),
          'required' => TRUE,
          'where' => 'civicrm_financial_trxn.id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '1.3',
        ],
        'from_financial_account_id' => [
          'name' => 'from_financial_account_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction From Account'),
          'description' => ts('FK to financial_account table.'),
          'where' => 'civicrm_financial_trxn.from_financial_account_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_FinancialAccount',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_financial_account',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
          'add' => '4.3',
        ],
        'to_financial_account_id' => [
          'name' => 'to_financial_account_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction To Account'),
          'description' => ts('FK to financial_financial_account table.'),
          'where' => 'civicrm_financial_trxn.to_financial_account_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_FinancialAccount',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_financial_account',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
          'add' => '4.3',
        ],
        'trxn_date' => [
          'name' => 'trxn_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Financial Transaction Date'),
          'description' => ts('date transaction occurred'),
          'where' => 'civicrm_financial_trxn.trxn_date',
          'default' => 'NULL',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDateTime',
          ],
          'add' => '1.3',
        ],
        'total_amount' => [
          'name' => 'total_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Total Amount'),
          'description' => ts('amount of transaction'),
          'required' => TRUE,
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_financial_trxn.total_amount',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '1.3',
        ],
        'fee_amount' => [
          'name' => 'fee_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Fee Amount'),
          'description' => ts('actual processor fee if known - may be 0.'),
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_financial_trxn.fee_amount',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '1.3',
        ],
        'net_amount' => [
          'name' => 'net_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Financial Net Amount'),
          'description' => ts('actual funds transfer amount. total less fees. if processor does not report actual fee during transaction, this is set to total_amount.'),
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_financial_trxn.net_amount',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '1.3',
        ],
        'currency' => [
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Currency'),
          'description' => ts('3 character string, value from config setting or input via user.'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'import' => TRUE,
          'where' => 'civicrm_financial_trxn.currency',
          'headerPattern' => '/cur(rency)?/i',
          'dataPattern' => '/^[A-Z]{3}$/',
          'export' => TRUE,
          'default' => 'NULL',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_currency',
            'keyColumn' => 'name',
            'labelColumn' => 'full_name',
            'nameColumn' => 'name',
            'abbrColumn' => 'symbol',
          ],
          'add' => '1.3',
        ],
        'is_payment' => [
          'name' => 'is_payment',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Payment?'),
          'description' => ts('Is this entry either a payment or a reversal of a payment?'),
          'import' => TRUE,
          'where' => 'civicrm_financial_trxn.is_payment',
          'export' => TRUE,
          'default' => '0',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '4.7',
        ],
        'trxn_id' => [
          'name' => 'trxn_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction ID'),
          'description' => ts('Transaction id supplied by external processor. This may not be unique.'),
          'maxlength' => 255,
          'size' => 10,
          'where' => 'civicrm_financial_trxn.trxn_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.3',
        ],
        'trxn_result_code' => [
          'name' => 'trxn_result_code',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction Result Code'),
          'description' => ts('processor result code'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_financial_trxn.trxn_result_code',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'add' => '1.3',
        ],
        'status_id' => [
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Transaction Status Id'),
          'description' => ts('pseudo FK to civicrm_option_value of contribution_status_id option_group'),
          'import' => TRUE,
          'where' => 'civicrm_financial_trxn.status_id',
          'headerPattern' => '/status/i',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'pseudoconstant' => [
            'optionGroupName' => 'contribution_status',
            'optionEditPath' => 'civicrm/admin/options/contribution_status',
          ],
          'add' => '4.3',
        ],
        'payment_processor_id' => [
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor'),
          'description' => ts('Payment Processor for this financial transaction'),
          'where' => 'civicrm_financial_trxn.payment_processor_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
          'add' => '4.3',
        ],
        'financial_trxn_payment_instrument_id' => [
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method'),
          'description' => ts('FK to payment_instrument option group values'),
          'where' => 'civicrm_financial_trxn.payment_instrument_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          ],
          'add' => '4.3',
        ],
        'financial_trxn_card_type_id' => [
          'name' => 'card_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Card Type ID'),
          'description' => ts('FK to accept_creditcard option group values'),
          'where' => 'civicrm_financial_trxn.card_type_id',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'accept_creditcard',
            'optionEditPath' => 'civicrm/admin/options/accept_creditcard',
          ],
          'add' => '4.7',
        ],
        'financial_trxn_check_number' => [
          'name' => 'check_number',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Check Number'),
          'description' => ts('Check number'),
          'maxlength' => 255,
          'size' => 6,
          'where' => 'civicrm_financial_trxn.check_number',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '4.3',
        ],
        'financial_trxn_pan_truncation' => [
          'name' => 'pan_truncation',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('PAN Truncation'),
          'description' => ts('Last 4 digits of credit card'),
          'maxlength' => 4,
          'size' => 4,
          'where' => 'civicrm_financial_trxn.pan_truncation',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '4.7',
        ],
        'financial_trxn_order_reference' => [
          'name' => 'order_reference',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Order Reference'),
          'description' => ts('Payment Processor external order reference'),
          'maxlength' => 255,
          'size' => 25,
          'where' => 'civicrm_financial_trxn.order_reference',
          'table_name' => 'civicrm_financial_trxn',
          'entity' => 'FinancialTrxn',
          'bao' => 'CRM_Financial_DAO_FinancialTrxn',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '5.20',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'financial_trxn', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'financial_trxn', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [
      'UI_ftrxn_trxn_id' => [
        'name' => 'UI_ftrxn_trxn_id',
        'field' => [
          0 => 'trxn_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_trxn::0::trxn_id',
      ],
      'UI_ftrxn_payment_instrument_id' => [
        'name' => 'UI_ftrxn_payment_instrument_id',
        'field' => [
          0 => 'payment_instrument_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_trxn::0::payment_instrument_id',
      ],
      'UI_ftrxn_check_number' => [
        'name' => 'UI_ftrxn_check_number',
        'field' => [
          0 => 'check_number',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_trxn::0::check_number',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
