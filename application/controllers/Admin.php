<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<span class="mdl-textfield__error" style="color:red; visibility:visible">','</span>');
		date_default_timezone_set('Asia/Kolkata'); 
		
		$this->load->model(array('Mainmodel'));
		$this->load->model('Templates','Templates'); 
		$this->load->helper('common_helper');
		$this->load->library('email');
	
			
	}
	public function index()
	{
        define('admin_session_name', 'admin_login');
	}
	public function admin()
	{
		$this->load->view('index.php'); 
	}
	public function send_email()
	{
	    send_email('vishalezacus@gmail.com','test','hello');
	}
    
  
	
	
	
	
	public function login()
    {
    	
    	$data['page_title'] = 'Admin Login';

		if ($this->input->post('login-btn')=='admin-login') 
		{
			$this->form_validation->set_rules('admin_username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('admin_password', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE)
			{ 
				redirect('Admin/login'); 
			}
			else
			{
				$username = $this->input->post('admin_username');
				$password = base64_encode(base64_encode($this->input->post('admin_password')));
				
				$result = $this->Mainmodel->check_valid_login($username,$password);
				
				if ($result!=False)
				{ 
					$username = $this->input->post('admin_username');
					if ($result != false)
					{
						$session_data = array(
							'username' => $result->admin_login_id,
							'admin_id' => $result->admin_id,
							'first_name' => $result->admn_first_name,
							'last_name' => $result->admin_last_name,
							'admin_type' => $result->admin_type,
							'image' => $result->image
						);
						 
						$this->session->set_userdata(admin_session_name, $session_data);
 						
						if(!empty($_POST["remember-me"])) 
						{
						
							setcookie ("adminUsername",$_POST["admin_username"],time()+ (10 * 365 * 24 * 60 * 60));
							
							setcookie ("adminPassword",$_POST["admin_password"],time()+ (10 * 365 * 24 * 60 * 60));
						} 
						else 
						{
							if(isset($_COOKIE["adminUsername"])) 
							{
								setcookie ("adminUsername","");
								if(isset($_COOKIE["adminPassword"])) 
								{
									setcookie ("adminPassword","");
								} 
							}  
						}

 						$this->session->set_flashdata("success","Login successfully"); 
						redirect('Admin/dashboard'); 
					}
					else
					{
					    
					}
				}
				else 
				{
					$this->session->set_flashdata("fail","Invalid Username or Password");  
					redirect('Admin/login'); 
				}
			}
		} 
		$this->load->view('admin/index', $data);
    }

    public function logout() //Akshay
	{ 
		$session_data = array(
		'username' => ''
		);
		$session_data = array(
							
							'username' => "",
							'admin_id' => "",
							'first_name' => "",
							'last_name' => "",
							'admin_type' => ""
						);
		$this->session->unset_userdata(admin_session_name, $session_data);
		 
		$this->session->set_flashdata("success","Logout successfully"); 
 
		redirect('Admin/login'); 
	} 
	
    public function dashboard()
    {
    	if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        
        
       $data['page_title']="डॅशबोर्ड";
    
          
    	$data['main_content']   = "dashboard"; 

    	$this->load->view('admin/includes/template',$data);
    }

    public function change_password()//Akshay
	{
		if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'Change Password';
		$data['main_content'] = "change_password";   

		$id = $this->session->userdata(admin_session_name)['admin_id'];  
		$admin = $this->db->get_where('admin_users',array('admin_id' =>$id))->row();   

		if ($this->input->post('profile-btn')=='profile-submit') 
		{  
			$this->form_validation->set_rules('curr_password', 'current password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'new password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('con_password', 'confirm password', 'trim|required|xss_clean|matches[new_password]'); 
			 
			if ($this->form_validation->run() == TRUE)
			{
				if($admin->admin_login_password==base64_encode(base64_encode($this->input->post('curr_password'))))
				{ 
					$profile = array(
							'admin_login_password' =>base64_encode(base64_encode($this->input->post('con_password')))
						);
					$update = $this->Mainmodel->update($profile,array('admin_id'=>$id),"admin_users");
					if($update >0)
					{
						$this->session->set_flashdata("success","Password updated successfully"); 
						//$email = $student_details->student_email;
						$subject = "Password change mail ";
						$mail_body = $this->Templates->change_password_success($admin->admn_first_name,$this->input->post('con_password'));
						
						$send_mail = $this->Mainmodel->send_email($admin->admin_email_id,"","",$subject,$mail_body,"");
					}
					else
					{
						$this->session->set_flashdata("fail","Password Not updated"); 
					}
					redirect('admin/change_password');
				}
				else 
				{ 
					$this->session->set_flashdata("fail",'Invalid current password');  
					redirect('admin/change_password');	
				} 
			}
			else 
			{    
				$this->session->set_flashdata("fail",'confirm password not match');  
				redirect('admin/change_password');
			} 
		}	 	

		$this->load->view('admin/includes/template',$data);	
	}
	
    public function forgot_password()
	{
	    
		$data['page_title']='Forgot Password';
		$data['main_content']='forgot_password';
		if ($this->input->post('profile')=='profile') 
		{
		 $this->form_validation->set_rules('admin_email_id','email','trim|required|valid_email');
		
		 if($this->form_validation->run()==TRUE)
		 {
			$email = $this->input->post('admin_email_id');
			$check = $this->Mainmodel->select_single_row('pv_admin_users',array('admin_email_id'=>$email));
			if(!empty($check))
			{
				$name = $check->admn_first_name;
				$message= '<html><body>			
				<div><p>Dear '.$name.',<br><br>Your Login credentials of  site are changed :<br><br>
				<strong>Email ID :</strong>'.$email.'<br>
				<strong>Name :</strong>'.$check->admn_first_name.'<br>
				<strong>Password : </strong>'.base64_decode(base64_decode($check->admin_login_password)).'<br><br>
				Thank You<br><br>
				</p>						
				</div>
				</html>	';
				$this->load->library('email');
				$this->email->from('');
				$this->email->to($email);
				$this->email->subject('Password Recovery From ');
				$this->email->set_mailtype('html');
				$this->email->message($message);
			
				if($this->email->send())
				{
					$this->session->set_flashdata("success","Password Recovery Send On Your Email Id"); 
					 redirect('admin/forgot_password');
				}
				else
				{
					$this->session->set_flashdata("fail","Invalid Email id"); 
				 redirect('admin/forgot_password');
				}
			}
			else
			{
				
				$this->session->set_flashdata("fail","Invalid Email id"); 
			 redirect('admin/forgot_password');
			}
		 }	
		 
		}
		$this->load->view('admin/forgot_password', $data);
	}
	
	
	
	public function services_add()
	{   
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'Add Section';
		$data['main_content'] = "news-add"; 

		if ($this->input->post('news')=='news') 
		{ 
			$this->form_validation->set_rules('cat_name', 'Title', 'trim|required|xss_clean');
		    $img1 = '';
			if ($this->form_validation->run() == TRUE)
			{ 	
			    if (!empty($_FILES['img1']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img1']['name'], ".");
					$size = $_FILES['img1']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img1 = $new_name.$extention;
						$uploaddir1 = $folder . $img1;
						move_uploaded_file($_FILES['img1']['tmp_name'], $uploaddir1); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/services_list');
					} 
				}
			
				$news_data = array('news_title' =>ucwords($this->input->post('cat_name')),
									 
									  'news_description'=>ucwords($this->input->post('cat_description')),
									  'img1'=>$img1,
									  'news_added_date'=>date('Y-m-d H:i:s'),
									  'news_status'=>'Active'
									  ); 
										
				$this->Mainmodel->insert('news_updates',$news_data);

				$this->session->set_flashdata("success","Services added successfully"); 
					redirect('admin/services_list'); 
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
				redirect('admin/news_add'); 
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}
	public function services_edit()
	{   
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
    	
		$data['page_title'] = 'Edit Section';
		$data['main_content'] = "news-edit"; 
		$id = $this->uri->segment(3);
	
		$data['meter_data'] = $this->db->get_where('news_updates',array('news_id' =>$id))->row();

		if ($this->input->post('cat-btn')=='cat-submit') 
		{ 

			$this->form_validation->set_rules('cat_name', 'Title', 'trim|required|xss_clean');
			$img1 = '';$img2 = '';$img3 = '';$img4 = '';

			if ($this->form_validation->run() == TRUE)
			{ 		
				
				
				
				$cat_data = array('news_title' =>ucwords($this->input->post('cat_name')),
									  
									  'news_description'=>ucwords($this->input->post('cat_description')),
									  
									  ); 							
				$this->db->where('news_id',$id);
				$this->db->update('news_updates',$cat_data);
				$this->session->set_flashdata("success","Section Update successfully"); 
				redirect('admin/services_list'); 
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
				redirect('admin/services_list'); 
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}
	
	public function services_list()
	{ 
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'Section List';
		$data['main_content'] = "news-list";

		$data['category_data'] = $this->db->get_where('pv_news_updates',array('news_status!=' =>'Deleted'))->result();

		$this->load->view('admin/includes/template',$data); 
	}
    public function site_setting()
	{   
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'Edit Site Setting';
		$data['main_content'] = "site-setting"; 
		
	
		$data['meter_data'] = $this->db->get_where('pv_site_setting',array('id' =>1))->row();

		if ($this->input->post('cat-btn')=='cat-submit') 
		{ 

			$this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
			$img1 = '';$img2 = '';$img3 = '';$img4 = '';$img5 = '';

			if ($this->form_validation->run() == TRUE)
			{ 		
				if (!empty($_FILES['img1']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img1']['name'], ".");
					$size = $_FILES['img1']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img1 = $new_name.$extention;
						$uploaddir1 = $folder . $img1;
						move_uploaded_file($_FILES['img1']['tmp_name'], $uploaddir1); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/site_setting');
					} 
				}
				else
				{
					$img1= $data['meter_data']->image1;
				}
				
				if (!empty($_FILES['img2']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img2']['name'], ".");
					$size = $_FILES['img2']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img2 = $new_name.$extention;
						$uploaddir2 = $folder . $img2;
						move_uploaded_file($_FILES['img2']['tmp_name'], $uploaddir2); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/site_setting');
					} 
				}
				else
				{
					$img2= $data['meter_data']->image2;
				}
				
				if (!empty($_FILES['img3']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img3']['name'], ".");
					$size = $_FILES['img3']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img3 = $new_name.$extention;
						$uploaddir3 = $folder . $img3;
						move_uploaded_file($_FILES['img3']['tmp_name'], $uploaddir3); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/site_setting');
					} 
				}
				else
				{
					$img3= $data['meter_data']->image3;
				}
				
				if (!empty($_FILES['img4']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img4']['name'], ".");
					$size = $_FILES['img4']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img4 = $new_name.$extention;
						$uploaddir4 = $folder . $img4;
						move_uploaded_file($_FILES['img4']['tmp_name'], $uploaddir4); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/site_setting');
					} 
				}
				else
				{
					$img4= $data['meter_data']->image4;
				}
				
				if (!empty($_FILES['img5']['name']))	
				{ 
					$folder = "assets/images/event/";
					$extention = strrchr($_FILES['img5']['name'], ".");
					$size = $_FILES['img5']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img5 = $new_name.$extention;
						$uploaddir5 = $folder . $img5;
						move_uploaded_file($_FILES['img5']['tmp_name'], $uploaddir5); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/site_setting');
					} 
				}
				else
				{
					$img5= $data['meter_data']->image5;
				}
				
				
				
				$cat_data = array('email' =>($this->input->post('email')),
									  'phone'=>$this->input->post('phone'),
									  'address'=>$this->input->post('address'),
									  'title'=>$this->input->post('title'),
									  'facebook'=>$this->input->post('facebook'),
									  'instagram'=>$this->input->post('instagram'),
									  'twitter'=>$this->input->post('twitter'),
									  'linkdin'=>$this->input->post('linkdin'),
									  'tagline'=>$this->input->post('tagline'),
									  'telephone'=>$this->input->post('telephone'),
									  'email2'=>$this->input->post('email2'),
									  'short_about'=>$this->input->post('short_about'),
									  'youtube_link'=>$this->input->post('youtube_link'),
									  'image1'=>$img1,
									  'image2'=>$img2,
									  'image3'=>$img3,
									  'image4'=>$img4,
									  'image5'=>$img5,
									  
									  ); 							
				$this->db->where('id',1);
				$this->db->update('pv_site_setting',$cat_data);
				$this->session->set_flashdata("success","Site Details Update successfully"); 
				redirect('admin/site_setting'); 
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
				redirect('admin/site_setting'); 
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}
	
	public function banner_list()
	{
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = "Gallery List";
		$data['banners']=$this->Mainmodel->select_results_where1('banner',array('status!='=>'Deleted'),'banner_id desc');
		$data['main_content'] = "all-banner";
		$this->load->view('admin/includes/template',$data);
	}
	
	public function add_banner()
    {
    	if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
    	$data['page_title']='Add Gallery';
		$data['main_content'] = "add_banner"; 
 
		if ($this->input->post('submit')=='submit') 
		{ 
			
			$this->form_validation->set_rules('banner_title', 'banner_title', 'trim');
		
			
			
			if($_FILES['banner_image']['name']=="")
			{
				$this->form_validation->set_rules('banner_image','Image','required');
			}
			if ($this->form_validation->run() == TRUE)
			{ 	
				if($_FILES['banner_image']['name']!="")
				{

			      $member_image = $this->Mainmodel->doc_upload(6,'banner_image','assets/images/banner');
		        }

					 
				$data = array(
					                  'banner_title' =>$this->input->post('banner_title'), 
									  'banner_image'=> $member_image,
									  'status'=> 'Active',
									  'added_date'=> date("Y-m-d h:i:s"),
									  
									  
							); 	
				$this->Mainmodel->insert('banner',$data);

				$this->session->set_flashdata("success","Image Added successfully"); 
				redirect('admin/banner_list');
			}
			
		}

		$this->load->view('admin/includes/template',$data); 
    }
    
    
    public function edit_banner()
    {
        if (!$_SESSION[admin_session_name]) 
        {
            redirect('admin/login');
        }
    
        $id = $this->uri->segment(3);
        $data['page_title'] = 'Edit Banner';
        $data['main_content'] = "edit-banner"; 
        $data['details'] = $this->Mainmodel->select_single_row('banner', ['banner_id' => $id, 'status!=' => 'Deleted']);
        $old_data = $data['details']; // जुनी माहिती
        $journal_image = $old_data->banner_image;
    
        if ($this->input->post('submit') == 'submit') {
            $this->form_validation->set_rules('banner_title', 'banner_title', 'trim');
    
            if ($this->form_validation->run() == TRUE) {
                if (!empty($_FILES['banner_image']['name'])) {
                    // ✅ नवीन फाईल upload झाली
                    $new_image = $this->Mainmodel->doc_upload(6, 'banner_image', 'assets/images/banner');
                    
                    if ($new_image) {
                        // ✅ जुनी फाईल delete करा
                        $folder = "assets/images/banner/";
                        if (!empty($old_data->banner_image) && file_exists($folder . $old_data->banner_image)) {
                            unlink($folder . $old_data->banner_image);
                        }
                        $journal_image = $new_image;
                    } else {
                        $journal_image = $old_data->banner_image;
                    }
                } else {
                    $journal_image = $old_data->banner_image;
                }
    
                $update_data = array(
                    'banner_title' => $this->input->post('banner_title'),
                    'banner_image' => $journal_image,
                    'status'       => 'Active',
                    'added_date'   => date("Y-m-d H:i:s"),
                );
    
                $update = $this->Mainmodel->update($update_data, ['banner_id' => $id], 'banner');
    
                if ($update) {
                    $this->session->set_flashdata('success', 'Banner Updated successfully');
                } else {
                    $this->session->set_flashdata('fail', 'Sorry Not Updated');
                }
                redirect('admin/banner_list');
            }
        }
    
        $this->load->view('admin/includes/template', $data);
    }

 
    
    public function delete_banner()
    {
        if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        $id = $this->uri->segment(3);
        $banner_data = $this->Mainmodel->select_single_row('banner', array('banner_id' => $id));
    
        if ($banner_data) 
        {
            // ✅ जुनी image delete करा
            $folder = "assets/images/banner/";
            if (!empty($banner_data->banner_image) && file_exists($folder . $banner_data->banner_image)) {
                unlink($folder . $banner_data->banner_image);
            }
    
            // ✅ DB मधून पूर्ण record delete करा
            $deleted = $this->db->delete('banner', array('banner_id' => $id));
 
            // (जर तुमच्या Mainmodel मध्ये delete() function नसेल तर खालील वापरा:)
            // $this->db->where('banner_id', $id);
            // $deleted = $this->db->delete('banner');
    
            if ($deleted) {
                $this->session->set_flashdata('success', 'Banner Deleted Successfully..');
            } else {
                $this->session->set_flashdata('fail', 'Sorry Not Deleted..');
            }
        } 
        else 
        {
            $this->session->set_flashdata('fail', 'Banner Not Found..');
        }
    
        redirect($_SERVER['HTTP_REFERER']);
    }

	
	// Slider
	public function slider()
	{ 
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'स्लायडर';
		$data['main_content'] = "slider";

		$data['category_data'] = $this->db->get_where('slider',array('status'=>'Active'),'')->result();

		$this->load->view('admin/includes/template',$data); 
	} 
	 
    public function slider_add()
	{   
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'ऍड स्लायडर';
		$data['main_content'] = "slider_add"; 
		if($this->input->post('slider')=='slider') 
		{ 
			$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');		
			$img1 = '';

			if ($this->form_validation->run() == TRUE)
			{ 		
				if (!empty($_FILES['image']['name']))	
				{ 
					$folder = "assets/images/animal/";
					$extention = strrchr($_FILES['image']['name'], ".");
					$size = $_FILES['image']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img1 = $new_name.$extention;
						$uploaddir1 = $folder . $img1;
						move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir1); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/slider');
					} 
				}

				$data = array('title' =>ucwords($this->input->post('title')),
				                      'sub_title'=>$this->input->post('sub_title'),				
									  'image'=>$img1,
									  'added_date'=>date('Y-m-d H:i:s'),
									  'status'=>'Active'
									  ); 
										
				$this->Mainmodel->insert('slider',$data);

				$this->session->set_flashdata("success","Slider added successfully"); 
				redirect('admin/slider'); 
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
				redirect('admin/slider'); 
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}	 	
	public function slider_edit()
    {    
        if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        $data['page_title'] = 'एडिट  स्लायडर';
        $data['main_content'] = "slider_edit"; 
        $id = $this->uri->segment(3);
        $data['meter_data'] = $this->db->get_where('pv_slider',array('id' =>$id))->row();
    
        if ($this->input->post('slider')=='slider') 
        { 
            $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
            $img1 = '';
    
            if ($this->form_validation->run() == TRUE)
            {       
                if (!empty($_FILES['image']['name']))   
                { 
                    $folder = "assets/images/animal/";
                    $extention = strrchr($_FILES['image']['name'], ".");
                    $size = $_FILES['image']['size']/1024;
                    $ex = strtoupper($extention);
    
                    if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
                    {
                        $txn_id=rand();
                        $new_name = time().'-'.$txn_id;
                        $img1 = $new_name.$extention;
                        $uploaddir1 = $folder . $img1;
    
                        // ✅ जुना फोटो delete करा
                        if (!empty($data['meter_data']->image) && file_exists($folder.$data['meter_data']->image)) {
                            unlink($folder.$data['meter_data']->image);
                        }
    
                        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir1); 
                    }
                    else
                    {
                        $this->session->set_flashdata("fail",'Invalid file');  
                        redirect('admin/slider');
                    } 
                }
                else
                {
                    $img1= $data['meter_data']->image;
                }               
    
                $updateData = array(
                    'title' => ucwords($this->input->post('title')),
                    'sub_title' => $this->input->post('sub_title'),
                    'image' => $img1,
                    'modified_date' => date('Y-m-d H:i:s'),
                    'status' => 'Active'
                );                          
    
                $this->db->where('id',$id);
                $this->db->update('slider',$updateData);
    
                $this->session->set_flashdata("success","Slider updated successfully"); 
                redirect('admin/slider'); 
            }
            else 
            {
                $this->session->set_flashdata("fail",validation_errors());  
                redirect('admin/slider'); 
            } 
        }
    
        $this->load->view('admin/includes/template',$data); 
    }


    public function slider_delete()
    {   
        if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        $id = $this->uri->segment(3);
        $slider_data = $this->db->get_where('slider', array('id' => $id))->row();
    
        if ($slider_data) 
        {
            // ✅ Image delete करा
            $folder = "assets/images/animal/";
            if (!empty($slider_data->image) && file_exists($folder . $slider_data->image)) {
                unlink($folder . $slider_data->image);
            }
    
            // ✅ DB मधून record पूर्णपणे काढा
            $this->db->where('id', $id);
            $this->db->delete('slider');
    
            $this->session->set_flashdata("success", "Slider Deleted successfully"); 
            redirect('admin/slider'); 
        } 
        else 
        {
            $this->session->set_flashdata("fail", "Slider Not Found"); 
            redirect('admin/slider');
        }
    }

	
	public function edit_profile()
	{     
		if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$id = $this->session->userdata(admin_session_name)['admin_id'];  
		$data['page_title']='Admin Profile';
		$data['main_content']='edit-admin';
		$data['vps']= $this->Mainmodel->select_single_row('admin_users',['admin_id`'=>$id,'admin_status'=>'Approve']);

		if ($this->input->post('edit')=='edit') 
		{ 

			$this->form_validation->set_rules('admn_first_name', 'Name', 'trim');
			$img1 = '';

			if ($this->form_validation->run() == TRUE)
			{ 		
				if (!empty($_FILES['image']['name']))	
				{ 
					$folder = "assets/images/user/";
					$extention = strrchr($_FILES['image']['name'], ".");
					$size = $_FILES['image']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img1 = $new_name.$extention;
						$uploaddir1 = $folder . $img1;
						move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir1); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/edit_profile');
					} 
				}
				else
				{
					$img1= $data['vps']->image;
				}
				
				if (!empty($_FILES['header_logo']['name']))	
				{ 
					$folder = "assets/images/user/";
					$extention = strrchr($_FILES['header_logo']['name'], ".");
					$size = $_FILES['header_logo']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img2 = $new_name.$extention;
						$uploaddir2 = $folder . $img2;
						move_uploaded_file($_FILES['header_logo']['tmp_name'], $uploaddir2); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/edit_profile');
					} 
				}
				else
				{
					$img2= $data['vps']->header_logo;
				}
				
				
				if (!empty($_FILES['footer_logo']['name']))	
				{ 
					$folder = "assets/images/user/";
					$extention = strrchr($_FILES['footer_logo']['name'], ".");
					$size = $_FILES['footer_logo']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img3 = $new_name.$extention;
						$uploaddir3 = $folder . $img3;
						move_uploaded_file($_FILES['footer_logo']['tmp_name'], $uploaddir3); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/edit_profile');
					} 
				}
				else
				{
					$img3= $data['vps']->footer_logo;
				}
				
				if (!empty($_FILES['fav_icon']['name']))	
				{ 
					$folder = "assets/images/user/";
					$extention = strrchr($_FILES['fav_icon']['name'], ".");
					$size = $_FILES['fav_icon']['size']/1024;
					$ex = strtoupper($extention);

					if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
					{
						$txn_id=rand();
						$new_name = time().'-'.$txn_id;
						$img4 = $new_name.$extention;
						$uploaddir4 = $folder . $img4;
						move_uploaded_file($_FILES['fav_icon']['tmp_name'], $uploaddir4); 
					}
					else
					{
						$this->session->set_flashdata("fail",'Imvalid file');  
						redirect('admin/edit_profile');
					} 
				}
				else
				{
					$img4= $data['vps']->fav_icon;
				}
				
			
				
				$cat_data = array(
	 					
						                'admn_first_name' =>$this->input->post('admn_first_name'), 
						                'admin_email_id' =>$this->input->post('admin_email_id'),
						                'admin_mobile' =>$this->input->post('admin_mobile'),
						                'admin_last_name' =>$this->input->post('admin_last_name'),
						                'image'=>$img1,
						                'header_logo'=>$img2,
						                'footer_logo'=>$img3,
						                'fav_icon'=>$img4
						                
									   
						
	 				                  ); 							
				$this->db->where('admin_id',$id);
				$this->db->update('pv_admin_users',$cat_data);
			    $this->session->set_flashdata('success','Profile Updated successfully'); 
					redirect('admin/edit_profile');
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
					redirect('admin/edit_profile');
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}
	
	function change_status($id,$status)
	{
		if($status=='Active')
		{	$status='Deactive';	}
		else
		{	$status='Active';	}
		$this->Mainmodel->update(['news_status'=>$status,'news_added_date'=>date('Y-m-d H:i:s')],['news_id'=>$id],'pv_news_updates');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
		public function notification_listing()
	{ 
		$data['page_title'] = 'Notification Listing';
		$data['main_content'] = "notification_listing";

		$data['notification'] = $this->db->get_where('notification',array('status'=>'Active'),'')->result();

		$this->load->view('admin/includes/template',$data); 
	}
	
	
	public function notification_add()
	{     
		$data['page_title'] = 'सूचना';
		$data['main_content'] = "add-notifications"; 

		if ($this->input->post('addnotification')=='addnotification') 
		{ 
		
			$this->form_validation->set_rules('notification', 'notification', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == TRUE)
			{ 		
			    $time = $this->input->post('time');
			    $time_period = $this->input->post('time_period');
                $gettime = $time.' '.$time_period;
                if($_FILES['image']['name']!="")
				{

			      $img1 = $this->Mainmodel->doc_upload(6,'image','assets/images/notification');
		        }
                //echo $gettime; die;
				$additionalinfo_data = array('notification_type' =>$this->input->post('notification_type'),
									  'notification'=>$this->input->post('notification'),
									  'time'=>$gettime,
									  'n_date'=>$this->input->post('n_date'),
									  'image'=>$img1,
									  'added_date'=>date('Y-m-d'),
									  'status'=>'Active'
									  ); 
										
				$this->Mainmodel->insert('notification',$additionalinfo_data);

				$this->session->set_flashdata("success","Notification added successfully"); 
				redirect('admin/notification_listing'); 
			}
			else 
			{
				$this->session->set_flashdata("fail",validation_errors());  
				redirect('admin/notification_add'); 
			} 
		}

		$this->load->view('admin/includes/template',$data); 
	}

	public function notification_delete()
	{
		$id = $this->uri->segment(3);
	
		$notify_data = $this->db->get_where('notification',array('noti_id' =>$id))->row();

		if($notify_data)
		{

		    $this->db->delete('notification', array('noti_id' => $id)); 
		    $this->session->set_flashdata("success","Notification Deleted successfully"); 
			redirect('admin/notification_listing'); 
		}else{
			$this->session->set_flashdata("Fail","Notification Not Deleted"); 
			redirect('admin/notification_listing');
		}
		
	}
	
	public function our_team_list()
	{ 
	    if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
		$data['page_title'] = 'Our Team Listing';
		$data['main_content'] = "team_list";

		$data['category_data'] = $this->db->get_where('pv_team',array('status'=>'Active'),'')->result();

		$this->load->view('admin/includes/template',$data); 
	}
    
    public function team_add()
    {    
        if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        $data['page_title'] = 'Add team';
        $data['main_content'] = "team_add"; 
    
        if ($this->input->post('medicine')=='medicine') 
        { 
          $this->form_validation->set_rules('name', 'name', 'trim|required');
        
          $img1 = '';$img2 = '';$img3 = '';$img4 = '';
    
          if ($this->form_validation->run() == TRUE)
          {     
            if (!empty($_FILES['image']['name']))  
            { 
              $folder = "assets/images/medicinecat/";
              $extention = strrchr($_FILES['image']['name'], ".");
              $size = $_FILES['image']['size']/1024;
              $ex = strtoupper($extention);
    
              if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
              {
                $txn_id=rand();
                $new_name = time().'-'.$txn_id;
                $img1 = $new_name.$extention;
                $uploaddir1 = $folder . $img1;
                move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir1); 
              }
              else
              {
                $this->session->set_flashdata("fail",'Imvalid file');  
                redirect('admin/our_team_list');
              } 
            }
    
            $data = array('name' =>ucwords($this->input->post('name')),
                        'designation'=>$this->input->post('designation'),
                        'team_description'=>$this->input->post('team_description'),
                        'fb'=>$this->input->post('fb'),
                        'insta'=>$this->input->post('insta'),
                        'twitter'=>$this->input->post('twitter'),
                        'linkdin'=>$this->input->post('linkdin'),
                        'image'=>$img1,
                        'added_date'=>date('Y-m-d H:i:s'),
                        'status'=>'Active'
                        ); 
                        
            $this->Mainmodel->insert('pv_team',$data);
    
            $this->session->set_flashdata("success","Team added successfully"); 
             redirect('admin/our_team_list');
          }
          else 
          {
            $this->session->set_flashdata("fail",validation_errors());  
             redirect('admin/our_team_list');
          } 
        }
    
        $this->load->view('admin/includes/template',$data); 
      }
     
     
    public function team_edit()
    {    
        if(!$_SESSION[admin_session_name])
    	{
    		redirect('admin/login');
    	}
        $data['page_title'] = 'Edit Team';
        $data['main_content'] = "team_edit"; 
        $id = $this->uri->segment(3);
        
        $data['meter_data'] = $this->db->get_where('team',array('team_id' =>$id))->row();
        
        if ($this->input->post('category_edit')=='category_edit') 
        { 
        
          $this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean');
          $img1 = '';$img2 = '';$img3 = '';$img4 = '';
        
          if ($this->form_validation->run() == TRUE)
          {     
            if (!empty($_FILES['image']['name']))  
            { 
              $folder = "assets/images/medicinecat/";
              $extention = strrchr($_FILES['image']['name'], ".");
              $size = $_FILES['image']['size']/1024;
              $ex = strtoupper($extention);
        
              if ($ex==".PNG" || $ex==".JPG" || $ex==".JPEG" || $ex==".GIF") 
              {
                $txn_id=rand();
                $new_name = time().'-'.$txn_id;
                $img1 = $new_name.$extention;
                $uploaddir1 = $folder . $img1;
                move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir1); 
              }
              else
              {
                $this->session->set_flashdata("fail",'Imvalid file');  
                redirect('admin/our_team_list');
              } 
            }
            else
            {
              $img1= $data['meter_data']->image;
            }
            
            $data = array('name' =>ucwords($this->input->post('name')),
                        'designation'=>$this->input->post('designation'),
                        'team_description'=>$this->input->post('team_description'),
                        'fb'=>$this->input->post('fb'),
                        'insta'=>$this->input->post('insta'),
                        'twitter'=>$this->input->post('twitter'),
                        'linkdin'=>$this->input->post('linkdin'),
                        'image'=>$img1,
                        'added_date'=>date('Y-m-d H:i:s'),
                        'status'=>'Active'
                        );             
            $this->db->where('team_id',$id);
            $this->db->update('team',$data);
            $this->session->set_flashdata("success","Team Update successfully"); 
            redirect('admin/our_team_list');
          }
          else 
          {
            $this->session->set_flashdata("fail",validation_errors());  
            redirect('admin/our_team_list');
          } 
        }
        
        $this->load->view('admin/includes/template',$data); 
    }   
    
    
    public function team_delete()
	{
		$id = $this->uri->segment(3);
	
		$animal_category_data = $this->db->get_where('team',array('team_id' =>$id))->row();

		if($animal_category_data)
		{
			$cat_data = array('status' =>"Deleted"
									  ); 							
			$this->db->where('team_id',$id);
		    $this->db->update('team',$cat_data);	
		    $this->session->set_flashdata("success","Team Deleted successfully"); 
			redirect('admin/our_team_list');
		}else{
			$this->session->set_flashdata("Fail","Team Not Deleted"); 
			redirect('admin/our_team_list');
		}
		
	}
	
	
	

		
} //class close
