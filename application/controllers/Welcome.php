<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

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

		if (!isset($_POST['username'])) 
                {
                    $this->data['username'] = $this->session->userdata('username');
		}else{
                    $this->session->set_userdata('username', $_POST['username']);
                }
                $this->data['stock_array'] = $this->stock_model->get_stocks();
                $this->data['player_array'] = $this->stock_model->get_players();

		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		
                $this->data['equity_array'] = $this->stock_model->get_equity();
		// build the list of authors, to pass on to our view
		
		$this->render();
	}
        
       

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */