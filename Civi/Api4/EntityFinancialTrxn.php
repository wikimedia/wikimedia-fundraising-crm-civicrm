<?php

/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 */

namespace Civi\Api4;

/**
 * EntityFinancialTrxns. Joins financial transactions to contributions
 * and financial items.
 *
 * @see https://docs.civicrm.org/dev/en/latest/financial/financialentities/
 *
 * @searchable bridge
 * @package Civi\Api4
 */
class EntityFinancialTrxn extends Generic\DAOEntity {
  use Generic\Traits\EntityBridge;

  /**
   * @return array
   */
  public static function getInfo() {
    $info = parent::getInfo();
    $info['bridge'] = [
      'entity_id' => [],
      'financial_trxn_id' => [],
    ];
    return $info;
  }

}
