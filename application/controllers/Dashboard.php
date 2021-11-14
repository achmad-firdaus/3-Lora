<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $Class;
    public $TIME, $DATE, $NOW;
    protected $table_voltage_n1 = 'node1_voltage';
    protected $table_voltage_n2 = 'node2_voltage';
    protected $table_current_n1 = 'node1_current';
    protected $table_current_n2 = 'node2_current';
    protected $table_power_n1 = 'node1_power';
    protected $table_power_n2 = 'node2_power';
    protected $table_energy_n1 = 'node1_energy';
    protected $table_energy_n2 = 'node2_energy';
    protected $table_frequency_n1 = 'node1_frequency';
    protected $table_frequency_n2 = 'node2_frequency';
    protected $table_pf_n1 = 'node1_pf';
    protected $table_pf_n2 = 'node2_pf';
    protected $table_earthquake_n1 = 'node1_earthquake';
    protected $table_earthquake_n2 = 'node2_earthquake';
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

    public function getData ()
    {
        // node 1
        $node1_current = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_current_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_energy = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_energy_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_pf = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_pf_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_power = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_voltage = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_voltage_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        // node 2
        $node2_current = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_current_n2)->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_energy = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_energy_n2)->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_pf = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_pf_n2)->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_power = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n2)->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_voltage = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_voltage_n2)->order_by('created_dt', 'DESC')->get()->row_array();
        // labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        // earthquake Node 1
        $node1_earthquake1 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "mon" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake2 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "tue" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake3 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "wed" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake4 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "thu" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake5 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "fri" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake6 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "sat" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node1_earthquake7 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->where('LOWER(date) = "sun" ')->order_by('created_dt', 'DESC')->get()->row_array();
        // earthquake Node 2
        $node2_earthquake1 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "mon" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake2 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "tue" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake3 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "wed" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake4 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "thu" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake5 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "fri" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake6 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "sat" ')->order_by('created_dt', 'DESC')->get()->row_array();
        $node2_earthquake7 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->where('LOWER(date) = "sun" ')->order_by('created_dt', 'DESC')->get()->row_array();
        
        $prfile = $this->db->select('id_profile, first_name, last_name, username, nim, photo, password, created_dt')->from($this->table_profile)->get()->row_array();
        $getDateGenerate = $this->db->select(' value, param')->where('param', 'DATEGENERATE')->from('tbr_sistem')->get()->row_array();

        return array(
            // Node 1
            'node1_current' => $node1_current,
            'node1_energy'  => $node1_energy,
            'node1_pf'      => $node1_pf,
            'node1_power'   => $node1_power,
            'node1_voltage' => $node1_voltage,
            // Node 2
            'node2_current' => $node2_current,
            'node2_energy'  => $node2_energy,
            'node2_pf'      => $node2_pf,
            'node2_power'   => $node2_power,
            'node2_voltage' => $node2_voltage,
            // earthquake Node 1
            'node1_earthquake_Mon' => $node1_earthquake1,
            'node1_earthquake_Tue' => $node1_earthquake2,
            'node1_earthquake_Wed' => $node1_earthquake3,
            'node1_earthquake_Thu' => $node1_earthquake4,
            'node1_earthquake_Fri' => $node1_earthquake5,
            'node1_earthquake_Sat' => $node1_earthquake6,
            'node1_earthquake_Sun' => $node1_earthquake7,
            // earthquake Node 2
            'node2_earthquake_Mon' => $node2_earthquake1,
            'node2_earthquake_Tue' => $node2_earthquake2,
            'node2_earthquake_Wed' => $node2_earthquake3,
            'node2_earthquake_Thu' => $node2_earthquake4,
            'node2_earthquake_Fri' => $node2_earthquake5,
            'node2_earthquake_Sat' => $node2_earthquake6,
            'node2_earthquake_Sun' => $node2_earthquake7,
            //profile
            'profile' => $prfile,
            'getDateGenerate' => $getDateGenerate,
        );
    }

	public function index ()
	{
        $getData = $this->getData();

        $data = array (
            'View_Parent'   => $this->Class.'_View',
            'Icon'          => base_url().'/assets/img/brand/favicon.png',
            'Css1'          => base_url().'/assets/vendor/nucleo/css/nucleo.css',
            'Css2'          => base_url().'/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css',
            'Css3'          => base_url().'/assets/css/argon.css?v=1.2.0',
            'Js1'           => base_url().'/assets/vendor/jquery/dist/jquery.min.js',
            'Js2'           => base_url().'/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
            'Js3'           => base_url().'/assets/vendor/js-cookie/js.cookie.js',
            'Js4'           => base_url().'/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
            'Js5'           => base_url().'/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
            'Js6'           => base_url().'/assets/vendor/chart.js/dist/Chart.min.js',
            'Js7'           => base_url().'/assets/vendor/chart.js/dist/Chart.extension.js',
            'Js8'           => base_url().'/assets/js/argon.js?v=1.2.0',
            // sweetalert2
            'sweetalert2'   => base_url().'/assets/js/sweetalert2.all.min.js',
            // IMG Avatar
            'urlAvatar'     => base_url().'/assets/img/',
            // Method
            'urlProfile'    => base_url().'Dashboard/prosesProfile',
            'urlPassword'   => base_url().'Dashboard/prosesPassword',
            'urlGen'        => base_url().'Dashboard/prosesGenerateDate',
            'urlLogout'     => base_url().'Logon',
            // List table RestApi
            'lsitRest'      => $this->db->select('endpoint, paramater1, paramater2, paramater3, paramater4, paramater5')->from('listrest')->get()->result_array(),
            // node 1
            'node1_current' => $getData['node1_current'],
            'node1_energy'  => $getData['node1_energy'],
            'node1_pf'      => $getData['node1_pf'],
            'node1_power'   => $getData['node1_power'],
            'node1_voltage' => $getData['node1_voltage'],
            // node 2
            'node2_current' => $getData['node2_current'],
            'node2_energy'  => $getData['node2_energy'],
            'node2_pf'      => $getData['node2_pf'],
            'node2_power'   => $getData['node2_power'],
            'node2_voltage' => $getData['node2_voltage'],
            //profile
            'profile' => $getData['profile'],
            'getDateGenerate' => $getData['getDateGenerate'],
            // export
            'export_csv' => base_url().'Dashboard/exportCsv',
        );
		$this->load->view('themeplate', $data);
	}

    public function prosesProfile ()
    {
        $config = [
            'upload_path' => './assets/img/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => round(microtime(date('dY')))
            // 'encrypt_name'  => true
        ];
        $this->load->library('upload', $config);

        $data = array (
            'first_name'    => $this->input->post('firstName'),
            'last_name'     => $this->input->post('lastName'),
            'username'      => $this->input->post('username'),
            'nim'           => $this->input->post('nim'),
            'created_dt'    => $this->NOW,
            // 'password'  => $this->input->post('password'),
            // 'photo'     => $this->upload->do_upload('photo'),
        );
        $this->db->update($this->table_profile, $data);
		
        $dataFile = $this->upload->data();
        if (empty($dataFile['file_name'])){
		} else {
			// if data photo already exist
            if ($this->upload->do_upload('photo')) {
				print_r($this->upload->data());
                $data = $this->upload->data();
                
				// disable upload foto 
                $this->db->set('photo' , $data['file_name']);
                $this->db->update('tbr_profile');
				// $this->session->set_flashdata('dashRealflashSuccess', 'Success upload!');
				
			} else {
				print_r($this->upload->display_errors());
				// $this->session->set_flashdata('dashRealflashWarning', 'Failed upload file is too big! please check your size file');
			}
        }
        $this->session->set_flashdata('flashSuccess','Success updated!'); // data 1 success insert
		redirect('Dashboard');
    }

    public function prosesPassword ()
    {
        $password = $this->input->post('password');
        $data = array (
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );
        $this->db->update($this->table_profile, $data);
        $this->session->set_flashdata('flashSuccess','Success updated!'); // data 1 success insert
		redirect('Dashboard');
    }

    public function prosesGenerateDate ()
    {
        $data = array (
            'Value' => $this->input->post('dategenerate'),
        );
        $this->db->where('param', 'DATEGENERATE');
        $this->db->update('tbr_sistem', $data);
        
        $whereStatus = " time = 'SEND' and date = 'Finish' and created_dt between NOW() - INTERVAL 1 month and now()  ";
        $this->db->where($whereStatus);
        $this->db->delete($this->table_power_n1);
        $this->db->where($whereStatus);
        $this->db->delete($this->table_power_n2);
        $this->session->set_flashdata('flashSuccess','Success updated!'); // data 1 success insert
		redirect('Dashboard');
    }

    public function getEveryTimeBKP ()
    {
        $getData = $this->getData();

        $N1M1 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','1')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M2 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','2')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M3 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','3')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M4 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','4')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M5 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','5')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M6 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','6')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M7 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','7')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M8 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','8')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M9 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','9')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M10 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','10')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M11 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','11')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M12 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','12')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();

        $data = array(
            //Month
            'N1M1'            => isset($N1M1['valueh'])? $N1M1['valueh'] : 0 ,
            'N1M2'            => isset($N1M2['valueh'])? $N1M2['valueh'] : 0 ,
            'N1M3'            => isset($N1M3['valueh'])? $N1M3['valueh'] : 0 ,
            'N1M4'            => isset($N1M4['valueh'])? $N1M4['valueh'] : 0 ,
            'N1M5'            => isset($N1M5['valueh'])? $N1M5['valueh'] : 0 ,
            'N1M6'            => isset($N1M6['valueh'])? $N1M6['valueh'] : 0 ,
            'N1M7'            => isset($N1M7['valueh'])? $N1M7['valueh'] : 0 ,
            'N1M8'            => isset($N1M8['valueh'])? $N1M8['valueh'] : 0 ,
            'N1M9'            => isset($N1M9['valueh'])? $N1M9['valueh'] : 0 ,
            'N1M10'            => isset($N1M10['valueh'])? $N1M10['valueh'] : 0 ,
            'N1M11'            => isset($N1M11['valueh'])? $N1M11['valueh'] : 0 ,
            'N1M12'            => isset($N1M12['valueh'])? $N1M12['valueh'] : 0 ,
            // node 1
            'node1_current' => $getData['node1_current'],
            'node1_energy'  => $getData['node1_energy'],
            'node1_pf'      => $getData['node1_pf'],
            'node1_power'   => $getData['node1_power'],
            'node1_voltage' => $getData['node1_voltage'],
            // node 2
            'node2_current' => $getData['node2_current'],
            'node2_energy'  => $getData['node2_energy'],
            'node2_pf'      => $getData['node2_pf'],
            'node2_power'   => $getData['node2_power'],
            'node2_voltage' => $getData['node2_voltage'],            
            // earthquake Node 1
            'node1_earthquake_Mon' => $getData['node1_earthquake_Mon'],
            'node1_earthquake_Tue' => $getData['node1_earthquake_Tue'],
            'node1_earthquake_Wed' => $getData['node1_earthquake_Wed'],
            'node1_earthquake_Thu' => $getData['node1_earthquake_Thu'],
            'node1_earthquake_Fri' => $getData['node1_earthquake_Fri'],
            'node1_earthquake_Sat' => $getData['node1_earthquake_Sat'],
            'node1_earthquake_Sun' => $getData['node1_earthquake_Sun'],
            // earthquake Node 2
            'node2_earthquake_Mon' => $getData['node2_earthquake_Mon'],
            'node2_earthquake_Tue' => $getData['node2_earthquake_Tue'],
            'node2_earthquake_Wed' => $getData['node2_earthquake_Wed'],
            'node2_earthquake_Thu' => $getData['node2_earthquake_Thu'],
            'node2_earthquake_Fri' => $getData['node2_earthquake_Fri'],
            'node2_earthquake_Sat' => $getData['node2_earthquake_Sat'],
            'node2_earthquake_Sun' => $getData['node2_earthquake_Sun'],
        );
        echo json_encode($data);
    }

    public function getEveryTime ()
    {
        $getData = $this->getData();

        $N1M1 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','1')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M2 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','2')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M3 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','3')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M4 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','4')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M5 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','5')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M6 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','6')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M7 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','7')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M8 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','8')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M9 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','9')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M10 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','10')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M11 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','11')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N1M12 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node1_power')
            ->where('date', 'Finish')->where('month(created_dt)','12')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        
        $N2M1 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','1')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M2 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','2')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M3 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','3')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M4 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','4')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M5 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','5')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M6 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','6')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M7 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','7')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M8 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','8')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M9 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','9')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M10 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','10')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M11 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','11')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();
        $N2M12 = $this->db->distinct()->select('value AS valueh, month (created_dt) AS M')->from('node2_power')
            ->where('date', 'Finish')->where('month(created_dt)','12')->group_by('created_dt')->order_by('created_dt', 'DESC')->get()->row_array();

        $data = array(
            //Month
            'N1M1'            => isset($N1M1['valueh'])? $N1M1['valueh'] : 0 ,
            'N1M2'            => isset($N1M2['valueh'])? $N1M2['valueh'] : 0 ,
            'N1M3'            => isset($N1M3['valueh'])? $N1M3['valueh'] : 0 ,
            'N1M4'            => isset($N1M4['valueh'])? $N1M4['valueh'] : 0 ,
            'N1M5'            => isset($N1M5['valueh'])? $N1M5['valueh'] : 0 ,
            'N1M6'            => isset($N1M6['valueh'])? $N1M6['valueh'] : 0 ,
            'N1M7'            => isset($N1M7['valueh'])? $N1M7['valueh'] : 0 ,
            'N1M8'            => isset($N1M8['valueh'])? $N1M8['valueh'] : 0 ,
            'N1M9'            => isset($N1M9['valueh'])? $N1M9['valueh'] : 0 ,
            'N1M10'            => isset($N1M10['valueh'])? $N1M10['valueh'] : 0 ,
            'N1M11'            => isset($N1M11['valueh'])? $N1M11['valueh'] : 0 ,
            'N1M12'            => isset($N1M12['valueh'])? $N1M12['valueh'] : 0 ,
            //N2
            'N2M1'            => isset($N2M1['valueh'])? $N2M1['valueh'] : 0 ,
            'N2M2'            => isset($N2M2['valueh'])? $N2M2['valueh'] : 0 ,
            'N2M3'            => isset($N2M3['valueh'])? $N2M3['valueh'] : 0 ,
            'N2M4'            => isset($N2M4['valueh'])? $N2M4['valueh'] : 0 ,
            'N2M5'            => isset($N2M5['valueh'])? $N2M5['valueh'] : 0 ,
            'N2M6'            => isset($N2M6['valueh'])? $N2M6['valueh'] : 0 ,
            'N2M7'            => isset($N2M7['valueh'])? $N2M7['valueh'] : 0 ,
            'N2M8'            => isset($N2M8['valueh'])? $N2M8['valueh'] : 0 ,
            'N2M9'            => isset($N2M9['valueh'])? $N2M9['valueh'] : 0 ,
            'N2M10'            => isset($N2M10['valueh'])? $N2M10['valueh'] : 10 ,
            'N2M11'            => isset($N2M11['valueh'])? $N2M11['valueh'] : 0 ,
            'N2M12'            => isset($N2M12['valueh'])? $N2M12['valueh'] : 0 ,
            // node 1
            'node1_current' => $getData['node1_current'],
            'node1_energy'  => $getData['node1_energy'],
            'node1_pf'      => $getData['node1_pf'],
            'node1_power'   => $getData['node1_power'],
            'node1_voltage' => $getData['node1_voltage'],
            // node 2
            'node2_current' => $getData['node2_current'],
            'node2_energy'  => $getData['node2_energy'],
            'node2_pf'      => $getData['node2_pf'],
            'node2_power'   => $getData['node2_power'],
            'node2_voltage' => $getData['node2_voltage'],            
            // earthquake Node 1
            'node1_earthquake_Mon' => $getData['node1_earthquake_Mon'],
            'node1_earthquake_Tue' => $getData['node1_earthquake_Tue'],
            'node1_earthquake_Wed' => $getData['node1_earthquake_Wed'],
            'node1_earthquake_Thu' => $getData['node1_earthquake_Thu'],
            'node1_earthquake_Fri' => $getData['node1_earthquake_Fri'],
            'node1_earthquake_Sat' => $getData['node1_earthquake_Sat'],
            'node1_earthquake_Sun' => $getData['node1_earthquake_Sun'],
            // earthquake Node 2
            'node2_earthquake_Mon' => $getData['node2_earthquake_Mon'],
            'node2_earthquake_Tue' => $getData['node2_earthquake_Tue'],
            'node2_earthquake_Wed' => $getData['node2_earthquake_Wed'],
            'node2_earthquake_Thu' => $getData['node2_earthquake_Thu'],
            'node2_earthquake_Fri' => $getData['node2_earthquake_Fri'],
            'node2_earthquake_Sat' => $getData['node2_earthquake_Sat'],
            'node2_earthquake_Sun' => $getData['node2_earthquake_Sun'],
        );
        echo json_encode($data);
    }

    public function exportCSV(){

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $node1_current = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, CAST(created_dt AS DATE) AS created_dt')
                        ->from($this->table_power_n1)
                        ->where('value > 1')
                        ->where('date', 'Finish')->order_by('created_dt', 'DESC')->get()->result_array();

        $node2_current = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, CAST(created_dt AS DATE) AS created_dt')
                        ->from($this->table_power_n2)
                        ->where('value > 1')
                        ->where('date', 'Finish')->order_by('created_dt', 'DESC')->get()->result_array();

        $where = ' value > 1 AND LOWER(date) = "mon" or LOWER(date) = "tue" or LOWER(date) = "wed" or LOWER(date) = "thu" or LOWER(date) = "fri" or LOWER(date) = "sat" or LOWER(date) = "sun"  ';
        $earthquake1 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, CAST(created_dt AS DATE) AS created_dt')
                        ->from($this->table_earthquake_n1)
                        ->where($where)
                        ->group_by('date')->order_by('created_dt', 'DESC')->get()->result_array();
        $earthquake2 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, CAST(created_dt AS DATE) AS created_dt')
                        ->from($this->table_earthquake_n2)
                        ->where($where)
                        ->group_by('date')->order_by('created_dt', 'DESC')->get()->result_array();

                        // var_dump($node1_current);
        if (empty($node1_current)) {
            // echo json_encode('nothing data from database');
            // redirect('Dashboard', 'index');
        } else {
            $csv = new PHPExcel();
            $csv->getProperties()->setCreator('Thirty Seven Projects')
                        ->setLastModifiedBy('Achmad')
                        ->setTitle("")
                        ->setSubject("")
                        ->setDescription("Data Export")
                        ->setKeywords("");

            $csv->setActiveSheetIndex(0);
            // $csv->getActiveSheet()->getColumnDimension('D1')->setAutoSize(true);
            
            $csv->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $csv->getActiveSheet()->setCellValue('A1', "No");
            $csv->getActiveSheet()->setCellValue('B1', "Type");
            $csv->getActiveSheet()->setCellValue('C1', "Month");
            $csv->getActiveSheet()->setCellValue('D1', "Payment");

            $no = 1; 
            $numrow = 2; 
            foreach($node1_current as $data){ 
                $csv->getActiveSheet()->setCellValue('A'.$numrow, $no);
                $csv->getActiveSheet()->setCellValue('B'.$numrow, 'NODE 1');
                $csv->getActiveSheet()->setCellValue('C'.$numrow, $data['created_dt']);
                $csv->getActiveSheet()->setCellValue('D'.$numrow, ' Rp.'. number_format(ceil($data['value']), 2, ',', '.')   );
                
                $no++; 
                $numrow++; 
            }
            
            foreach($node2_current as $data){ 
                $csv->getActiveSheet()->setCellValue('A'.$numrow, $no);
                $csv->getActiveSheet()->setCellValue('B'.$numrow, 'NODE 2');
                $csv->getActiveSheet()->setCellValue('C'.$numrow, $data['created_dt']);
                $csv->getActiveSheet()->setCellValue('D'.$numrow, ' Rp.'. number_format(ceil($data['value']), 2, ',', '.')   );
                
                $no++; 
                $numrow++; 
            }

            /*Rename sheet*/
            $csv->getActiveSheet()->setTitle("Report Payment");

            // another sheet
            $csv->createSheet();
            $csv->setActiveSheetIndex(1);
            $csv->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $csv->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $csv->getActiveSheet()->setCellValue('A1', "No");
            $csv->getActiveSheet()->setCellValue('B1', "Type");
            $csv->getActiveSheet()->setCellValue('C1', "Month");
            $csv->getActiveSheet()->setCellValue('D1', "Time");
            $csv->getActiveSheet()->setCellValue('E1', "Hertz");

            $no = 1; 
            $numrow = 2; 
            foreach($earthquake1 as $data){ 
                $csv->getActiveSheet()->setCellValue('A'.$numrow, $no);
                $csv->getActiveSheet()->setCellValue('B'.$numrow, 'Earthquake 1');
                $csv->getActiveSheet()->setCellValue('C'.$numrow, $data['date']);
                $csv->getActiveSheet()->setCellValue('D'.$numrow, $data['created_dt']);
                $csv->getActiveSheet()->setCellValue('E'.$numrow, $data['value'].' Hz');
                
                $no++; 
                $numrow++; 
            }

            $csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            $csv->getActiveSheet()->setTitle("Report Earthquake");

            $fileName = "Report";
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // // header('Content-Disposition: attachment; filename="Data Siswa.csv" '); 
            header('Content-Disposition: attachment; filename='.$fileName.'.csv'); 
            header('Cache-Control: max-age=0');
            // $write = new PHPExcel_Writer_CSV($csv, 'Excel5');
            // $write->save('php://output');

            /* Redirect output to a client’s web browser (Excel5)*/
            $objWriter = PHPExcel_IOFactory::createWriter($csv, 'Excel5');
            $objWriter->save('php://output');
        }
    }
    
}
