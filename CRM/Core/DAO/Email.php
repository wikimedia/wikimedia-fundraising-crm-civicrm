<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2017                                |
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
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Core/Email.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:08f53d44527d7d174b4aa1bd545b028c)
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
/**
 * CRM_Core_DAO_Email constructor.
 */
class CRM_Core_DAO_Email extends CRM_Core_DAO {
  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'civicrm_email';
  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Unique Email ID
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
   * Which Location does this email belong to.
   *
   * @var int unsigned
   */
  public $location_type_id;
  /**
   * Email address
   *
   * @var string
   */
  public $email;
  /**
   * Is this the primary?
   *
   * @var boolean
   */
  public $is_primary;
  /**
   * Is this the billing?
   *
   * @var boolean
   */
  public $is_billing;
  /**
   * Is this address on bounce hold?
   *
   * @var boolean
   */
  public $on_hold;
  /**
   * Is this address for bulk mail ?
   *
   * @var boolean
   */
  public $is_bulkmail;
  /**
   * When the address went on bounce hold
   *
   * @var datetime
   */
  public $hold_date;
  /**
   * When the address bounce status was last reset
   *
   * @var datetime
   */
  public $reset_date;
  /**
   * Text formatted signature for the email.
   *
   * @var text
   */
  public $signature_text;
  /**
   * HTML formatted signature for the email.
   *
   * @var text
   */
  public $signature_html;
  /**
   * Class constructor.
   */
  function __construct() {
    $this->__table = 'civicrm_email';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Email ID') ,
          'description' => 'Unique Email ID',
          'required' => true,
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Email Contact') ,
          'description' => 'FK to Contact ID',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'location_type_id' => array(
          'name' => 'location_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Email Location Type') ,
          'description' => 'Which Location does this email belong to.',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_location_type',
            'keyColumn' => 'id',
            'labelColumn' => 'display_name',
          )
        ) ,
        'email' => array(
          'name' => 'email',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Email') ,
          'description' => 'Email address',
          'maxlength' => 254,
          'size' => 30,
          'import' => true,
          'where' => 'civicrm_email.email',
          'headerPattern' => '/e.?mail/i',
          'dataPattern' => '/^[a-zA-Z][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/',
          'export' => true,
          'rule' => 'email',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'is_primary' => array(
          'name' => 'is_primary',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Primary email') ,
          'description' => 'Is this the primary?',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'is_billing' => array(
          'name' => 'is_billing',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Billing Email?') ,
          'description' => 'Is this the billing?',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'on_hold' => array(
          'name' => 'on_hold',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('On Hold') ,
          'description' => 'Is this address on bounce hold?',
          'required' => true,
          'export' => true,
          'where' => 'civicrm_email.on_hold',
          'headerPattern' => '',
          'dataPattern' => '',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
          'html' => array(
            'type' => 'CheckBox',
          ) ,
        ) ,
        'is_bulkmail' => array(
          'name' => 'is_bulkmail',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Use for Bulk Mail') ,
          'description' => 'Is this address for bulk mail ?',
          'required' => true,
          'export' => true,
          'where' => 'civicrm_email.is_bulkmail',
          'headerPattern' => '',
          'dataPattern' => '',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'hold_date' => array(
          'name' => 'hold_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Hold Date') ,
          'description' => 'When the address went on bounce hold',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'reset_date' => array(
          'name' => 'reset_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Reset Date') ,
          'description' => 'When the address bounce status was last reset',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'signature_text' => array(
          'name' => 'signature_text',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Signature Text') ,
          'description' => 'Text formatted signature for the email.',
          'import' => true,
          'where' => 'civicrm_email.signature_text',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'default' => 'NULL',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
        'signature_html' => array(
          'name' => 'signature_html',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Signature Html') ,
          'description' => 'HTML formatted signature for the email.',
          'import' => true,
          'where' => 'civicrm_email.signature_html',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'default' => 'NULL',
          'table_name' => 'civicrm_email',
          'entity' => 'Email',
          'bao' => 'CRM_Core_BAO_Email',
          'localizable' => 0,
        ) ,
      );
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
  static function &fieldKeys() {
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
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'email', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'email', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of indices
   */
  public static function indices($localize = TRUE) {
    $indices = array(
      'index_location_type' => array(
        'name' => 'index_location_type',
        'field' => array(
          0 => 'location_type_id',
        ) ,
        'localizable' => false,
        'sig' => 'civicrm_email::0::location_type_id',
      ) ,
      'UI_email' => array(
        'name' => 'UI_email',
        'field' => array(
          0 => 'email',
        ) ,
        'localizable' => false,
        'sig' => 'civicrm_email::0::email',
      ) ,
      'index_is_primary' => array(
        'name' => 'index_is_primary',
        'field' => array(
          0 => 'is_primary',
        ) ,
        'localizable' => false,
        'sig' => 'civicrm_email::0::is_primary',
      ) ,
      'index_is_billing' => array(
        'name' => 'index_is_billing',
        'field' => array(
          0 => 'is_billing',
        ) ,
        'localizable' => false,
        'sig' => 'civicrm_email::0::is_billing',
      ) ,
    );
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }
}
