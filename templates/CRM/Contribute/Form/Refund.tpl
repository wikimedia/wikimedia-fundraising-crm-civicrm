{* this template is used for making refund/chargeback contributions *}
<fieldset><legend>Refund contribution</legend>
<div class="crm-submit-buttons">{include file="CRM/common/formButtons.tpl" location="top"}</div>
      <div>
          <div class="icon inform-icon"></div>
          {ts}Please complete to record a refund of:{/ts}
          <div style="border: 1px solid black; margin: 10px; padding: 10px;">
              {$contact_name}, {$original_currency} {$original_amount} on {$receive_date} (<a href="{$view_original_contribution}">View</a>)
          </div>
      </div>
  <table class="form-layout-compressed">
     <tr class="crm-contribution-form-block-type">
	<td class="label">{$form.completed.label}
	</td>
	<td class="html-adjust">{$form.completed.html}
	</td>
     </tr>
     <tr class="crm-contribution-form-block-type">
	<td class="label">{$form.type.label}
	</td>
	<td class="html-adjust">{$form.type.html}
	</td>
     </tr>
  </table>
<div class="crm-submit-buttons">{include file="CRM/common/formButtons.tpl" location="bottom"}</div>
</fieldset>

<script type="text/javascript">
{literal}
{/literal}
</script>
