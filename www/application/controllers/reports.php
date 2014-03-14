<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    var $limit = 15;

    /**
     *
     */
    public function index() {
        // Count the total number of reports before 
        // we apply filters to the mongo search set
        $totalReports = $this->lobby_activity->totalReports();

        $searchParams = array();
        // Apply the search filters
        // Report Number
        $getReportNumber = $this->input->get('smr_n');
        if(!empty($getReportNumber)) {
            $searchParams['SMNumber'] = $getReportNumber;
        }
        
        // Report Status
        $getStatus = $this->input->get('status'); 
        if(!empty($getStatus)) {
            $searchParams['Status'] = $getStatus;          
        }
        
        // Report Status
        $getType = $this->input->get('type');
        if(!empty($getType)) {
            $searchParams['Type'] = $getType;
        }
        
        // Registrant Number
        $getRegistrantNumber = $this->input->get('reg_n');
        if(!empty($getRegistrantNumber)) {
            $searchParams['Registrant.RegistrationNUmber'] = $getRegistrantNumber;
        }

        // Count the total number of found reports
        $foundReports = $this->lobby_activity->where($searchParams)->totalReports();
        
        // Apply the basic pagination related filters
        $SMReports = $this->lobby_activity->where($searchParams)->offset($this->input->get('p'))->limit($this->limit)->getReports();
        
        // Config and generate the pagination html
        $paginationCfg['total_rows'] = $foundReports;
        $paginationCfg['per_page'] = $this->limit;
        $this->pagination->initialize($paginationCfg);

        // Prep data for the home page view template
        $data = array(
            'pageTitle'         => 'Reports',
            'currentPage'       => 'reports',
            'limit'             => $this->limit,
            'totalReports'      => $totalReports,
            'foundReports'      => $foundReports,
            'SMReports'         => $SMReports,
            'paginationHTML'    => $this->pagination->create_links(),
        );
		
        // Render the page and side bar in the main 
        // view template
        $this->load->view('layouts/basic_list', array(
            'docContent'     => $this->load->view('pages/reports/index', $data, true),
            'sidebarContent' => $this->load->view('elements/sidebars/reports_index', $data, true),
        ));
    }
    
    
    /**
     *
     */
    public function viewReport($reportID)
    {
        if(empty($reportID)) {
            return false;
        }
        
        $SMReport = $this->lobby_activity->getReport($reportID);

        $data = array(
            'pageTitle'         => 'Report #' . $SMReport['SMNumber'],
            'currentPage'         => 'report',
            'SMReport' => $SMReport,  
        );
        
        // Render the page and side bar in the main 
        // view template
        $this->load->view('layouts/reports/view_report', array(
            'docContent'     => $this->load->view('pages/reports/view_report', $data, true),
            'sidebarContent' => $this->load->view('elements/sidebars/reports_view_report', $data, true),
        ));
    }
}
