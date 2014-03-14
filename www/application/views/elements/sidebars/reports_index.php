<?php

$statusOptions = array('Active', 'Closed', 'Closed by LRO');
$typeOptions = array('In-house', 'Consultant', 'Voluntary');

?>
<form method="GET">
    <fieldset>
        <legend><small>Filter</small></legend>
        <table class="table table-condensed table-not-bordered">
            <tr>
                <td><label>Report Number</label></td>
                <td><input type="text" name="smr_n" /></td>
            </tr>
            <tr>
                <td><label>Status</label></td>
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
                <td><label>Type</label></td>
                <td>
                    <select name="type">
                        <option value="">All Types</option>
                        <? foreach($typeOptions as $typeOption) { ?>
                        <option value="<?= $typeOption ?>"><?= $typeOption ?></option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Lobbyist Number</label></td>
                <td><input type="text" name="reg_n" /></td>
            </tr>
        </table>
        <button type="submit" class="btn">Submit</button>
    </fieldset>
</form>
