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
class CRM_Core_ShowHideBlocks {

  /**
   * The icons prefixed to block show and hide links.
   *
   * @var string
   */
  public static $_showIcon;
  public static $_hideIcon;

  /**
   * The array of ids of blocks that will be shown.
   *
   * @var array
   */
  protected $_show;

  /**
   * The array of ids of blocks that will be hidden.
   *
   * @var array
   */
  protected $_hide;

  /**
   * Class constructor.
   *
   * @param array $show
   *   Initial value of show array.
   * @param array $hide
   *   Initial value of hide array.
   *
   * @return \CRM_Core_ShowHideBlocks the newly created object
   */
  public function __construct($show = NULL, $hide = NULL) {
    if (!empty($show)) {
      $this->_show = $show;
    }
    else {
      $this->_show = [];
    }

    if (!empty($hide)) {
      $this->_hide = $hide;
    }
    else {
      $this->_hide = [];
    }
  }

  /**
   * Load icon vars used in hide and show links.
   */
  public static function setIcons() {
    if (!isset(self::$_showIcon)) {
      $config = CRM_Core_Config::singleton();
      self::$_showIcon = '<img src="' . $config->resourceBase . 'i/TreePlus.gif" class="action-icon" alt="' . ts('show field or section') . '"/>';
      self::$_hideIcon = '<img src="' . $config->resourceBase . 'i/TreeMinus.gif" class="action-icon" alt="' . ts('hide field or section') . '"/>';
    }
  }

  /**
   * Add the values from this class to the template.
   */
  public function addToTemplate() {
    $hide = $show = '';

    $first = TRUE;
    foreach (array_keys($this->_hide) as $h) {
      if (!$first) {
        $hide .= ',';
      }
      $hide .= "'$h'";
      $first = FALSE;
    }

    $first = TRUE;
    foreach (array_keys($this->_show) as $s) {
      if (!$first) {
        $show .= ',';
      }
      $show .= "'$s'";
      $first = FALSE;
    }

    $template = CRM_Core_Smarty::singleton();
    $template->assign_by_ref('hideBlocks', $hide);
    $template->assign_by_ref('showBlocks', $show);
  }

  /**
   * Add a value to the show array.
   *
   * @param string $name
   *   Id to be added.
   */
  public function addShow($name) {
    $this->_show[$name] = 1;
    if (array_key_exists($name, $this->_hide)) {
      unset($this->_hide[$name]);
    }
  }

  /**
   * Add a value to the hide array.
   *
   * @param string $name
   *   Id to be added.
   */
  public function addHide($name) {
    $this->_hide[$name] = 1;
    if (array_key_exists($name, $this->_show)) {
      unset($this->_show[$name]);
    }
  }

  /**
   * Create a well formatted html link from the smaller pieces.
   *
   * @param string $name
   *   Name of the link.
   * @param string $href
   * @param string $text
   * @param string $js
   *
   * @return string
   *   the formatted html link
   */
  public static function linkHtml($name, $href, $text, $js) {
    return '<a name="' . $name . '" id="' . $name . '" href="' . $href . '" ' . $js . ">$text</a>";
  }

  /**
   * Create links that we can use in the form.
   *
   * @param CRM_Core_Form $form
   *   The form object.
   * @param string $prefix
   *   The attribute that we are referencing.
   * @param string $showLinkText
   *   The text to be shown for the show link.
   * @param string $hideLinkText
   *   The text to be shown for the hide link.
   *
   * @param bool $assign
   *
   * @return array
   */
  public static function links(&$form, $prefix, $showLinkText, $hideLinkText, $assign = TRUE) {
    $showCode = "if(event.preventDefault) event.preventDefault(); else event.returnValue = false; cj('#id_{$prefix}').show(); cj('#id_{$prefix}_show').hide();";
    $hideCode = "if(event.preventDefault) event.preventDefault(); else event.returnValue = false; cj('#id_{$prefix}').hide(); cj('#id_{$prefix}_show').show();";

    self::setIcons();
    $values = [];
    $values['show'] = self::linkHtml("${prefix}_show", "#${prefix}_hide", self::$_showIcon . $showLinkText, "onclick=\"$showCode\"");
    $values['hide'] = self::linkHtml("${prefix}_hide", "#${prefix}", self::$_hideIcon . $hideLinkText, "onclick=\"$hideCode\"");

    if ($assign) {
      $form->assign($prefix, $values);
    }
    else {
      return $values;
    }
  }

  /**
   * Create html link elements that we can use in the form.
   *
   * @param CRM_Core_Form $form
   *   The form object.
   * @param int $index
   *   The current index of the element being processed.
   * @param int $maxIndex
   *   The max number of elements that will be processed.
   * @param string $prefix
   *   The attribute that we are referencing.
   * @param string $showLinkText
   *   The text to be shown for the show link.
   * @param string $hideLinkText
   *   The text to be shown for the hide link.
   * @param string $elementType
   *   The set the class.
   * @param string $hideLink
   *   The hide block string.
   */
  public function linksForArray(&$form, $index, $maxIndex, $prefix, $showLinkText, $hideLinkText, $elementType = NULL, $hideLink = NULL) {
    $showHidePrefix = str_replace(["]", "["], ["", "_"], $prefix);
    $showHidePrefix = "id_" . $showHidePrefix;
    if ($index == $maxIndex) {
      $showCode = $hideCode = "return false;";
    }
    else {
      $next = $index + 1;
      if ($elementType) {
        $showCode = "cj('#${prefix}_${next}_show').show(); return false;";
        if ($hideLink) {
          $hideCode = $hideLink;
        }
        else {
          $hideCode = "cj('#${prefix}_${next}_show, #${prefix}_${next}').hide(); return false;";
        }
      }
      else {
        $showCode = "cj('#{$showHidePrefix}_{$next}_show').show(); return false;";
        $hideCode = "cj('#{$showHidePrefix}_{$next}_show, #{$showHidePrefix}_{$next}').hide(); return false;";
      }
    }

    self::setIcons();
    if ($elementType) {
      $form->addElement('link', "${prefix}[${index}][show]", NULL, "#${prefix}_${index}", self::$_showIcon . $showLinkText,
        ['onclick' => "cj('#${prefix}_${index}_show').hide(); cj('#${prefix}_${index}').show();" . $showCode]
      );
      $form->addElement('link', "${prefix}[${index}][hide]", NULL, "#${prefix}_${index}", self::$_hideIcon . $hideLinkText,
        ['onclick' => "cj('#${prefix}_${index}').hide(); cj('#${prefix}_${index}_show').show();" . $hideCode]
      );
    }
    else {
      $form->addElement('link', "${prefix}[${index}][show]", NULL, "#${prefix}_${index}", self::$_showIcon . $showLinkText,
        ['onclick' => "cj('#{$showHidePrefix}_{$index}_show').hide(); cj('#{$showHidePrefix}_{$index}').show();" . $showCode]
      );
      $form->addElement('link', "${prefix}[${index}][hide]", NULL, "#${prefix}_${index}", self::$_hideIcon . $hideLinkText,
        ['onclick' => "cj('#{$showHidePrefix}_{$index}').hide(); cj('#{$showHidePrefix}_{$index}_show').show();" . $hideCode]
      );
    }
  }

}
