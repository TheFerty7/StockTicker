<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();   // parameters for view components
    protected $id;      // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'Stock Ticker'; // our default title
        $this->errors = array();
        $this->data['pageTitle'] = 'welcome';   // our default page
        $this->load->library('session');
    }

    /**
     * Render this page
     */
    function render() {

        if($this->session->userdata('role') == 'player'){
            $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices2'), true);
        }else{
            $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'), true);

        }
        
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['user'] = $this->session->userdata('username');
        // finally, build the browser page!
        $this->data['data'] = $this->data;
        $this->parser->parse('_template', $this->data);
    }

    
    function restrict($roleNeeded = null) {
        $userRole = $this->session->userdata('role');
        if ($roleNeeded != null) {
            if (is_array($roleNeeded)) {
                if (!in_array($userRole, $roleNeeded)) {
                    redirect("/Nope");
                    return;
                }
            } else if ($userRole != $roleNeeded) {
                redirect("/Nope");
                return;
            }
        }
    }
    
     

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */