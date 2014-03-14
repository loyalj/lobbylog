<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th width="10%">Registration #</th>
                <th width="10%">Status</th>
                <th width="10%">Type</th>
                <th>Name</th>
                <th width="5%">Total Reports</th>
            </tr>
            <?php foreach($lobbyists as $lobbyistData) { ?>
                <? $lobbyist = $lobbyistData['Registrant'][0]; ?>
                <tr>
                    <td><?= $lobbyist['RegistrationNUmber']; ?></td>
                    <td><?= $lobbyist['Status']; ?></td>
                    <td><?= $lobbyist['Type']; ?></td>
                    <td><?= $lobbyist['FirstName'] ?> <?= $lobbyist['LastName']; ?></td>
                    <td><a href="/reports?reg_n=<?= $lobbyist['RegistrationNUmber']; ?>"><?= $lobbyistData['totalReports']; ?></a</td>
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
        <p>Found <?= $foundLobbyists; ?> of <?= $totalLobbyists; ?> total.</p>
    </div>
</div>