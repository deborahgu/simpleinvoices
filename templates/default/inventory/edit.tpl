{if isset($saved)}
  {if $saved == 'true' }
    <meta http-equiv="refresh" content="2;URL=index.php?module=inventory&amp;view=manage" />
    <div class="si_message_ok">{$LANG.save_inventory_success}</div>
  {else if $saved == 'false' }
    <meta http-equiv="refresh" content="2;URL=index.php?module=inventory&amp;view=manage" />
    <div class="si_message_error">{$LANG.save_inventory_failure}</div>
    {if $smarty.post.op == 'add' AND $smarty.post.product_id == ''}
      <div class="validation_alert">
        <img src="images/common/important.png" alt="" />
        You must select a product
      </div>
      <hr />
    {/if}
  {/if}
{/if}
{if !isset($saved) || $saved == 'false'}
  {* is this still needed ?*}
  <div id="gmail_loading" class="gmailLoader" style="float: right; display: none;">
    <img src="images/common/gmail-loader.gif" alt="{$LANG.loading} ..." />
    {$LANG.loading} ...
  </div>
  <form name="frmpost" method="POST" id="frmpost"
        action="index.php?module=inventory&amp;view=edit&amp;id={$inventory.id|urlencode}" >
    <div class="si_form">
      <table>
        <tr>
          <td class="details_screen">{$LANG.date_upper}</td>
          <td>
            <input type="text" class="validate[required,custom[date],length[0,10]] date-picker"
                   size="10" name="date" id="date" value="{if isset($inventory.date)}{$inventory.date|htmlsafe}{/if}" />
          </td>
        </tr>
        <tr>
          <td class="details_screen">{$LANG.product}</td>
          <td>
            <select name="product_id" class="validate[required] product_inventory_change">
              <option value=''></option>
              {foreach from=$product_all item=product}
              <option value="{if isset($product.id)}{$product.id|htmlsafe}{/if}" {if $product.id == $inventory.product_id}selected{/if} >
	            {$product.description|htmlsafe}
	          </option>
              {/foreach}
            </select>
          </td>
        </tr>
        <tr>
          <td class="details_screen">{$LANG.quantity}</td>
          <td>
            <input name="quantity" size="10" class="validate[required]"
                   value='{$inventory.quantity|siLocal_number_trim}'>
          </td>
        </tr>
        <tr>
          <td class="details_screen">{$LANG.cost}</td>
          <td>
            <input id="cost" name="cost" size="10" class="validate[required]"
                   value='{$inventory.cost|siLocal_number}'>
          </td>
        </tr>
        <tr>
          <td class="details_screen">{$LANG.notes}</td>
          <td>
            <textarea name="note" class="editor" rows="8" cols="50">
              {$inventory.note|outhtml}
            </textarea>
          </td>
        </tr>
      </table>
      <div class="si_toolbar si_toolbar_form">
        <button type="submit" class="positive" name="id" value="{$LANG.save}">
          <img class="button_img" src="images/common/tick.png" alt="" />
          {$LANG.save}
        </button>
        <a href="index.php?module=inventory&amp;view=manage" class="negative">
          <img src="images/common/cross.png" alt="" />
          {$LANG.cancel}
        </a>
      </div>
    </div>
    <input type="hidden" name="op" value="edit" />
  </form>
{/if}
