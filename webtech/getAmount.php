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
    $sql = "select Amount from wallet";
    $retval = $conn->query($sql);
  
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = $retval->fetch_assoc()) {
    $amount= $row['Amount'];
    
  }
  if($amount>0)
  echo $amount;
  else
  echo "recharge now";
}
  ?>