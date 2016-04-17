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
        $this->load->model('stock_model');
        $this->restrict(array(ROLE_USER, ROLE_ADMIN));
    }
    
    function index(){
        $this->data['pagebody'] = "gameplay";
        $this->data['stock_array'] = $this->stock_model->get_stocks();
        $this->render();
    }
    
    function register()
    {
        $pass = $_POST['pass'];
        $this->data['pagebody'] = 'register';
        $xml = simplexml_load_file('http://bsx.jlparry.com/register?team=g05&name=csnerds&password=' . $pass);
        $auth = (string)$xml->token;
        if($xml->message != ""){
            $this->data['message'] = (string)$xml->message;
            $this->data['token'] = "";
        }else{
            $this->data['message'] = 'Registered';
            $this->session->set_userdata('token', $auth);
            $this->data['token'] = $this->session->userdata('token');
        }
        
        $this->render();
    }
    
    function buy(){
        $xml = simplexml_load_file("http://bsx.jlparry.com/status");
        $state = $xml->state;
        if ($state == 2 || $state == 3) {
            $this->data['pagebody'] = "buy";
            $pass = $this->session->userdata('token');
            $player = $this->session->userdata('username');
            $name = $_POST['Name'];
            $quantity = $_POST['amount'];
            $xml = simplexml_load_file('http://bsx.jlparry.com/buy?team=g05&token='.$pass.'&player='.$player.'&stock='.$name.'&quantity='.$quantity);

            $this->data['message'] = "Bought " . (string)$xml->token;
            $this->stock_model->reset_transactions();
            $this->stock_model->read_transactions();
            $this->stock_model->buy_transactions((string)$xml->token,(string)$xml->datetime, (string)$xml->agent, (string)$xml->player, (string)$xml->stock);
        }else{
            $this->data['message'] = (string)$xml->message;
        }
        $this->render();
    }
    
    function sell(){
        
    }
}
