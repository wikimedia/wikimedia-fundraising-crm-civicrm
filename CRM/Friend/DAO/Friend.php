<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Friend/Friend.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:3f1c976d43e312175e85da0427f5210d)
 */

/**
 * Database access object for the Friend entity.
 */
class CRM_Friend_DAO_Friend extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '2.0';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_tell_friend';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * Friend ID
   *
   * @var int
   */
  public $id;

  /**
   * Name of table where item being referenced is stored.
   *
   * @var string
   */
  public $entity_table;

  /**
   * Foreign key to the referenced item.
   *
   * @var int
   */
  public $entity_id;

  /**
   * @var string
   */
  public $title;

  /**
   * Introductory message to contributor or participant displayed on the Tell a Friend form.
   *
   * @var text
   */
  public $intro;

  /**
   * Suggested message to friends, provided as default on the Tell A Friend form.
   *
   * @var text
   */
  public $suggested_message;

  /**
   * URL for general info about the organization - included in the email sent to friends.
   *
   * @var string
   */
  public $general_link;

  /**
   * Text for Tell a Friend thank you page header and HTML title.
   *
   * @var string
   */
  public $thankyou_title;

  /**
   * Thank you message displayed on success page.
   *
   * @var text
   */
  public $thankyou_text;

  /**
   * @var bool
   */
  public $is_active;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_tell_friend';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   */
  public static function getEntityTitle() {
    return ts('Friends');
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
          'title' => ts('Friend ID'),
          'description' => ts('Friend ID'),
          'required' => TRUE,
          'where' => 'civicrm_tell_friend.id',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 0,
          'add' => '2.0',
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Table'),
          'description' => ts('Name of table where item being referenced is stored.'),
          'required' => TRUE,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_tell_friend.entity_table',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 0,
          'add' => '2.0',
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Entity ID'),
          'description' => ts('Foreign key to the referenced item.'),
          'required' => TRUE,
          'where' => 'civicrm_tell_friend.entity_id',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 0,
          'add' => '2.0',
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Title'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_tell_friend.title',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'intro' => [
          'name' => 'intro',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Intro'),
          'description' => ts('Introductory message to contributor or participant displayed on the Tell a Friend form.'),
          'where' => 'civicrm_tell_friend.intro',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'suggested_message' => [
          'name' => 'suggested_message',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Suggested Message'),
          'description' => ts('Suggested message to friends, provided as default on the Tell A Friend form.'),
          'where' => 'civicrm_tell_friend.suggested_message',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'general_link' => [
          'name' => 'general_link',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('General Link'),
          'description' => ts('URL for general info about the organization - included in the email sent to friends.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'import' => TRUE,
          'where' => 'civicrm_tell_friend.general_link',
          'export' => TRUE,
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'thankyou_title' => [
          'name' => 'thankyou_title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Thank You Title'),
          'description' => ts('Text for Tell a Friend thank you page header and HTML title.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_tell_friend.thankyou_title',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'thankyou_text' => [
          'name' => 'thankyou_text',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Thank You Text'),
          'description' => ts('Thank you message displayed on success page.'),
          'where' => 'civicrm_tell_friend.thankyou_text',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '2.0',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Enabled?'),
          'where' => 'civicrm_tell_friend.is_active',
          'table_name' => 'civicrm_tell_friend',
          'entity' => 'Friend',
          'bao' => 'CRM_Friend_BAO_Friend',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '2.0',
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
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'tell_friend', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'tell_friend', $prefix, []);
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
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
