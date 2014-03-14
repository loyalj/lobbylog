<?

include('lib/lobby_api.php');

$LobbyActivity = new LobbyActivity();

$LobbyActivity->getArchive();
$LobbyActivity->decompressArchive();
$LobbyActivity->importSMReports();
