<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php
    $d=$_GET['price'];
    $mail=$_GET['email'];
    $amount = "amount :" .$d;

     if(isset($_POST['add']))
     {
        $host = "localhost";
        $username = "root";
        $password = "";
      
 
        $dbname="ott";
        $un=$_POST['uname'];
        $conn = mysqli_connect($host, $username, $password,$dbname);
        $today = date("d-m-Y");
        $next=date('d-m-Y', strtotime($today. ' + 30 days'));

        if ($conn->connect_error) {
           die("Connection failed: " . mysqli_connect_error());
       }
       else
       {
           $dt=date('Y-m-d');
           $date = new DateTime($dt);
           $interval = new DateInterval('P30D');
           $date->add($interval);
           $sql = "INSERT INTO  payment (username, pdate,ndate) VALUES ('$un',curdate(),DATE_ADD(curdate(),interval 30 day))";
           if ($conn->query($sql) === TRUE) {
               
               $to_email = $mail;
               $subject = "Payment Done";
               $body = "Hi, Enjoy Your one month Subscription\n Your next Payment on $next";
               $headers = "From: abhinandpreman@pec.edu";
               try{
                if (mail($to_email, $subject, $body, $headers)) {
                  echo "Email successfully sent to $to_email...";
                   } else {
                   echo "Email sending failed...";
                   }
                   echo "<script>alert('Payment Successfull');window.location.href = 'http://localhost:8887/ott_/login.jsp';</script>";
}
catch(Exception $e) { 
    echo 'Message: ' .$e->getMessage();
  }

             } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
             }
       }
     }
      

    ?>

<div class="login-page">
        <div class="form">


        <form class="login-form"  method="post" >

            <input type="text" value="<?php echo htmlentities($amount); ?>" name="uname" readonly>
            <input type="text" value="<?php echo htmlentities($mail); ?>" name="uname">
            <input type="text" placeholder="Owner name" name="pass">
            <input type="text" placeholder="card number" name="pass">
            <input type="text" placeholder="MM/YY" name="pass">
            <input type="text" placeholder="CVV" name="pass">
            <input type="submit" value="pay" style="background-color:red"  name="add" value="add"/>
        
        </form>
        </div>
    </div>
</body>
</html>