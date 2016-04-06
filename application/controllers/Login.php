<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2016-02-16
 * Time: 1:47 PM
 */

class Login extends Application {

    function __construct()
    {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->data['pagebody'] = 'login';	// this is the view we want shown
        // build the list of authors, to pass on to our view

        $this->render();
    }





}