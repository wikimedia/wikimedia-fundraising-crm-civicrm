<?php


namespace Civi\API;

/**
 * API Error Log Observer
 *
 * @see \CRM_Core_Error_Log
 * @see \Civi\API\Subscriber\DebugSubscriber
 *
 * @package Civi\API
 */
class LogObserver extends \Log_observer {

  /**
   * @var array
   */
  private static $messages = [];

  /**
   * @see \Log::_announce
   * @param array $event
   */
  public function notify($event) {
    $levels = $this->getLevels();
    $event['level'] = array_search($event['priority'], $levels);
    // Extract [civi.tag] from message string
    // As noted in \CRM_Core_Error_Log::log() the $context array gets prematurely converted to string with print_r() so we have to un-flatten it here
    if (preg_match('/^(.*)\s*Array\s*\(\s*\[civi\.(\w+)] => (\w+)\s*\)/', $event['message'], $message)) {
      $event['message'] = $message[1];
      $event[$message[2]] = $message[3];
    }
    self::$messages[] = $event;
  }

  /**
   * @return array
   */
  public function getMessages() {
    return self::$messages;
  }

  /**
   * Get the debugging levels.
   *
   * These are also on the CRM_Error_Log class but are not
   * part of the interface that class implements so
   * calling it from outside that class is unsafe.
   *
   * Yes, it's duplicated - but it's just an array!
   *
   * @return array
   */
  public function getLevels(): array {
    return [
      \Psr\Log\LogLevel::DEBUG => PEAR_LOG_DEBUG,
      \Psr\Log\LogLevel::INFO => PEAR_LOG_INFO,
      \Psr\Log\LogLevel::NOTICE => PEAR_LOG_NOTICE,
      \Psr\Log\LogLevel::WARNING => PEAR_LOG_WARNING,
      \Psr\Log\LogLevel::ERROR => PEAR_LOG_ERR,
      \Psr\Log\LogLevel::CRITICAL => PEAR_LOG_CRIT,
      \Psr\Log\LogLevel::ALERT => PEAR_LOG_ALERT,
      \Psr\Log\LogLevel::EMERGENCY => PEAR_LOG_EMERG,
    ];
  }

}
