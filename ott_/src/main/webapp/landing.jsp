<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home</title>
<link rel="stylesheet" href="background_styles.css">
      <link rel="stylesheet" href="styles.css">
    
</head>
<body>
<%
response.setHeader("Cache-Control","np-Cache,no-store,must-revalidate");
String s = (String)session.getAttribute("username");

if(session.getAttribute("username")==null)
{
	response.sendRedirect("login.jsp");	 
}
Cookie cookies[] = request.getCookies();
String str = null;
for(Cookie c:cookies)
{
	if(c.getName().equals("uname"))
	{
		str = c.getValue();
	}
	
}
System.out.print(str);

%>

 <script>
 var z="Session details".bold();
 var v ="User :<%=s%>"; 
 var b ="Session Id: <%=session.getAttribute("id")%>"
 var c ="created time : <%=(session.getAttribute("d1")) %>"
 var x="last accessed  time : <%=(session.getAttribute("d2")) %>"
 
	alert(v+"\n"+b+"\n"+c+"\n"+x);

 var i = 0; 		
var images = [];	
var time = 3000;	

images[0] = "image1.jpg";
images[1] = "image2.jpg";
images[2] = "image3.jpg";

function changeImg(){
	document.slide.src = images[i];
	if(i < images.length - 1){
	 
	  i++; 
	} else { 
	
		i = 0;
	}

	setTimeout("changeImg()", time);
}
window.onload=changeImg;
    </script>
 <nav class="navbar">
        <div class="brand-title">Watch</div>
        
        <div class="navbar-links">
          <ul>
            <li><a href="#">Movies</a></li>
            <li><a href="https://localhost/webtech/series.html">Series</a></li>
            <li><a href="upcoming.jsp">UpComing</a></li>
            <li><a href="logout"><button class="button button2" >Log out</button></a></li>
          </ul>
        </div>
      </nav>
      <p>
       Hello ,<%=str %>
      </p>
        <img name="slide" width="100%" height="440" />
</body>
</html>
