<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Core/Note.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:75161cdedcd719f035387c9c1d0d83dd)
 */

/**
 * Database access object for the Note entity.
 */
class CRM_Core_DAO_Note extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.1';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_note';

  /**
   * Icon associated with this entity.
   *
   * @var string
   */
  public static $_icon = 'fa-sticky-note';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Note ID
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
   * Note and/or Comment.
   *
   * @var text
   */
  public $note;

  /**
   * FK to Contact ID creator
   *
   * @var int
   */
  public $contact_id;

  /**
   * When was this note last modified/edited
   *
   * @var timestamp
   */
  public $modified_date;

  /**
   * subject of note description
   *
   * @var string
   */
  public $subject;

  /**
   * Foreign Key to Note Privacy Level (which is an option value pair and hence an implicit FK)
   *
   * @var string
   */
  public $privacy;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_note';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Notes') : ts('Note');
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
          'title' => ts('Note ID'),
          'description' => ts('Note ID'),
          'required' => TRUE,
          'where' => 'civicrm_note.id',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'add' => '1.1',
        ],
        'entity_table' => [
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Note Entity'),
          'description' => ts('Name of table where item being referenced is stored.'),
          'required' => TRUE,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_note.entity_table',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'pseudoconstant' => [
            'callback' => 'CRM_Core_BAO_Note::entityTables',
          ],
          'add' => '1.1',
        ],
        'entity_id' => [
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Note Entity ID'),
          'description' => ts('Foreign key to the referenced item.'),
          'required' => TRUE,
          'where' => 'civicrm_note.entity_id',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'add' => '1.1',
        ],
        'note' => [
          'name' => 'note',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Note'),
          'description' => ts('Note and/or Comment.'),
          'rows' => 4,
          'cols' => 60,
          'import' => TRUE,
          'where' => 'civicrm_note.note',
          'headerPattern' => '/Note|Comment/i',
          'dataPattern' => '//',
          'export' => TRUE,
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'html' => [
            'type' => 'TextArea',
          ],
          'add' => '1.1',
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Note Created By'),
          'description' => ts('FK to Contact ID creator'),
          'where' => 'civicrm_note.contact_id',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'add' => '1.1',
        ],
        'modified_date' => [
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_TIMESTAMP,
          'title' => ts('Note Modified By'),
          'description' => ts('When was this note last modified/edited'),
          'where' => 'civicrm_note.modified_date',
          'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'add' => '1.1',
        ],
        'subject' => [
          'name' => 'subject',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Subject'),
          'description' => ts('subject of note description'),
          'maxlength' => 255,
          'size' => 60,
          'where' => 'civicrm_note.subject',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.5',
        ],
        'privacy' => [
          'name' => 'privacy',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Privacy'),
          'description' => ts('Foreign Key to Note Privacy Level (which is an option value pair and hence an implicit FK)'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_note.privacy',
          'table_name' => 'civicrm_note',
          'entity' => 'Note',
          'bao' => 'CRM_Core_BAO_Note',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'note_privacy',
            'optionEditPath' => 'civicrm/admin/options/note_privacy',
          ],
          'add' => '3.3',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'note', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'note', $prefix, []);
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
      'index_entity' => [
        'name' => 'index_entity',
        'field' => [
          0 => 'entity_table',
          1 => 'entity_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_note::0::entity_table::entity_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
