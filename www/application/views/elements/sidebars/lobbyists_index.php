<?php
//TODO: query these using distinct()
$statusOptions = array('Active', 'Superseded', 'Not Accepted');
$typeOptions = array('In-house', 'Consultant');

?>
<form method="GET">
    <fieldset>
        <legend><small>Filter</small></legend>
        <table class="table table-condensed table-not-bordered">
            <tr>
                <td><label>Lobbyist Number</label></td>
                <td><input type="text" name="reg_n" /></td>
            </tr>
            <tr>
                <th><label>Status</label></th>
                <td>
                    <select name="status">
                        <option value="">All Statuses</option>
                        <? foreach($statusOptions as $statusOption) { ?>
                        <option value="<?= $statusOption ?>"><?= $statusOption ?></option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>Type</label></th>
                <td>
                    <select name="type">
                        <option value="">All Types</option>
                        <? foreach($typeOptions as $typeOption) { ?>
                        <option value="<?= $typeOption ?>"><?= $typeOption ?></option>
                        <? } ?>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn">Submit</button>
    </fieldset>
</form>
