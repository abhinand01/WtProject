<!DOCTYPE html>
<html>
    <head>
        <title>Radio Buttons As Cards</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
      $mail = $_GET['email'];
    ?>
    
        <script>
            function check()
            {
                var val = "<?php echo $mail ?>"
                if(document.getElementById('card1').checked == true) {   
                
                window.location.href = 'payment.php?price=199&email='+val;
               } else if (document.getElementById('card2').checked == true){  
                window.location.href = 'payment.php?price=399&email='+val;  
                  } 
                  else if(document.getElementById('card3').checked == true)
                  {
                    window.location.href = 'payment.php?price=799&email='+val;

                  }
                  else alert("select anything");

            }
        </script>
        <div class="card">
            <input type="radio" name="pricing" id="card1" value="bs">
            <label for="card1">
                <h5>BASIC</h5>
                <h2>
                    <span>₹</span>
                    199
                    <span>/month</span>
                </h2>
            </label>
        </div>
        <div class="card">
            <input type="radio" name="pricing" id="card2" value="std">
            <label for="card2">
                <h5>STANDARD</h5>
                <h2>
                    <span>₹</span>
                    399
                    <span>/month</span>
                </h2>
            </label>
        </div>
        <div class="card">
            <input type="radio" name="pricing" id="card3" value="std">
            <label for="card3">
                <h5>PREMIUM</h5>
                <h2>
                    <span>₹</span>
                    799
                    <span>/month</span>
                </h2>
            </label>
        </div>
        <button class="button" onclick="check()">Go</button>
    </body>
</html>