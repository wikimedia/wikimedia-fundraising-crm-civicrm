<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Financial/FinancialItem.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:8bb63ebee681c2eb4acbf8650b224dc2)
 */

/**
 * Database access object for the FinancialItem entity.
 */
class CRM_Financial_DAO_FinancialItem extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '4.3';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_financial_item';

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
   * Date and time the item was created
   *
   * @var timestamp
   */
  public $created_date;

  /**
   * Date and time of the source transaction
   *
   * @var datetime
   */
  public $transaction_date;

  /**
   * FK to Contact ID of contact the item is from
   *
   * @var int
   */
  public $contact_id;

  /**
   * Human readable description of this item, to ease display without lookup of source item.
   *
   * @var string
   */
  public $description;

  /**
   * Total amount of this item
   *
   * @var float
   */
  public $amount;

  /**
   * Currency for the amount
   *
   * @var string
   */
  public $currency;

  /**
   * FK to civicrm_financial_account
   *
   * @var int
   */
  public $financial_account_id;

  /**
   * Payment status: test, paid, part_paid, unpaid (if empty assume unpaid)
   *
   * @var int
   */
  public $status_id;

  /**
   * The table providing the source of this item such as civicrm_line_item
   *
   * @var string
   */
  public $entity_table;

  /**
   * The specific source item that is responsible for the creation of this financial_item
   *
   * @var int
   */
  public $entity_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_financial_item';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   */
  public static function getEntityTitle() {
    return ts('Financial Items');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contact_id', 'civicrm_contact', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'financial_account_id', 'civicrm_financial_account', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Dynamic(self::getTableName(), 'entity_id', NULL, 'id', 'entity_table');
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
          'title' => ts('Financial Item ID'),
          'required' => TRUE,
          'where' => 'civicrm_financial_item.id',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'created_date' => [
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Financial Item Created Date'),
          'description' => ts('Date and time the item was created'),
          'required' => TRUE,
          'where' => 'civicrm_financial_item.created_date',
          'default' => 'CURRENT_TIMESTAMP',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'transaction_date' => [
          'name' => 'transaction_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Financial Item Transaction Date'),
          'description' => ts('Date and time of the source transaction'),
          'required' => TRUE,
          'where' => 'civicrm_financial_item.transaction_date',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Item Contact ID'),
          'description' => ts('FK to Contact ID of contact the item is from'),
          'required' => TRUE,
          'where' => 'civicrm_financial_item.contact_id',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'add' => '4.3',
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Item Description'),
          'description' => ts('Human readable description of this item, to ease display without lookup of source item.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_financial_item.description',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'amount' => [
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Amount'),
          'description' => ts('Total amount of this item'),
          'required' => TRUE,
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_financial_item.amount',
          'headerPattern' => '/unit?.?amoun/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'default' => '0',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'currency' => [
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Financial Item Currency'),
          'description' => ts('Currency for the amount'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'where' => 'civicrm_financial_item.currency',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
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
          'add' => '4.3',
        ],
        'financial_account_id' => [
          'name' => 'financial_account_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Account ID'),
          'description' => ts('FK to civicrm_financial_account'),
          'where' => 'civicrm_financial_item.financial_account_id',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
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
        'status_id' => [
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Item Status ID'),
          'description' => ts('Payment status: test, paid, part_paid, unpaid (if empty assume unpaid)'),
          'where' => 'civicrm_financial_item.status_id',
          'export' => TRUE,
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'financial_item_status',
            'optionEditPath' => 'civicrm/admin/options/financial_item_status',
          ],
          'add' => '4.3',
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Table'),
          'description' => ts('The table providing the source of this item such as civicrm_line_item'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_financial_item.entity_table',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Entity ID'),
          'description' => ts('The specific source item that is responsible for the creation of this financial_item'),
          'where' => 'civicrm_financial_item.entity_id',
          'table_name' => 'civicrm_financial_item',
          'entity' => 'FinancialItem',
          'bao' => 'CRM_Financial_BAO_FinancialItem',
          'localizable' => 0,
          'add' => '4.3',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'financial_item', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'financial_item', $prefix, []);
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
      'IX_created_date' => [
        'name' => 'IX_created_date',
        'field' => [
          0 => 'created_date',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_item::0::created_date',
      ],
      'IX_transaction_date' => [
        'name' => 'IX_transaction_date',
        'field' => [
          0 => 'transaction_date',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_item::0::transaction_date',
      ],
      'index_entity_id_entity_table' => [
        'name' => 'index_entity_id_entity_table',
        'field' => [
          0 => 'entity_id',
          1 => 'entity_table',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_financial_item::0::entity_id::entity_table',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
