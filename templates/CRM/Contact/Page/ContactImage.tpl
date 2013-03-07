{*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.2                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2012                                |
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
*}
{* This form is for displaying contact Image *}
    <div class="crm-contact_image crm-contact_image-block">
        <a href="#" onClick="contactImagePopUp('{$imageURL}',{$imageWidth},{$imageHeight});">
            <img src="{$imageURL}" height = {$imageThumbHeight} width={$imageThumbWidth}>
        </a>
    </div>
    {if $action eq 0 or $action eq 2}
    <div class="crm-contact_image-block  class="crm-contact_image crm-contact_image-delete"">
        {$deleteURL}
    </div>
    {/if}
    {literal}
    <script>
	function contactImagePopUp(url, width, height) {
     	    newwindow = window.open(url,'name', 'width='+width+', height='+height );
        }	
    </script>
    {/literal}