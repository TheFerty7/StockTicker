<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Gameplay extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('members');
        $this->restrict(array(ROLE_USER, ROLE_ADMIN));
    }
    
    function index(){
        $this->data['pagebody'] = "gameplay";
        
        $this->render();
    }
}
