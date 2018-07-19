<?php

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
		 $this->load->library('form_validation');
		$this->load->model('login_model');
		$this->load->library('upload');
    }
	
    
    public function index(){
        // If the user is validated, then this function will run
		#$date = $this->session->userdata('fname');
		#$this->load->view('login_home', $data);
		$this->home();
        echo 'Congratulations, you are logged in as .'.$this->session->userdata('fname');
        // Add a link to logout
        echo '<br /><a href="'.base_url().'index.php/home/do_logout">Logout Fool!</a>';
		//echo '<br /><a href="'.base_url().'index.php/home/home">Home</a>';
		
    }
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
    
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
	
	    public function home(){
			$data['first_name'] = $this->session->userdata('fname');
			$data['last_name'] = $this->session->userdata('lname');
			$data['user_id'] = $this->session->userdata('userid');
			$data['artical'] = $this->login_model->artical_data($data['user_id']);
			#echo "<pre>";
			#print_r($data);
			#exit;
			#print_r($this->session->userdata());
			#$data['name'] = 
			#echo "Name ".$name. " Lastname " .$last_name. "</br>";
			$this->load->view('login_home',$data);
			echo '<br /><a href="'.base_url().'index.php/home/do_logout">Logout Fool!</a>';
        #$this->session->sess_destroy();
        #redirect('login');
    }
	
	public function add_artical(){
		$data['first_name'] = $this->session->userdata('fname');
			$data['last_name'] = $this->session->userdata('lname');
			$data['user_id'] = $this->session->userdata('userid');
			$this->load->view('add_artical',$data);
			echo '<br /><a href="'.base_url().'index.php/home/do_logout">Logout Fool!</a>';
        #$this->session->sess_destroy();
        #redirect('login')
		
	}
	
	public function detete_artical(){
		#print_r($_POST);
		$this->login_model->detete_artical();
		redirect('home/home');
	}
	
	public function save_artical(){
		$data['user_id'] = $this->session->userdata('userid');
		#print_r($this->session->userdata());
		echo $this->input->post("artical_data");
		$this->login_model->save_artical($data['user_id']);
		#$data['name'] = 
		#$this->load->view('add_artical',$data);
		#echo '<br /><a href="'.base_url().'index.php/home/do_logout">Logout Fool!</a>';
        #$this->session->sess_destroy();
        redirect('home/home');
	}
		public function edit_artical(){	
			#print_r($_POST);
			$id = $this->input->post("artical_id");
			$data = $this->input->post("artical_data");
			 if (empty($id)){
				echo " ID is empty";
				exit;
			 } 
				if(is_numeric(!$id)){
					 echo "ID is empty";
				 exit;
				 }
			 if (empty($data)){
				 echo " Data is empty";
				 exit;
			 }
			$this->login_model->edit_artical();
			redirect('home/home');
		}
		
		public function per_details(){
			$this->load->view('personal_details');
		}
		
		public function per_data(){
			#print_r($_POST);
			/*
			$name = $this->input->post("name_id");
			$address = $this->input->post("address_id");
			$email_id = $this->input->post("email_id");
			$number = $this->input->post("number");
			*/
			$this->login_model->save_per_data();
			redirect('home/edit_per_details');
		}
		
		public function edit_per_details(){
			$data['per_data'] = $this->login_model->edit_per_data();
			$this->load->view('edit_personal_details', $data);
		}
		
		public function edit_per_data(){
			print_r($_POST);
			$data['per_edit_data'] = $this->login_model->per_edit_data();
			$this->load->view('personal_data_edit', $data);

		}
		
		public function personal_update_data(){
			#print_r($_POST);
			$this->login_model->personal_update_data();
			redirect('home/edit_per_details');
		}
		
		public function personal_detete_data(){
			#print_r($_POST);
			$this->login_model->personal_detete_data();
			redirect('home/edit_per_details');
		}
		
		public function all_student_attendance(){
			$data['all_student_data'] = $this->login_model->all_student_attendance();
			$this->load->view('all_student_attendance', $data);
		}
		
		public function all_students_list(){
			$data['students_list'] = $this->login_model->all_students_list();
			$this->load->view('mark_student_attendance', $data);
			#print_r($data);
			#echo "45216542165421";
		}
		public function mark_selected_attendance(){
			$this->login_model->mark_selected_attendance();
			redirect('home/all_student_attendance');
		}
		public function attendance_already_marked(){
			$value = $this->login_model->attendance_already_marked();
			print json_encode(array("ret_value"=> $value));
		}
		
		public function edit_student_attendance(){
			
			$data['edit_student_data'] = $this->login_model->edit_student_attendance();
			print_r($data['edit_student_data']);
			$this->load->view('edit_student_attendance', $data);
		}
		
		public function save_edit_attendance(){
			$this->login_model->save_edit_attendance();
			redirect('home/all_student_attendance');
		}
		
		public function delete_student_attendance(){
			
			$this->login_model->delete_student_attendance();
			redirect('home/all_student_attendance');
		}
		
		public function all_movie_list(){
			$data['movie_list'] = $this->login_model->all_movie_list();	
			$this->load->view('all_cinema', $data);
			#redirect('home/added_movie_data');
		}
		public function add_movie_data(){
			$this->load->view('add_movie_data');
			
		}
		
		public function added_movie_data(){
			
			$data = $this->login_model->added_movie_data();
			redirect('home/all_movie_list');
		}
		
		public function edit_movie_list(){
			$data['edit_movie_list'] = $this->login_model->edit_movie_list();
			$this->load->view('edit_movie_list', $data);
		}
		
		public function save_edit_movie_data(){
			
			$this->login_model->save_edit_movie_data();
			redirect('home/all_movie_list');
		}
		
		public function book_movie_list(){
			
			$data['book_movie_list'] = $this->login_model->book_movie_list();
			$this->load->view('book_movie_data', $data);
		}
		
		public function book_this_movie(){
			
			$data['already_booked_list'] = $this->login_model->already_booked_list();
			$this->load->view('book_this_movie', $data);
		}
		
		public function selected_movie_list(){
			
			$result = $this->login_model->selected_movie_list();
			if($result != true){
				echo "Unable to Book Ticket.";
				exit;
			}
				echo "Ticket book succesfuly.";
				#sleep(5);
			redirect('home/all_movie_list');
		}
 }
 
 ?>