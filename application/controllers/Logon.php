<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

    public $Class;
    public $TIME, $DATE, $NOW;
    protected $table_profile = 'tbr_profile';
    
	public function __construct () 
    {
        parent::__construct();
        $this->Class = get_class($this);
        $this->TIME = DATE('H:i');
        $this->DATE = DATE('Y-m-d');
        $this->NOW = DATE('Y-m-d H:i:s');
        // check_session_logon();
    }

	public function index ()
	{
        // $getData = $this->getData();

        $data = array (
            'Icon'          => base_url().'/assets/img/brand/favicon.png',
            'Css1'          => base_url().'/assets/vendor/nucleo/css/nucleo.css',
            'Css2'          => base_url().'/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css',
            'Css3'          => base_url().'/assets/css/argon.css?v=1.2.0',

            'Js1'           => base_url().'/assets/vendor/jquery/dist/jquery.min.js',
            'Js2'           => base_url().'/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
            'Js3'           => base_url().'/assets/vendor/js-cookie/js.cookie.js',
            'Js4'           => base_url().'/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
            'Js5'           => base_url().'/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
            // 'Js6'           => base_url().'/assets/vendor/chart.js/dist/Chart.min.js',
            // 'Js7'           => base_url().'/assets/vendor/chart.js/dist/Chart.extension.js',
            'Js8'           => base_url().'/assets/js/argon.js?v=1.2.0',
            // IMG Avatar
            'urlAvatar'     => base_url().'/assets/img/',
            // Method
            'urlLogon'   => base_url().'Logon/prosesLogon',
            //prifole
            // 'profile' => $getData['profile'],
        );
		$this->load->view($this->Class.'_View', $data);
	}

    public function prosesLogon ()
    {
        $USERNAME = $this->input->post('Username', true);
        $PASSWORD = $this->input->post('Password', true);


        var_dump($USERNAME);
        $getUser = $this->db->select('id_profile, first_name, last_name, username, nim, photo, password, created_dt')
                            ->where('username', $USERNAME)
                            ->from($this->table_profile)->get()->row_array();

        if (empty($getUser['username'])){
            $this->session->set_flashdata('NOTIF','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Danger!</strong> Failed sign in!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Logon');
        }else {
            if(password_verify($PASSWORD, $getUser['password'])){
                $this->session->set_userdata('getUser', $getUser);
                $this->session->set_flashdata('flashSuccess','Success login, welcome!'); // data 1 success insert
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('notifAuth','<div class="alert" role="alert" style="background-color: lightgrey;">Wrong password!</div>');
                redirect('Logon');
            }    
        }

    }
}
