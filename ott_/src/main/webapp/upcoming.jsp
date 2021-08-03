<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
     <%@page import="java.sql.*" %> 
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<style>
div
{
 margin: auto;
  width: 50%;

  padding: 30px;
}
body
{
background-color: black;
color:white;
font-size: 30px;
}
</style>
</head>
<body>


<div>
  <%   
   Connection con;
   PreparedStatement pst;
   ResultSet rs;

Class.forName("com.mysql.jdbc.Driver");
con = DriverManager.getConnection("jdbc:mysql://localhost:3306/ott","root","");
                       
   String query = "select * from upcoming;";
    Statement st = con.createStatement();
                                  
    rs =  st.executeQuery(query);
                                  
     while(rs.next())
     {
 %>
<iframe width="600" height="345" src=<%=rs.getString("video") %>>
</iframe><br>
<footer><%=rs.getString("footer") %></footer><hr>
 
<%} %>
</div>
</body>
</html>