<?php

   $host = "localhost";
   $username = "root";
   $password = "";
   $dbname="test";
   $names =array();
  
   $conn = mysqli_connect($host, $username, $password,$dbname);
  
   if ($conn->connect_error) {
      die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    $sql = "select username from sample";
    $retval = $conn->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
  $i=0;
   while($row = $retval->fetch_assoc()) {
    echo "EMP ID :{$row['username']}  <br> ";
    $names[$i]=$row['username'];
    $i=$i+1;
  }
  foreach($names as $value){
    echo $value . "<br>";}
 
}
   
?>
