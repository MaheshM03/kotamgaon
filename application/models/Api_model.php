<?php
class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
   //For Android Api    
    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
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
    
    function count_all($id, $table, $where='')
	{	
		$this->db->select($id);
		$this->db->from($table);
		if($where)
		{$this->db->where($where);}
		$query = $this->db->get();
		return $query->num_rows();
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

    public function updateData($table,$where,$data)
    {
        $this->db->where($where);
        return $this->db->update($table,$data);
    }

    function check_valid_login($username,$password)
    {    
        $this->db->where('doctor_password', $password);
        $this->db->where('doctor_status !=', 'Deleted');
        $this->db->where('doctor_status !=', 'Deactive');
        $this->db->where('doctor_mobile=',$username);
        $q = $this->db->get('doctor'); 
        if($q->row())
        { 
           return $q->row();  
        }
        else
        {
          return False;
        }  
    } 

    public function getProducts($category_id,$product_id)
    {
        $this->db->select('products.*,category.category_title');
        $this->db->from('products'); 
        $this->db->join('category','category.category_id=products.product_category_id'); 
        if ($product_id!='') 
        {
            $this->db->where('products.product_id',$product_id);  
        }
        $this->db->where('products.product_category_id',$category_id);  
        $this->db->where('products.product_status !=','Deleted');  
        $this->db->order_by('products.product_id','DESC');
        $q = $this->db->get();
        return $q->result();
    }  
    
    public function get_readingData($customer_id,$startdate,$enddate)
    {
        $this->db->select('daily_reading.*,customer.*');
        $this->db->from('daily_reading'); 
        $this->db->join('customer','daily_reading.customer_id=customer.cust_id'); 
        $this->db->where('date >=', $startdate);
        $this->db->where('date <=', $enddate);
        $this->db->order_by('customer_id','DESC');
        $q = $this->db->get();
        return $q->result();
    }

    public function check_coupon_verify($coupon_code,$chemist_id)
    {
        $todayDate = date('Y-m-d');
        $this->db->select('coupon_code,coupon_amount,coupon_amount_type,coupon_id,coupon_order_limit');
        $this->db->from('coupons');
        $this->db->where('coupon_code',$coupon_code);
        $this->db->where('coupon_valid_from_date <=', $todayDate);
        $this->db->where('coupon_valid_to_date >=', $todayDate);
        $query = $this->db->get();
        $result = $query->row();
        return $result; 
    }

    public function checkUsedCoupons($coupon_data,$chemist_id)
    { 
        $coupon_id = $coupon_data->coupon_id;

        $this->db->select('order_coupon_id');
        $this->db->from('orders');
        $this->db->where('order_coupon_id',$coupon_id);
        $this->db->where('order_chemist_id',$chemist_id);
        $query = $this->db->get();
        $used  = $query->num_rows();  
         
        if ($used < $coupon_data->coupon_order_limit)
        {
            $isValid  = $coupon_data;
        }
        else
        {
            $isValid  = null;
        }  

        return $isValid;
    }

    public function getPurchaseOrders($chemist_id)
    {
        $limit = 5;
        $this->db->select('order_product_details'); 
        $this->db->from('orders');  
        $this->db->where('order_chemist_id',$chemist_id);   
        $this->db->order_by('order_date_time','DESC');
        $this->db->limit($limit);
        $q = $this->db->get();
        $ord = $q->result(); 

        if ($ord==null) 
        {
            $this->db->select('order_product_details');
            $this->db->from('orders');
            $this->db->order_by('order_date_time','DESC');
            $this->db->limit($limit);
            $q = $this->db->get();
            $ord = $q->result(); 
        }

        return $ord;
    }

    public function getRecentOrders($chemist_id,$order_id)
    {
        $this->db->select('*'); 
        $this->db->from('orders');  
        if ($order_id!='') 
        {
            $this->db->where('order_id',$order_id);  
        }
        $this->db->where('order_chemist_id',$chemist_id);   
        $this->db->order_by('order_date_time','DESC');
        $this->db->limit(6);
        $q = $this->db->get();
        $ord = $q->result();  
        return $ord;
    }

    public function getProductsData($product_id)
    {
        $this->db->select('products.*,category.category_title');
        $this->db->from('products'); 
        $this->db->join('category','category.category_id=products.product_category_id'); 
        if ($product_id!='') 
        {
            $this->db->where('products.product_id',$product_id);  
        }  
        $this->db->where('products.product_status !=','Deleted');  
        $this->db->order_by('products.product_id','DESC');
        $q = $this->db->get();
        return $q->result();
    }

    public function getSearchProducts($search_product)
    {
        $wh = "product_name LIKE '%$search_product%'";
        $this->db->select('products.*,category.category_title');
        $this->db->from('products'); 
        $this->db->join('category','category.category_id=products.product_category_id'); 
        if ($search_product!='') 
        {
            $this->db->where($wh);  
        }   
        $this->db->where('products.product_status !=','Deleted');  
        $this->db->order_by('products.product_id','DESC');
        $q = $this->db->get();
        return $q->result();
    }

    public function get_knowlege_base()
    {
        $this->db->select('*');
        $this->db->from('knowledge_base');
        $this->db->where('knowledge_status','Active');  
        $this->db->order_by('knowledge_id','DESC'); 
        $q = $this->db->get();
        return $q->result();
    }

    public function getOrderProductsByChemist($chemist_id,$order_id)
    { 
        $this->db->select('*');
        $this->db->from('order_product_details');
        $this->db->join('orders','orders.order_id=order_product_details.detail_order_id');
        $this->db->join('products','products.product_id=order_product_details.detail_product_id');
        if ($order_id) 
        {
            $this->db->where('order_product_details.detail_order_id',$order_id); 
        }
        $this->db->where('orders.order_chemist_id',$chemist_id);
        $this->db->group_by('order_product_details.detail_product_id'); 
        $query = $this->db->get();
        $res = $query->result(); 

        if ($res==null) 
        {
            $this->db->select('*');
            $this->db->from('order_product_details');
            $this->db->join('orders','orders.order_id=order_product_details.detail_order_id');
            $this->db->join('products','products.product_id=order_product_details.detail_product_id');             
            $this->db->group_by('order_product_details.detail_product_id'); 
            $query = $this->db->get();
            $res = $query->result(); 
        }

        return $res;
    }

    public function getAllOrders($chemist_id,$from_date,$to_date,$limit_per_page,$start_index,$order_id)
    {
        $this->db->select('*'); 
        $this->db->from('orders');  
        if ($from_date && $to_date=='') 
        {
             $from_date= $from_date.' 00:00:00';
             $this->db->where('order_date_time >=',$from_date); 
        }
        if ($from_date=='' && $to_date) 
        {
            $to_date  = $to_date.' 23:59:55';
            $this->db->where('order_date_time <=',$to_date); 
        }
        if ($from_date && $to_date) 
        {
            $from_date= $from_date.' 00:00:00';
            $to_date  = $to_date.' 23:59:55';
              
            $this->db->where('order_date_time >=',$from_date); 
            $this->db->where('order_date_time <=',$to_date); 
        }        
        if ($order_id!='') 
        {
            $this->db->where('order_id',$order_id);  
        }
        $this->db->where('order_chemist_id',$chemist_id);   
        $this->db->order_by('order_date_time','DESC');
        
        if($limit_per_page!="")
        {
            $this->db->limit($limit_per_page,$start_index); 
        }

        $q = $this->db->get();
        $ord = $q->result();  
        return $ord;
    }

    public function orderAddUpdate($chemist_id,$data)
    {         
        $this->db->where('chemist_id',$chemist_id);
        $this->db->update('chemist',$data);
    }

    public function get_chemistAddress($chemist_id)
    {
        $this->db->select('chemist.chemist_location,chemist.chemist_landmark,chemist.chemist_pincode,chemist.chemist_shipping_address,location.location,location.location_id');
        $this->db->from('chemist'); 
        $this->db->join('location','location.location_id=chemist.chemist_location');          
        $this->db->where('chemist.chemist_id',$chemist_id);     
        $q = $this->db->get();
        return $q->row(); 
    }

    function uplode_chemist_document($chemist_id,$document_type,$image)
    {
        $res = $this->api->get_singleData($table='chemist_document', $where = array('document_chemist_id' =>$chemist_id,'document_type'=>$document_type));       
        if ($res) 
        {
             $data=array( 
                    'document_image'         =>$image,
                    'document_approve_status'=>'Approved',
                    'document_modified_date' =>current_date() 
                );
                   $this->db->where('document_chemist_id',$chemist_id); 
                   $this->db->where('document_type',$document_type); 
            return $this->db->update('chemist_document',$data);
        }
        else
        { 
            $data=array(
                    'document_chemist_id'   =>$chemist_id,
                    'document_type'         =>$document_type,
                    'document_image'        =>$image,
                    'document_approve_status'=>'Approved',
                    'document_added_date'   =>current_date(),
                    'document_status'       =>'Active'
                );
            return $this->db->insert('chemist_document',$data);
        }
    }
    public function get_previousdata($date,$customer_id)
    {
        $start = 0;
        $limit = 1;
        $this->db->select('*'); 
        $this->db->from('daily_reading');  
        $this->db->where('date <', $date);
        $this->db->where('customer_id',$customer_id);
        $this->db->where('KWH!=','');   
        $this->db->order_by('id','DESC');
        $this->db->limit(1,0);
        $q = $this->db->get();
       // echo $this->db->last_query(); die;
        $ord = $q->row(); 

        return $ord;

    }

} //class closed