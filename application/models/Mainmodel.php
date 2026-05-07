<?php
class Mainmodel extends CI_Model
{	
    function __construct() 
    {
        parent::__construct();
		$this->load->database();
  	}

    function get_sort_order($table,$where)
    {
        $this->db->select('sort_order');
        $this->db->where($where);
        $this->db->order_by('sort_order desc');
        $this->db->limit('1');
        $this->db->from($table);
        $result = $this->db->get();
        $sort_order=$result->row_array();
        return $sort_order['sort_order']+1;
    }
    
    public function get_tour($limit, $start,$where,$order_by) {
        $this->db->limit($limit, $start);
         $this->db->where($where);
         $this->db->order_by($order_by);
        $query = $this->db->get($this->tour);

        return $query->result();
    }
    
     public function get_hotel($limit, $start,$where,$order_by) {
        $this->db->limit($limit, $start);
         $this->db->where($where);
         $this->db->order_by($order_by);
        $query = $this->db->get($this->hotel);

        return $query->result();
    }
    
     public function get_user_booking($limit, $start,$where,$order_by) {
        $this->db->limit($limit, $start);
         $this->db->where($where);
         $this->db->order_by($order_by);
        $query = $this->db->get($this->booking);

        return $query->result();
    }
    
public function wish_list_exists($a_id,$p_id)
{
	    $this->db->select('*');
		$this->db->from('pv_wishlist');
		
		$this->db->where("(user_id=$a_id AND tour_id=$p_id)");
	
		$query = $this->db->get();
		 if($query->num_rows() > 0)
		 {
		 	return('true');
		 }
		 else
		 {
		 	return('false');
		 }
    
}
	
    
    public function get_blog($limit, $start,$where,$order_by) {
        $this->db->limit($limit, $start);
         $this->db->where($where);
         $this->db->order_by($order_by);
        $query = $this->db->get($this->blog);

        return $query->result();
    }

    function get_journals($slug)
    {                  
        $this->db->select('*');
        $this->db->from('nec_journal');
        $this->db->where(array('status ='=>'Active','article_slug'=>$slug));
        $this->db->order_by('nec_journal.journal_id desc');
        //echo $this->db->last_query();die;
        $result = $this->db->get()->result();
        return $result;
    }  

    function select_result_allpara($id, $table, $where, $order_by, $limit,$start)
    {
        $this->db->select($id);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
   }
	
	function check_valid_login($username,$password)
    {    
		$this->db->where('admin_login_password', $password);
        $this->db->where('admin_status=', 'Approve');
        //$this->db->where('admin_type=', 'super_admin');
		$this->db->where("admin_login_id='".$username."'");
		$q = $this->db->get('admin_users'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

    public function doc_upload($length,$file,$path=null){
        $dir = "{$path}";
        $new =null;
        if(!empty($_FILES[$file]['name'])){
            $new = $this->random_string_file_nm(6,$file);
            move_uploaded_file($_FILES[$file]['tmp_name'],$dir.'/'.$new);
        }
        return $new;
    }

    public function random_string_file_nm($length=6,$file_nm = null){
        $doc_ext_arr = explode(".",$_FILES[$file_nm]['name']);  
        $doc_ext = end($doc_ext_arr);
        $str_1 = substr(str_shuffle("Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Ii9Jj0Kk1Ll2Mm3Nn4Oo5Pp6Qq7Rr8Ss9Tt0Uu1Vv2Ww3Xx4Yy5Zz6"), 0, $length);
        $str_2 = substr(str_shuffle("aA1bB2cC3dD4eE5fF6gG7hH8iI9jJ0kK1lL2mM3nN4oO5pP6qQ7rR8sS9tT0uU1vV2wW3xX4yY5zZ6"), 0, $length);
        $str_3 = substr(str_shuffle("1Aa2Bb3Cc4Dd5Ee6Ff7Gg8Hh9Ii0Jj1Kk2Ll3Mm4Nn5Oo6Pp7Qq8Rr9Ss0Tt1Uu2Vv3Ww4Xx5Yy6Zz"), 0, $length);
        $str_4 = substr(str_shuffle("1aA2bB3cC4dD5eE6fF7gG8hH9iI0jJ1kK2lL3mM4nN5oO6pP7qQ8rR9sS0tT1uU2vV3wW4xX5yY6zZ"), 0, $length);
        $str_5 = substr(str_shuffle(time()), 0, $length);
        $str   = $str_1.'_'.$str_2.'_'.$str_3.'_'.$str_4.'_'.$str_5;
        return $str.".".$doc_ext;
    }
    


    function check_valid_dept_login($username,$password)
    {    
        $this->db->where('dept_password', $password);
        $this->db->where('dept_status=', 'Active');
        $this->db->where("dept_username='".$username."'");

        $q = $this->db->get('department'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

    function check_valid_author_login($username,$password)
    {    
        $this->db->where('author_password', $password);
        $this->db->where('author_status=', 'Active');
        $this->db->where("author_email='".$username."'");

        $q = $this->db->get('author'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

     function check_valid_ceo_login($username,$password)
    {    
        $this->db->where('ceo_password', $password);
        $this->db->where('ceo_status=', 'Active');
        $this->db->where("ceo_email='".$username."'");

        $q = $this->db->get('ceo'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

    function check_valid_vp_login($username,$password)
    {    
        $this->db->where('vp_password', $password);
        $this->db->where('vp_status=', 'Active');
        $this->db->where("vp_email='".$username."'");

        $q = $this->db->get('vp'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

    function check_valid_gm_login($username,$password)
    {    
        $this->db->where('gm_password', $password);
        $this->db->where('gm_status=', 'Active');
        $this->db->where("gm_email='".$username."'");

        $q = $this->db->get('gm'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 
    
     function check_valid_maintenance_login($username,$password)
    {    
        $this->db->where('mt_password', $password);
        $this->db->where('mt_status=', 'Active');
        $this->db->where("mt_email='".$username."'");

        $q = $this->db->get('maintainance'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    } 

    function check_valid_pd_login($username,$password)
    {    
        $this->db->where('pd_password', $password);
        $this->db->where('pd_status=', 'Active');
        $this->db->where("pd_email='".$username."'");

        $q = $this->db->get('purchase_department'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        } 
    }

    function insertData( $table ) {

        $fields = $this->db->list_fields( $table );
        $data = array();
        foreach ( $fields as $field ) {
            if (isset($_POST[$field]))
            {
                $data[$field]= $this->input->post($field);
                if (is_array($_POST[$field])) 
                {
                 $data[$field] = implode( ',',array_map('strtolower',$this->input->post($field)) );
                }
                else
                {
                    $data[$field]= $this->input->post($field);
                }
            }
        }
        $result=$this->db->insert($table, $data);
        return $result;
    }
   
    function insert($table,$data)
	{
		$insert = $this->db->insert($table, $data);
		if($insert)
		{
			return $insert_id =  $this->db->insert_id();
		}
		else
		{
			return '0';
		}
	}

	function update($data,$conditions,$tablename="")
	{
		if($tablename=="")
		$tablename = $this->table;
		$this->db->where($conditions);
		$this->db->update($tablename,$data);
		return $this->db->affected_rows();
	}

      public function send_emails($to,$subject,$message)
    {
        if ($this->config->item('config_EMAIL')==TRUE) 
        {
            $this->load->library('email');

            $send_from = $this->config->item('email_send_from');
            
            // $this->email->from($send_from);
            $this->email->from("joom@journalofomnimaterials.com");

            $this->email->to($to);

            $this->email->subject($subject);

            $this->email->set_mailtype('html');

            $this->email->message($message);

            $mail = $this->email->send();

            $this->email->clear();

            if($mail)
            {
                $msg='sent';
            }
            else
            {
                $msg="Mail Not send";
            }
        }
        else
        {
            $msg="Mail Not send because mail send restricted by admin";
        }
        return $msg;
                
    }
     
    public function send_email_attachment($to,$subject,$message,$attachment="")
    {
        if ($this->config->item('config_EMAIL')==TRUE) 
        {
            $this->load->library('email');

            $send_from = $this->config->item('email_send_from');
            
            // $this->email->from($send_from);
            $this->email->from("joom@journalofomnimaterials.com");

            $this->email->to($to);

            $this->email->subject($subject);

            $this->email->set_mailtype('html');

            $this->email->message($message);
            
            $this->email->attach($attachment);

            $mail = $this->email->send();

            $this->email->clear();

            if($mail)
            {
                $msg='sent';
            }
            else
            {
                $msg="Mail Not send";
            }
        }
        else
        {
            $msg="Mail Not send because mail send restricted by admin";
        }
        return $msg;
                
    }
   

	function count_all($id, $table, $where='')
	{	
		$this->db->select($id);
		$this->db->from($table);
		if($where)
		{$this->db->where($where);}
		$query = $this->db->get();
		return $query->num_rows();
   }
    public function get_singleData($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getData($table, $where,$orderBy)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where!='') 
        { 
            $this->db->where($where);
        }
        if ($orderBy!='') 
        { 
            $this->db->order_by($orderBy);
        }
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

public function select_single_row($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    function select_results_where( $table , $whereclaus)
    {
        $query = $this->db->get_where( $table, $whereclaus );
        $result = $query->result();
        $query->free_result();
        return $result;
    }   

	function select_results_where1( $table , $whereclaus ,$order_by="" )
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($whereclaus);
        if($order_by!="")
        $this->db->order_by($order_by);
        $query=$this->db->get(); 
        $result=$query->result();
        $query->free_result();
        return $result;
    }  

    function send_email($to,$cc="",$bcc="",$subject,$message,$attachment="")//Akshay
    {
        if ($this->config->item('config_EMAIL')==TRUE) 
        { 
            $send_from = $this->config->item('email_send_from');
            /* $config = $this->config->item('smtp_config');
            
            $this->load->library('email',$config); */
            
            $this->load->library('email');
            $this->email->from($send_from);
            $this->email->to($to);
            if($cc!="") { $this->email->cc($cc); }
            if($bcc!="") { $this->email->bcc($bcc); }
            
            $this->email->subject($subject);
            $this->email->set_mailtype('html');
            $this->email->message($message);
            if($attachment!="") { $this->email->attach($attachment); }
            $mail=$this->email->send();
            if($mail)
            {
                $msg='sent';
                $this->email->clear(TRUE);
            }
            else
            {
                $msg="Mail Not send";
            }
        }
        else
        {
            $msg="Mail Not send because mail send restricted by admin";
        }
        return $msg;
    }


    function select_results_like( $table , $where ,$address, $title, $date,$offer_price)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        if($address)
        {
            $this->db->like('tour.address',$address);
        }
        if($title)
        {
            $this->db->like('tour.title',$title);
        }
        if($date)
        {
            $this->db->like('tour.date',$date);
        }
        if($offer_price)
        {
            $this->db->like('tour.offer_price',$offer_price);
        }

        
       /* elseif($volume && $issue)
        {
            $this->db->join('nec_volume','nec_volume.volume_id=journal.volume');
            $this->db->like('nec_volume.volume_name',$volume);
            $this->db->join('current_issue','current_issue.current_issue_id=journal.issue');
            $this->db->like('current_issue.current_issue_title',$issue);
            //$this->db->like('current_issue.valumes',$volume);
        }
        else
        {
            $this->db->join('current_issue','current_issue.current_issue_id=journal.issue');
        }*/
        else
        {

        }
        $query=$this->db->get(); 
        $result=$query->result();
        return $result;
    }



 function select_results_like_hotel( $table , $where ,$title, $hotcat_id, $hotel_city,$hotel_location)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        if($title)
        {
            $this->db->like('hotel.title',$title);
        }
        if($hotcat_id)
        {
            $this->db->like('hotel.hotcat_id',$hotcat_id);
        }
        if($hotel_city)
        {
            $this->db->like('hotel.hotel_city',$hotel_city);
        }
        if($hotel_location)
        {
            $this->db->like('hotel.hotel_location',$hotel_location);
        }
        else
        {

        }
        $query=$this->db->get(); 
        $result=$query->result();
        return $result;
    }



    /*function select_results_like( $table , $where ,$keyword, $article_by, $article_title, $volume, $issue )
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        if($keyword)
        {
            $this->db->like('journal.keyword',$keyword);
        }
        if($article_by)
        {
            $this->db->like('journal.article_by',$article_by);
        }
        if($article_title)
        {
            $this->db->like('journal.article_title',$article_title);
        }

        if($volume)
        {
            $this->db->join('current_issue','current_issue.current_issue_id=journal.volume');
            $this->db->like('current_issue.valumes',$volume);
        }
        elseif($issue)
        {
            $this->db->join('current_issue','current_issue.current_issue_id=journal.issue');
            $this->db->like('current_issue.current_issue_title',$issue);
        }
        elseif($volume && $issue)
        {
            $this->db->join('current_issue','current_issue.current_issue_id=journal.issue and current_issue.current_issue_id=journal.volume');
            $this->db->like('current_issue.current_issue_title',$issue);
            $this->db->like('current_issue.valumes',$volume);
        }
        else
        {
            $this->db->join('current_issue','current_issue.current_issue_id=journal.volume');
        }
        $query=$this->db->get(); 
        $result=$query->result();
        return $result;
    }*/
    
     function fetch_taluka($district_id)
     {
          $this->db->where('dist_id', $district_id);
          $this->db->order_by('tal_name', 'ASC');
          $query = $this->db->get('taluka');
          $output = '<option value="">तालुका निवडा</option>';
          foreach($query->result() as $row)
          {
           $output .= '<option value="'.$row->tal_id.'">'.$row->tal_name.'</option>';
          }
          return $output;
     } 
     
     function fetch_village($tal_id)
     {
          $this->db->where('tal_id', $tal_id);
          $this->db->order_by('vil_name', 'ASC');
          $query = $this->db->get('village');
         // $output = '<option value="">गाव निवडा</option>';
          foreach($query->result() as $row)
          {
           $output .= '<option value="'.$row->vil_id.'">'.$row->vil_name.'</option>';
          }
          return $output;
     } 
     
     function fetch_doctor($vill_id)
     {
          $this->db->where('dv_doctorvillage', $vill_id);
          $this->db->order_by('dv_doctor_id', 'ASC');
          $query = $this->db->get('doctor_assignvillage');
         // $output = '<option value="">गाव निवडा</option>';
          foreach($query->result() as $row)
          {
           $output .= '<option value="'.$row->dv_doctor_id.'"> Dr.'.getDoctorname($row->dv_doctor_id).'( Pending Cases - '.getTotalpendingcases($row->dv_doctor_id).')( specialization - '.getDoctorspecialization($row->dv_doctor_id).')( Dr.Type - '.getDoctorstype($row->dv_doctor_id).')</option>';
          }
          return $output;
     } 
     
     function fetch_subcatgory($cat_id)
     {
          $this->db->where('animalsubcat_catid', $cat_id);
          $this->db->order_by('animalsubcat_title', 'ASC');
          $query = $this->db->get('animal_subcategory');
          $output = '<option value=""> Select Subcategory </option>';
          foreach($query->result() as $row)
          {
           $output .= '<option value="'.$row->animalsubcat_id.'">'.$row->animalsubcat_title.'</option>';
          }
          return $output;
     } 
    public function get_news_data($id)
	{
		$this->db->select('*');
		$this->db->from('news_updates'); 
		if ($id!='') 
		{
			$this->db->where('news_id',$id);  
		}
		$this->db->where('news_status !=','Deleted');  
		$this->db->order_by('news_id','DESC');
		$q = $this->db->get();
		return $q->result();
	}  
	public function get_event_data($id)
	{
		$this->db->select('*');
		$this->db->from('event'); 
		if ($id!='') 
		{
			$this->db->where('event_id',$id);  
		}
		$this->db->where('event_status !=','Deleted');  
		$this->db->order_by('event_id','DESC');
		$q = $this->db->get();
		return $q->result();
	}
	public function get_additionalinfo_data($id)
	{
		$this->db->select('*');
		$this->db->from('additionalinfo'); 
		if ($id!='') 
		{
			$this->db->where('additionalinfo_id',$id);  
		}
		$this->db->where('additionalinfo_status !=','Deleted');  
		$this->db->order_by('additionalinfo_id','DESC');
		$q = $this->db->get();
		return $q->result();
	} 
	
	
	
	 public function add_customer($name,$email,$password)
    { 

        

            $data = array
            (

                'name' => $name, 

                'email' => $email, 

                'password' => $password


            );
          

        $this->db->insert('pv_user', $data);
        

    } 
    
    public function checkIsExist($email)

    {

        $this->db->select('*');

        $this->db->from('pv_user');   

        $this->db->where('email', $email); 


        $query = $this->db->get();

        return $query->row(); 

 

    }
    
    public function read_user_information1($username) 
	{
		$condition = "email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('pv_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	
	public function memberlogin($data) 
	{
		$condition = "email ='".$data['email']."' AND password ='".$data['password']."' ";

		$this->db->select('*');
		$this->db->from('pv_user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	public function agentlogin($data) 
	{
		$condition = "email ='".$data['email']."' AND password ='".$data['password']."' ";

		$this->db->select('*');
		$this->db->from('pv_agent');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}
	
	 public function read_agent_information($username) 
	{
		$condition = "email =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('pv_agent');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

}
?>