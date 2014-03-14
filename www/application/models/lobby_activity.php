<?php

class Lobby_activity extends CI_Model {

    private $mongoCollection = "SMReports";

    private $offset = 0;
    private $limit = 999999;

    function __construct() {
        parent::__construct();
    }

    /*
    *
    */    
    public function offset($offset = null) {
        if($offset != null) {
            $this->offset = intval($offset);
            
        }

        return $this;
    }

    /*
    *
    */
    public function limit($limit = null) {
        if($limit != null) {
            $this->limit = intval($limit);

        }

        return $this;
    }

    /*
    *
    */
    public function like($field = '', $value = '', $flags = 'i', $enable_start_wildcard = TRUE, $enable_end_wildcard = TRUE) {
        $this->mongo_db->like($field, $value, $flags, $enable_start_wildcard, $enable_end_wildcard);

        return $this;
    }
    
    /*
    *
    */
    public function where($wheres = array(), $value = NULL) {
        $this->mongo_db->where($wheres, $value);
        
        return $this;
    }

    /*
    *
    */
    public function totalReports() {
        return $this->mongo_db->count($this->mongoCollection);
    }
    
    /*
    *
    */   
    public function getReports() {
        return $this->mongo_db->offset($this->offset)->limit($this->limit)->get($this->mongoCollection);
    }
    
    /*
    *
    */
    public function getReport($reportID) {
        if(empty($reportID)) {
            return false;
        }
        
        $retData = $this->mongo_db->like('SMNumber', $reportID)->offset($this->offset)->limit($this->limit)->get($this->mongoCollection);
        
        if(empty($retData)) {
            return false;
        }
        
        return $retData[0];
    }
    
    /*
    *
    */
    public function totalLobbyists() {
        
        $ops = array(
            array(
                '$group' => array(
                    '_id' => '$Registrant.RegistrationNUmber',
                ),
            ),
        );
        
        $result = $this->mongo_db->aggregate($this->mongoCollection, $ops); 
        return count($result['result']);
    }
    
    /*
    *
    */
    public function getLobbyists($match = null) {
        $ops =array();
        
        if(!empty($match)) {
            $ops[] = array('$match' => $match);
        }
        
        $ops[] = array(
            '$group' => array(
                '_id' => '$Registrant.RegistrationNUmber',
                'Registrant' => array('$addToSet' => '$Registrant'),
                'totalReports' => array('$sum' => 1),
                
            ),
        );
        $ops[] = array('$skip' => $this->offset);
        $ops[] = array('$limit' => $this->limit);
        
        $result = $this->mongo_db->aggregate($this->mongoCollection, $ops); 
        return $result['result'];
    }
}
