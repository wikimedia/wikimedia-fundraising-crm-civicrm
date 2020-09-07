<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Core/ActionSchedule.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:d05639de89f460efbb3474dcaf5acd27)
 */

/**
 * Database access object for the ActionSchedule entity.
 */
class CRM_Core_DAO_ActionSchedule extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '3.4';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_action_schedule';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * @var int
   */
  public $id;

  /**
   * Name of the action(reminder)
   *
   * @var string
   */
  public $name;

  /**
   * Title of the action(reminder)
   *
   * @var string
   */
  public $title;

  /**
   * Recipient
   *
   * @var string
   */
  public $recipient;

  /**
   * Is this the recipient criteria limited to OR in addition to?
   *
   * @var bool
   */
  public $limit_to;

  /**
   * Entity value
   *
   * @var string
   */
  public $entity_value;

  /**
   * Entity status
   *
   * @var string
   */
  public $entity_status;

  /**
   * Reminder Interval.
   *
   * @var int
   */
  public $start_action_offset;

  /**
   * Time units for reminder.
   *
   * @var string
   */
  public $start_action_unit;

  /**
   * Reminder Action
   *
   * @var string
   */
  public $start_action_condition;

  /**
   * Entity date
   *
   * @var string
   */
  public $start_action_date;

  /**
   * @var bool
   */
  public $is_repeat;

  /**
   * Time units for repetition of reminder.
   *
   * @var string
   */
  public $repetition_frequency_unit;

  /**
   * Time interval for repeating the reminder.
   *
   * @var int
   */
  public $repetition_frequency_interval;

  /**
   * Time units till repetition of reminder.
   *
   * @var string
   */
  public $end_frequency_unit;

  /**
   * Time interval till repeating the reminder.
   *
   * @var int
   */
  public $end_frequency_interval;

  /**
   * Reminder Action till repeating the reminder.
   *
   * @var string
   */
  public $end_action;

  /**
   * Entity end date
   *
   * @var string
   */
  public $end_date;

  /**
   * Is this option active?
   *
   * @var bool
   */
  public $is_active;

  /**
   * Contact IDs to which reminder should be sent.
   *
   * @var string
   */
  public $recipient_manual;

  /**
   * listing based on recipient field.
   *
   * @var string
   */
  public $recipient_listing;

  /**
   * Body of the mailing in text format.
   *
   * @var longtext
   */
  public $body_text;

  /**
   * Body of the mailing in html format.
   *
   * @var longtext
   */
  public $body_html;

  /**
   * Content of the SMS text.
   *
   * @var longtext
   */
  public $sms_body_text;

  /**
   * Subject of mailing
   *
   * @var string
   */
  public $subject;

  /**
   * Record Activity for this reminder?
   *
   * @var bool
   */
  public $record_activity;

  /**
   * Name/ID of the mapping to use on this table
   *
   * @var string
   */
  public $mapping_id;

  /**
   * FK to Group
   *
   * @var int
   */
  public $group_id;

  /**
   * FK to the message template.
   *
   * @var int
   */
  public $msg_template_id;

  /**
   * FK to the message template.
   *
   * @var int
   */
  public $sms_template_id;

  /**
   * Date on which the reminder be sent.
   *
   * @var date
   */
  public $absolute_date;

  /**
   * Name in "from" field
   *
   * @var string
   */
  public $from_name;

  /**
   * Email address in "from" field
   *
   * @var string
   */
  public $from_email;

  /**
   * Send the message as email or sms or both.
   *
   * @var string
   */
  public $mode;

  /**
   * @var int
   */
  public $sms_provider_id;

  /**
   * Used for repeating entity
   *
   * @var string
   */
  public $used_for;

  /**
   * Used for multilingual installation
   *
   * @var string
   */
  public $filter_contact_language;

  /**
   * Used for multilingual installation
   *
   * @var string
   */
  public $communication_language;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_action_schedule';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   */
  public static function getEntityTitle() {
    return ts('Action Schedules');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'group_id', 'civicrm_group', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'msg_template_id', 'civicrm_msg_template', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'sms_template_id', 'civicrm_msg_template', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'sms_provider_id', 'civicrm_sms_provider', 'id');
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
          'title' => ts('Action Schedule ID'),
          'required' => TRUE,
          'where' => 'civicrm_action_schedule.id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Name'),
          'description' => ts('Name of the action(reminder)'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.name',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'title' => [
          'name' => 'title',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Title'),
          'description' => ts('Title of the action(reminder)'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.title',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'recipient' => [
          'name' => 'recipient',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Recipient'),
          'description' => ts('Recipient'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.recipient',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'limit_to' => [
          'name' => 'limit_to',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Limit To'),
          'description' => ts('Is this the recipient criteria limited to OR in addition to?'),
          'where' => 'civicrm_action_schedule.limit_to',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.4',
        ],
        'entity_value' => [
          'name' => 'entity_value',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Value'),
          'description' => ts('Entity value'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.entity_value',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_TRIMMED,
          'add' => '3.4',
        ],
        'entity_status' => [
          'name' => 'entity_status',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Entity Status'),
          'description' => ts('Entity status'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.entity_status',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_SEPARATOR_TRIMMED,
          'add' => '3.4',
        ],
        'start_action_offset' => [
          'name' => 'start_action_offset',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Start Action Offset'),
          'description' => ts('Reminder Interval.'),
          'where' => 'civicrm_action_schedule.start_action_offset',
          'default' => '0',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'start_action_unit' => [
          'name' => 'start_action_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Start Action Unit'),
          'description' => ts('Time units for reminder.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'where' => 'civicrm_action_schedule.start_action_unit',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::getRecurringFrequencyUnits',
          ],
          'add' => '3.4',
        ],
        'start_action_condition' => [
          'name' => 'start_action_condition',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Start Action Condition'),
          'description' => ts('Reminder Action'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.start_action_condition',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'start_action_date' => [
          'name' => 'start_action_date',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Start Action Date'),
          'description' => ts('Entity date'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.start_action_date',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'is_repeat' => [
          'name' => 'is_repeat',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Repeat?'),
          'where' => 'civicrm_action_schedule.is_repeat',
          'default' => '0',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'repetition_frequency_unit' => [
          'name' => 'repetition_frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Repetition Frequency Unit'),
          'description' => ts('Time units for repetition of reminder.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'where' => 'civicrm_action_schedule.repetition_frequency_unit',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::getRecurringFrequencyUnits',
          ],
          'add' => '3.4',
        ],
        'repetition_frequency_interval' => [
          'name' => 'repetition_frequency_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Repetition Frequency Interval'),
          'description' => ts('Time interval for repeating the reminder.'),
          'where' => 'civicrm_action_schedule.repetition_frequency_interval',
          'default' => '0',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'end_frequency_unit' => [
          'name' => 'end_frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('End Frequency Unit'),
          'description' => ts('Time units till repetition of reminder.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'where' => 'civicrm_action_schedule.end_frequency_unit',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::getRecurringFrequencyUnits',
          ],
          'add' => '3.4',
        ],
        'end_frequency_interval' => [
          'name' => 'end_frequency_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('End Frequency Interval'),
          'description' => ts('Time interval till repeating the reminder.'),
          'where' => 'civicrm_action_schedule.end_frequency_interval',
          'default' => '0',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'end_action' => [
          'name' => 'end_action',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('End Action'),
          'description' => ts('Reminder Action till repeating the reminder.'),
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'where' => 'civicrm_action_schedule.end_action',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'end_date' => [
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('End Date'),
          'description' => ts('Entity end date'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.end_date',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Schedule is Active?'),
          'description' => ts('Is this option active?'),
          'where' => 'civicrm_action_schedule.is_active',
          'default' => '1',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'recipient_manual' => [
          'name' => 'recipient_manual',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Recipient Manual'),
          'description' => ts('Contact IDs to which reminder should be sent.'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.recipient_manual',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'serialize' => self::SERIALIZE_COMMA,
          'add' => '3.4',
        ],
        'recipient_listing' => [
          'name' => 'recipient_listing',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Recipient Listing'),
          'description' => ts('listing based on recipient field.'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.recipient_listing',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.1',
        ],
        'body_text' => [
          'name' => 'body_text',
          'type' => CRM_Utils_Type::T_LONGTEXT,
          'title' => ts('Reminder Text'),
          'description' => ts('Body of the mailing in text format.'),
          'where' => 'civicrm_action_schedule.body_text',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'body_html' => [
          'name' => 'body_html',
          'type' => CRM_Utils_Type::T_LONGTEXT,
          'title' => ts('Reminder HTML'),
          'description' => ts('Body of the mailing in html format.'),
          'where' => 'civicrm_action_schedule.body_html',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'sms_body_text' => [
          'name' => 'sms_body_text',
          'type' => CRM_Utils_Type::T_LONGTEXT,
          'title' => ts('SMS Reminder Text'),
          'description' => ts('Content of the SMS text.'),
          'where' => 'civicrm_action_schedule.sms_body_text',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.5',
        ],
        'subject' => [
          'name' => 'subject',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reminder Subject'),
          'description' => ts('Subject of mailing'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.subject',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'record_activity' => [
          'name' => 'record_activity',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Record Activity for Reminder?'),
          'description' => ts('Record Activity for this reminder?'),
          'where' => 'civicrm_action_schedule.record_activity',
          'default' => 'NULL',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'mapping_id' => [
          'name' => 'mapping_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reminder Mapping'),
          'description' => ts('Name/ID of the mapping to use on this table'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.mapping_id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '3.4',
        ],
        'group_id' => [
          'name' => 'group_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Reminder Group'),
          'description' => ts('FK to Group'),
          'where' => 'civicrm_action_schedule.group_id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Group',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_group',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          ],
          'add' => '3.4',
        ],
        'msg_template_id' => [
          'name' => 'msg_template_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Reminder Template'),
          'description' => ts('FK to the message template.'),
          'where' => 'civicrm_action_schedule.msg_template_id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_MessageTemplate',
          'add' => NULL,
        ],
        'sms_template_id' => [
          'name' => 'sms_template_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('SMS Reminder Template'),
          'description' => ts('FK to the message template.'),
          'where' => 'civicrm_action_schedule.sms_template_id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_MessageTemplate',
          'add' => NULL,
        ],
        'absolute_date' => [
          'name' => 'absolute_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Fixed Date for Reminder'),
          'description' => ts('Date on which the reminder be sent.'),
          'where' => 'civicrm_action_schedule.absolute_date',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.1',
        ],
        'from_name' => [
          'name' => 'from_name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reminder from Name'),
          'description' => ts('Name in "from" field'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.from_name',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.5',
        ],
        'from_email' => [
          'name' => 'from_email',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reminder From Email'),
          'description' => ts('Email address in "from" field'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.from_email',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.5',
        ],
        'mode' => [
          'name' => 'mode',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Message Mode'),
          'description' => ts('Send the message as email or sms or both.'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.mode',
          'default' => 'Email',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'msg_mode',
            'optionEditPath' => 'civicrm/admin/options/msg_mode',
          ],
          'add' => '4.5',
        ],
        'sms_provider_id' => [
          'name' => 'sms_provider_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('SMS Provider'),
          'where' => 'civicrm_action_schedule.sms_provider_id',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'FKClassName' => 'CRM_SMS_DAO_Provider',
          'html' => [
            'type' => 'Select',
          ],
          'add' => '4.5',
        ],
        'used_for' => [
          'name' => 'used_for',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Used For'),
          'description' => ts('Used for repeating entity'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_action_schedule.used_for',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.6',
        ],
        'filter_contact_language' => [
          'name' => 'filter_contact_language',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Filter Contact Language'),
          'description' => ts('Used for multilingual installation'),
          'maxlength' => 128,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_action_schedule.filter_contact_language',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.7',
        ],
        'communication_language' => [
          'name' => 'communication_language',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Communication Language'),
          'description' => ts('Used for multilingual installation'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'where' => 'civicrm_action_schedule.communication_language',
          'table_name' => 'civicrm_action_schedule',
          'entity' => 'ActionSchedule',
          'bao' => 'CRM_Core_BAO_ActionSchedule',
          'localizable' => 0,
          'add' => '4.7',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'action_schedule', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'action_schedule', $prefix, []);
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
