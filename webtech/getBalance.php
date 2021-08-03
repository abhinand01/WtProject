<?php
   $host = "localhost";
   $username = "root";
   $password = "";
   $dbname="test";
   $names =array();
  
   $conn = mysqli_connect($host, $username, $password,$dbname);
  $q=$_REQUEST['q'];
   if ($conn->connect_error) {
      die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    $sql = "select Name,Balance from Bank where AccNo='$q'";
    $retval = $conn->query($sql);
  
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = $retval->fetch_assoc()) {
   echo 'Name    :'.$row['Name'].'<br>';
   echo 'Balance :'.$row['Balance'].'<br>';
    
  }

}
  ?>