

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class signup
 */
@WebServlet("/signup")
public class signup extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String  em=request.getParameter("email");
		String un = request.getParameter("uname");
		String pass=request.getParameter("pwd");
		System.out.print(em+" "+un+" "+pass);
		Statement stm = null;
		try
		{
			System.out.println("getting there");
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection c =DriverManager.getConnection("jdbc:mysql://localhost:3306/ott","root","");
			String sql ="insert into user values('"+em+"','"+un+"','"+pass+"');";
			//PreparedStatement ps =(PreparedStatement) c.prepareStatement(sql);
			stm = c.createStatement();
			stm.execute(sql);
			 System.out.println("Connected");
			 response.sendRedirect("http://localhost/webtech/plans.php?email="+em);
			
			/*if(ps.execute(sql))
			{
				System.out.print("working");
				
				response.sendRedirect("login.jsp");
			}
			else
			{
				System.out.print("not working");
			}*/
		}
		catch(Exception ex)
		{
			System.out.print(ex);
			PrintWriter writer = response.getWriter();
			String s = "<html><body><h2>Wrong in Sign Up </h2></body></html>";
			writer.println(s);
		}
	}

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
