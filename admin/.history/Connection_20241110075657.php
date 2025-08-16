<?php 
mysqli_connect("localhost" ,"root", "","");
if(mysqli_connect_error()){
    echo "Can not Connect";
}
else {
    echo "COnnected";
}

?>