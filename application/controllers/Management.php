<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Management extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('members');
        $this->load->model('stock_model');
        $this->restrict(ROLE_ADMIN);
        
    }
 
    function index(){
        $this->data['pagebody'] = 'management';
        $xml = simplexml_load_file("http://bsx.jlparry.com/status");
        $state = $xml->state;
        if($state == 0){
            $this->data['message'] = "Game is not active.";
        }else if($state == 1){
            $this->data['message'] = "The next round is setting up please wait.";
        }else if($state == 2){
            $this->data['message'] = "Game is starting soon!";
        }else if($state == 3){
            $this->data['message'] = "Game is currently active.";
        }else if($state == 4){
            $this->data['message'] = "Current round is over please wait for the next one.";
        }
        
        $this->render();
    }
    
    function redownload(){
        $xml = simplexml_load_file("http://bsx.jlparry.com/status");
        $state = $xml->state;
        if ($state == 2 || $state == 3) {


            //UNCOMMENT BELOW IF HIS SERVER IS WORKING
            
              $this->stock_model->reset_transactions();
              $this->stock_model->read_transactions();
              $this->stock_model->reset_stocks();
              $this->stock_model->read_stocks();
              $this->stock_model->reset_moves();
              $this->stock_model->read_moves();
              
             
        }
        redirect("/Management");
    }
}
