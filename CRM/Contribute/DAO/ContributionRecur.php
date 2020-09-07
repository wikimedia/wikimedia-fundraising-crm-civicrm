<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Contribute/ContributionRecur.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:decf43c002d0e4ded0fe5f2a2e2f7bd0)
 */

/**
 * Database access object for the ContributionRecur entity.
 */
class CRM_Contribute_DAO_ContributionRecur extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.6';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_contribution_recur';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Contribution Recur ID
   *
   * @var int
   */
  public $id;

  /**
   * Foreign key to civicrm_contact.id.
   *
   * @var int
   */
  public $contact_id;

  /**
   * Amount to be collected (including any sales tax) by payment processor each recurrence.
   *
   * @var float
   */
  public $amount;

  /**
   * 3 character string, value from config setting or input via user.
   *
   * @var string
   */
  public $currency;

  /**
   * Time units for recurrence of payment.
   *
   * @var string
   */
  public $frequency_unit;

  /**
   * Number of time units for recurrence of payment.
   *
   * @var int
   */
  public $frequency_interval;

  /**
   * Total number of payments to be made. Set this to 0 if this is an open-ended commitment i.e. no set end date.
   *
   * @var int
   */
  public $installments;

  /**
   * The date the first scheduled recurring contribution occurs.
   *
   * @var datetime
   */
  public $start_date;

  /**
   * When this recurring contribution record was created.
   *
   * @var datetime
   */
  public $create_date;

  /**
   * Last updated date for this record. mostly the last time a payment was received
   *
   * @var datetime
   */
  public $modified_date;

  /**
   * Date this recurring contribution was cancelled by contributor- if we can get access to it
   *
   * @var datetime
   */
  public $cancel_date;

  /**
   * Free text field for a reason for cancelling
   *
   * @var text
   */
  public $cancel_reason;

  /**
   * Date this recurring contribution finished successfully
   *
   * @var datetime
   */
  public $end_date;

  /**
   * Possibly needed to store a unique identifier for this recurring payment order - if this is available from the processor??
   *
   * @var string
   */
  public $processor_id;

  /**
   * Optionally used to store a link to a payment token used for this recurring contribution.
   *
   * @var int
   */
  public $payment_token_id;

  /**
   * unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method
   *
   * @var string
   */
  public $trxn_id;

  /**
   * unique invoice id, system generated or passed in
   *
   * @var string
   */
  public $invoice_id;

  /**
   * @var int
   */
  public $contribution_status_id;

  /**
   * @var bool
   */
  public $is_test;

  /**
   * Day in the period when the payment should be charged e.g. 1st of month, 15th etc.
   *
   * @var int
   */
  public $cycle_day;

  /**
   * Next scheduled date
   *
   * @var datetime
   */
  public $next_sched_contribution_date;

  /**
   * Number of failed charge attempts since last success. Business rule could be set to deactivate on more than x failures.
   *
   * @var int
   */
  public $failure_count;

  /**
   * Date to retry failed attempt
   *
   * @var datetime
   */
  public $failure_retry_date;

  /**
   * Some systems allow contributor to set a number of installments - but then auto-renew the subscription or commitment if they do not cancel.
   *
   * @var bool
   */
  public $auto_renew;

  /**
   * Foreign key to civicrm_payment_processor.id
   *
   * @var int
   */
  public $payment_processor_id;

  /**
   * FK to Financial Type
   *
   * @var int
   */
  public $financial_type_id;

  /**
   * FK to Payment Instrument
   *
   * @var int
   */
  public $payment_instrument_id;

  /**
   * The campaign for which this contribution has been triggered.
   *
   * @var int
   */
  public $campaign_id;

  /**
   * if true, receipt is automatically emailed to contact on each successful payment
   *
   * @var bool
   */
  public $is_email_receipt;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_contribution_recur';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   */
  public static function getEntityTitle() {
    return ts('Recurring Contributions');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'payment_token_id', 'civicrm_payment_token', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'payment_processor_id', 'civicrm_payment_processor', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'financial_type_id', 'civicrm_financial_type', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'campaign_id', 'civicrm_campaign', 'id');
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
        'contribution_recur_id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Recurring Contribution ID'),
          'description' => ts('Contribution Recur ID'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'add' => '1.6',
        ],
        'contact_id' => [
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact'),
          'description' => ts('Foreign key to civicrm_contact.id.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.contact_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
          'html' => [
            'type' => 'EntityRef',
          ],
          'add' => '1.6',
        ],
        'amount' => [
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Amount'),
          'description' => ts('Amount to be collected (including any sales tax) by payment processor each recurrence.'),
          'required' => TRUE,
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_contribution_recur.amount',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'currency' => [
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Currency'),
          'description' => ts('3 character string, value from config setting or input via user.'),
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'where' => 'civicrm_contribution_recur.currency',
          'default' => 'NULL',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
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
          'add' => '3.2',
        ],
        'frequency_unit' => [
          'name' => 'frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Frequency Unit'),
          'description' => ts('Time units for recurrence of payment.'),
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'where' => 'civicrm_contribution_recur.frequency_unit',
          'default' => 'month',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'recur_frequency_units',
            'keyColumn' => 'name',
            'optionEditPath' => 'civicrm/admin/options/recur_frequency_units',
          ],
          'add' => '1.6',
        ],
        'frequency_interval' => [
          'name' => 'frequency_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Interval (number of units)'),
          'description' => ts('Number of time units for recurrence of payment.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.frequency_interval',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'installments' => [
          'name' => 'installments',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Number of Installments'),
          'description' => ts('Total number of payments to be made. Set this to 0 if this is an open-ended commitment i.e. no set end date.'),
          'where' => 'civicrm_contribution_recur.installments',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_start_date' => [
          'name' => 'start_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Start Date'),
          'description' => ts('The date the first scheduled recurring contribution occurs.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.start_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution Start Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDateTime',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_create_date' => [
          'name' => 'create_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Created Date'),
          'description' => ts('When this recurring contribution record was created.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.create_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution Create Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDateTime',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_modified_date' => [
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Modified Date'),
          'description' => ts('Last updated date for this record. mostly the last time a payment was received'),
          'where' => 'civicrm_contribution_recur.modified_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution Modified Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDateTime',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_cancel_date' => [
          'name' => 'cancel_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Cancel Date'),
          'description' => ts('Date this recurring contribution was cancelled by contributor- if we can get access to it'),
          'where' => 'civicrm_contribution_recur.cancel_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution Cancel Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDate',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_cancel_reason' => [
          'name' => 'cancel_reason',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Cancellation Reason'),
          'description' => ts('Free text field for a reason for cancelling'),
          'where' => 'civicrm_contribution_recur.cancel_reason',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution Cancel Reason'),
          'html' => [
            'type' => 'Text',
          ],
          'add' => '5.13',
        ],
        'contribution_recur_end_date' => [
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution End Date'),
          'description' => ts('Date this recurring contribution finished successfully'),
          'where' => 'civicrm_contribution_recur.end_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Recurring Contribution End Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDate',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_processor_id' => [
          'name' => 'processor_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Processor ID'),
          'description' => ts('Possibly needed to store a unique identifier for this recurring payment order - if this is available from the processor??'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_recur.processor_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'payment_token_id' => [
          'name' => 'payment_token_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Token ID'),
          'description' => ts('Optionally used to store a link to a payment token used for this recurring contribution.'),
          'where' => 'civicrm_contribution_recur.payment_token_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_PaymentToken',
          'add' => '4.6',
        ],
        'contribution_recur_trxn_id' => [
          'name' => 'trxn_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction ID'),
          'description' => ts('unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_recur.trxn_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'invoice_id' => [
          'name' => 'invoice_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Invoice ID'),
          'description' => ts('unique invoice id, system generated or passed in'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_contribution_recur.invoice_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_contribution_status_id' => [
          'name' => 'contribution_status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Status'),
          'import' => TRUE,
          'where' => 'civicrm_contribution_recur.contribution_status_id',
          'export' => TRUE,
          'default' => '1',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'contribution_recur_status',
            'optionEditPath' => 'civicrm/admin/options/contribution_recur_status',
          ],
          'add' => '1.6',
        ],
        'is_test' => [
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Test'),
          'import' => TRUE,
          'where' => 'civicrm_contribution_recur.is_test',
          'export' => TRUE,
          'default' => '0',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => NULL,
        ],
        'cycle_day' => [
          'name' => 'cycle_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Cycle Day'),
          'description' => ts('Day in the period when the payment should be charged e.g. 1st of month, 15th etc.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.cycle_day',
          'default' => '1',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_next_sched_contribution_date' => [
          'name' => 'next_sched_contribution_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Next Scheduled Contribution Date'),
          'description' => ts('Next scheduled date'),
          'where' => 'civicrm_contribution_recur.next_sched_contribution_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Next Scheduled Recurring Contribution'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDate',
          ],
          'add' => '4.4',
        ],
        'failure_count' => [
          'name' => 'failure_count',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Number of Failures'),
          'description' => ts('Number of failed charge attempts since last success. Business rule could be set to deactivate on more than x failures.'),
          'where' => 'civicrm_contribution_recur.failure_count',
          'default' => '0',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_failure_retry_date' => [
          'name' => 'failure_retry_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Retry Failed Attempt Date'),
          'description' => ts('Date to retry failed attempt'),
          'where' => 'civicrm_contribution_recur.failure_retry_date',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'unique_title' => ts('Failed Recurring Contribution Retry Date'),
          'html' => [
            'type' => 'Select Date',
            'formatType' => 'activityDate',
          ],
          'add' => '1.6',
        ],
        'auto_renew' => [
          'name' => 'auto_renew',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Auto Renew'),
          'description' => ts('Some systems allow contributor to set a number of installments - but then auto-renew the subscription or commitment if they do not cancel.'),
          'required' => TRUE,
          'where' => 'civicrm_contribution_recur.auto_renew',
          'default' => '0',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '1.6',
        ],
        'contribution_recur_payment_processor_id' => [
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor'),
          'description' => ts('Foreign key to civicrm_payment_processor.id'),
          'where' => 'civicrm_contribution_recur.payment_processor_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_payment_processor',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
          'add' => '3.3',
        ],
        'financial_type_id' => [
          'name' => 'financial_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Type'),
          'description' => ts('FK to Financial Type'),
          'where' => 'civicrm_contribution_recur.financial_type_id',
          'export' => FALSE,
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_FinancialType',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_financial_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
          'add' => '4.3',
        ],
        'payment_instrument_id' => [
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Method'),
          'description' => ts('FK to Payment Instrument'),
          'where' => 'civicrm_contribution_recur.payment_instrument_id',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          ],
          'add' => '4.1',
        ],
        'contribution_campaign_id' => [
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign'),
          'description' => ts('The campaign for which this contribution has been triggered.'),
          'import' => TRUE,
          'where' => 'civicrm_contribution_recur.campaign_id',
          'export' => TRUE,
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_campaign',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          ],
          'add' => '4.1',
        ],
        'is_email_receipt' => [
          'name' => 'is_email_receipt',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Send email Receipt?'),
          'description' => ts('if true, receipt is automatically emailed to contact on each successful payment'),
          'where' => 'civicrm_contribution_recur.is_email_receipt',
          'default' => '1',
          'table_name' => 'civicrm_contribution_recur',
          'entity' => 'ContributionRecur',
          'bao' => 'CRM_Contribute_BAO_ContributionRecur',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '4.1',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'contribution_recur', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'contribution_recur', $prefix, []);
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
      'UI_contrib_trxn_id' => [
        'name' => 'UI_contrib_trxn_id',
        'field' => [
          0 => 'trxn_id',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_contribution_recur::1::trxn_id',
      ],
      'UI_contrib_invoice_id' => [
        'name' => 'UI_contrib_invoice_id',
        'field' => [
          0 => 'invoice_id',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_contribution_recur::1::invoice_id',
      ],
      'index_contribution_status' => [
        'name' => 'index_contribution_status',
        'field' => [
          0 => 'contribution_status_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_contribution_recur::0::contribution_status_id',
      ],
      'UI_contribution_recur_payment_instrument_id' => [
        'name' => 'UI_contribution_recur_payment_instrument_id',
        'field' => [
          0 => 'payment_instrument_id',
        ],
        'localizable' => FALSE,
        'sig' => 'civicrm_contribution_recur::0::payment_instrument_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
