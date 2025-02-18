<h3 class="si_report_title">{$LANG.debtors_by_aging_periods}</h3>
<hr>

<table class="si_report_table">
	<thead>
		<th colspan="10">{$LANG.debtors_by_aging_periods}</th>
	</thead>
	<tfoot>
		<tr>
			<th colspan="6">{$LANG.total_owed}</th>
			<td>{$total_owed|siLocal_number:'2'|default:'-'}</td>
			<td colspan="3"></td>
		</tr>
	</tfoot>
	<tbody>
		{foreach item=period from=$data}
			<tr>
				<th>{$LANG.aging}:</th>
				<td colspan="9">{if isset($period.name)}{$period.name|htmlsafe}{/if}</td>
			</tr>
			<tr>
				<th>{$LANG.invoice_id|htmlsafe}</th>
				<th>{$LANG.invoice|htmlsafe}</th>
				<th>{$LANG.biller|htmlsafe}</th>
				<th>{$LANG.customer|htmlsafe}</th>
				<th>{$LANG.total|htmlsafe}</th>
				<th>{$LANG.paid|htmlsafe}</th>
				<th>{$LANG.owing|htmlsafe}</th>
				<th>{$LANG.date|htmlsafe|ucfirst}</th>
				<th>{$LANG.age|htmlsafe}</th>
				<th>{$LANG.aging|htmlsafe}</th>
			</tr>

			{foreach item=invoice from=$period.invoices}
			<tr>
				<td>{if isset($invoice.id)}{$invoice.id|htmlsafe}{/if}</td>
				<td>{if isset($invoice.pref_inv_wording)}{$invoice.pref_inv_wording|htmlsafe}{/if} {if isset($invoice.index_id)}{$invoice.index_id|htmlsafe}{/if}</td>
				<td>{if isset($invoice.biller)}{$invoice.biller|htmlsafe}{/if}</td>
				<td>{if isset($invoice.customer)}{$invoice.customer|htmlsafe}{/if}</td>
				<td>{$invoice.inv_total|siLocal_number:'2'|default:'-'}</td>
				<td>{$invoice.inv_paid|siLocal_number:'2'|default:'-'}</td>
				<td>{$invoice.inv_owing|siLocal_number:'2'|default:'-'}</td>
				<td>{if isset($invoice.date)}{$invoice.date|htmlsafe}{/if}</td>
				<td>{$invoice.age|htmlsafe}</td>
				<td>{$invoice.Aging|htmlsafe}</td>
			</tr>
			{/foreach}

			<tr>
				<th colspan="6">{$LANG.total}</th>
				<td>{$period.sum_total|siLocal_number:'2'|default:'-'}</td>
				<td colspan="3"></td>
			</tr>

		{/foreach}
	</tbody>
</table>