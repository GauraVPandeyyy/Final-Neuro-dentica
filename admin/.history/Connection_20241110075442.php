<?php 
mysqli_connect("localhost" ,"root",""admin_users");
if(mysqli_connect_error()){
    echo "Can not Connect";
}
else {
    echo "COnnected";
}

?>