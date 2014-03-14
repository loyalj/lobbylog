<?php

class LobbyActivity {

    private $archiveRemotePath  = 'http://opendata.toronto.ca/lobbyist/lobby.activity/lobbyactivity.zip';
    private $archiveLocalPath   = 'data/lobbyactivity.zip';
    private $xmlExtractPath     = 'data/';
    private $xmlLocalPath       = 'data/lobbyactivity.xml';

    private $xmlData            = null;
    private $mongoDBName        = 'lobbyActivity';
    private $mongoColName       = 'SMReports';

    private $maxImportedRecords = 5000;

    /**
    *
    *
    */
    public function getArchive() {
        file_put_contents($this->archiveLocalPath, fopen($this->archiveRemotePath, 'r'));
    }

    /**
    *
    *
    */
    public function decompressArchive() {
        $zip = new ZipArchive();
        
        $res = $zip->open($this->archiveLocalPath);

        if($res == true) {
            $zip->extractTo($this->xmlExtractPath);
        }        

        $zip->close();
    }
    
    /**
    *
    *
    */
    public function importSMReports() {
        $xml = simplexml_load_file($this->xmlLocalPath);

        // Create the Mongo things
        $mongo = new Mongo();
        $db = $mongo->{$this->mongoDBName};
        $collection = $db->{$this->mongoColName};

        // Cap the number of records we import
        $currentRecord = 0;

        // Cycle through the XML records and insert any new data into DB
        foreach($xml->children() as $SMHeader) {
        
            // Try grabbing anexisting record
            $existingRecord = $collection->findOne(array('SMNumber' => (string) $SMHeader->SMNumber));

            // If no record exists then create a new record
            if(empty($existingRecord)) {
                $collection->insert($SMHeader);
            }

            // Increment the counter and abort the loop early if needed
            $currentRecord++;
            if($currentRecord == $this->maxImportedRecords) {
                return;
            }
        }
    }


}
