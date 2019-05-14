<?php

namespace Civi\Api4;

/**
 * MockBasicEntity entity.
 *
 * @package Civi\Api4
 */
class MockBasicEntity extends Generic\AbstractEntity {

  const STORAGE_CLASS = '\\Civi\\Test\\Api4\\Mock\\MockEntityDataStorage';

  /**
   * @return Generic\BasicGetFieldsAction
   */
  public static function getFields() {
    return new Generic\BasicGetFieldsAction(static::class, __FUNCTION__, function() {
      return [
        [
          'name' => 'id',
          'type' => 'Integer',
        ],
        [
          'name' => 'group',
          'options' => [
            'one' => 'One',
            'two' => 'Two',
          ]
        ],
        [
          'name' => 'color',
        ],
        [
          'name' => 'shape',
        ],
        [
          'name' => 'size',
        ],
        [
          'name' => 'weight',
        ],
      ];
    });
  }

  /**
   * @return Generic\BasicGetAction
   */
  public static function get() {
    return new Generic\BasicGetAction('MockBasicEntity', __FUNCTION__, [self::STORAGE_CLASS, 'get']);
  }

  /**
   * @return Generic\BasicCreateAction
   */
  public static function create() {
    return new Generic\BasicCreateAction(static::class, __FUNCTION__, [self::STORAGE_CLASS, 'write']);
  }

  /**
   * @return Generic\BasicUpdateAction
   */
  public static function update() {
    return new Generic\BasicUpdateAction(self::getEntityName(), __FUNCTION__, 'id', [self::STORAGE_CLASS, 'write']);
  }

  /**
   * @return Generic\BasicBatchAction
   */
  public static function delete() {
    return new Generic\BasicBatchAction('MockBasicEntity', __FUNCTION__, 'id', [self::STORAGE_CLASS, 'delete']);
  }

  /**
   * @return Generic\BasicBatchAction
   */
  public static function batchFrobnicate() {
    return new Generic\BasicBatchAction('MockBasicEntity', __FUNCTION__, ['id', 'number'], function ($item) {
      return [
        'id' => $item['id'],
        'frobnication' => $item['number'] * $item['number'],
      ];
    });
  }

  /**
   * @return Generic\BasicReplaceAction
   */
  public static function replace() {
    return new Generic\BasicReplaceAction('MockBasicEntity', __FUNCTION__);
  }

}
