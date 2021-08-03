
import java.io.IOException;
import java.sql.*;
import java.util.Date;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.*;


@WebServlet("/Login")
public class Login extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
   
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//String un = "abhinandprem";
		String un = request.getParameter("uname");
		String pwd =request.getParameter("pass");
		HttpSession session = request.getSession();
		Date createTime = new Date(session.getCreationTime());
		Date lastAccessTime = new Date(session.getLastAccessedTime());
		try
		{
			System.out.println("getting there");
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection c =DriverManager.getConnection("jdbc:mysql://localhost:3306/ott","root","");
			String sql ="select * from user where username='"+un+"' and password='"+pwd+"';";
	 		PreparedStatement ps =(PreparedStatement) c.prepareStatement(sql);
			 System.out.println("Connected");
			ResultSet rs =ps.executeQuery(sql);
			if(rs.next())
			{
				session.setAttribute("username", un);
				session.setAttribute("id", session.getId());
				session.setAttribute("d1", createTime);
				session.setAttribute("d2", lastAccessTime);
				 Cookie ck=new Cookie("uname",un);
				    response.addCookie(ck);
				
				response.sendRedirect("landing.jsp");
				System.out.println("working");
			}
			else
				response.sendRedirect("login.jsp");
		}
		catch(Exception ex)
		{
			System.out.print(ex);
		}
		
		
		
	   
	}

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
