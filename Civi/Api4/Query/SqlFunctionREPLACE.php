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

namespace Civi\Api4\Query;

/**
 * Sql function
 */
class SqlFunctionREPLACE extends SqlFunction {

  protected static $category = self::CATEGORY_STRING;

  protected static $params = [
    [
      'expr' => 1,
      'optional' => FALSE,
      'must_be' => ['SqlField', 'SqlString'],
    ],
    [
      'expr' => 1,
      'optional' => FALSE,
      'must_be' => ['SqlField', 'SqlString'],
    ],
    [
      'expr' => 1,
      'optional' => FALSE,
      'must_be' => ['SqlField', 'SqlString'],
    ],
  ];

  /**
   * @return string
   */
  public static function getTitle(): string {
    return ts('Replace');
  }

}
