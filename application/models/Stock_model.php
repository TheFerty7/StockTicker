<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stock_model extends CI_Model {

    function __construct() {
        // Call the Model constructor  
        parent::__construct();
    }

    function get_stocks() {
        $query = $this->db->get('stocks');
        return $query->result_array();
    }

    function get_players() {
        $query = $this->db->get('players');
        return $query->result_array();
    }

    function get_transactions() {
        $query = $this->db->get('transactions');
        return $query->result_array();
    }

    function get_movements() {
        $query = $this->db->get('movements');
        return $query->result_array();
    }

    function get_latest_movements($code_name) {
        $sql_movement = "SELECT * FROM movements WHERE Code= ?;";
        $query = $this->db->query($sql_movement, array($code_name));
        return $query->result_array();
    }

    function get_player_transactions($id, $type) {
        $sql = "SELECT * FROM transactions WHERE Player= ? AND Trans= ? ;";
        $query = $this->db->query($sql, array($id, $type));
        return $query->result_array();
    }
    
    function get_recent_trades($id){
        $sql = "SELECT * FROM transactions WHERE Stock= ? ;";
        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }
    
    function get_equity()
	{
        $sql = "SELECT * FROM equity ;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    
    function read_stocks(){
        $file = file_put_contents("stocks.csv", file_get_contents("http://bsx.jlparry.com/data/stocks"));
        $filedata = fopen("stocks.csv", "r");
                
	while(($line = fgetcsv($filedata)) != false){
                    //list($code[], $name[], $category[], $value[]) = $line;
            
            $this->stock_model->update_stocks($line[3], $line[0]);
        }
        fclose($filedata);
    }
    
    function update_stocks($data, $name){
        $sql = "UPDATE stocks SET Value = ? WHERE Code = ? ;";
        $query = $this->db->query($sql, array($data, $name));
    }
    
    function insert_moves($date, $code, $action, $amount){
        
        $sql = "INSERT INTO movements (Datetime, Code, Action, Amount) Values (?, ?, ?, ?);";
        $query = $this->db->query($sql, array($date, $code, $action, $amount));
    }
    
    function reset_moves(){
        $sql = "DROP TABLE movements";
        $this->db->query($sql);
        $sql2 = "CREATE TABLE movements( Datetime varchar(19), Code varchar(4), Action varchar(4), Amount int(2));";
        $this->db->query($sql2);
    }
    
    function recent_moves(){
        $sql = "SELECT * FROM movements ORDER BY datetime DESC LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
