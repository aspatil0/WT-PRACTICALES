<%@ page import="java.sql.*" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Student Information</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Student Information</h2>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Division</th>
            <th>City</th>
        </tr>

        <%
            // Database connection parameters
            String dbURL = "jdbc:mysql://localhost:3306/student_db";
            String dbUser = "root";  // Change as per your MySQL username
            String dbPass = "1234";  // Change as per your MySQL password

            Connection conn = null;
            Statement stmt = null;
            ResultSet rs = null;

            try {
                // Load MySQL JDBC Driver
                Class.forName("com.mysql.cj.jdbc.Driver");
                
                // Establish Connection
                conn = DriverManager.getConnection(dbURL, dbUser, dbPass);
                
                // Execute SQL Query
                stmt = conn.createStatement();
                String sql = "SELECT * FROM students_info";
                rs = stmt.executeQuery(sql);

                // Iterate through result set and display data
                while (rs.next()) {
        %>
                    <tr>
                        <td><%= rs.getInt("stud_id") %></td>
                        <td><%= rs.getString("stud_name") %></td>
                        <td><%= rs.getString("class") %></td>
                        <td><%= rs.getString("division") %></td>
                        <td><%= rs.getString("city") %></td>
                    </tr>
        <%
                }
            } catch (Exception e) {
                out.println("<tr><td colspan='5'>Error: " + e.getMessage() + "</td></tr>");
            } finally {
                // Close resources
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            }
        %>

    </table>
</body>
</html>
