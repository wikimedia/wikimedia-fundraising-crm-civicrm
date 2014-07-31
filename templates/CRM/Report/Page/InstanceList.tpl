{*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.4                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2013                                |
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
{strip}
<div class="action-link">
  {if $templateUrl}
    <a href="{$templateUrl}" class="button"><span><div class="icon add-icon"></div> {$newButton}</span></a>
  {/if}
  {if $reportUrl}
    <a href="{$reportUrl}" class="button"><span>{ts}View All Reports{/ts}</span></a>
  {/if}
</div>
{if $list}
<div class="crm-block crm-form-block crm-report-instanceList-form-block">
{counter start=0 skip=1 print=false}
{foreach from=$list item=rows key=report}
<div class="crm-accordion-wrapper crm-accordion_{$report}-accordion ">
 <div class="crm-accordion-header">
    {if $title}{$title}{elseif $report EQ 'Contribute'}{ts}Contribution Reports{/ts}{else}{$report} {ts}Reports{/ts}{/if}</a>
 </div><!-- /.crm-accordion-header -->
 <div class="crm-accordion-body">
  <div id="{$report}" class="boxBlock">
      <table class="report-layout">
        {foreach from=$rows item=row}
        <tr id="row_{counter}" class="crm-report-instanceList">
          <td class="crm-report-instanceList-title" style="width:35%"><a href="{$row.url}" title="{ts}Run this report{/ts}">&raquo; <strong>{$row.title}</strong></a></td>
          <td class="crm-report-instanceList-description">{$row.description}</td>
          {if $row.viewUrl}
            <td class="crm-report-instanceList-actions" style = "width:18%">
                <a href="{$row.viewUrl}" class="action-item crm-hover-button">{ts}View Results{/ts}</a>
                <span class="crm-actions-list-wrapper more">
                <a class="crm-actions-list-link" href="#"><span class="btn-slide crm-hover-button">more</span></a>
                  <div class="crm-actions-list">
                    <ul>
                    {foreach from=$row.actions item=action}
                      <li><a href="{$action.url}" {if $action.id eq 'delete'}onclick="return window.confirm('{ts}Are you sure you want delete this report?{/ts} {ts}This action cannot be undone.{/ts}');"{/if}>{ts}{$action.label}{/ts}</a></li>
                    {/foreach}
                    </ul>
                  </div>
                </span>
            </td>
          {/if}
        </tr>
        {/foreach}
      </table>
  </div>
</div>
</div>
{/foreach}
</div>

<div class="action-link">
  {if $templateUrl}
    <a href="{$templateUrl}" class="button"><span><div class="icon add-icon"></div> {$newButton}</span></a>
  {/if}
  {if $reportUrl}
    <a href="{$reportUrl}" class="button"><span>{ts}View All Reports{/ts}</span></a>
  {/if}
</div>

{else}
<div class="crm-content-block">
<div class="messages status no-popup">
  <div class="icon inform-icon"></div>&nbsp;
    {if $myReports}
      {ts}You do not have any private reports. To add a report to this section, edit the Report Settings for a report and set 'Add to My Reports' to Yes.{/ts} &nbsp;
    {else}    
      {ts 1=$compName}No %1 reports have been created.{/ts} &nbsp;
      {if $templateUrl}
        {ts 1=$templateUrl}You can create reports by selecting from the <a href="%1">list of report templates here.</a>{/ts}
      {else}
        {ts}Contact your site administrator for help creating reports.{/ts}
      {/if}
    {/if}
  </div>
</div>
{/if}
{/strip}
{literal}
<script type="text/javascript">
cj(function() {
   cj().crmAccordions();
});
</script>
{/literal}
