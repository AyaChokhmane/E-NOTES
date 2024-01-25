<?php 
function prep_data($data){
   $data=trim($data);
   $data=stripcslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}


?>