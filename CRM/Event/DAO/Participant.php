<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.6                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2015                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2015
 *
 * Generated from xml/schema/CRM/Event/Participant.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Event_DAO_Participant extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_participant';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Participant Id
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to Contact ID
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * FK to Event ID
   *
   * @var int unsigned
   */
  public $event_id;
  /**
   * Participant status ID. FK to civicrm_participant_status_type. Default of 1 should map to status =
   Registered.
   *
   * @var int unsigned
   */
  public $status_id;
  /**
   * Participant role ID. Implicit FK to civicrm_option_value where option_group = participant_role.
   *
   * @var string
   */
  public $role_id;
  /**
   * When did contact register for event?
   *
   * @var datetime
   */
  public $register_date;
  /**
   * Source of this event registration.
   *
   * @var string
   */
  public $source;
  /**
   * Populate with the label (text) associated with a fee level for paid events with multiple levels. Note that
   we store the label value and not the key
   *
   * @var text
   */
  public $fee_level;
  /**
   *
   * @var boolean
   */
  public $is_test;
  /**
   *
   * @var boolean
   */
  public $is_pay_later;
  /**
   * actual processor fee if known - may be 0.
   *
   * @var float
   */
  public $fee_amount;
  /**
   * FK to Participant ID
   *
   * @var int unsigned
   */
  public $registered_by_id;
  /**
   * FK to Discount ID
   *
   * @var int unsigned
   */
  public $discount_id;
  /**
   * 3 character string, value derived from config setting.
   *
   * @var string
   */
  public $fee_currency;
  /**
   * The campaign for which this participant has been registered.
   *
   * @var int unsigned
   */
  public $campaign_id;
  /**
   * Discount Amount
   *
   * @var int unsigned
   */
  public $discount_amount;
  /**
   * FK to civicrm_event_carts
   *
   * @var int unsigned
   */
  public $cart_id;
  /**
   * On Waiting List
   *
   * @var int
   */
  public $must_wait;
  /**
   * class constructor
   *
   * @return civicrm_participant
   */
  function __construct()
  {
    $this->__table = 'civicrm_participant';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'event_id', 'civicrm_event', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'status_id', 'civicrm_participant_status_type', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'registered_by_id', 'civicrm_participant', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'discount_id', 'civicrm_discount', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'campaign_id', 'civicrm_campaign', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'cart_id', 'civicrm_event_carts', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'participant_id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Participant ID') ,
          'description' => 'Participant Id',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_participant.id',
          'headerPattern' => '/(^(participant(.)?)?id$)/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'description' => 'FK to Contact ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_participant.contact_id',
          'headerPattern' => '/contact(.?id)?/i',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'event_id' => array(
          'name' => 'event_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Event') ,
          'description' => 'FK to Event ID',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_participant.event_id',
          'headerPattern' => '/event id$/i',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Event_DAO_Event',
        ) ,
        'participant_status_id' => array(
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Participant Status ID') ,
          'description' => 'Participant status ID. FK to civicrm_participant_status_type. Default of 1 should map to status =
      Registered.
    ',
          'required' => true,
          'import' => true,
          'where' => 'civicrm_participant.status_id',
          'headerPattern' => '/(participant.)?(status)$/i',
          'dataPattern' => '',
          'export' => true,
          'default' => '1',
          'FKClassName' => 'CRM_Event_DAO_ParticipantStatusType',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_participant_status_type',
            'keyColumn' => 'id',
            'labelColumn' => 'label',
          )
        ) ,
        'participant_role_id' => array(
          'name' => 'role_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Participant Role ID') ,
          'description' => 'Participant role ID. Implicit FK to civicrm_option_value where option_group = participant_role.',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_participant.role_id',
          'headerPattern' => '/(participant.)?(role)$/i',
          'dataPattern' => '',
          'export' => true,
          'default' => 'NULL',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'participant_role',
            'optionEditPath' => 'civicrm/admin/options/participant_role',
          )
        ) ,
        'participant_register_date' => array(
          'name' => 'register_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Register date') ,
          'description' => 'When did contact register for event?',
          'import' => true,
          'where' => 'civicrm_participant.register_date',
          'headerPattern' => '/^(r(egister\s)?date)$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_source' => array(
          'name' => 'source',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Participant Source') ,
          'description' => 'Source of this event registration.',
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'import' => true,
          'where' => 'civicrm_participant.source',
          'headerPattern' => '/(participant.)?(source)$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_fee_level' => array(
          'name' => 'fee_level',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Fee level') ,
          'description' => 'Populate with the label (text) associated with a fee level for paid events with multiple levels. Note that
      we store the label value and not the key
    ',
          'import' => true,
          'where' => 'civicrm_participant.fee_level',
          'headerPattern' => '/^(f(ee\s)?level)$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_is_test' => array(
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Test') ,
          'import' => true,
          'where' => 'civicrm_participant.is_test',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_is_pay_later' => array(
          'name' => 'is_pay_later',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Pay Later') ,
          'import' => true,
          'where' => 'civicrm_participant.is_pay_later',
          'headerPattern' => '/(is.)?(pay(.)?later)$/i',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'participant_fee_amount' => array(
          'name' => 'fee_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Fee Amount') ,
          'description' => 'actual processor fee if known - may be 0.',
          'precision' => array(
            20,
            2
          ) ,
          'import' => true,
          'where' => 'civicrm_participant.fee_amount',
          'headerPattern' => '/fee(.?am(ou)?nt)?/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'export' => true,
        ) ,
        'participant_registered_by_id' => array(
          'name' => 'registered_by_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Registered By ID') ,
          'description' => 'FK to Participant ID',
          'import' => true,
          'where' => 'civicrm_participant.registered_by_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'default' => 'NULL',
          'FKClassName' => 'CRM_Event_DAO_Participant',
        ) ,
        'participant_discount_id' => array(
          'name' => 'discount_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Discount ID') ,
          'description' => 'FK to Discount ID',
          'default' => 'NULL',
          'FKClassName' => 'CRM_Core_DAO_Discount',
        ) ,
        'participant_fee_currency' => array(
          'name' => 'fee_currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Fee Currency') ,
          'description' => '3 character string, value derived from config setting.',
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'import' => true,
          'where' => 'civicrm_participant.fee_currency',
          'headerPattern' => '/(fee)?.?cur(rency)?/i',
          'dataPattern' => '/^[A-Z]{3}$/i',
          'export' => true,
          'default' => 'NULL',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_currency',
            'keyColumn' => 'name',
            'labelColumn' => 'full_name',
            'nameColumn' => 'numeric_code',
          )
        ) ,
        'participant_campaign_id' => array(
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign') ,
          'description' => 'The campaign for which this participant has been registered.',
          'import' => true,
          'where' => 'civicrm_participant.campaign_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'pseudoconstant' => array(
            'table' => 'civicrm_campaign',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
        'discount_amount' => array(
          'name' => 'discount_amount',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Discount Amount') ,
          'description' => 'Discount Amount',
        ) ,
        'cart_id' => array(
          'name' => 'cart_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Event Cart ID') ,
          'description' => 'FK to civicrm_event_carts',
          'FKClassName' => 'CRM_Event_Cart_DAO_Cart',
        ) ,
        'must_wait' => array(
          'name' => 'must_wait',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Must Wait on List') ,
          'description' => 'On Waiting List',
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'participant_id',
        'contact_id' => 'participant_contact_id',
        'event_id' => 'event_id',
        'status_id' => 'participant_status_id',
        'role_id' => 'participant_role_id',
        'register_date' => 'participant_register_date',
        'source' => 'participant_source',
        'fee_level' => 'participant_fee_level',
        'is_test' => 'participant_is_test',
        'is_pay_later' => 'participant_is_pay_later',
        'fee_amount' => 'participant_fee_amount',
        'registered_by_id' => 'participant_registered_by_id',
        'discount_id' => 'participant_discount_id',
        'fee_currency' => 'participant_fee_currency',
        'campaign_id' => 'participant_campaign_id',
        'discount_amount' => 'discount_amount',
        'cart_id' => 'cart_id',
        'must_wait' => 'must_wait',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['participant'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['participant'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
