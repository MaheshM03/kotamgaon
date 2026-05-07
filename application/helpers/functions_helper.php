<?php 

function get_site_details()
{
	$ci = & get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('nec_site_details')->where('site_id',1)->get()->row();
	return $result;
}






function get_banners()
{
	$ci = & get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('li_banner')->where('status','Active')->order_by('sort_order asc')->get()->result();
	return $result;
}
function get_social_icon()
{
	$ci = & get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('nec_social_links')->where('status','Active')->get()->result();
	return $result;
}
function get_events()
{
	$ci = & get_instance();
	$ci->load->database();
    $result=$ci->db->select('*,li_events.modified_date as m_date')->from('li_events')->limit(1,0)->order_by('li_events.modified_date desc')->limit(2,0)->where(array('li_events.status'=>'Active'))->get()->result();
    return $result;
}

function get_events1()
{
	$ci = & get_instance();
	$slug = $ci->session->userdata('slug');
	$multipleWhere = ['li_events1.status'=>'Active', 'li_events1.journal'=>$slug];
	$ci->load->database();
    $result=$ci->db->select('*,li_events1.modified_date as m_date')->from('li_events1')->limit(1,0)->order_by('li_events1.modified_date desc')->limit(2,0)->where($multipleWhere)->get()->result();
    return $result;
}

function get_index_journals()
{
	$ci = & get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('li_journal_index_links')->where('status','Active')->get()->result();
	return $result;
}
function get_journal_impact()
{
	$ci = & get_instance();
	$ci->load->database();
    $result=$ci->db->select('*')->from('li_journal_impact')->where('id',1)->get()->row();
    return $result;
}

function get_current_issue($year)
{
	$ci = & get_instance();
	$ci->load->database();
	$query=$ci->db->query("SELECT DISTINCT(current_issue_id),current_issue_title,archive_year FROM `li_archive` JOIN  li_current_issue on `li_current_issue`.`current_issue_id`=`li_archive`.`current_issue` where `archive_year`=$year ORDER BY `li_current_issue`.`current_issue_id` DESC");

	$result=$query->result();
    return $result;
}
function get_archive($current_issue,$year)
{
	$ci = & get_instance();
	$ci->load->database();
    $result=$ci->db->select('*')->from('li_archive')->where(array("current_issue"=>$current_issue,"archive_year"=>$year))->get()->result();
    return $result;
}

function get_current_issue2($year)
{
	$ci = & get_instance();
	$ci->load->database();
	$query=$ci->db->query("SELECT DISTINCT(current_issue_id),current_issue_title,archive_year FROM `li_archive1` JOIN  li_current_issue2 on `li_current_issue2`.`current_issue_id`=`li_archive1`.`current_issue` where `archive_year`=$year ORDER BY `li_current_issue2`.`current_issue_id` DESC");

	$result=$query->result();
    return $result;
}
function get_archive2($current_issue,$year)
{
	$ci = & get_instance();
	$ci->load->database();
    $result=$ci->db->select('*')->from('li_archive1')->where(array("current_issue"=>$current_issue,"archive_year"=>$year))->get()->result();
    return $result;
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



?>
