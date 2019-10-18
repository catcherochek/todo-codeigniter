<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Users extends CI_Controller {  
    public function __construct()
    {
    	//loading neccesary objects
            parent::__construct();
            $this->load->model('users_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
		//upload configurations
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']     = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
        $this->load->library('upload');
        $this->upload->initialize($config);

    }
    public function login()  
    {

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->view('header');  
        $this->load->view('login');
		$this->load->view('footer');
    }  
    public function sign_up(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('header'); 
        $this->load->view('signup');
		$this->load->view('footer');
    }

    public function login_validation(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]',
            array(
                    'required'      => 'You have not provided %s.',
            )
            );
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run())  
            {  
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                );
                ;
                $data['user'] = $this->users_model->login_user($data);
                if ($data['user'])  
                {  
                    $data = array(
                        'firstname' => $data['user'][0]['firstname'],
                        'lastname' => $data['user'][0]['lastname'],
                        'user' => $data['user'][0]['username'],
                        'email' => $data['user'][0]['email'],
                        'role' => $data['user'][0]['role'],
                        'user_id' => $data['user'][0]['id'],
						'birth' => $this->input->post('birth')
                    );
                    $this->session->set_userdata($data);
                        $username = $data['user'];
                        redirect('home');
                } else {  
                    $this->session->set_flashdata('error_msg', 'Provide valid credentials.');
                    $this->load->view('header');
                    $this->load->view('login');
					$this->load->view('footer');
                }
            }   
                else {  
                //$this->session->set_flashdata('error_msg', 'Provide valid credentials.');
                $this->load->view('header');
                $this->load->view('login');
				$this->load->view('footer');
            }  


    }


    public function signup_validation()  
    {  
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]|is_unique[users.username]|callback_regex_check',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
            );
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('password_1', 'Password', 'required');
            $this->form_validation->set_rules('password_2', 'Password Confirmation', 'required|matches[password_1]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));

        if ($this->form_validation->run())  
        {  
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password_1')),
                'email' => $this->input->post('email'),
				'birth' => $this->input->post('birth'),
				'role'=> 'user',

            );
			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('header');
				$this->load->view('signup',$error);
				$this->load->view('footer');
				//$this->load->view('upload_form', $error);
			}
			else
			{
				//$data = array('upload_data' => $this->upload->data());

				//$this->load->view('upload_success', $data);
			}
            $this->users_model->register_user($data);
            $this->session->set_flashdata('success_msg', 'Registered successfully. Now login to your account.');
            redirect('users/login');
         }   
            else {  
            $this->load->view('header');
            $this->load->view('signup');
				$this->load->view('footer');
        }  
         
    } 
    public function profile($user_profile){
        $data['user'] = $this->users_model->profile($user_profile);
        if ($data['user'])  
        {  
            $data = array(
                'firstname' => $data['user'][0]['firstname'],
                'lastname' => $data['user'][0]['lastname'],
                'username' => $data['user'][0]['username'],
                'email' => $data['user'][0]['email'],
				'role' => $data['user'][0]['role'],
				'birth' => $data['user'][0]['birth'],
				'userfile' => $data['user'][0]['userfile']
            );
        $this->load->view('header');
        $this->load->view('profile', $data);
			$this->load->view('footer');
    }else{
        echo "User does not exist";
    }
}
    public function logout(){
        $this->session->sess_destroy();
        redirect('users/login');
    }


	public function regex_check($str)
	{
		$d = preg_match('/^[a-zA-Z-_.^]+$/', $str);
		if ($d)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('regex_check', 'The %s field is not valid!');
			return FALSE;
		}
	}

}
?>
