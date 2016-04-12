/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package singletondesignpattern;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.naming.spi.DirStateFactory;

/**
 * http://www.javatpoint.com/singleton-design-pattern-in-java
 *
 * @author nthanh
 */
public class JDBCSingleton {

    //Step 1
    // Create a JDBC Singleton class
    // static member holds only one instance of the JDBC singleton class
    private static JDBCSingleton jdbc;

    //JDBC Singleton prevents the instantiation from any other class
    private JDBCSingleton() {
    }

    //create instance class
    public static JDBCSingleton getInstance() {
        if (jdbc == null) {
            jdbc = new JDBCSingleton();
        }
        return jdbc;
    }

    //to get the connection from methods like insert, view ...
    private static Connection getConnection() throws ClassNotFoundException, SQLException {
        Connection con = null;
        Class.forName("com.mysql.jdbc.Driver");
        con = DriverManager.getConnection("jdbc:mysql://localhost:3306/basic-yii", "root", "");
        return con;
    }

    //to insert the record into the database
    public int insert(String name, String pass) throws SQLException {
        Connection c = null;
        PreparedStatement ps = null;
        int recordCounter = 0;

        try {
            c = this.getConnection();
            ps = c.prepareStatement("insert into temp_table(username,password) values (?,?)");
            ps.setString(1, name);
            ps.setString(2, pass);
            recordCounter = ps.executeUpdate();
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (c != null) {
                c.close();
            }
        }
        return recordCounter;
    }

    //to view the data from the database
    public void view(String name) throws SQLException {
        Connection con = null;
        PreparedStatement ps = null;
        ResultSet rs = null;
        try {
            con = this.getConnection();
            ps = con.prepareStatement("select * from temp_table where username = ?");
            ps.setString(1, name);
            rs = ps.executeQuery();
            while (rs.next()) {
                System.err.println("Name = " + rs.getString(2) + "\t" + "Password =" + rs.getString(3));
            }
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (con != null) {
                con.close();
            }
        }
    }

    // to update the password for the given username
    public int update(String username, String password) throws SQLException {
        Connection con = null;
        PreparedStatement ps = null;
        int recordCounter = 0;

        try {
            //get connection
            con = this.getConnection();
            //prepareStatement
            ps = con.prepareStatement("Update temp_table set password =? where username=" + username);
            //set value
            ps.setString(1, password);
            //update

            recordCounter = ps.executeUpdate();

        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (con != null) {
                con.close();
            }
        }
        return recordCounter;
    }

    // to delete the record for the given username
    public int delete(String username) throws SQLException {
        Connection con = null;
        PreparedStatement ps = null;
        int recordCounter = 0;

        try {
            //get connection
            con = this.getConnection();
            //prepareStatement
            ps = con.prepareStatement("DELETE FROM temp_table\n"
                    + "WHERE username = ?");
            //set value
            ps.setString(0, username);

            //update
            recordCounter = ps.executeUpdate();
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (ps != null) {
                ps.close();
            }
            if (con != null) {
                con.close();
            }
        }
        return recordCounter;
    }
}
