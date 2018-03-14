{if $tabs}
    <ul class="nav nav-tabs admin-tabs" role="tablist">
        {foreach from=$tabs item=tab}
            <li>
                <a class="tab-top" href="#{$tab->id}" role="tab" data-toggle="tab" id="{$tab->id}" data-tab-id="{$tab->id}" aria-expanded="true">{$tab->name}</a>
            </li>
        {/foreach}
    </ul>

    {foreach from=$tabs item=tab}    
        <div class="tab-pane" id="{$tab->id}">
            <table class="form" width="100%" border="0" cellspacing="2" cellpadding="3">
                <tbody>
                    {foreach from=$tab->inputs item=input}   
                        {if $input->type eq "textarea"}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-6">
                                            <textarea cols="50" rows="5"  name="{$input->name}" class="{$input->class}" id="{$input->id}">{$input->value}</textarea>
                                        </div>
                                    </div>
                                    {$input->description}
                                </td>
                            </tr>
                        {elseif $input->type eq "select"}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    <select name="{$input->name}" class="{$input->class}" id="{$input->id}">
                                        {foreach from=$input->options key=optionValue item=optionName}  
                                            <option value="{$optionValue}" {if $input->value eq $optionValue}selected{/if}>{$optionName}</option>
                                        {/foreach}
                                    </select> 
                                    {$input->description}
                                </td>
                            </tr>
                        {elseif $input->type eq "checkbox"}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    <label class="checkbox-inline"><input type="checkbox" name="maintenancemode">
                                        <input type="{$input->type}" name="{$input->name}" class="{$input->class}" id="{$input->id}" {if $input->value eq "checked"}checked{/if}> {$input->description}
                                    </label>
                                </td>
                            </tr>
                        {elseif $input->type eq "multicheckbox"}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    {$input->description}
                                    <br>
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                            {foreach from=$input->options item=option}
                                                <td width="25%">
                                                    <label class="{$input->class}"><input type="checkbox" name="{$input->name}" value="{$option.value}"> {$option.name}</label>
                                                </td>
                                                {if $option@iteration%4 eq 0}
                                                    </tr>
                                                    <tr>
                                                {/if}
                                            {/foreach}
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        {elseif $input->type eq "radio"}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    {foreach from=$input->options item=option}  
                                        <label class="{$option.class}">
                                            <input type="{$input->type}" name="{$input->name}" id="{$option.id}" value="{$option.value}" {if $option.checked eq true}checked=""{/if}> {$option.name}
                                        </label>
                                    {/foreach}
                                </td>
                            </tr>
                        {else}
                            <tr>
                                <td class="fieldlabel">{$input->label}</td>
                                <td class="fieldarea">
                                    <input type="{$input->type}" name="{$input->name}" value="{$input->value}" class="{$input->class}" id="{$input->id}"> {$input->description}
                                </td>
                            </tr>
                        {/if}
                    {/foreach}  
                </tbody>
            </table>
        </div>
    {/foreach}    
{/if}