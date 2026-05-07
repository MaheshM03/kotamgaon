<?php 

function isPremissions($id)
{
    $ci=& get_instance();
    $ci->load->database();

    $premissions = $ci->config->item('config_premissions');
    
    $userPer = FALSE;
    if ($premissions!=null) 
    {
      $checkPer = $premissions[$id];
      if ($checkPer) 
      {
        foreach ($checkPer as $key => $value) 
        {
            if ($value=='Yes') { //if Yes or No
               $userPer = TRUE;  
            }else{
               $userPer = FALSE;  
            }
        }
      }
    }

    return $userPer;
 
}

?>