<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="style.css">
<title>Ott Login</title>
</head>
<body>
<%
response.setHeader("Cache-Control","np-Cache,no-store,must-revalidate");

%>
 <div class="login-page">
        <div class="form">
        

        <form class="login-form" action="Login" method="post">
            <input type="text" placeholder="Username" name="uname">
            <input type="password" placeholder="Password" name="pass">
            <input type="submit" value="Login" style="background-color:orange">
            <p class="msg">not Registered ?<a href="register.jsp">Sign Up</a></p>
        </form>
        </div>
    </div>

</body>
</html>