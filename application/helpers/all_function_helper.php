<?php

 function amount_format($amount)
 {
 	return number_format($amount,2);
 } 

 function current_date()
 {
    return date('Y-m-d h:i:sa');
 }

 function date_in_format($date)
 {
 	if ($date) 
 	{
 		return date('d M Y h:i:sa',strtotime($date)); 
 	}
 }
 function date_in_format2($date)
 {
 	if ($date) 
 	{
 		return date('d M Y',strtotime($date)); 
 	}
 }

 function change_date_format($date)
 {
 	if ($date) 
 	{
 		return date('Y-m-d',strtotime($date)); 
 	}
 }   
   

function send_email($from,$to,$subject,$message)
{ 		
	$ci=& get_instance();
	$ci->load->database();
 
	if ($ci->config->item('config_EMAIL')==TRUE) 
	{ 
		$ci->email->from($from);
		$ci->email->set_mailtype('html');
		$ci->email->to($to);
		$ci->email->subject($subject);
		$ci->email->message($message);
		return $ci->email->send();			 
		$ci->email->clear(TRUE);
	} 
}

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
            //$url='http://173.45.76.227/send.aspx?username='.$userName.'&pass='.$passWord.'&route=trans1&senderid='.$senderID.'&numbers='.$to.'&message='.$message;
            $url='https://bulksms.co/sendmessage.php?user='.$userName.'&password='.$passWord.'&mobile='.$to.'&message='.$message.'&sender='.$senderID.'&type=3&template_id=1507163117906230183';
                 $url_f =str_replace(" ", "%20", $url);
                 file($url_f);  
		}
	}
}

function get_random_id($table)
{	
	$ci=& get_instance();
	$ci->load->database();

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

	return trim(''.sprintf("%'.04d", $num));
}

function is_exists($key,$table,$where)
{
	$ci=& get_instance();
	$ci->load->database();

    $ci->db->where($where,$key);
    $query = $ci->db->get($table);
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}

function sum_value($key,$where,$table)
{
	$total = 0;
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select_sum($key);
    $ci->db->from($table);
    $ci->db->where($where);
    $query = $ci->db->get();
    $res = $query->row();
    if ($res) 
	{ 
	    foreach ($res as $key => $value) 
	    {
	    	 $total = $value;
	    }
	}
    return $total;
}
 
function getProductbySlug($slug)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('pid');
    $ci->db->from('geopos_products');
    $ci->db->where('product_slug',$slug);
    $query = $ci->db->get();
    $res = $query->row();
    
    if ($res!=null) {
         return $res->pid;
    }else{ 
        return null; 
    }
}
function getCategorybySlug($slug)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('id');
    $ci->db->from('geopos_product_cat');
    $ci->db->where('slug',$slug);
    
    $query = $ci->db->get();
    $res = $query->row();
    
    if ($res!=null) {
         return $res->id;
    }else{ 
        return null; 
    }
}

function getCategorybyid($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_product_cat');
    $ci->db->where('id',$id);
    $query = $ci->db->get();
    $res = $query->row();
    
    if ($res!=null) {
         return $res;
    }else{ 
        return null; 
    }
}


function getCustomerName($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('name');
    $ci->db->from('customers');
    $ci->db->where('id',$id);
    $query = $ci->db->get();
    $res = $query->row()->name;
    return $res; 
}
function getProductprice($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('product_price');
    $ci->db->from('geopos_products');
    $ci->db->where('id',$id);
    $query = $ci->db->get();
    $res = $query->row()->product_price;
    return $res; 
}

function getProductDesc($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('short_desc');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$id);
    $query = $ci->db->get();
    $res = $query->row()->short_desc;
    return $res; 
}

function getProductRow($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$id);
    $query = $ci->db->get();
    $res = $query->row();
    return $res; 
}

function getSubCategoryName($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('title');
    $ci->db->from('geopos_product_cat');
    $ci->db->where('id',$id);
    $query = $ci->db->get();
    $res = $query->row()->title;
    return $res; 
}

function getSubCategorySlug($slug)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('title');
    $ci->db->from('geopos_product_cat');
    $ci->db->where('slug',$slug);
    $query = $ci->db->get();
    $res = $query->row();
    if ($res!=null) 
    {
        return $res->title;
    }
    else
    {
    	return 'shop';
    }
    return $res; 
}

function isProductinStock($pid)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('*');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$pid);
    $query = $ci->db->get();
    $res = $query->row();

    if ($res!=null) 
    {
        return round($res->qty,0);
    }
    else
    {
    	return 0;
    }
}
 

function countCustomers($type)
{ 
	$ci=& get_instance();
    $ci->load->database();
    if (get_clientId()!=false) 
    { 
	    $ci->db->where('customer_addedfrom',get_clientId());  
	}
	$ci->db->where('customer_type',$type); 
	return  $ci->db->count_all_results('customers');
}

 function getUnitByCode($code)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('name');
    $ci->db->from('geopos_units');
    $ci->db->where('code',$code);
    $query = $ci->db->get();
    $res= $query->row();
    if ($res) 
    { 
        $res = $query->row()->name; 
        return $res; 
    }
    return null;
} 

function getMainCategories($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('*');
    $ci->db->from('geopos_product_main_cat');
    if ($id) 
    { 
	    $ci->db->where('id',$id);
	    $query = $ci->db->get();
	    $res = $query->row();
	    return $res; 
	}

    $query = $ci->db->order_by('id ASC');
    $query = $ci->db->get();
    $res = $query->result();
    return $res; 
}

function getCategories($category_id = '')
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('id,title,extra,slug');
    $ci->db->from('geopos_product_cat');
    
    if($category_id!=null)
    { 
     $ci->db->where('rel_id', $category_id); 
    }
    else
    { 
     $ci->db->where('c_type', 0);
    }
    $ci->db->order_by('sort_order','ASC');
    $query = $ci->db->get();
    return $query->result(); 
} 

function getAllSubCategories()
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('id,title,extra,slug');
    $ci->db->from('geopos_product_cat');     
    $ci->db->where('c_type !=', 0); 
    $ci->db->order_by('title','DESC');
    $query = $ci->db->get();
    return $query->result(); 
} 


function getCategories2($category_id = '')
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('id,title,extra,app_icon,website_image');
    $ci->db->from('geopos_product_cat');
     
    $ci->db->where('id', $category_id); 
     
    $ci->db->order_by('title','ASC');
    $query = $ci->db->get();
    return $query->result(); 
}

function getProductMetakeywords($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('seo_title,seo_keywords,seo_description');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$id);
    $query = $ci->db->get();
    $res = $query->row();
    return $res; 
}

function isLogin()
{ 
	$ci=& get_instance();
	$ci->load->database();
 	
 	$sess = null;
 	$sess = $ci->session->userdata(SESSION_NAME);

	if ($sess!=null) 
	{      
		$ci->db->select('*');
        $ci->db->from('geopos_customers');     
        $ci->db->where('id', $sess['user_id']);  
        $query = $ci->db->get();
        return $query->row(); 
	}
	else
	{
		return false;
	} 
} 

function countCatProducts($subCate_id)
{ 
	$ci=& get_instance();
	$ci->load->database();

    $ci->db->select('product_id'); 
    $ci->db->from('geopos_product_addedcats');   
    if ($subCate_id!='')  
    {  
        $ci->db->where('sub_id', $subCate_id); 
    } 
    $query = $ci->db->get();
    $allprods = $query->result();
     
    $productsid = array();
    if ($allprods) 
    {
        foreach ($allprods as $key) 
        { 
            $productsid[] = $key->product_id;
        }
    } 

    if (count($productsid)>0) 
    {
        $catProdos = 0;
        for ($i=0; $i < count($productsid); $i++) { 
            if($ci->session->userdata('DEF_CURRENCY')=='INR'){  
               $isPr = null;
               $isPr = $ci->db->get_where('geopos_products',array('pid' =>$productsid[$i],'INR_isPublish'=>'Yes'))->row();
               
               if ($isPr!=null) {
                    $catProdos++;
                    
               }
            }else{
               $isPr = null;
               $isPr = $ci->db->get_where('geopos_products',array('pid' =>$productsid[$i],'USD_isPublish'=>'Yes'))->row(); 
               if ($isPr!=null) {
                    $catProdos++;
               } 
            }
        }  
         
        return $catProdos; 
    }else{
        return 0;
    }
} 

function getProductsDetails($product_id = '')
{ 
	$ci=& get_instance();
	$ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');  
    $ci->db->join('geopos_product_cat','geopos_product_cat.id=geopos_products.sub_id'); 
    //$ci->db->join('geopos_units','geopos_units.code=geopos_products.unit'); 
    $ci->db->where('geopos_products.pid', $product_id);
    $query = $ci->db->get(); 
    return $query->row();
}

function getProductsRecord($product_id = '')
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');  
    $ci->db->join('geopos_product_cat','geopos_product_cat.id=geopos_products.sub_id');
    $ci->db->where('geopos_products.pid', $product_id);
    $query = $ci->db->get(); 
    return $query->row();
}

function getMainCatProducts($cat_id = '')
{ 
	$ci=& get_instance();
	$ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');  
    $ci->db->join('geopos_product_cat','geopos_product_cat.id=geopos_products.sub_id'); 
    //$ci->db->join('geopos_units','geopos_units.code=geopos_products.unit'); 
    $ci->db->where('geopos_products.pcat', $cat_id);
    $query = $ci->db->get();
     
    return $query->result();
}

function getUnit($unit_id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('*');
    $ci->db->from('geopos_units');
    $ci->db->where('id',$unit_id);
    $query = $ci->db->get();
    $res = $query->row();
    
    if ($res) 
    {   
        $main_unit='';
        if($res->rid!=0){ 
        	$main_unit = getMainUnit($res->rid);
        }
    	$sub_unit = $res->name;

    	//return $main_unit.'-'.$sub_unit; 
        return $sub_unit; 
    }
} 

function getMainUnit($unit_id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('name');
    $ci->db->from('geopos_units');
    $ci->db->where('id',$unit_id);
    $query = $ci->db->get();
    return $res = $query->row()->name; 
} 


function getRoundPrice($amt)
{
	return round($amt,0);
}

function getProductImage($pid)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('image');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$pid);
    $query = $ci->db->get();
    $res = $query->row()->image;
    if ($res!='') 
    {
    	return base_url().'admin/userfiles/product/thumbnail/'.$res;
    }
}


function getMainCateName($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('geopos_product_main_cat.title as main_title,geopos_product_main_cat.id as main_id,geopos_product_cat.title as sub_title,geopos_product_cat.id as sub_id');
    $ci->db->from('geopos_product_cat');
    $ci->db->join('geopos_product_main_cat','geopos_product_main_cat.id=geopos_product_cat.main_cat_id');
    $ci->db->where('geopos_product_cat.id',$id);
    $query = $ci->db->get();
    return $res = $query->row();  
 } 

 
 function getProductDescount($pid)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('disrate');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$pid);
    $query = $ci->db->get();
    $res = $query->row()->disrate;
    if ($res!='') 
    {
    	return getRoundPrice($res);
    }
    else
    {
    	return 0;
    }
}

function company_details()
{
    $id=1;
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('cname,phone,email,address,city,region,country,postbox,logo');
    $ci->db->from('geopos_system');
    $ci->db->where('id', $id);
    $query = $ci->db->get();
    $result= $query->row(); 
    return $result; 
}
 
function getProdImage($product_id = '')
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');   
    $ci->db->where('pid', $product_id);
    $query = $ci->db->get();
    $res= $query->row();
    $p_img ='';

    if ($res) 
    {
      $img = $res->image;
      if ($img!='' && file_exists('./backend/userfiles/product/'.$img)) 
      {
        $p_img = base_url().'backend/userfiles/product/'.$img; 
      }
      else
      {
        $p_img = base_url().'backend/userfiles/default.png';
      }

    }
    return $p_img;
} 

function checkDeliveryAvailable($pincode)
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_locations');    
    $ci->db->where('find_in_set("'.$pincode.'", pincodes) <> 0');
    $query = $ci->db->get();
     
    return $query->row();
}

function getCustShipAddress($customer_id)
{ 
    $ci=& get_instance();
    $ci->load->database();

    $add = null;
    $ci->db->select('*');
    $ci->db->from('geopos_customers_address');    
    $ci->db->where('address_customer_id',$customer_id);
    $ci->db->where('is_deleted','No');
    $query = $ci->db->get();     
    $add = $query->result();
    return $add;
}

/*function get_invoice_status($invoice_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_invoices');
    $ci->db->where('id',$invoice_id);
    $query = $ci->db->get();
    $res = $query->row();
    $in_status = ''; $remark = ''; $ar = array('order_status'=>'','remark'=>'');
    if($res)
    {
         $status  = $res->invoice_status;
        
         $p_remark = $status;
         $c_remark = $res->Canceled_remark;
         $de_remark = $res->Delivered_remark;
         $con_remark = $res->Confirmed_remark;
         $pr_remark = $res->Processing_remark;
         
         if($status=='Processing'){
            $status = 'On The Way'; 
        }
        
        $ar['order_status'] = $status;
        $r[] = array('status'=>'Pending','remark'=>$p_remark);
        $r[] = array('status'=>'Confirmed','remark'=>$con_remark);
        $r[] = array('status'=>'Canceled','remark'=>$c_remark);
        $r[] = array('status'=>'On The Way','remark'=>$pr_remark);
        $r[] = array('status'=>'Delivered','remark'=>$de_remark);
        $ar['remark'] = $r;
    }
    
    return $ar;
}*/

function get_invoice_status($invoice_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_invoices');
    $ci->db->where('id',$invoice_id);
    $query = $ci->db->get();
    $res = $query->row();
    $in_status = ''; $remark = ''; $ar = array('order_status'=>'','remark'=>'');
    if($res)
    {
         $status  = $res->invoice_status;
         $invoiceid  = $res->id;
        
         $c_remark = $res->Canceled_remark;
         $de_remark = $res->Delivered_remark;
         $con_remark = $res->Confirmed_remark;
         $pr_remark = $res->Processing_remark;
         
         if($status=='Processing'){
            $status = 'On The Way'; 
        }
        
        $ar['order_status'] = $status;
        $r[] = array('status'=>'Pending','remark'=>$invoiceid);
        $r[] = array('status'=>'Confirmed','remark'=>$con_remark);
        $r[] = array('status'=>'Canceled','remark'=>$c_remark);
        $r[] = array('status'=>'On The Way','remark'=>$pr_remark);
        $r[] = array('status'=>'Delivered','remark'=>$de_remark);
        $ar['remark'] = $r;

        $timeline[] = array('status'=>'Pending','datetime'=>$res->invoicedate);
        $timeline[] = array('status'=>'Confirmed','datetime'=>$res->Confirmed_datetime);
        $timeline[] = array('status'=>'Canceled','datetime'=>$res->Canceled_datetime);
        $timeline[] = array('status'=>'On The Way','datetime'=>$res->Processing_datetime);
        $timeline[] = array('status'=>'Delivered','datetime'=>$res->Delivered_datetime); 

        $ar['order_timeline'] = $timeline;
    }
    
    return $ar;
}

function getinvoice_row($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_invoices');
    $ci->db->where('id',$id);
    $query = $ci->db->get();
    $res = $query->row();
    return $res;  
}

function getShippingAddress($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_customers_address');
    $ci->db->where('address_id',$id);
    $query = $ci->db->get();
    $res = $query->row();
    return $res; 
}

function getDeliveryPincodes()
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('pincodes');
    $ci->db->from('geopos_locations');
    $query = $ci->db->get();
    $pins = $query->result();
 
    $finalPins = array();
    if ($pins) 
    {
        foreach ($pins as $key) 
        { 
            $new_pins = explode(',', $key->pincodes);
            $finalPins= array_merge($finalPins,$new_pins); 
        }  
    }
      
    if ($finalPins) 
    {
        $pincodeCity=''; $pincodes_list=array();
       for ($i=0; $i < count($finalPins); $i++) 
       { 
            /*$url='http://www.postalpincode.in/api/pincode/'.$finalPins[$i];  
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_URL,$url); 
            $result=curl_exec($ch); 
            curl_close($ch); 
            // Will dump a beauty json :3
            $data = json_decode($result, true);
            
            if ($data['Status']) 
            { 
               $pincodeCity =  $data['PostOffice'][0]['Taluk']; 
            }*/ 

            $pincodes_list[] = (object) array('Pincode' =>$finalPins[$i],'City'=>$pincodeCity);
       }
 
       return $pincodes_list;
    }  

    return null;
}

function getProductMRP($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('product_price');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$id);
    $query = $ci->db->get();
    $res = $query->row()->product_price;
    return $res; 
}

function calculatProductDescount($pid)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$pid);
    $query = $ci->db->get();
    $res = $query->row();
    if ($res!='') 
    {
        $OrgPrice = $res->product_price;
        $salePrice = $res->fproduct_price;
        $percent = (($OrgPrice - $salePrice)*100) /$OrgPrice;
        $percentAmt  = round(($OrgPrice) * $percent/100);
        $finalDes = getRoundPrice($percentAmt);
 
        return array('percent' =>round($percent),'amount'=>round($finalDes));
    }
    else
    {
        return array('percent' =>0,'amount'=>0);
    }
}

function gettotalsaving($pid)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$pid);
    $query = $ci->db->get();
    $res = $query->row();
    if ($res!='') 
    {
        $OrgPrice = $res->product_price;
        $salePrice = $res->fproduct_price;
        $percent = $OrgPrice - $salePrice;
        $percentAmt  = round($percent);
 
        return array('save'=>$percentAmt);
    }
    else
    {
        return array('save'=>0);
    }
}


function getAllProductsNames()
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('product_name');
    $ci->db->from('geopos_products');
    $ci->db->group_by('product_name');
    $query = $ci->db->get();
    $res = $query->result();
    
    $pname='';
    $names = array();
    if ($res) 
    {
        $sr=0;
     foreach ($res as $key) 
     {
        /*if ($sr>=1) 
        { */
        $names[] = '"'.$key->product_name.'"';
        //}
        $sr++;
     }
    }

    $pname = implode(',',$names);
    return $pname;
}

function getSubCatBrands($cat1_id,$cat2_id,$cat3_id)
{ 
    $ci=& get_instance();
    $ci->load->database();

    $cats  = array(); $ar=array();
    if ($cat1_id!='' && $cat2_id=='' && $cat3_id=='') 
    {         
        $ci->db->select('id');
        $ci->db->from('geopos_product_cat');    
        $ci->db->where('main_cat_id', $cat1_id);
        $query = $ci->db->get();
        $cats = $query->result();
        
        foreach ($cats as $value) 
        {
          $ar[] = $value->id;
        } 
    }

    $ci->db->select('brand_name');
    $ci->db->from('geopos_products');
    
    if ($cat1_id!='' && $ar!='') {
        $ci->db->where_in('pcat', $ar); 
    } 
    if ($cat2_id!='') {
        $ci->db->where('pcat',$cat2_id);
    }
    if ($cat3_id!='') {
        $ci->db->where('sub_id',$cat3_id); 
    } 

    $ci->db->group_by('brand_name');
    $query = $ci->db->get();
   
    $res = $query->result(); 
    return $res;
}

function getSubCatWeight($cat1_id,$cat2_id,$cat3_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('weight');
    $ci->db->from('geopos_products');
    if ($cat2_id!='') {
        $ci->db->where('pcat',$cat2_id);
    }
    if ($cat3_id!='') {
        $ci->db->where('sub_id',$cat3_id); 
    } 
    $ci->db->group_by('weight');
    $query = $ci->db->get();
    $res = $query->result(); 
    return $res;
}

function getProductsCats($cat1_id,$cat2_id,$cat3_id)
{
    $ci=& get_instance();
    $ci->load->database();

    if ($cat2_id!='') {
        $ci->db->select('id as category2_id,main_cat_id as category1_id,title');
    }
    if ($cat3_id!='') {
        $ci->db->select('id as category3_id,rel_id as category2_id,title'); 
    }
    $ci->db->from('geopos_product_cat'); 
     
    if ($cat2_id!='') {
        $ci->db->where('id',$cat2_id); 
    }
    if ($cat3_id!='') {
        $ci->db->where('id',$cat3_id); 
    }
    $query = $ci->db->get();
    $res = $query->row(); 

    return $res;
     
}

function getSideBarMainCategories($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_product_main_cat');
    if ($id) 
    { 
        $ci->db->where('id',$id); 
    }

    $query = $ci->db->order_by('id ASC');
    $query = $ci->db->get();
    $res = $query->result();
    return $res; 
}

function getProductMaxQty($product_id = '')
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('max_order_qty');
    $ci->db->from('geopos_products');   
    $ci->db->where('pid', $product_id);
    $query = $ci->db->get(); 
    return $query->row()->max_order_qty;
}

function allproductsCategory()
{
    $ci=& get_instance();
    $ci->load->database();

    $allProducts = array();
    $ci->db->select('geopos_products.pcat,geopos_products.product_name as title,geopos_products.pid as id,geopos_products.sub_id as sub_category_id,("Product") as Type');
    $ci->db->from('geopos_products');
    $ci->db->join('geopos_product_cat','geopos_product_cat.id=geopos_products.sub_id');
    $ci->db->group_by('geopos_products.product_name');
    $query = $ci->db->get();
    $allProducts = $query->result();

    $allCategory = array();        
    $ci->db->select('geopos_products.pcat,geopos_product_cat.title as title,geopos_product_cat.id as id,geopos_products.pcat as sub_category_id,,("Category") as Type');
    $ci->db->from('geopos_product_cat');  
    $ci->db->join('geopos_products','geopos_products.sub_id=geopos_product_cat.id');
    $query = $ci->db->get();
    $allCategory = $query->result();

    $prod = array();
    if ($allProducts) 
    { 
      foreach ($allProducts as $key) 
      { 
        /*if ($key->title!=0) 
        {*/ 
            $prod[] = (object) array('title' =>$key->title,
                          'Type'            =>$key->Type,
                          'id'              =>$key->id,
                          );
        //} 
      }
    }

    $cats = array();
    if ($allCategory) 
    {
      foreach ($allCategory as $key) 
      {  
        $cats[] = (object) array('title' =>$key->title,
                      'Type'            =>$key->Type,
                      'id'              =>$key->id, 
                      );
      }
    }

    $final = array(); 
    $final = array_merge( $prod, $cats ); 
    $final = array_map("unserialize", array_unique(array_map("serialize", $final))); 
    sort( $final );

    return $final;
}

function getStates()
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_state');  
    $query = $ci->db->order_by('state_name ASC');
    $query = $ci->db->get();
    $res = $query->result();
    return $res; 
}

function getHomeCategory($category_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_home_categories');   
    $ci->db->where('category_id',$category_id);
    $ci->db->order_by('geopos_home_categories.sort_order','ASC');
    $query = $ci->db->get();
    $res = $query->result();
    return $res; 
}

function isWishlist($product_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $sess = null; $res=null;
    $sess = $ci->session->userdata(SESSION_NAME);

    if ($sess!=null) 
    {    
        $ci->db->select('*');
        $ci->db->from('geopos_wishlist');   
        $ci->db->where('wishlist_customer_id',$sess['user_id']);   
        $ci->db->where('wishlist_product_id',$product_id);   
        $query = $ci->db->get();
        $res = $query->row();
    }
    return $res; 
}

function countitem($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('count(tid) as count');
    $ci->db->from('geopos_invoice_items');
    $ci->db->where('tid',$id);
    $query = $ci->db->get();
    $res = $query->row()->count;
    return $res; 
} 
function sumitem($id)
{
	$ci=& get_instance();
	$ci->load->database();

	$ci->db->select('sum(qty) as sumi');
    $ci->db->from('geopos_invoice_items');
    $ci->db->where('tid',$id);
    $query = $ci->db->get();
    $res = $query->row()->sumi;
    return $res; 
} 

function getProductAllData($product_id = '')
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');  
    $ci->db->join('geopos_product_cat','geopos_product_cat.id=geopos_products.sub_id');
    $ci->db->where('geopos_products.pid', $product_id);

    if($ci->session->userdata('DEF_CURRENCY')=='INR'){  
        $ci->db->where('geopos_products.INR_isPublish', 'Yes');
    }else{
        $ci->db->where('geopos_products.USD_isPublish', 'Yes');
    }

    $query = $ci->db->get(); 
    $product = $query->row();
 
    $data = array('p_id'=>'');
    if ($product) 
    {
       $discount = calculatProductDescount($product_id);
       $rating   = get_rating($product_id);
       $rating_tot   = get_total_rating($product_id);
       $gettotalsave = gettotalsaving($product_id);

       $data['p_id']                = $product->pid;
       $data['p_name']              = $product->product_name;       
       if($ci->session->userdata('DEF_CURRENCY')=='INR'){  
           $data['p_mrp_price']     = $product->product_price;
           $data['p_offer_price']   = $product->fproduct_price;
       }else{
           $data['p_mrp_price']     = $product->USD_product_price;
           $data['p_offer_price']   = $product->USD_fproduct_price;
       }
       $data['USD_fproduct_price']  = $product->USD_fproduct_price;
       $data['product_code']        = $product->product_code;
       $data['product_color']       = $product->product_color;
       $data['USD_product_price']   = $product->USD_product_price;
       $data['p_sub_categoryid']    = $product->sub_id;
       $data['p_sub_category']      = $product->title;
       $data['p_tax']               = $product->taxrate;
       $data['p_stock']             = round($product->qty);
       $data['p_short_desc']        = $product->short_desc;
       $data['p_description']       = $product->product_des;
       $data['p_weight']            = $product->weight;
       $data['p_SKU_no']            = $product->SKU_no;
       $data['p_disPerc']           = $discount['percent'];
       $data['p_disAmt']            = $discount['amount'];
       $data['gettotalsaving']      = $gettotalsave['save'];
       $data['p_tags']              = $product->tags; 
       $data['p_specification']     = $product->product_specification; 
       $data['p_shipping_policy']   = $product->shipping_policy; 
       $data['p_buyer_protection']  = $product->buyer_protection; 
       $data['p_return_policy']     = $product->return_policy; 
       $data['p_available_in']      = $product->available_in; 
       $data['p_rating']            = $rating; 
       $data['p_total_rating']      = $rating_tot; 
       $data['p_youtube_link']      = $product->youtube_link; 
       $data['p_slug']              = $product->product_slug; 
       $data['p_image']             = getProdImage($product->pid); 
    }

    return (object) $data;
}
 
function getProductMoreImages($product_id = '')
{ 
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('*');
    $ci->db->from('geopos_products');  
    $ci->db->join('geopos_product_images','geopos_product_images.product_id=geopos_products.pid');
    $ci->db->where('geopos_products.pid', $product_id);  
    $query = $ci->db->get(); 
    $imgs = $query->result();
 
    if ($imgs){
       return $imgs; 
    }else{
       return null;
    }
}

//RATING
function get_rating($product_id)
{
    $ci=& get_instance();
    $ci->load->database();

    /*$ci->db->select('rating_total');
    $ci->db->from('geopos_products');
    $ci->db->where('pid',$product_id);
    $q = $ci->db->get();
    $product = $q->row(); 
    
    $ci->db->select('COUNT(*) as num');
    $ci->db->from('geopos_reviews');
    $ci->db->where('product_id',$product_id);
    $query = $ci->db->get();
    $res = $query->row();
    $total = $product->rating_total;
    $num   = $res->num;
 
    if ($num > 0) {
        return $number = $total / $num;
       // return number_format((float) $number, 2, '.', '');
    } else {
        return 0;
    }
    */
      $rat = 0;
      $ci->db->select('AVG(rating) as rating');
      $ci->db->from('geopos_reviews');
      $ci->db->where('product_id', $product_id);
      $data = $ci->db->get();
      foreach($data->result_array() as $row)
      {
       $rat = round($row["rating"]);
      } 
    
      return $rat;

}

function get_total_rating($product_id)
{
    $ci=& get_instance();
    $ci->load->database(); 
    
    $ci->db->select('COUNT(*) as num');
    $ci->db->from('geopos_reviews');
    $ci->db->where('product_id',$product_id);
    $ci->db->where('status','Approve');
    $query = $ci->db->get();
    $res = $query->row();
     
    return $num   = $res->num;
}

function getProductReview($product_id)
{
    $ci=& get_instance();
    $ci->load->database();

    $ci->db->select('geopos_reviews.*');
    $ci->db->from('geopos_reviews');
    $ci->db->join('geopos_products','geopos_products.pid=geopos_reviews.product_id');
    $ci->db->where('geopos_reviews.product_id',$product_id);
     $ci->db->where('geopos_reviews.status','Approve');
    $ci->db->order_by('geopos_reviews.id','DESC');
    $ci->db->limit(5);
    $q = $ci->db->get();
    return $product = $q->result();  
}

function getCountries()
{ 
    $ci=& get_instance();
    $ci->load->database();

    /*$this->db->select('geopos_country.country_title');
    $this->db->from('geopos_shipcalculator_outofindia');
    $this->db->join('geopos_country','geopos_country.country_id=geopos_shipcalculator_outofindia.country_id'); 
    $q= $this->db->get();
    return $shipData = $q->result();*/ 

    $ci->db->select('country_title');
    $ci->db->from('geopos_country'); 
    $q= $ci->db->get();
    return $shipData = $q->result();
}

function checkImage($url)
{ 
    $ci=& get_instance();
    $ci->load->database(); 
  
      if ($url!='' && file_exists('./'.$url)) 
      {
        $p_img = base_url().$url; 
      }
      else
      {
        $p_img = base_url().'backend/userfiles/default.png';
      } 
    return $p_img;
} 
 

?>