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

    function get_recent_trades($id) {
        $sql = "SELECT * FROM transactions WHERE Stock= ? ;";
        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }

    function get_equity() {
        $sql = "SELECT * FROM equity ;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function read_stocks() {
        $file = file_put_contents("stocks.csv", file_get_contents("http://bsx.jlparry.com/data/stocks"));
        $filedata = fopen("stocks.csv", "r");

        while (($line = fgetcsv($filedata)) != false) {
            //list($code[], $name[], $category[], $value[]) = $line;
            if ($line[1] != 'name')
                $this->stock_model->insert_stocks($line[0], $line[1], $line[2], $line[3]);
        }
        fclose($filedata);
    }

    function read_transactions() {
        $file = file_put_contents("transactions.csv", file_get_contents("http://bsx.jlparry.com/data/transactions"));
        $filedata = fopen("transactions.csv", "r");

        while (($line = fgetcsv($filedata)) != false) {
            //list($code[], $name[], $category[], $value[]) = $line;
            if ($line[0] != 'seq')
                $this->stock_model->insert_transactions($line[0], $line[1], $line[2], $line[3], $line[4], $line[5], $line[6]);
        }
        fclose($filedata);
    }

    function read_moves() {
        $file = file_put_contents("moves.csv", file_get_contents("http://bsx.jlparry.com/data/movement"));
        $filedata = fopen("moves.csv", "r");

        while (($line = fgetcsv($filedata)) != false) {
            if ($line[1] != 'datetime') {
                $this->stock_model->insert_moves($line[0], $line[1], $line[2], $line[3], $line[4]);
            }
        }
        fclose($filedata);
    }

    function update_stocks($data, $name) {
        $sql = "UPDATE stocks SET Value = ? WHERE Code = ? ;";
        $query = $this->db->query($sql, array($data, $name));
    }

    function insert_moves($seq, $date, $code, $action, $amount) {

        $sql = "INSERT INTO movements (Seq, Datetime, Code, Action, Amount) Values (?, ?, ?, ?, ?);";
        $query = $this->db->query($sql, array($seq, $date, $code, $action, $amount));
    }

    function insert_stocks($code, $name, $cat, $value) {
        $sql = "INSERT INTO stocks (Code, Name, Category, Value) Values (?, ?, ?, ?);";
        $query = $this->db->query($sql, array($code, $name, $cat, $value));
    }

    function insert_transactions($seq, $date, $agent, $player, $stock, $trans, $quan, $token = null) {

        $sql = "INSERT INTO transactions(Seq, Datetime, agent, Player, Stock, Trans, Quantity, token) Values (?, ?, ?, ?, ?, ?, ?, ?);";
        $query = $this->db->query($sql, array($seq, $date, $agent, $player, $stock, $trans, $quan, $token));
    }

    function reset_moves() {
        $sql = "DROP TABLE IF EXISTS movements";
        $this->db->query($sql);
        $sql2 = "CREATE TABLE movements(Seq int, Datetime varchar(19), Code varchar(4), Action varchar(4), Amount int(2));";
        $this->db->query($sql2);
    }

    function reset_stocks() {
        $sql = "DROP TABLE IF EXISTS stocks";
        $this->db->query($sql);
        $sql2 = "CREATE TABLE stocks(Code varchar(4), Name varchar(20), Category varchar(2), Value int(4) );";
        $this->db->query($sql2);
    }

    function reset_transactions() {
        $sql = "DROP TABLE IF EXISTS transactions";
        $this->db->query($sql);
        $sql2 = "CREATE TABLE transactions(Seq int, Datetime varchar(19), agent varchar(10), Player varchar(10), Stock varchar(4), Trans varchar(4), Quantity int(4), token varchar(10));";
        $this->db->query($sql2);
    }

    function recent_moves() {
        $sql = "SELECT * FROM movements ORDER BY seq DESC LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function recent_transactions() {
        $sql = "SELECT * FROM transactions ORDER BY seq DESC LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function buy_transactions($token, $date, $agent, $player, $stock){
        $sql = "UPDATE transactions SET token = ? WHERE Datetime = ? AND agent = ? AND Player = ? AND Stock = ?";
        $query = $this->db->query($sql, array($token, $date, $agent, $player, $stock));
    }
}
