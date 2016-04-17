<?php

class Login extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('members');
        $this->load->library('upload');
        $this->session->set_userdata('role', "");
        $this->session->set_userdata('userID', "");
        $this->session->set_userdata('username', "");
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->session->set_userdata('role', "");
        $this->session->set_userdata('userID', "");
        $this->session->set_userdata('username', "");
        $this->session->sess_destroy();
        $this->data['pagebody'] = 'login'; // this is the view we want shown
        // build the list of authors, to pass on to our view
        //$this->session->sess_destroy();
        $this->render();
    }

    function submit() {
        $key = $_POST['userid'];
        $user = $this->members->get_user($key);
        $password = $_POST['password'];
        $retrieved = $user[0]['password'];
        if (strcmp($password, $retrieved) == 0) {
            $this->session->set_userdata('userID', $user[0]['player']);
            $this->session->set_userdata('username', $user[0]['player']);
            $this->session->set_userdata('role', $user[0]['role']);
            //$this->session->set_userdata('userRole', $user->role);
            redirect('/welcome');
        } else {
            redirect('/Login');
        }
    }

    function signup() {
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $name = $_POST['userid'];
        $password = $_POST['password'];
        $role = 'player';
        $cash = 1000;
        $this->session->set_userdata('userID', $name);
        $this->session->set_userdata('username', $name);
        $this->session->set_userdata('role', $role);
        $this->members->insert_into_members($name, $password, $role, $cash);
        redirect('/Welcome');
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

}
