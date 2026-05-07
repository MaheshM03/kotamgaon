<?php 

function send_sms($to,$message)

{	

	$ci=& get_instance();

	$ci->load->database();



	if ($ci->config->item('config_SMS')==TRUE) 
	{ 

		$senderID = $ci->config->item('config_SMS_senderId');

		$userName = $ci->config->item('config_SMS_username');

		$passWord = $ci->config->item('config_SMS_password');



		if ($senderID && $userName && $passWord) 
		{ 

			//$url='http://49.50.67.32/smsapi/httpapi.jsp?username='.$userName.'&password='.$passWord.'&from='.$senderID.'&to='.$to.'&text='.$message;

			$url='http://siom.crystalite.co.in/submitsms.jsp?user='.$userName.'&key='.$passWord.'&mobile='.$to.'&message='.$message.'&senderid='.$senderID.'&accusage=1';

			$url_f =str_replace(" ", "%20", $url);

			file($url_f);

		}

	}

}

function getReportCategoryNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('report_category');

    $ci->db->where('cat_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    

}

function get_RoomTypeIdByOnlyRoom_id($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('room_type');

    $ci->db->from('pv_only_room');

    $ci->db->where(array('status =' =>'Active','only_room_id'=>$id));

     $query = $ci->db->get();

    $res = $query->row()->room_type;

    return $res; 
    
}

function getHotelCategoryNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('hotel_category');

    $ci->db->where('id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    

}


function getTourCategoryNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_tour_category');

    $ci->db->where('tourcat_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    

}

function CountryNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('name');

    $ci->db->from('pv_country');

    $ci->db->where('country_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 
    

}

function HotelNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_hotel');

    $ci->db->where('hot_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    

}


function Agent_Margin_Byid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('agent_discount');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->agent_discount;

    return $res; 
    

}

function getItineraryByTour_id($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('itinerary');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->itinerary;

    return $res; 
    

}

function StateNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('state_name');

    $ci->db->from('pv_states');

    $ci->db->where('state_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->state_name;

    return $res; 
    

}


function CityNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('name');

    $ci->db->from('pv_cities');

    $ci->db->where('city_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 
    

}

function RoomTypeNameByid($id)
{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_room_type');

    $ci->db->where('room_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    

}

function getHotelsOfCity($id)
{
	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('title,hot_id');

    $ci->db->from('hotel');

    $ci->db->where('hotel_city',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res;
}


function get_site_details()
{
    $ci = & get_instance();
    $ci->load->database();
    $result = $ci->db->select('*')->from('pv_site_setting')->where('id',1)->get()->row();
    return $result;
}

function get_pdf()
{
    $ci = & get_instance();
    $ci->load->database();
    $result = $ci->db->select('*')->from('nec_footer_pdf')->where('id',1)->get()->row();
    return $result;
}

function get_social_icon()
{
    $ci = & get_instance();
    $ci->load->database();
    $result = $ci->db->select('*')->from('nec_social_links')->where('status','Active')->get()->result();
    return $result;
}



function send_email($to,$subject,$message)

{ 		

	$ci=& get_instance();

	$ci->load->database();

 
		//$ci->email->from('info@nec.org.in');
		
		$ci->email->from('purchase.requisition@nec.org.in');
	//	$ci->email->from('swati.patil@dotphi.com');

		$ci->email->set_mailtype('html');

		$ci->email->to($to);

		$ci->email->subject($subject);

		$ci->email->message($message);
		return($ci->email->send());

	/*	if($ci->email->send())
		{
		    
		}
		else
		{
		    print_r($ci->email->print_debugger());

		}
		die;*/

		$ci->email->clear(TRUE);

}

function check_hod($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('hod');

    $ci->db->where('department_id',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}


function get_tour_photos($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('tour_images');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_book_room_details($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_final_book_room_info');

    $ci->db->where(array('status =' =>'Active','fb_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_tour_itinerary($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('tour_itinerary');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_hotel_image($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_hotel_images');

    $ci->db->where(array('status =' =>'Active','hot_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_tour_hotel1($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_hotel');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_tour_vehicle($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_tour_vehicle');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}


function get_booking_info($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_final_book_room_info');

    $ci->db->where(array('status =' =>'Active','fb_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}



function get_tour_room_type($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_only_room');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_tour_hotel($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_hotel');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_tour_hotel_category($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('pv_only_room');
    $ci->db->group_by('hotel_cat_id');
    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function get_package_by_id($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('tour');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function getVehicleNameByid($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_tour_vehicle');

    $ci->db->where(array('status =' =>'Active','vehicle_id'=>$id));

     $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 
    
}


function get_hotel_amount_id($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('amount');

    $ci->db->from('hotel');

    $ci->db->where(array('status =' =>'Active','hot_id'=>$id));

   $query = $ci->db->get();

    $res = $query->row()->amount;

    return $res; 
}
function get_tour_faq($id)
{
    $ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('tour_faq');

    $ci->db->where(array('status =' =>'Active','tour_id'=>$id));

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 
}

function convertdate_d_m_Y_to_Y_m_d($date) 

{

	$data = explode('/',$date);

	return $data[2]."-".$data[1]."-".$data[0];

}



function convertdate($date) 

{

	return date('Y-m-d',strtotime($date));

}

function date_in_format($date)

 {

 	if ($date) 

 	{

 		return date('d M Y h:i:s',strtotime($date)); 

 	}

 }



 function date_in_format2($date)

 {

 	if ($date) 

 	{

 		return date('d M Y',strtotime($date)); 

 	}

 }



function random_password( $length = 6 ) 

{

	$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	$num = "0123456789";

	$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	$lower = "abcdefghijklmnopqrstuvwxyz";

	$password = substr(str_shuffle($num),0,1).substr(str_shuffle($lower),0,1).substr( str_shuffle( $chars ), 0, $length-3 ).substr(str_shuffle($upper),0,1);

	return $password;

}



function get_categories_name($category_ids)

{ 	

	$ci=& get_instance();

	$ci->load->database();

	$result = $ci->db->query("SELECT GROUP_CONCAT(`category_name` SEPARATOR ' / ') as department FROM `si_complaint_category` WHERE FIND_IN_SET(category_id,'".$category_ids."')")->row();

	return $result->department;

}



function get_sub_category($category_id)

{

	$ci=& get_instance();

	$ci->load->database();

	

	$result = $ci->db->query("SELECT `category_id`, `category_name` FROM `si_complaint_category` WHERE category_parent_id=".$category_id." AND status='Active'")->result();

	

	return $result;

}



function get_random_id()

{    


    $table='purchase_request';
	$ci=& get_instance();

	

	$count = 0;

	if ($table!='') 

	{

		$count = $ci->db->from($table)->count_all_results(); 

	}

	if ($count>0) 

	{

		$num = $count+1; 

	}

	else

	{

		$num = 1;

	}



	return trim('REQ'.sprintf("%'.06d", $num));

}

function getDepartmentReport($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('user_type');

    $ci->db->from('report');

    $ci->db->where('department_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->user_type;

    return $res; 

}

function getValumeNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('volume_name');

    $ci->db->from('nec_volume');

    $ci->db->where('volume_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->volume_name;

    return $res; 

}

function getRoomTypeByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_room_type');

    $ci->db->where('room_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 

}

function getUserNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('name');

    $ci->db->from('pv_user');

    $ci->db->where('user_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 

}

function getBookingUserNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('book_username');

    $ci->db->from('pv_final_booking');

    $ci->db->where('fb_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->book_username;

    return $res; 

}


function getUserAddressByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('address');

    $ci->db->from('pv_user');

    $ci->db->where('user_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->address;

    return $res; 

}

function getAgentNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('name');

    $ci->db->from('pv_agent');

    $ci->db->where('agent_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 

}


function getDistributorNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('name');

    $ci->db->from('pv_distributor');

    $ci->db->where('distributor_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 

}


function getTotalComment($type)
{ 
	$ci=& get_instance();
    $ci->load->database();
	$ci->db->where('blog_id',$type); 
	$ci->db->where('status','Active'); 
	return  $ci->db->count_all_results('pv_blog_comment');
}
function getBlogNameById($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_blog');

    $ci->db->where('blog_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 

}

function getBlogcatname($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_blog_category');

    $ci->db->where('blogcat_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 

}

function getTourNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('title');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->title;

    return $res; 

}

function getTourDurationByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('duration');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->duration;

    return $res; 

}

function getTourLocationByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('address');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->address;

    return $res; 

}


function getTourPriceByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('offer_price');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->offer_price;

    return $res; 

}

function getTourImageByid($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('image');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->image;

    return $res; 

}

function getTourPickupByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('pickup_from');

    $ci->db->from('pv_tour');

    $ci->db->where('tour_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->pickup_from;

    return $res; 

}

function getUserEmailByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('email');

    $ci->db->from('pv_user');

    $ci->db->where('user_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->email;

    return $res; 

}

function getUserMobileByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('mobile');

    $ci->db->from('pv_user');

    $ci->db->where('user_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->mobile;

    return $res; 

}

function getcatNameByid($id)

{

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('name');

    $ci->db->from('nec_ctting_articles');

    $ci->db->where('id',$id);

    $query = $ci->db->get();

    $res = $query->row()->name;

    return $res; 

}
function getDistname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('dist_title');
    $ci->db->from('pv_district');
    $ci->db->where('dist_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->dist_title;
     return $res; 
}
function getDoctorspecialization($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('doctor_specialization');
    $ci->db->from('pv_doctor');
    $ci->db->where('doctor_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->doctor_specialization;
     return $res; 
}
function getDoctorname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('doctor_name');
    $ci->db->from('pv_doctor');
    $ci->db->where('doctor_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->doctor_name;
     return $res; 
}
function getDoctorstype($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('doctor_type');
    $ci->db->from('pv_doctor');
    $ci->db->where('doctor_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->doctor_type;
     return $res; 
}
function getdiseasetype($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('disease_name');
    $ci->db->from('pv_disease');
    $ci->db->where('disease_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->disease_name;
     return $res; 
}
function getanimaltype($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('animalcat_title');
    $ci->db->from('pv_animal_category');
    $ci->db->where('animalcat_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->animalcat_title;
     return $res; 
}
function getTalname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('tal_name');
    $ci->db->from('pv_taluka');
    $ci->db->where('tal_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->tal_name;
     return $res; 
}
function getVillagename($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('vil_name');
    $ci->db->from('pv_village');
    $ci->db->where('vil_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->vil_name;
     return $res; 
}
function getAnimalcatname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('animalcat_title');
    $ci->db->from('pv_animal_category');
    $ci->db->where('animalcat_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->animalcat_title;
     return $res; 
}
function getAnimalsubcatname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('animalsubcat_title');
    $ci->db->from('pv_animal_subcategory');
    $ci->db->where('animalsubcat_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->animalsubcat_title;
     return $res; 
}
function getmedicinecatname($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('medicinecat_title');
    $ci->db->from('pv_medicine_category');
    $ci->db->where('medicinecat_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->medicinecat_title;
     return $res; 
}
function getmedicinename($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('medicine_title');
    $ci->db->from('pv_medicine');
    $ci->db->where('medicine_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->medicine_title;
     return $res; 
}
function Getdocvillagename($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('vil_name');
    $ci->db->from('pv_village');
    $ci->db->where('vil_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->vil_name;
     return $res; 
}
function getTelocallername($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('tc_name');
    $ci->db->from('pv_telecoller');
    $ci->db->where('tc_id',$id);
    $query = $ci->db->get();
    $res = $query->row()->tc_name;
     return $res; 
}
function Getdocvillage($id)
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('dv_doctorvillage');
    $ci->db->from('pv_doctor_assignvillage');
    $ci->db->where('dv_doctor_id',$id);
    $query = $ci->db->get();
    $res = $query->result();
     return $res; 
}


function GetCategory()
{
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->select('*');
    $ci->db->from('pv_report_category');
    $ci->db->where('status','Active');
    $ci->db->order_by('cat_id','desc');
    $query = $ci->db->get();
    $res = $query->result();
     return $res; 
}

function get_banners()
{
	$ci = & get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('pv_report_category')->where('status','Active')->order_by('sort_order asc')->get()->result();
	return $result;
}

function getTotalpendingcases($type)
{ 
	$ci=& get_instance();
    $ci->load->database();
	$ci->db->where('case_assign_doctor',$type); 
	$ci->db->where('solve_case_status','Pending'); 
	return  $ci->db->count_all_results('pv_casepaper');
}

function getIssueNameByid($id)

{

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('current_issue_title');

    $ci->db->from('nec_current_issue');

    $ci->db->where('current_issue_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->current_issue_title;

    return $res; 

}

function getHodemailByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('hod_email');

    $ci->db->from('hod');

    $ci->db->where('department_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->hod_email;

    return $res; 

}
function getHODemail($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('hod_email');

    $ci->db->from('hod');

    $ci->db->where('hod_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->hod_email;

    return $res; 

}

function getCEOemail($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('ceo_email');

    $ci->db->from('ceo');

    $ci->db->where('ceo_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->ceo_email;

    return $res; 

}

function getCEOemailid()

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('ceo_email');

    $ci->db->from('ceo');

    $query = $ci->db->get();

    $res = $query->row()->ceo_email;

    return $res; 

}

function getGMemail($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('gm_email');

    $ci->db->from('gm');

    $ci->db->where('gm_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->gm_email;

    return $res; 

}
function getGMemailid()

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('gm_email');

    $ci->db->from('gm');

    $query = $ci->db->get();

    $res = $query->row()->gm_email;

    return $res; 

}

function getMTemailid()

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('mt_email');

    $ci->db->from('maintainance');

    $query = $ci->db->get();

    $res = $query->row()->mt_email;

    return $res; 

}
function getVPemail($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('vp_email');

    $ci->db->from('vp');

    $ci->db->where('vp_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->vp_email;

    return $res; 

}

function getVPemailid()

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('vp_email');

    $ci->db->from('vp');

    

    $query = $ci->db->get();

    $res = $query->row()->vp_email;

    return $res; 

}

function getmemberemail($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('member_email');

    $ci->db->from('member');

    $ci->db->where('member_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->member_email;

    return $res; 

}

function getMemberEmailOfRequest($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('member_id');

    $ci->db->from('purchase_request');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->member_id;

    return $res; 

}
function getRequestUniqueId($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_unique_id');

    $ci->db->from('purchase_request');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->request_unique_id;

    return $res; 

}

function getDepartmentByid1($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('department_id');

    $ci->db->from('purchase_request');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->department_id;

    return $res; 

}

function getCeoByid1($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('ceo_id');

    $ci->db->from('ceo');

   // $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->ceo_id;

    return $res; 

}

function getPdByid1($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('pd_id');

    $ci->db->from('purchase_department');

   // $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->pd_id;

    return $res; 

}

function getPdemailid()

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('pd_email');

    $ci->db->from('purchase_department');

   // $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->pd_email;

    return $res; 

}

function getMemberNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('member_name');

    $ci->db->from('member');

    $ci->db->where('member_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->member_name;

    return $res; 

}

function getCategoryNameByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('cat_name');

    $ci->db->from('category');

    $ci->db->where('cat_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->cat_name;

    return $res; 

}



function getAdminNameByid($id)
{
    //return $id;

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('admn_first_name');

    $ci->db->from('nec_admin_users');

    $ci->db->where('admin_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->admn_first_name;
    //print_r($res);die;

    return $res; 

}

function getChiefNameByid($id)
{
    //return $id;

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('eic_name');

    $ci->db->from('nec_editor_in_chief');

    $ci->db->where('eic_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->eic_name;
    //print_r($res);die;

    return $res; 

}

function getEditorNameByid($id)
{
    //return $id;

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('edi_name');

    $ci->db->from('nec_editors');

    $ci->db->where('edi_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->edi_name;
    //print_r($res);die;

    return $res; 

}

function getReviewerNameByid($id)
{
    //return $id;

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('rev_name');

    $ci->db->from('nec_reviewer');

    $ci->db->where('rev_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->rev_name;
    //print_r($res);die;

    return $res; 

}


function getAdminNameByid1($id)
{
    //return $id;

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('admin_last_name');

    $ci->db->from('nec_admin_users');

    $ci->db->where('admin_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->admin_last_name;
    //print_r($res);die;

    return $res; 

}

function getMaterialNameByid($id)

{
    return $id;

    $ci=& get_instance();

    $ci->load->database();



    $ci->db->select('material_name');

    $ci->db->from('material');

    $ci->db->where('material_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->material_name;

    return $res; 

}

function getMaterialNameByid2($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('material_name');

    $ci->db->from('material');

    $ci->db->where('material_id',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 

}
function getMaterialSpecificationByid($id)//Akshay

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('material_specification');

    $ci->db->from('material');

    $ci->db->where('material_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->material_specification;

    return $res; 

}


function getRequestMaterialQuantityByid($id)//Akshay

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('rm_quantity');

    $ci->db->from('request_material');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->rm_quantity;

    return $res; 

}

function getRequestMaterialUnitsByid($id)//Akshay

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('rm_unit');

    $ci->db->from('request_material');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->rm_unit;

    return $res; 

}

function getRequestMaterialByid($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('rm_quantity');

    $ci->db->from('request_material');

    $ci->db->where('material_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->rm_quantity;

    return $res; 

}







function get_Material_Of_Request($id)

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('request_material');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 

}

function get_Purchase_Request($id)//Akshay

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('*');

    $ci->db->from('purchase_request');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 

}



function getCurrent_Status_NameByid($id)//Akshay

{

	$ci=& get_instance();

	$ci->load->database();



	$ci->db->select('request_current_status');

    $ci->db->from('purchase_request');

    $ci->db->where('request_id',$id);

    $query = $ci->db->get();

    $res = $query->row()->request_current_status;

    return $res; 

}



function getCountOfRequest($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_id');

    $ci->db->from('purchase_request');

    $ci->db->where('department_id',$id);

    $query = $ci->db->get();

    $res = $query->result();

    return $res; 

}

function get_total_pr($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_id');

    $ci->db->from('purchase_request');

    $ci->db->where('department_id',$id);
   
    $query = $ci->db->get();

    $res = $query->result();

    return count($res); 

}

function get_complete_pr($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_id');

    $ci->db->from('purchase_request');

    $ci->db->where('department_id',$id);
    $ci->db->where('request_current_status','Complite');
   
    $query = $ci->db->get();

    $res = $query->result();

    return count($res); 

}

function get_inprocess_pr($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_id');

    $ci->db->from('purchase_request');

    $ci->db->where('department_id',$id);
    $ci->db->where('request_current_status !=','Complite');
    $ci->db->where('request_status','Active');
    $query = $ci->db->get();

    $res = $query->result();

    return count($res); 

}
function get_rejected_pr($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('request_id');

    $ci->db->from('purchase_request');

    $ci->db->where('department_id',$id);
    $ci->db->where('request_status','Rejected');
   
    $query = $ci->db->get();

    $res = $query->result();

    return count($res); 

}


function get_count_review($id)

{

	$ci=& get_instance();

	$ci->load->database();

	$ci->db->select('tour_id');

    $ci->db->from('pv_feedback');

    $ci->db->where('tour_id',$id);
    $ci->db->where('status','Active');
   
    $query = $ci->db->get();

    $res = $query->result();

    return count($res); 

}



function get_page_details($segment_1,$segment_2="")
{
    $ci = & get_instance();
    $ci->load->database();

    //echo $segment_1;
    //echo $segment_2; 
    if($segment_1=="Home" || $segment_1=="About" || $segment_1=="Editorial Board" || $segment_1=="Author Guidelines" || $segment_1=="Archives" || $segment_1=='Publication Ethics'  || $segment_1=='Contact Us' || $segment_1=='Login')
    {
        return $ci->db->select('meta_title,meta_keywords,meta_description')->from('nec_page_management')->where(array('page_title'=>$segment_1))->get()->row();
    }
    else
    {   
        //$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $segment_2);
        if($segment_1=="Featured Article Details")
        {

            return $ci->db->select('meta_title,meta_keywords,meta_description')->from('nec_journal')->where(array('status'=>'Active','journal_id'=>base64_decode($segment_2)))->get()->row();
        }
       
        else if($segment_1=="Archive Details")
        {
            return $ci->db->select('meta_title,meta_keywords,meta_description')->from('nec_journal')->where(array('status'=>'Archive','journal_id'=>base64_decode($segment_2)))->get()->row();
        }
        /*else
        {           
            echo $segment_1."<br>"; 
            echo $segment_2."<br>"; die;
        } */
    }
}




?>