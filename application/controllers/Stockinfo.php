<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Stock_info extends Application {

    public function __construct() {
        parent::__construct();
        $this->load->model('stock_model');
    }

    public function index() {

        //var_dump($this->stock_model->get_stocks());

        $this->data['stock_array'] = $this->stock_model->get_stocks();
        
        //return the data in view  
        $this->data['pagebody'] = 'stockview'; // this is the view we want shown

        $this->render();
    }

}
