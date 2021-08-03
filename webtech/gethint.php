<?php
   $host = "localhost";
   $username = "root";
   $password = "";
   $dbname="ott";
   $names =array();
  
   $conn = mysqli_connect($host, $username, $password,$dbname);
  
   if ($conn->connect_error) {
      die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    $sql = "select username from user";
    $retval = $conn->query($sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
  $i=0;
   while($row = $retval->fetch_assoc()) {
    $names[$i]=$row['username'];
    $i=$i+1;
  }
  
 
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";


$name = array("ravi", "ram", "rani");
// lookup all hints from array if $q is different from ""
if ($q !== "") {
    if(strlen($q)<3)
    $hint = "must be more than 3 characters";
    if (in_array($q, $names))
     $hint="Already exists this username";
     if ($q == trim($q) && strpos($q, ' ') !== false) 
     $hint='White Space Not allowed';
  
     
     
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Allowed" : $hint;
?>