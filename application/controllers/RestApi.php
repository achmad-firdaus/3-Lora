<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestApi extends CI_Controller {

    public $Class;
    public $TIME, $DATE, $NOW, $DATE_YESTERDAY;
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
    public $endPoint = 'https://industrial.api.ubidots.com/api/v1.6/devices/tesis/?token=BBFF-Wy0vUvPygR9m5rT6faJ1iiKndC9lpk';
    public $telegramEndPoint = 'https://api.telegram.org/bot';
    public $telegramApi = '2080186387:AAF9g0WAEe06Ap8D9TkubUWu_QQW9QWI8Gk';
    // public $telegramChatID = '1636119175';
    public $telegramChatID = '721650053';

    /*
        if you want get chat id telegram
        https://api.telegram.org/bot<YOUR TOKEN>/getUpdates
        example:
        https://api.telegram.org/bot2080186387:AAF9g0WAEe06Ap8D9TkubUWu_QQW9QWI8Gk/getUpdates
    */

	public function __construct () 
    {
        parent::__construct();
        $this->Class = get_class($this);
        $this->TIME = DATE('H:i');
        $this->DATE = DATE('Y-m-d');
        $this->DATE_YESTERDAY = DATE('Y-m-d', strtotime("-1 days"));
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
        // earthquake Node 1
        $node1_earthquake1 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n1)->order_by('created_dt', 'DESC')->get()->row_array();
        // earthquake Node 2
        $node2_earthquake1 = $this->db->select('COALESCE(FORMAT(FLOOR(value),0), 0) AS valueh, time, date, created_dt')->from($this->table_earthquake_n2)->order_by('created_dt', 'DESC')->get()->row_array();

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
            'node1_earthquake' => $node1_earthquake1,
            // earthquake Node 2
            'node2_earthquake' => $node2_earthquake1,
        );
    }

    public function starter () 
    {
        // $where = "value < 1";
        // $this->db->where($where);
        // $this->db->delete($this->table_voltage_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_voltage_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_current_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_current_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_power_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_power_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_energy_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_energy_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_frequency_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_frequency_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_pf_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_pf_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_earthquake_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_earthquake_n2);
        $this->ubidots();
        $this->calculatation();
        $this->calculatation_paid_n1();
        $this->calculatation_paid_n2();
        $this->cleane();
    }

    public function index ()
    {
        // $this->ubidots();
        // $this->calculatation();
        $this->calculatation_paid_n1();
        $this->calculatation_paid_n2();
        echo'Finish';
        // echo $this->DATE_YESTERDAY;
        // $this->cleane();
    }

    public function ubidots ()
    {
        $getData = $this->getData();

        $data = '{
                    "node1_current" : '.$getData['node1_current']['value'].', 
                    "node1_energy"  : '.$getData['node1_energy']['value'].' ,
                    "node1_pf"      : '.$getData['node1_pf']['value'].' ,
                    "node1_power"   : '.$getData['node1_power']['value'].' ,
                    "node1_voltage" : '.$getData['node1_voltage']['value'].' ,
                    "node2_current" : '.$getData['node2_current']['value'].', 
                    "node2_energy"  : '.$getData['node2_energy']['value'].' ,
                    "node2_pf"      : '.$getData['node2_pf']['value'].' ,
                    "node2_power"   : '.$getData['node2_power']['value'].' ,
                    "node2_voltage" : '.$getData['node2_voltage']['value'].' ,
                    "node1_earthquake" : '.$getData['node1_earthquake']['valueh'].' ,
                    "node2_earthquake" : '.$getData['node2_earthquake']['valueh'].'
                 }';
        $url = $this->endPoint;
        $headers = array('Content-Type: application/json');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);    
        $response = array (
            'dataSend' => $data,
            'response' => $result,
        );    
        echo $response['response'];
    }

    public function calculatation ()
    {
        $whereStatus = "value > 1 AND CAST(created_dt AS DATE) = '".$this->DATE."' AND time = 'SEND' ";
        $checkStatus_n1 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n1)->where($whereStatus)->get();
        if (empty($checkStatus_n1->num_rows())) {
            $where = "value > 1 AND CAST(created_dt AS DATE) = '".$this->DATE."' AND time != 'SEND' ";
            $node1_power = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n1)->where($where)->get();
            if ($node1_power->num_rows() > 200 ) {
                $data = array (
                    'value' => $this->db->query(" select (AVG(cast(value AS DECIMAL(10,2))) * 12) as 'oneday' from node1_power where value > 1 and CAST(created_dt AS DATE) = '".$this->DATE."' AND time != 'SEND' limit 200 ")
                                        ->row_array()['oneday'],
                    'time'  => 'SEND',
                    'date' 			=> $this->DATE,
                    'created_dt'	=> $this->NOW,
                );
                $this->db->insert($this->table_power_n1, $data);
                // $this->cleane();
            }
        }

        $checkStatus_n2 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n2)->where($whereStatus)->get();
        if (empty($checkStatus_n2->num_rows())) {
            $where = "value > 1 AND CAST(created_dt AS DATE) = '".$this->DATE."' AND time != 'SEND' ";
            $node1_power = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n2)->where($where)->get();
            if ($node1_power->num_rows() > 200 ) {
                $data = array (
                    'value' => $this->db->query(" select (AVG(cast(value AS DECIMAL(10,2))) * 12) as 'oneday' from node2_power where value > 1 and CAST(created_dt AS DATE) = '".$this->DATE."' AND time != 'SEND' limit 200 ")
                                        ->row_array()['oneday'],
                    'time'  => 'SEND',
                    'date' 			=> $this->DATE,
                    'created_dt'	=> $this->NOW,
                );
                $this->db->insert($this->table_power_n2, $data);
                // $this->cleane();
            }
        }
    }
    
    public function calculatation_paid_n1 () 
    {
        $whereStatus = " time = 'SEND' and date = 'Finish' and created_dt between NOW() - INTERVAL 1 month and now()  ";
        $checkStatus_n1 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n1)->where($whereStatus)->get();
        $getDateGenerate = $this->db->select(' value, param')->where('param', 'DATEGENERATE')->from('tbr_sistem')->get()->row_array();
        if (empty($checkStatus_n1->num_rows()) && (int)DATE('d') === (int)$getDateGenerate['value'] ) 
        {
            $data = array (
                'value' => $this->db->query(" select (SUM(value) /1000 * 1470) as total from node1_power where time = 'SEND' and date != 'Finish' and created_dt between NOW() - INTERVAL 1 month and now() ")
                                    ->row_array()['total'],
                'time'  => 'SEND',
                'date' 			=> 'Finish',
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_power_n1, $data);

            $message = 'Your payment Node 1 in Month '.DATE('M').' Rp.'. number_format(ceil($data['value']), 2, ',', '.');
            $url = $this->telegramEndPoint.$this->telegramApi.'/sendMessage?chat_id='.$this->telegramChatID.'&text='.$message;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);        
            echo $result;
        }
    }

    public function calculatation_paid_n2 () 
    {
        $whereStatus = " time = 'SEND' and date = 'Finish' and created_dt between NOW() - INTERVAL 1 month and now()  ";
        $checkStatus_n2 = $this->db->select('cast(value AS DECIMAL(10,2)) AS value, time, date, created_dt')->from($this->table_power_n2)->where($whereStatus)->get();
        $getDateGenerate = $this->db->select(' value, param')->where('param', 'DATEGENERATE')->from('tbr_sistem')->get()->row_array();
        if (empty($checkStatus_n2->num_rows()) && (int)DATE('d') === (int)$getDateGenerate['value'] ) 
        {
            $data = array (
                'value' => $this->db->query(" select (SUM(value) /1000 * 1470) as total from node2_power where time = 'SEND' and date != 'Finish' and created_dt between NOW() - INTERVAL 1 month and now() ")
                                    ->row_array()['total'],
                'time'  => 'SEND',
                'date' 			=> 'Finish',
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_power_n2, $data);

            $message = 'Your payment Node 2 in Month '.DATE('M').' Rp.'. number_format(ceil($data['value']), 2, ',', '.');
            $url = $this->telegramEndPoint.$this->telegramApi.'/sendMessage?chat_id='.$this->telegramChatID.'&text='.$message;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);        
            echo $result;
        }
    }

    public function cleane () 
    {
        $where = "CAST(created_dt AS DATE) != '".$this->DATE."' AND time != 'SEND' ";
        $this->db->where($where);
        $this->db->delete($this->table_voltage_n1);
        $this->db->where($where);
        $this->db->delete($this->table_voltage_n2);
        $this->db->where($where);
        $this->db->delete($this->table_current_n1);
        $this->db->where($where);
        $this->db->delete($this->table_current_n2);
        $this->db->where($where);
        $this->db->delete($this->table_power_n1);
        $this->db->where($where);
        $this->db->delete($this->table_power_n2);
        $this->db->where($where);
        $this->db->delete($this->table_energy_n1);
        $this->db->where($where);
        $this->db->delete($this->table_energy_n2);
        $this->db->where($where);
        $this->db->delete($this->table_frequency_n1);
        $this->db->where($where);
        $this->db->delete($this->table_frequency_n2);
        $this->db->where($where);
        $this->db->delete($this->table_pf_n1);
        $this->db->where($where);
        $this->db->delete($this->table_pf_n2);
        // $this->db->where($where);
        // $this->db->delete($this->table_earthquake_n1);
        // $this->db->where($where);
        // $this->db->delete($this->table_earthquake_n2);
    }

    public function postall($voltage_n1 = '', $voltage_n2 = '', $currente_n1 = '', $currente_n2 = '', $power_n1 = '', $power_n2 = '', $energy_n1 = '', $energy_n2 = '', $frequency_n1 = '', $frequency_n2 = '', $pf_n1 = '', $pf_n2 = '', $earthquake_n1 = '', $earthquake_n2 = '')
    {
        // if ($voltage_n1 > 1) {
            $this->voltage('node1', $voltage_n1);
        // }
        // if ($voltage_n2 > 1) {
            $this->voltage('node2', $voltage_n2);
        // }
        // if ($currente_n1 > 1) {
            $this->current('node1', $currente_n1);
        // }
        // if ($currente_n2 > 1) {
            $this->current('node2', $currente_n2);
        // }
        // if ($power_n1 > 1) {
            $this->power('node1', $power_n1);
        // }
        // if ($power_n2 > 1) {
            $this->power('node2', $power_n2);
        // }
        // if ($energy_n1 > 1) {
            $this->energy('node1', $energy_n1);
        // }
        // if ($energy_n2 > 1) {
            $this->energy('node2', $energy_n2);
        // }
        // if ($frequency_n1 > 1) {
            $this->frequency('node1', $frequency_n1);
        // }
        // if ($frequency_n2 > 1) {
            $this->frequency('node2', $frequency_n2);
        // }
        // if ($pf_n1 > 1) {
            $this->pf('node1', $pf_n1);
        // }
        // if ($pf_n2 > 1) {
            $this->pf('node2', $pf_n2);
        // }
        // if ($earthquake_n1 > 1) {
            $this->earthquake('node1', $earthquake_n1);
        // }
        // if ($earthquake_n2 > 1) {
            $this->earthquake('node2', $earthquake_n2);
        // }
        
    }

    public function postall2()
    {
        $this->voltage('node1',     $this->input->post('A', true));
        $this->voltage('node2',     $this->input->post('B', true));
        $this->current('node1',     $this->input->post('C', true));
        $this->current('node2',     $this->input->post('D', true));
        $this->power('node1',       $this->input->post('E', true));
        $this->power('node2',       $this->input->post('F', true));
        $this->energy('node1',      $this->input->post('G', true));
        $this->energy('node2',      $this->input->post('H', true));
        $this->frequency('node1',   $this->input->post('I', true));
        $this->frequency('node2',   $this->input->post('J', true));
        $this->pf('node1',          $this->input->post('K', true));
        $this->pf('node2',          $this->input->post('L', true));
        $this->earthquake('node1',  $this->input->post('M', true));
        $this->earthquake('node2',  $this->input->post('N', true));
        return array(
            'message' => "Success"
        );
    }

    public function voltage($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_voltage_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_voltage_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function current($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_current_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_current_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function power($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_power_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_power_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function energy($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_energy_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_energy_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function frequency($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_frequency_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_frequency_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function pf($type = '', $value = '')
    {
        $this->starter();

        if ($type == "node1" ) {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_pf_n1, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } elseif ($type == "node2") {
            $data = array (
                // 'value'         => (!empty(htmlspecialchars($this->input->post('data', true))))? htmlspecialchars($this->input->post('data', true)) : 0 ,
                'value'         => (!empty($value))? $value : 0 ,
                'time' 			=> $this->TIME,
                'date' 			=> $this->DATE,
                'created_dt'	=> $this->NOW,
            );
            $this->db->insert($this->table_pf_n2, $data);
            return array(
                'message' => "Success insert voltage node 1"
            );
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }

    public function earthquake($type = '', $value = '')
    {
        if ($value > 1000) {
            $this->starter();
    
            if ($type == "node1" ) {
                // $value = htmlspecialchars($this->input->post('data', true));
                $value = (float)$value / rand(50,100);    
                $data = array (
                    'value'         => ($value > 900)? rand(50,100) : $value ,
                    'time' 			=> $this->TIME,
                    'date' 			=> DATE('D'),
                    'created_dt'	=> $this->NOW,
                );
                $this->db->insert($this->table_earthquake_n1, $data);
                
                $message = 'There was an earthquake on '.DATE('Y-m-d H:i:s');
                $url = $this->telegramEndPoint.$this->telegramApi.'/sendMessage?chat_id='.$this->telegramChatID.'&text='.$message;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                curl_close($curl);        
                echo $result;
    
                return array(
                    'message' => "Success insert voltage node 1"
                );
            } elseif ($type == "node2") {
                // $value = htmlspecialchars($this->input->post('data', true));
                $value = (float)$value / rand(50,100);    
                $data = array (
                    'value'         => ($value > 900)? rand(50,100) : $value ,
                    'time' 			=> $this->TIME,
                    'date' 			=> DATE('D'),
                    'created_dt'	=> $this->NOW,
                );
                $this->db->insert($this->table_earthquake_n2, $data);
                
                $message = 'There was an earthquake on '.DATE('Y-m-d H:i:s');
                $url = $this->telegramEndPoint.$this->telegramApi.'/sendMessage?chat_id='.$this->telegramChatID.'&text='.$message;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                curl_close($curl);        
                echo $result;
    
                return array(
                    'message' => "Success insert voltage node 1"
                );
            } else {
                return array(
                    'message' => "not allowed request"
                );
            }
        } else {
            return array(
                'message' => "not allowed request"
            );
        }
    }
}
