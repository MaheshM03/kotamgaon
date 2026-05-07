<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
   
    public $blog = 'blog';
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','common_helper'));
		$this->load->library('session');  
		date_default_timezone_set('Asia/Kolkata');  
		$this->load->model(array('Mainmodel'));
		$this->load->library('email');
		$this->load->library("pagination");
	}
	public function admin()
	{
		$this->load->view('index.php'); 
	}
	public function index()
	{
		$data['page_title']='Home';
		$data['main_content']='index';
		$data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
		$data['slider']=$this->Mainmodel->select_results_where1('pv_slider',array('status' =>'Active'),'id desc');
		$data['notification']=$this->Mainmodel->select_results_where1('pv_notification',array('status' =>'Active'),'noti_id asc');
		$data['gallery']=$this->Mainmodel->select_results_where1('pv_banner',array('status' =>'Active'),'banner_id desc');
		$data['team']=$this->db->order_by('team_id', 'asc')->get_where('pv_team',array('status' =>'Active'))->result();
		//print_r($data['team']); die;
        $data['about']      = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 1));
        $data['location']   = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 2));
        $data['lokjeevan']  = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 3));
        $data['population'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 4));
        $data['culture']    = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 5));
        $data['places']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 6));
        $data['nearby']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 7));
        $data['panchayat']  = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 8));
        $data['certificates'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 12));
        
        
       
		$this->load->view('front/includes/template',$data);
	}
	
	public function education()
	{
		$data['page_title']='Education';
		$data['main_content']='education';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['education']  = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 13));
        $data['anganwadi']  = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 14));
        
		$this->load->view('front/includes/template',$data);
	}
	public function health()
	{
		$data['page_title']='health';
		$data['main_content']='health';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['health']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 15));
		$this->load->view('front/includes/template',$data);
	}
	public function bachat_gat()
	{
		$data['page_title']='bachat-gat';
		$data['main_content']='bachat-gat';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['mahila']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 19));
		$this->load->view('front/includes/template',$data);
	}
	public function padadhikari()
	{
		$data['page_title']='padadhikari';
		$data['main_content']='padadhikari';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
		$data['team']=$this->db->order_by('team_id', 'asc')->get_where('pv_team',array('status' =>'Active'))->result();
        $data['panchayat']  = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 8));
        $data['staff']      = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 9));
        $data['revenue']    = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 10));
        $data['sarpanch']   = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 11));
		$this->load->view('front/includes/template',$data);
	}
	
	public function photo()
	{
		$data['page_title']='photo';
		$data['main_content']='photo';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['gallery']=$this->Mainmodel->select_results_where1('pv_banner',array('status' =>'Active'),'banner_id desc');
		$this->load->view('front/includes/template',$data);
	}
	public function contact()
	{
		$data['page_title']='contact';
		$data['main_content']='contact';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
		$this->load->view('front/includes/template',$data);
	}
	public function services()
	{
		$data['page_title']='services';
		$data['main_content']='services';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['certificates'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 12));
        $data['gharpatti'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 21));
        $data['panipatti'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 22));
        
		$this->load->view('front/includes/template',$data);
	}
	public function agreeculture()
	{
		$data['page_title']='agreeculture';
		$data['main_content']='agreeculture';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
         $data['krushi']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 18));
        
        
		$this->load->view('front/includes/template',$data);
	}
	
	public function vikas_kame()
	{
		$data['page_title']='vikas_kame';
		$data['main_content']='vikas_kame';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['vikas'] = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 20));
        
        
		$this->load->view('front/includes/template',$data);
	}
	public function dam()
	{
		$data['page_title']='dam';
		$data['main_content']='dam';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        $data['dam']        = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 16));
        $data['cement']     = $this->Mainmodel->select_single_row('pv_news_updates', array('news_id' => 17));
        
		$this->load->view('front/includes/template',$data);
	}

	public function certificates()
	{
		$data['page_title']='Certificates';
		$data['main_content']='certificates';
        $data['setting']=$this->Mainmodel->select_single_row('pv_site_setting',array(''));
        
        $data['certificates'] = array(
            array(
                'sr'        => '१.',
                'name'      => 'जन्म नोंद दाखला',
                'days'      => '७ दिवस',
                'fee'       => '२०',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
            array(
                'sr'        => '२.',
                'name'      => 'मृत्यू नोंद दाखला',
                'days'      => '७ दिवस',
                'fee'       => '२०',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
            array(
                'sr'        => '३.',
                'name'      => 'विवाह नोंद दाखला',
                'days'      => '७ दिवस',
                'fee'       => '२०',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
            array(
                'sr'        => '४.',
                'name'      => 'दारिद्र्य रेषेखालील असल्याचा दाखला',
                'days'      => '७ दिवस',
                'fee'       => 'निशुल्क',
                'officer'   => 'सा.ग.ट.बि.अ',
            ),
            array(
                'sr'        => '५.',
                'name'      => 'ग्रामपंचायत येथे बाकी नसल्याचा दाखला',
                'days'      => '७ दिवस',
                'fee'       => '२०',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
            array(
                'sr'        => '६.',
                'name'      => 'नमुना \'८\' चा उतारा',
                'days'      => '७ दिवस',
                'fee'       => '२०',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
            array(
                'sr'        => '७.',
                'name'      => 'निराधार असल्याचा दाखला',
                'days'      => '७ दिवस',
                'fee'       => 'निशुल्क',
                'officer'   => 'ग्रामपंचायत अधिकारी',
            ),
        );
		
		$this->load->view('front/includes/template',$data);
	}
	 
    
}