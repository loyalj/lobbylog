<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lobbyists extends CI_Controller {

    var $limit = 15;

    /**
     *
     */
    public function index() {
        // Count the total number of lobbyists before 
        // we apply filters to the mongo search set
        $totalLobbyists = $this->lobby_activity->totalLobbyists();
        
        $match = array();
        
        $getStatus = $this->input->get('status'); 
        if(!empty($getStatus)) {
            $match['Registrant.Status'] = $getStatus;          
        }
        
        $getType = $this->input->get('type');
        if(!empty($getType)) {
            $match['Registrant.Type'] = $getType;
        }
        
        $getRegistrantNumber = $this->input->get('reg_n');
        if(!empty($getRegistrantNumber)) {
            $match['Registrant.RegistrationNUmber'] = $getRegistrantNumber;
        }
        
        //TODO: figure out a better way to count these 
        $foundLobbyists = count($this->lobby_activity->getLobbyists($match));
        
        $lobbyists = $this->lobby_activity->offset($this->input->get('p'))->limit($this->limit)->getLobbyists($match);

        $paginationCfg['total_rows'] = $totalLobbyists;
        $paginationCfg['per_page'] = $this->limit;
        $paginationCfg['base_url'] = '/lobbyists';
        $this->pagination->initialize($paginationCfg);

        // Prep data for the home page view template
        $data = array(
            'pageTitle'         => 'Lobbyists',
            'currentPage'       => 'lobbyists',
            'limit'             => $this->limit,
            'foundLobbyists'    => $foundLobbyists,
            'totalLobbyists'    => $totalLobbyists,
            'lobbyists'         => $lobbyists,
            'paginationHTML'    => $this->pagination->create_links(),
        );
		
        // Render the page and side bar in the main 
        // view template
        $this->load->view('layouts/basic_list', array(
            'docContent'     => $this->load->view('pages/lobbyists/index', $data, true),
            'sidebarContent' => $this->load->view('elements/sidebars/lobbyists_index', $data, true),
        ));
    }
}
