<?php

class Playerprofile extends Application {

    function __construct()
    {
        parent::__construct();
        $this->load->model('stock_model');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        //var_dump($_POST);
        
        $this->data['player_array'] = $this->stock_model->get_players();
        if(!isset($_POST['player'])){
            $this->data['player'] = $this->session->userdata('username');
        }else{
            $this->data['player'] = $_POST['player'];
        }
       
        $this->data['player_transactions'] = $this->stock_model->get_player_transactions($this->data['player'], "buy");
        $this->data['player_sales'] = $this->stock_model->get_player_transactions($this->data['player'], "sell");
        $this->data['gold_qty'] = 10;
        $this->data['silver_qty'] = 20;
        $this->data['bonds_qty'] = 30;
        $this->data['oil_qty'] = 40;
        $this->data['industrials_qty'] = 50;
        $this->data['grains_qty'] = 60;
        $this->data['pagebody'] = 'playerprofile';	// this is the view we want shown
        // build the list of authors, to pass on to our view

        $this->render();
    }
    
    function player($name)
    {
        //var_dump($_POST);
        
        $this->data['player_array'] = $this->stock_model->get_players();
        
        $this->data['player'] = $name;
        
       
        $this->data['player_transactions'] = $this->stock_model->get_player_transactions($this->data['player'], "buy");
        $this->data['player_sales'] = $this->stock_model->get_player_transactions($this->data['player'], "sell");
        $this->data['gold_qty'] = 10;
        $this->data['silver_qty'] = 20;
        $this->data['bonds_qty'] = 30;
        $this->data['oil_qty'] = 40;
        $this->data['industrials_qty'] = 50;
        $this->data['grains_qty'] = 60;
        $this->data['pagebody'] = 'playerprofile';	// this is the view we want shown
        // build the list of authors, to pass on to our view

        $this->render();
    }

    



}