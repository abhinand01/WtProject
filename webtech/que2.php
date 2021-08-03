<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div {
      background-color: lightgrey;
      width: 50px;
     font-size: large;
     font-weight: 100;
      padding: 50px;
      margin: 20px;
    }
    .center
    {
      
        margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
    }
    
    </style>
<body>
    
</p>
      <h3>Your Wallet</h3> 
    <div id="container">

    </div>
    <form method="post">
        <input type="submit" value="Recharge" name="Recharge">
    </form>
<center>
    <form class="center" method="post">
        <center><h4>Recharge</h4></center><br>
     Enter Customer Name :<input type="text" name="name"><br><br>
     Enter Mobile Number :<input type="text" name="mob"><br><br>
     Select Recharge plan : <select name="plan" >
  <option value="jio 500">Jio 500</option>
  <option value="Airtel 500">Airtel 500</option>
  <option value="jio 200">Jio 200</option>
  <option value="airtel 200">Airtel 200</option> 
</select><br><br>
  <input type="submit" value="recharge" name="add" value="add">
</select>

    </form>
    </center>


    <script>
        
            const xhr =new  XMLHttpRequest();
        const container = document.getElementById('container');
        xhr.onload = function(){
            if(this.status===200){
            container.innerHTML = xhr.responseText;
            }else
            console.log("wrong");
        };

        xhr.open('get','getAmount.php');
        xhr.send();
           
    </script>

<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname="test";
    $conn = mysqli_connect($host, $username, $password,$dbname);
    if(isset($_POST['Recharge']))
    { 
        $conn->query("update wallet set Amount=Amount+'500'");

    }
      
     if(isset($_POST['add']))
     {
         global $ret;
        
        $name=$_POST['name'];
        $mob=$_POST['mob'];
        $plan=$_POST['plan'];
        global $amount;
        
        if(strcmp($plan,"jio 500")==0  or strcmp($plan,"Airtel 500")==0 )
        {
            $amount=500;   
        }
        else 
        $amount =200;
        if ($conn->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $retval = $conn->query("select * from wallet");
            while($row = $retval->fetch_assoc())
            $pay = $row['Amount'];
        if($amount>$pay)
        {
            echo "<script>alert('recharge Your wallet');</script>";
        }
        else
        {
            

            try{
                $sql = "update wallet set Amount=Amount-'$amount'";
                $que = " insert into recharge values('$name','$mob','$plan')";
                $conn->query($sql);
                $conn->query($que);
                $ret= $conn->query("select * from recharge");
                if(! $ret ) {
                    die('Could not get data: ' . mysql_error());
                 }
                 echo "<center><table border='1' >
            
                  <tr>
            
                    <th>Customer</th>
            
                       <th>Mobile</th>
            
                  <th>plan</th>
            
                     </tr>";
            
             
            
            while($row = $ret->fetch_assoc())
            
              {
            
              echo "<tr>";
            
              echo "<td>" . $row['Customer'] . "</td>";
            
              echo "<td>" . $row['mobile'] . "</td>";
            
              echo "<td>" . $row['plan'] . "</td>";
            
            
            
              echo "</tr>";
            
              }
            
            echo "</table></center>";
            }
            catch(Exception $e)
            { 
                echo 'Message: ' .$e->getMessage();
              }
            
        }
       
      
     }
     

    ?>
</body>


</html>