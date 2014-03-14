<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th>Report #</th>
                <th>Status</th>
                <th>Type</th>
                <th>Subject Matter</th>
                <th>Approval Date</th>
                <th>Effective Date</th>
                <th>Proposed Start Date</th>
                <th>Proposed End Date</th>
            </tr>
            <?php foreach($SMReports as $SMReport) { ?>
            <tr>
                <td><a href="/r/<?= $SMReport['SMNumber'] ?>"><?= $SMReport['SMNumber'] ?></a></td>
                <td><?= $SMReport['Status'] ?></td>
                <td><?= $SMReport['Type'] ?></td>
                <td><?= $SMReport['SubjectMatter'] ?></td>
                <td><?= !empty($SMReport['InitialApprovalDate']) ? $SMReport['InitialApprovalDate'] : ''; ?></td>
                <td><?= $SMReport['EffectiveDate'] ?></td>
                <td><?= $SMReport['ProposedStartDate'] ?></td>
                <td><?= !empty($SMReport['ProposedEndDate']) ? $SMReport['ProposedEndDate'] : 'N/A'; ?></td>
            </tr>
            <? } ?>
        </table>
    </div>
    <div class="span10 offset1 text-centered">
        <div class="pagination pagination-small pagination-centered">
            <ul>
                <?= $paginationHTML; ?>
            </ul>
        </div>
    </div>
    <div class="span6 offset3 text-centered">
        <p>Found <?= $foundReports ?> of <?= $totalReports ?> total.</p>
    </div>
</div>
