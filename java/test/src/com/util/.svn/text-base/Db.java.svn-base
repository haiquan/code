package com.util;

import java.sql.*;

public class Db {
    
    // URL
    private String url = "jdbc:mysql://127.0.0.1:3306/my_db";
    // MySQL user
    private String user = "root"; 
    // MySQL password
    private String password = "haiquan";
    
    public Connection con;
    public Statement stmt;
    public ResultSet rs;
    public ResultSetMetaData md;
    
    /**
    * 
    * @param connection sql
    */
    public Db() {
        // ��λ��
        try {
            Class.forName("com.mysql.jdbc.Driver");
            System.out.println("succ!"); 
        } catch (ClassNotFoundException e) {
            System.out.println("fail!");
            e.printStackTrace();
        }
        
        try {
            con = DriverManager.getConnection(url, user, password);
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void execSQL(String sql) throws SQLException {
       stmt = con.createStatement();
       rs = stmt.executeQuery(sql);
       md = rs.getMetaData();
    }

    /**
    *
    * @param sql
    *           resultSet
    * @return resultSet
    * @throws SQLException
    */
    public ResultSet getResultSet(String sql) throws SQLException {
       execSQL(sql);
       return rs;
    }
    
    /**
    *
    * @param sql
    *         SQLException
    * @throws SQLException
    */
    public void execUpdate(String sql) throws SQLException {
       stmt = con.createStatement();
       System.out.println(sql);
       stmt.executeUpdate(sql);
    }

    /**
    *
    * @param sql
    *           ResultSetMetaData
    * @return ResultSetMetaData
    * @throws SQLException
    */
    public ResultSetMetaData getResultSetMetaData(String sql)
        throws SQLException {
       execSQL(sql);
       return md;
    }

    /**
    * ResultSetMetaData
    *
    * @return ResultSetMetaData
    * @throws SQLException
    */
    public ResultSetMetaData getResultSetMetaData() throws SQLException {
       if (md == null)
        throw new SQLException("No query execed. "
          + "Please use methord getResultSet(String sql)"
          + " first to exec a sql.");
       else
        return md;
    }

}
