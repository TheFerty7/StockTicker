<?php

class Login extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('members');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'login'; // this is the view we want shown
        // build the list of authors, to pass on to our view

        $this->render();
    }

    function submit() {
        $key = $_POST['userid'];
        $user = $this->members->get_user($key);
        $password = $_POST['password'];
        $retrieved = $user[0]['password'];
        if (strcmp($password, $retrieved) == 0) {
            $this->session->set_userdata('userID', $user[0]['name']);
            $this->session->set_userdata('userName', $user[0]['name']);
            //$this->session->set_userdata('userRole', $user->role);
            redirect('/welcome');
        } else {
            redirect('/Login');
        }
    }

    function signup() {
        $name = $_POST['userid'];
        $password = $_POST['password'];
        $this->members->insert_into_members($name, $password);
        redirect('/welcome');
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

}
