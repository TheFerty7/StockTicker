<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nope extends Application{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    
    function index(){
        $this->data['pagebody'] = 'nope';
        
        $this->render();
    }
}

