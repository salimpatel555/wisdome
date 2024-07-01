<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('candidate_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2050 05:00:00 GMT");
		$this->load->library('pagination');
		// if(empty($this->session->userdata('admin_is_login'))){
		// 	redirect('login');
		// }
    }

	public function dashboard(){
		if(empty($this->session->userdata('admin_is_login'))){
			redirect('login');
		}
		$data['page_title'] = 'Dashboard';
		$data['page_name'] = 'admin/dashboard.php';
		$this->load->view('page',$data);
	}

	function view_modal($page_name = '' , $param2 = '' , $param3 = '', $param4 = '')
    {
        $data['param2']     =   $param2;
        $data['param3']     =   $param3;
        $data['param4']     =   $param4;
        $this->load->view('mymodal/'.$page_name.'.php' ,$data);
    }

	public function candidate($param1 = "", $param2 = "") {
        // Load necessary models and libraries
        $this->load->library('email');

        if ($param1 == "register_candidate") {
			if(empty($this->session->userdata('admin_is_login'))){
				redirect('login');
			}
            $data['page_title'] = 'Register Candidate';
            $data['page_name'] = 'admin/register_candidate.php';
            $this->load->view('page', $data);
        }

        if ($param1 == "candidate_action") {
			if(empty($this->session->userdata('admin_is_login'))){
				redirect('login');
			}
            $this->form_validation->set_rules('email_id', 'Email', 'required|trim|valid_email|is_unique[candidate.email_id]');
            $this->form_validation->set_rules('candidate_name', 'Candidate Name', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/candidate/register_candidate');
            } else {
                // Validation passed, process the registration
                $email = $this->input->post('email_id');
                $name = $this->input->post('candidate_name');
                $prefix = "WCE";
                $unique_number = $this->candidate_model->generate_unique_number();
                $date_component = date("Ymd");
                $candidate_id = $prefix . $date_component . $unique_number;

                $otp = random_int(100000, 999999);
                $token = bin2hex(random_bytes(16));
                $otp_verify_url = base_url('admin/candidate/otp_form/' . $token);

                $data = array(
                    'candidate_id' => $candidate_id,
                    'email_id' => $email,
                    'candidate_name' => $name,
                    'otp' => $otp,
                    'token' => $token
                );

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'salimshaikh512512@gmail.com',
                    'smtp_pass' => 'xfex cjth zama wkcn',
                    'smtp_crypto' => 'ssl',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('salimshaikh512512@gmail.com', 'WCE');
                $this->email->to($email);
                $this->email->subject('OTP for Candidate Registration');
				$this->email->message("<html><head><style>body{font-family:Arial,sans-serif;line-height:1.6;color:#333;background-color:#f4f4f9;margin:0;padding:0;}.container{max-width:600px;margin:20px auto;padding:20px;border:1px solid #e0e0e0;border-radius:8px;background-color:#ffffff;box-shadow:0 0 10px rgba(0,0,0,0.1);}.header{text-align:center;margin-bottom:20px;}.header img{max-width:150px;}.message{margin-bottom:20px;}.message p{margin:0 0 10px;}.otp{background-color:#007bff;color:#fff;padding:8px 12px;border-radius:5px;font-weight:bold;display:inline-block;}.button{display:inline-block;background-color:#28a745;color:#fff;text-decoration:none;padding:12px 20px;border-radius:5px;font-size:16px;margin:10px 0;}.button:hover{background-color:#218838;}.footer{text-align:center;margin-top:20px;font-size:12px;color:#777;}.divider{border-bottom:1px solid #e0e0e0;margin:20px 0;}</style></head><body><div class='container'><div class='header'><img src='" . base_url() . "/assets/images/WCELogo.png' alt='WCE Logo'></div><div class='message'><p>Dear $name,</p><p>Your OTP for registration is: <span class='otp'>$otp</span></p><div class='divider'></div><p>Please use the following link to complete your personal details:</p><p><a href='$otp_verify_url' class='button'>Complete Registration</a></p><p>Thank you for registering with us. If you have any questions, feel free to contact our support team.</p></div><div class='footer'><p>&copy; " . date('Y') . " WCE. All rights reserved.</p></div></div></body></html>");
				
                if ($this->email->send()) {
					$this->session->set_userdata('candidate_id',$candidate_id);
                    $this->db->insert('candidate', $data);
                    $this->session->set_flashdata('success', 'Candidate Registered Successfully. OTP has been sent to the email.');
                } else {
                    $this->session->set_flashdata('error', 'Candidate Registered, but failed to send OTP email.');
                }

                redirect('admin/candidate/register_candidate');
            }
        }

        if ($param1 == "verify_otp") {
            $otp = $this->input->post('otp');
            $this->db->where('otp', $otp);
            $query = $this->db->get('candidate');
            $candidate = $query->row();

			if ($candidate->otp == $otp) {
				$this->session->set_flashdata('success', 'OTP Verified Successfully.');
				redirect('admin/candidate/personal_detail');
			} else {
				$this->session->set_flashdata('error', 'Invalid OTP token.');                    
				redirect('admin/candidate/otp_form');
			}
           
        }

        if ($param1 == "otp_form") {
			$token = $param2;
            $data['page_title'] = 'Candidate OTP Verify';
            $data['page_name'] = 'admin/candidate_otp_verify.php';
            $this->load->view('page', $data);
        }

        if ($param1 == "edit") {
            $data['page_title'] = 'Edit Candidate';
            $data['page_name'] = 'admin/edit_candidate.php';
			$data['candidate'] = $this->db->get_where('candidate',['id'=>$param2])->row();
			// echo "<pre>";
			// print_r($data); die;
            $this->load->view('page', $data);
        }

		if($param1=="personal_detail"){
			$data['page_title'] = 'Personal Detail';
			$this->load->view('admin/candidate_personal_detail.php');
		}

        if ($param1 == "") {
			if(empty($this->session->userdata('admin_is_login'))){
				redirect('login');
			}
            $data['page_title'] = 'Candidate';
            $data['page_name'] = 'admin/candidate.php';
            $data['candidate'] = $this->candidate_model->get_all_candidates();
            $this->load->view('page', $data);
        }
	}

	// public function user($param1 = '', $param2 = ''){
	// 	if ($param1 == "") {
	// 		$config = array();
	// 		$config['base_url'] = site_url('admin/user'); // Correct base URL
	// 		$config['total_rows'] = $this->db->count_all('user');
	// 		$config['per_page'] = 5; // Number of records per page
	// 		$config['uri_segment'] = 3; // Which segment contains the page number

	// 		// Bootstrap 4 pagination settings
	// 		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
	// 		$config['full_tag_close'] = '</ul></nav>';
	// 		$config['first_tag_open'] = '<li class="page-item">';
	// 		$config['first_tag_close'] = '</li>';
	// 		$config['last_tag_open'] = '<li class="page-item">';
	// 		$config['last_tag_close'] = '</li>';
	// 		$config['next_tag_open'] = '<li class="page-item">';
	// 		$config['next_tag_close'] = '</li>';
	// 		$config['prev_tag_open'] = '<li class="page-item">';
	// 		$config['prev_tag_close'] = '</li>';
	// 		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
	// 		$config['cur_tag_close'] = '</a></li>';
	// 		$config['num_tag_open'] = '<li class="page-item">';
	// 		$config['num_tag_close'] = '</li>';
	// 		$config['attributes'] = array('class' => 'page-link');

	// 		// Initialize pagination
	// 		$this->pagination->initialize($config);

	// 		// Get the current page number
	// 		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 		$offset = $page;

	// 		// Fetch data with limit and offset
	// 		$this->db->limit($config['per_page'], $offset);
	// 		$data['users'] = $this->db->get('user')->result_array();

	// 		// Check if data is retrieved
	// 		if (empty($data['users'])) {
	// 			log_message('error', 'No data found for the current page');
	// 		}

	// 		// Create pagination links
	// 		$data['pagination'] = $this->pagination->create_links();

	// 		$data['page_title'] = 'User';
	// 		$data['page_name'] = 'user/users.php';
	// 		$this->load->view('page', $data);
	// 	}
		
	// 	if($param1 == "add"){
	// 		$data['page_title'] = 'Add User';
	// 		$data['page_name'] = 'user/user_add.php';
	// 		$this->load->view('page', $data);
	// 	}

	// 	if($param1 == "add_user"){
	// 		$this->form_validation->set_rules('name', 'Name', 'required');
	// 		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
	// 		$this->form_validation->set_rules('password', 'Password', 'required|min_length[]');

	// 	}

	// }

	function manage_user($param1 = '', $param2 = ''){
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '5');
        if ($param1 == 'add'){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('mobile_no', 'Phone', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error',validation_errors());
				redirect('admin/manage_user');
			}else{
				$data['name']        = $this->input->post('name');
				$data['mobile_no']   = $this->input->post('mobile_no');
				$data['email']       = $this->input->post('email');
				$data['designation'] = $this->input->post('designation');
				$data['address']     = $this->input->post('address');
				$this->db->insert('user', $data);
				$insert_id = $this->db->insert_id();
				
				$data1['name']    = $this->input->post('name');
				$data1['email']    = $this->input->post('email');
				if(!empty($this->input->post('password')))
				{
					$data1['password']    = md5($this->input->post('password'));
				}
				$data1['user_id']    = $insert_id;
				$this->db->insert('admin_login', $data1);
	
				if(isset($_FILES['image']) && $_FILES['image']['name']!='')
				{
					if (!file_exists('uploads/user/'))
					{
						mkdir('uploads/user/', 0777, true);
					}
					move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/user/'.$insert_id.'.png');
				}
				
				$this->session->set_flashdata('success', 'User added successed');
				redirect('admin/manage_user');
			}
			
        }            

        if ($param1 == 'update'){
        
            $data['name']    = $this->input->post('name');
            $data['mobile_no']    = $this->input->post('mobile_no');
            $data['email']    = $this->input->post('email');
            $data['designation']    = $this->input->post('designation');
            $data['address']    = $this->input->post('address');
            $data['update_datetime'] = date('Y-m-d H:i:s');

            $this->db->where('user_id', $param2);
            $this->db->update('user', $data);
            
            $data1['name']    = $this->input->post('name');
            $data1['email']    = $this->input->post('email');
            $data1['password']    = md5($this->input->post('password'));
            // print_r($data1); die;
            $this->db->where('user_id', $param2);
            $this->db->update('admin_login', $data1);

            if(isset($_FILES['image']) && $_FILES['image']['name']!='')
            {
                if (!file_exists('uploads/user/'))
                {
                    mkdir('uploads/user/', 0777, true);
                }
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/user/'.$param2.'.png');
            }

            $this->session->set_flashdata('success', 'User update successed.');
            redirect('admin/manage_user');
        } 
        
        if($param1 == 'disable_user')
        {
            $this->db->where('user_id', $param2);
            $this->db->update('user', array('status' => '1'));
            
            $this->db->where('user_id', $param2);
            $this->db->update('admin_login', array('status' => '1'));
            
            $this->session->set_flashdata('success', 'User in active successed.');
            redirect('admin/manage_user');
        }
        if($param1 == 'enable_user')
        {
            $this->db->where('user_id', $param2);
            $this->db->update('user', array('status' => '0'));
            
            $this->db->where('user_id', $param2);
            $this->db->update('admin_login', array('status' => '0'));
            
            $this->session->set_flashdata('success', 'User active successed.');
            redirect('admin/manage_user');
        }
        
        $data['page_name']      = 'user/users.php';
        $data['page_title']     = 'User';
        $data['users'] = $this->db->where(array('status' => 0))->order_by('user_id', 'desc')->get('user')->result_array();
        $this->load->view('page', $data);
    }

 

}	
