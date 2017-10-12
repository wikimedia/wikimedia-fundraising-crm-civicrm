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
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 */
class CRM_Contact_Page_DedupeFind extends CRM_Core_Page_Basic {
  protected $_cid = NULL;
  protected $_rgid;
  protected $_mainContacts;
  protected $_gid;
  protected $action;

  /**
   * Get BAO Name.
   *
   * @return string
   *   Classname of BAO.
   */
  public function getBAOName() {
    return 'CRM_Dedupe_BAO_RuleGroup';
  }

  /**
   * Get action Links.
   */
  public function &links() {
  }

  /**
   * Browse all rule groups.
   */
  public function run() {
    $gid = CRM_Utils_Request::retrieve('gid', 'Positive', $this, FALSE, 0);
    $action = CRM_Utils_Request::retrieve('action', 'String', $this, FALSE, 0);
    $context = CRM_Utils_Request::retrieve('context', 'String', $this);
    $limit = CRM_Utils_Request::retrieve('limit', 'Integer', $this);
    $rgid = CRM_Utils_Request::retrieve('rgid', 'Positive', $this);
    $cid = CRM_Utils_Request::retrieve('cid', 'Positive', $this, FALSE, 0);
    $criteria = CRM_Utils_Request::retrieve('criteria', 'String', $this, FALSE, '{}');
    $isSelected = CRM_Utils_Request::retrieve('is_selected', 'Int', $this, FALSE, 2);
    $this->assign('criteria', $criteria);

    $isConflictMode = ($context == 'conflicts');
    if ($cid) {
      $this->_cid = $cid;
    }
    if ($gid) {
      $this->_gid = $gid;
    }
    $this->_rgid = $rgid;

    $urlQry = array(
      'reset' => 1,
      'rgid' => $rgid,
      'gid' => $gid,
      'limit' => $limit,
      'criteria' => $criteria,
    );
    $this->assign('urlQuery', CRM_Utils_System::makeQueryString($urlQry));
    $criteria = json_decode($criteria, TRUE);

    if ($context == 'search') {
      $context = 'search';
      $this->assign('backURL', CRM_Core_Session::singleton()->readUserContext());
    }

    if ($action & CRM_Core_Action::RENEW) {
      // empty cache
      if ($rgid) {
        CRM_Core_BAO_PrevNextCache::deleteItem(NULL, CRM_Dedupe_Merger::getMergeCacheKeyString($rgid, $gid, $criteria));
      }
      $urlQry['action'] = 'update';
      CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry));
    }
    elseif ($action & CRM_Core_Action::MAP) {
      // do a batch merge if requested
      $result = CRM_Dedupe_Merger::batchMerge($rgid, $gid, 'safe', 75, 2, $criteria);

      $skippedCount = CRM_Utils_Request::retrieve('skipped', 'Positive', $this, FALSE, 0);
      $skippedCount = $skippedCount + count($result['skipped']);
      $mergedCount = CRM_Utils_Request::retrieve('merged', 'Positive', $this, FALSE, 0);
      $mergedCount = $mergedCount + count($result['merged']);

      if (empty($result['merged']) && empty($result['skipped'])) {
        $message = '';
        if ($mergedCount >= 1) {
          $message = ts("%1 pairs of duplicates were merged", array(1 => $mergedCount));
        }
        if ($skippedCount >= 1) {
          $message = $message ? "{$message} and " : '';
          $message .= ts("%1 pairs of duplicates were skipped due to conflict",
            array(1 => $skippedCount)
          );
        }
        $message .= ts(" during the batch merge process with safe mode.");
        CRM_Core_Session::setStatus($message, ts('Merge Complete'), 'success');
        $urlQry['action'] = 'update';
        CRM_Utils_System::redirect(CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry));
      }
      else {
        $urlQry['action'] = 'map';
        $urlQry['skipped'] = $skippedCount;
        $urlQry['merged'] = $mergedCount;
        CRM_Utils_System::jsRedirect(
          CRM_Utils_System::url('civicrm/contact/dedupefind', $urlQry),
          ts('Batch Merge Task in progress'),
          ts('The batch merge task is still in progress. This page will be refreshed automatically.')
        );
      }
    }

    if ($action & CRM_Core_Action::UPDATE ||
      $action & CRM_Core_Action::BROWSE
    ) {
      $this->action = CRM_Core_Action::UPDATE;

      $urlQry['snippet'] = 4;

      $this->assign('sourceUrl', CRM_Utils_System::url('civicrm/ajax/dedupefind', $urlQry, FALSE, NULL, FALSE));

      //reload from cache table
      $cacheKeyString = CRM_Dedupe_Merger::getMergeCacheKeyString($rgid, $gid, $criteria);

      $stats = CRM_Dedupe_Merger::getMergeStatsMsg($cacheKeyString);
      if ($stats) {
        CRM_Core_Session::setStatus($stats);
        // reset so we not displaying same message again
        CRM_Dedupe_Merger::resetMergeStats($cacheKeyString);
      }

      $urlQry['action'] = 'update';
      if ($this->_cid) {
        // @todo passing cid to this form doesn't really seem to be valid - legacy cruft?
        $urlQry['cid'] = $this->_cid;
        CRM_Core_Session::singleton()->pushUserContext(CRM_Utils_System::url('civicrm/contact/deduperules',
          $urlQry
        ));
      }
      else {
        CRM_Core_Session::singleton()->pushUserContext(CRM_Utils_System::url('civicrm/contact/dedupefind',
          $urlQry
        ));
      }

      $this->assign('action', $this->action);
      $this->browse();
    }
    else {
      $this->action = CRM_Core_Action::UPDATE;
      $this->edit($this->action);
      $this->assign('action', $this->action);
    }
    $this->assign('context', $context);

    return parent::run();
  }

  /**
   * Browse all rule groups.
   */
  public function browse() {
    $this->assign('main_contacts', $this->_mainContacts);

    if ($this->_cid) {
      $this->assign('cid', $this->_cid);
    }
    if (isset($this->_gid) || $this->_gid) {
      $this->assign('gid', $this->_gid);
    }
    $this->assign('rgid', $this->_rgid);
  }

  /**
   * Get name of edit form.
   *
   * @return string
   *   classname of edit form
   */
  public function editForm() {
    return 'CRM_Contact_Form_DedupeFind';
  }

  /**
   * Get edit form name.
   *
   * @return string
   *   name of this page
   */
  public function editName() {
    return 'DedupeFind';
  }

  /**
   * Get user context.
   *
   * @param null $mode
   *
   * @return string
   *   user context
   */
  public function userContext($mode = NULL) {
    return 'civicrm/contact/dedupefind';
  }

}
