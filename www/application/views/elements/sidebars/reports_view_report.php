<fieldset>
    <legend><small>Report Contents</small></legend>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="#report_info">Report Information</a></li>
        <li><a href="#registrant">Registrant</a></li>
        <? if(!empty($SMReport['Beneficiaries'])) { ?><li><a href="#beneficiaries">Beneficiaries</a></li><? } ?>
        <? if(!empty($SMReport['Firms'])) { ?><li><a href="#firms">Firms</a></li><? } ?>
        <? if(!empty($SMReport['Communications'])) { ?><li><a href="#communications">Communications</a></li><? } ?>
    </ul>
</fieldset>
