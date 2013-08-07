package com.model;

import java.sql.SQLException;

import com.util.Db;

public class Caipiao extends Db {
	
	public Caipiao(){
		
	}
	
	public boolean insert(String[][] data){
		
    	for(String[] row:data){
    		String sql = "insert into `caipiao` (`id`,`result`,`date`) VALUES ('"+ row[0] +"','"+ row[1] +"','"+ row[2] +"')";
    		try {
				execUpdate(sql);
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
				return false;
			}
    	}
    	return true;
	}
	
	public boolean deleteAll(String tableName){
		try {
			String sql = "DELETE FROM " + tableName;
			execUpdate(sql);
			return true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
		
	}
}
