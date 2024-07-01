<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2050 05:00:00 GMT");
    }


    public function index() {
		if($this->session->userdata('admin_is_login'==1)){
			redirect('dashboard');
		}
		$this->load->view('login/login');
    }

	public function authenticate() {
        // Set form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the login view with errors
            $this->load->view('login/login');
        } else {
            // Validation passed, process the login
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            // Fetch the user from the database
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get('admin_login');

            if ($query->num_rows() == 1) {
                // Authentication successful, set session data
                $data = $query->row();
                $this->session->set_userdata('admin_id', $data->login_id);
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('admin_name', $data->name);
				$this->session->set_userdata('admin_is_login', '1');
				$this->db->where('login_id',$data->login_id);
				$this->db->update('admin_login',array(
					'last_login' => date('Y-m-d H:i:s')
				));
                redirect(base_url('dashboard'));
            } else {
                // Authentication failed, reload the login view with an error message
                $data['error'] = 'Invalid email or password';
                $this->load->view('login/login', $data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('admin_name');
        $this->session->sess_destroy();
        redirect('login');
    }


}

