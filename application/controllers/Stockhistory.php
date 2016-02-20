<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StockHistory extends Application 
{

    function __construct() {
        parent::__construct();
        $this->load->model('stock_model');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() 
    {
        $this->data['stock_array'] = $this->stock_model->get_stocks();
        $this->data['recent_array'] = $this->stock_model->get_movements();
        //return the data in view  
        $this->data['pagebody'] = 'stockview'; // this is the view we want shown

        $this->render();
    }

    function stock($id) 
    {
        $this->data['stock_array'] = $this->stock_model->get_stocks();
        $this->data['type'] = $id;
        $this->data['recent_array'] = $this->stock_model->get_recent_trades($this->data['type']);
        $this->data['movements_array'] = $this->stock_model->get_latest_movements($this->data['type']);
        $this->data['pagebody'] = 'stock'; // this is the view we want shown		
        
        $this->render();
    }
    
    function stock_()
    {
        $this->data['stock_array'] = $this->stock_model->get_stocks();
        $this->data['type'] = $_POST["Name"];
        $this->data['recent_array'] = $this->stock_model->get_recent_trades($this->data['type']);
        $this->data['movements_array'] = $this->stock_model->get_latest_movements($this->data['type']);
        $this->data['pagebody'] = 'stock'; // this is the view we want shown       
        $this->render();
    }

}
