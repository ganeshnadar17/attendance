<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
			parent::__construct();
			$this->load->helper('date');
    }
	
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
    
        // Prep the query
        $this->db->where('user_name', $username);
		$this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('login_data');
		$row = $query->row();
		
        // Let's check if there are any results
		if($row)
        #if(1 == 1)
        {
            // If there is a user, then create session data
            #$row = $query->row();
            $data = array(
                    'userid' => $row->id,
                    'fname' => $row->name,
                    'lname' => $row->last_name,
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
	public function artical_data($user_id){
		
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("artical");
		$result = $query->result_array();

		return $result;
	}
	
		public function save_artical($user_id){
		$artical = $this->input->post("artical_data");
		$query = $this->db->query("Insert into artical (user_id, artical_user) values ($user_id, '$artical')");
		return true;
	}
	
	public function edit_artical(){
		
		#print_r($_POST);
		$id = $this->input->post("artical_id");
		$data = $this->input->post("artical_data");
		$user_id = $this->session->userdata('userid');
		$this->db->set('artical_user', $data);
		$this->db->where('id', $id);
		$this->db->where('user_id', $user_id);
		$this->db->update('artical');
		#print_r ($this->db->last_query());
		return true;
		
	}
	public function detete_artical(){
		#print_r($_POST);
		$id = $this->input->post("user_id");
		$user_id = $this->session->userdata('userid');
		$this->db->where('id', $id);
		$this->db->where('user_id', $user_id);
		$this->db->delete('artical');
		#print_r ($this->db->last_query());
		return true;
	}
	
	public function save_per_data(){
		
		$data['name'] = $this->input->post("name");
		$data['address'] = $this->input->post("address");
		$data['emailid'] = $this->input->post("email_id");
		$data['number'] = $this->input->post("number");
		$data['age'] = $this->input->post("age");
		$data['language'] = implode("|", $this->input->post("language"));
		$data['gender'] = $this->input->post("gender");
		$user_id = $this->session->userdata('userid');
		if(($_FILES['fileToUpload']['name']) != ''){
			$upload = $this->upload_file($_FILES, $user_id);
			if($upload["err_code"] == 0){
				print($upload["err_msg"]);
				exit;
			}
			$data['upload_image'] = $upload['file_name'];
		}
		$this->db->insert('per_data', $data);
		#print_r ($this->db->last_query());
		#exit;
		return true;
		
	}
	public function edit_per_data(){
		$user_id = $this->session->userdata('userid');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("per_data");
		//print_r ($this->db->last_query());
		$result = $query->result_array();
		return $result;
	}
	
	public function per_edit_data(){
		$data = $this->input->post("user_id");
		$this->db->where('id', $data);
		$query = $this->db->get("per_data");
		#print_r ($this->db->last_query());
		$result = $query->result_array();
		#print_r($result);
		return $result;
	}
	
	public function personal_update_data(){
		#print_r($_POST);	
		$data['name'] = $this->input->post("name");
		$data['emailid'] = $this->input->post("emailid");
		$data['age'] = $this->input->post("age");
		$data['number'] = $this->input->post("number");
		$data['language'] = implode("|",$this->input->post("language"));
		
		$user_id = $this->session->userdata('userid');
		if(($_FILES['fileToUpload']['name']) != ''){
			$upload = $this->upload_file($_FILES, $user_id);
			if($upload["err_code"] == 0){
				print($upload["err_msg"]);
				exit;
			}
			$data['upload_image'] = $upload['file_name'];
		}
		
		
		$id = $this->input->post("id");
		$this->db->where('id', $id);
		$this->db->update('per_data', $data);
		#print_r ($this->db->last_query());
		return true;
	}
	
	public function personal_detete_data(){
		#print_r($_POST);
		$id = $this->input->post("user_id");
		$user_id = $this->session->userdata('userid');
		$this->db->where('id', $id);
		$this->db->where('user_id', $user_id);
		$this->db->delete('per_data');
		#print_r ($this->db->last_query());
		#exit;
		return true;
	}
	public function all_students_list(){
		#print_r($_POST);
		#exit;
		$user_id = $this->session->userdata('userid');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("per_data");
		#print_r ($this->db->last_query());
		$result = $query->result_array();
		#print_r($result['1']['name']);
		return $result;
		
	}
	public function mark_selected_attendance(){
		
		
		$data['student_id'] = implode("|", $this->input->post('student_present'));
		if(!$data['student_id']){
			echo "Attendance not selected";
			exit;
		}
		$data['atten_date'] = $this->input->post('persent_date');
		$data['user_id'] = $this->session->userdata('userid');
		$this->db->insert('attendance', $data);
		print_r ($this->db->last_query());
		return true;
	}
	public function attendance_already_marked(){
		
		$data['atten_date'] = $this->input->post('persent_date');
        $this->db->where('atten_date', $data['atten_date']);
        $query = $this->db->get('attendance');
		$row = $query->row();
		if($row){
			return 1;
		}else{
			return 0;
		}
	}
	
	public function all_student_attendance(){
		
		$user_id = $this->session->userdata('userid');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("attendance");
		#print_r ($this->db->last_query());
		$result = $query->result_array();
		print_r($result);
		return $result;
	}
	
	public function edit_student_attendance(){
		
		$data = $this->input->post("atten_id");
		$this->db->where('atten_id', $data);
		$query = $this->db->get("attendance");
		$result = $query->result_array();
		#echo "<pre>";print_r($result);exit;
		
		$user_id = $this->session->userdata('userid');
		$this->db->select("id,name");
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("per_data");
		#print_r ($this->db->last_query());
		$result[0]['all_users'] = $query->result_array();
		foreach($result[0]['all_users'] as $k1=>$v1){
			$result[0]['all_users'][$k1]['user_present']=0;
		}		
		$present_ids = explode("|",$result[0]['student_id']);
		foreach($present_ids as $k=>$v){
			foreach($result[0]['all_users'] as $k1=>$v1){
				if($v == $v1['id']){
					$result[0]['all_users'][$k1]['user_present']=1;
				}
			}
			#print_r($v)."<br/>";
		}
		#echo "<pre>";print_r($result);exit;
		#print_r ($this->db->last_query());
		
		return $result;
	}
	public function save_edit_attendance(){
		
		$data['atten_id'] = $this->input->post("atten_id");
		$user_id = $this->session->userdata('userid');
		$data['student_id'] = implode("|", $this->input->post("student_present"));
		print_r($data);
		
		$this->db->where('atten_id', $data['atten_id']);
		$this->db->where('user_id', $user_id);
		$this->db->update('attendance', $data);
		return true;
		
	}
	
	
	public function delete_student_attendance(){
		
		$id = $this->input->post("user_id");
		$user_id = $this->session->userdata('userid');
		$this->db->where('atten_id', $id);
		$this->db->where('user_id', $user_id);
		$this->db->delete('attendance');
		#print_r ($this->db->last_query());
		#exit;
		return true;
	}
	
	public function added_movie_data(){
		
		$data['from_date'] = $this->input->post("from_date");
		$data['to_date'] = $this->input->post("to_date");
		$data['movie_name'] = $this->input->post("movie_name");
		$data['user_id'] = $this->session->userdata('userid');
		$user_id = $this->session->userdata('userid');
		if(($_FILES['fileToUpload']['name']) != ''){
			$upload = $this->upload_file($_FILES, $user_id);
			if($upload["err_code"] == 0){
				print($upload["err_msg"]);
				exit;
			}
			$data['movie_image'] = $upload['file_name'];
		}
		
		$this->db->insert('movie_list', $data);
		#print_r ($this->db->last_query());
		return true;
	}
	
	public function all_movie_list(){
		
		$user_id = $this->session->userdata('userid');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get("movie_list");
		#print_r ($this->db->last_query());
		$result = $query->result_array();
		#print_r($result);
		return $result;
		
	}
	
	public function edit_movie_list(){
		#print_r($_POST);
		$user_id = $this->session->userdata('userid');
		$movie_id = $this->input->post("movie_id");
		$this->db->where('user_id', $user_id);
		$this->db->where('movie_id', $movie_id);
		$query = $this->db->get("movie_list");
		#print_r ($this->db->last_query());
		$result = $query->result_array();
		#print_r($result);
		return $result;
	}
	
	public function save_edit_movie_data(){
		#print_r($_POST);
		#print_r($_FILES);
		$user_id = $this->session->userdata('userid');
		if(($_FILES['fileToUpload']['name']) != ''){
			$upload = $this->upload_file($_FILES, $user_id);
			if($upload["err_code"] == 0){
				print($upload["err_msg"]);
				exit;
			}
			$data['movie_image'] = $upload['file_name'];
		}
		
		$data['from_date'] = $this->input->post("from_date");
		$data['to_date'] = $this->input->post("to_date");
		$data['movie_name'] = $this->input->post("movie_name");
		
		$this->db->set($data);
		$this->db->where('movie_id', $this->input->post("movie_id"));
		$this->db->where('user_id', $user_id);
		$this->db->update('movie_list');
		#print_r ($this->db->last_query());
		return true;
	}
	
	public function book_movie_list(){
		
		$user_id = $this->session->userdata('userid');
		$date = date('Y-m-d');
				
		$this->db->where('user_id', $user_id);
		$this->db->where('from_date <', $date);
		$this->db->where('to_date >', $date); 
		$query = $this->db->get("movie_list");
		$result = $query->result_array();
		return $result;
	}
	
	public function selected_movie_list(){
		
		$data['user_id'] = $this->session->userdata('userid');
		$data['movie_id'] = $this->input->post("movie_id");
		$data['selected_list'] = implode(",",$this->input->post("selected_movie_list"));
		print($data['selected_list']);
		$data['status'] = 1;
		$this->db->insert('movie_booking', $data);
		return true;
	}
	
	public function already_booked_list(){
		
		$data['user_id'] = $this->session->userdata('userid');
		$data['movie_id'] = $this->input->post("movie_id");
		
		$this->db->select("movie_name,movie_image");
		$this->db->where('user_id', $data['user_id']);
		$this->db->where('movie_id ', $data['movie_id']);
		$query = $this->db->get("movie_list");
		$result = $query->result_array();
		
		
		$this->db->select("id,movie_id,user_id,selected_list");
		$this->db->where('user_id', $data['user_id']);
		$this->db->where('movie_id ', $data['movie_id']);
		$query = $this->db->get("movie_booking");
		
		$result['already_booked_list'] = $query->result_array();
		#echo  $this->db->last_query();	
		return $result;
		
		#echo "<pre>"; print_r($result1);
		#exit;
		
	}
	
	
	
	
	
	public function upload_file($file_name, $user_id){
		
		$time = time();
		$errormsg = "";
		$user_id = $this->session->userdata('userid');
		$target_dir = "uploads/";
		$upload_image = md5($time.$user_id).".".strtolower(pathinfo($file_name["fileToUpload"]['name'],PATHINFO_EXTENSION));
		$target_file = $target_dir . $upload_image;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		
		if($file_name["fileToUpload"]["error"] == 1){
			$errormsg = "File not uploaded properly.";
			$uploadOk = 0;
			return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
		}
		
		if(!$imageFileType) {
			$check = getimagesize($file_name["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$errormsg = "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$errormsg = "File is not an image.";
				$uploadOk = 0;
				return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			$errormsg = "Sorry, file already exists.";
			$uploadOk = 0;
			return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
		}
		// Check file size
		if ($file_name["fileToUpload"]["size"] > 5000000) {
			$errormsg = "Sorry, your file is too large.";
			$uploadOk = 0;
			return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
		}
		// Allow certain file formats
		if($imageFileType != "jpg") {
			$errormsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
			return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$errormsg = "Sorry, your file was not uploaded.";
			return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($file_name["fileToUpload"]["tmp_name"], $target_file)) {
				$errormsg = "The file ". basename( $file_name["fileToUpload"]["name"]). " has been uploaded.";
				return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
			} else {
				$errormsg = "Sorry, there was an error uploading your file.";
				$uploadOk = 0;
				return array("err_code" => $uploadOk, "err_msg" => $errormsg, "file_name" => $upload_image);
			}
		}
	}
}
?>