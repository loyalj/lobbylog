<div class="row-fluid">
    <div class="span12">
        <h2 class="underline">Report #<?= $SMReport['SMNumber']; ?></h2>
        <a name="report_info"></a>
        <table class="table table-condensed table-bordered">
            <tr>
                <th>Status</th>
                <td><?= $SMReport['Status'] ?></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><?= $SMReport['Type'] ?></td>
            </tr>
            <tr>
                <th>Initial Approval Date</th>
                <td><?= !empty($SMReport['InitialApprovalDate']) ? $SMReport['InitialApprovalDate'] : ''; ?></td>
            </tr>
            <tr>
                <th>Effective Date</th>
                <td><?= !empty($SMReport['EffectiveDate']) ? $SMReport['EffectiveDate'] : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Proposed Start Date</th>
                <td><?= !empty($SMReport['ProposedStartdate']) ? $SMReport['ProposedStartdate'] : 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Proposed End Date</th>
                <td><?= !empty($SMReport['ProposedEndDate']) ? $SMReport['ProposedEndDate'] : 'N/A'; ?></td>
            </tr>
            
            <tr>
                <th colspan="2">Subject Matter</th>
            </tr>
            <tr>
                <td colspan="2"><pre><?= $SMReport['SubjectMatter'] ?></pre></td>
            </tr>
            
            <tr>
                <th colspan="2" class="text-center">Particulars</th>
            </tr>
            <tr>
                <td colspan="2"><pre><?= $SMReport['Particulars'] ?></pre></td>
            </tr>
        </table>

        <? if(!empty($SMReport['Registrant'])) { ?>
            <?
                $registrant = $SMReport['Registrant'];
                $registrantName = (!empty($registrant['Prefix']) ? $registrant['Prefix'] . ' ':'')
                                . (!empty($registrant['FirstName']) ? $registrant['FirstName'] . ' ':'')
                                . (!empty($registrant['MiddleInitials']) ? $registrant['MiddleInitials'] . ' ':'')
                                . (!empty($registrant['LastName']) ? $registrant['LastName'] . ' ':'')
                                . (!empty($registrant['Suffix']) ? $registrant['Suffix']:'');
            ?>
            <h3 class="underline">Registrant</h3>
            <a name="registrant"></a>
            <table class="table table-condensed table-bordered">
                <tr class="header">
                        <th colspan="2"><h4><?= $registrantName; ?></h4></th>
                    </tr>
                <tr>
                    <th>Position</th>
                    <td><?= $registrant['PositionTitle']; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <address>
                            <?= $registrant['BusinessAddress']['AddressLine1']; ?><?= !empty($registrant['BusinessAddress']['AddressLine2']) ? ', ' . $registrant['BusinessAddress']['AddressLine2']:''; ?><br>
                            <?= $registrant['BusinessAddress']['City']; ?>, <?= $registrant['BusinessAddress']['Province']; ?> <?= $registrant['BusinessAddress']['PostalCode']; ?><br>
                            <abbr title="Phone">P:</abbr> <?= $registrant['BusinessAddress']['Phone']; ?>
                        </address>
                    </td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><?= $registrant['Type']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $registrant['Status']; ?></td>
                </tr>
                <tr>
                    <th>Effective Date</th>
                    <td><?= !empty($registrant['EffectiveDate']) ? $registrant['EffectiveDate']:'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Registration #</th>
                    <td><?= $registrant['RegistrationNUmber']; ?></td>
                </tr>
                <tr>
                    <th>Registration # <small><br/>(w/ Senior Officer #)</small></th>
                    <td><?= $registrant['RegistrationNUmberWithSoNum']; ?></td>
                </tr>
                <tr>
                    <th>Previous Public Office Holder</th>
                    <td><?= $registrant['PreviousPublicOfficeHolder']; ?></td>
                </tr>
                <tr>
                    <th>Public Office Position</th>
                    <td><?= !empty($registrant['PreviousPublicOfficeHoldPosition']) ? $registrant['PreviousPublicOfficeHoldPosition']:'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Public Office Program Name</th>
                    <td><?= !empty($registrant['PreviousPublicOfficePositionProgramName']) ? $registrant['PreviousPublicOfficePositionProgramName']:'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Last Date in Public Office</th>
                    <td><?= !empty($registrant['PreviousPublicOfficeHoldLastDate']) ? $registrant['PreviousPublicOfficeHoldLastDate']:'N/A'; ?></td>
                </tr>
            </table>
        <? } ?>
        
        <? if(!empty($SMReport['Beneficiaries'])) { ?>
            <?
                // Single items do not appear in an array, this corrects for that.
                if(isset($SMReport['Beneficiaries']['BENEFICIARY']['Type'])) {
                    $beneficiaries = $SMReport['Beneficiaries'];
                }
                else {
                    $beneficiaries = $SMReport['Beneficiaries']['BENEFICIARY'];
                }
            ?>
            <h3 class="underline">Beneficiaries</h3>
            <a name="beneficiaries"></a>
            <? foreach($beneficiaries as $beneficiary) { ?>
                <table class="table table-condensed table-bordered">
                    <tr class="header">
                        <th colspan="2"><h4><?= $beneficiary['Name']; ?></h4></th>
                    </tr>
                    <tr>
                        <th width="20%" >Type</th>
                        <td><?= $beneficiary['Type']; ?></td>
                    </tr>
                    <tr>
                        <th>Trade Name</th>
                        <td><?= !empty($beneficiary['TradeName']) ? $beneficiary['TradeName']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Business Type</th>
                        <td><?= !empty($beneficiary['BusinessType']) ? $beneficiary['BusinessType']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?= !empty($beneficiary['Description']) ? $beneficiary['Description']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Fiscal Start</th>
                        <td><?= !empty($beneficiary['FiscalStart']) ? $beneficiary['FiscalStart']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Fiscal End</th>
                        <td><?= !empty($beneficiary['FiscalEnd']) ? $beneficiary['FiscalEnd']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <address>
                                <?= $beneficiary['BusinessAddress']['AddressLine1']; ?><?= !empty($beneficiary['BusinessAddress']['AddressLine2']) ? ', ' . $beneficiary['BusinessAddress']['AddressLine2']:''; ?><br>
                                <?= $beneficiary['BusinessAddress']['City']; ?>, <?= $beneficiary['BusinessAddress']['Province']; ?> <?= $beneficiary['BusinessAddress']['PostalCode']; ?>
                            </address>
                        </td>
                    </tr>
                </table>
            <? } ?>
        <? } ?>
        
        <? if(!empty($SMReport['Firms'])) { ?>
            <?
                // Single items do not appear in an array, this corrects for that.
                if(isset($SMReport['Firms']['Firm']['Type'])) {
                    $firms = $SMReport['Firms'];
                }
                else {
                    $firms = $SMReport['Firms']['Firm'];
                }
            ?>
            <h3 class="underline">Firms</h3>
            <a name="firms"></a>
            <? foreach($firms as $firm) { ?>
                <table class="table table-condensed table-bordered">
                    <tr class="header">
                        <th colspan="2"><h4><?= $firm['Name']; ?></h4></th>
                    </tr>
                    <tr>
                        <th width="20%" >Type</th>
                        <td><?= $firm['Type']; ?></td>
                    </tr>
                    <tr>
                        <th>Trade Name</th>
                        <td><?= !empty($firm['TradeName']) ? $firm['TradeName']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Business Type</th>
                        <td><?= !empty($firm['BusinessType']) ? $firm['BusinessType']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?= !empty($firm['Description']) ? $firm['Description']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Fiscal Start</th>
                        <td><?= !empty($firm['FiscalStart']) ? $firm['FiscalStart']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Fiscal End</th>
                        <td><?= !empty($firm['FiscalEnd']) ? $firm['FiscalEnd']:'N/A'; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <address>
                                <?= $firm['BusinessAddress']['AddressLine1']; ?><?= !empty($firm['BusinessAddress']['AddressLine2']) ? ', ' . $firm['BusinessAddress']['AddressLine2']:''; ?><br>
                                <?= $firm['BusinessAddress']['City']; ?>, <?= $firm['BusinessAddress']['Province']; ?> <?= $firm['BusinessAddress']['PostalCode']; ?>
                            </address>
                        </td>
                    </tr>
                </table>
            <? } ?>
        <? } ?>
        
        <? if(!empty($SMReport['Communications'])) { ?>
            <?
                // Single items do not appear in an array, this corrects for that.
                if(isset($SMReport['Communications']['Communication']['POH_Office'])) {
                    $communications = array($SMReport['Communications']['Communication']);
                }
                else {
                    $communications = $SMReport['Communications']['Communication'];
                }
            ?>
            <h3 class="underline">Communications</h3>
            <a name="communications"></a>
            <? foreach($communications as $communication) { ?>
                <? if(is_string($communication['POH_Office'])) {?>
                    <table class="table table-condensed table-bordered">
                        <tr class="header">
                            <th colspan="2"><h4><?= $communication['POH_Office']; ?></h4></th>
                        </tr>
                        <tr>
                            <th width="20%">Public Office Position</th>
                            <td><?= $communication['POH_Position']; ?></td>
                        </tr>
                        <tr>
                            <th>Public Office Type</th>
                            <td><?= $communication['POH_Type']; ?></td>
                        </tr>
                        <tr>
                            <th>Trade Name</th>
                            <td><?= !empty($communication['POH_Name']) ? $communication['POH_Name']:'N/A'; ?></td>
                        </tr>
                    </table>
                <? } ?>
                
                <? if(is_string($communication['LobbyistNumber'])) {?>
                    <table class="table table-condensed table-bordered">
                        <tr class="header">
                            <th colspan="2"><h4><?= $communication['LobbyistPrefix'] . ' ' . $communication['LobbyistFirstName'] . ' ' . $communication['LobbyistLastName']; ?></h4></th>
                        </tr>
                        <tr>
                            <th width="20%">Type</th>
                            <td><?= $communication['LobbyistType']; ?></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><?= $communication['LobbyistPositionTitle']; ?></td>
                        </tr>
                        <tr>
                            <th>Lobbyist Number</th>
                            <td><?= $communication['LobbyistNumber']; ?></td>
                        </tr>
                    </table>
                <? } ?>
            <? } ?>
        <? } ?>
    </div>
</div>
<pre style="display:none;">
<? var_dump($SMReport); ?>
</pre>