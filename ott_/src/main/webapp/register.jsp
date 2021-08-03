<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="style.css">
<title>Signup</title>
</head>
<body>
<%
response.setHeader("Cache-Control","np-Cache,no-store,must-revalidate");

%>
   <script>
        function Validate(methodtype)
        {
          var mail=document.getElementById("em").value;
         // var uname=document.getElementById("us").value;
          var pwd=document.getElementById("pd").value;
          var pwd_c=document.getElementById("pdc").value;
          if(mail=="" || pwd=="")
          alert("fill all Values");
          else{
          if(pwd==pwd_c)
          {
            if(pwd.length>8)
            {
            	document.getElementById("signup").action='signup';
            	document.getElementById("signup").method=methodtype;
            	document.getElementById("signup").submit();
            }
            else
            {
            alert("weak password");
            return false;
            }
          }
          else
          {
          alert("wrong");
          return false;
          }
        }
        }
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "http://localhost/webtech/gethint.php?q="+str, true);
                xmlhttp.send();
            }
        }
    </script>
    <div class="login-page">
        <div class="form">
    <form class="register-form" id="signup" >
        <input type="email" placeholder="email" id="em" name="email">
        <input type="text" placeholder="Username"  onkeyup="showHint(this.value)" name="uname" >
        <p><span id="txtHint" style="color: red;"></span></p>
        <input type="password" placeholder="Password" id="pd" name="pwd">
        <input type="password" placeholder="Confirm Password" id="pdc">
        <button type="button" onclick="Validate('POST')">Sign Up</button>
        <p class="msg">Already Registered ?<a href="login.jsp">Login</a></p>
    </form>
</div>
    </div>
    <p><span id="txtHint" style="color: red;"></span></p>

</body>
</html>