<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .f{
            margin: 50px;
        }
        td
        {
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="f">
        <center>
        Enter Account Number <input type="text" id="acc" name="acc"><br><br>
        <button onClick='GetBalance()'>Show Balance</button>
        </center>
    </div>
<center>
    <table>
        <tr>
            <td>Account Balance  :</td>
            <td><p id='balance'></p></td>
        </tr>
        <h4>Transfer Money</h4>
        <tr>
            <td>
              recipient Accnt No: <br>
              <input type="text" name="rc"><br>
              Amount  : <br>
              <input type="text" name="am"><br><br>
              <center><button name='Transfer'>Transfer</button></center>
              
            </td>
            <td><p id="sts"></p></td>
        </tr>
    </table>
    </center>

    <script>
     function GetBalance()
     {
        var str=document.getElementById('acc').value;
        const xhr =new  XMLHttpRequest();
        const container = document.getElementById('balance');
        document.getElementById('sts').innerHTML="Success";
        xhr.onload = function(){
            if(this.status===200){
            container.innerHTML = xhr.responseText;
            }else
            console.log("wrong");
        };

        xhr.open('get','getBalance.php?q='+str);
        xhr.send();  
     }
   
   
    </script>

    <?php
 
     if(isset($_POST['Transfer']))
     {     $from = $_GET['acc'];
        $to = $_GET['rc'];
        $amount = (int)$_GET['am'];
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname="test";
        $conn = mysqli_connect($host, $username, $password,$dbname);
         $conn->query("update Bank set Balance=Balance+'$amount' where Name='$to'");
         $conn->query("update Bank set Balance=Balance-'$amount' where Name='$from'");
         echo '<script>document.getElementById('.'sts'.').innerHTML='.'Success'.';</script>';
 
     }
 
    ?>

</body>
</html>