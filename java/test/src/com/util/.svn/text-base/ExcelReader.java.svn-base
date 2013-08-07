package com.util;
import jxl.Cell;
import jxl.Sheet;
import jxl.Workbook;

import  java.io.File; 

public class ExcelReader {
	
	public String[][] read(String path){
		try{
			//
			Workbook book = Workbook.getWorkbook( new File(path));
			//  
			Sheet sheet  =  book.getSheet(0);
			int columnNums = sheet.getColumns();
			int rowNums = sheet.getRows();
			System.out.println("column:" + columnNums + "\nrow:" + rowNums);
			String[][] result = new String[rowNums][columnNums];
			for(int i=0; i<rowNums; i++){
				Cell[] tmp = sheet.getRow(i);
				for(int j=0; j<columnNums; j++){
					result[i][j] = tmp[j].getContents();
				}
			}
			// 
			book.close();
			return result;
		}catch(Exception e){
			System.out.println(e);
		}
		return null;
	}
	
	public void printData(String[][] data){
		for(String[] i:data){
			for(String j:i){
				System.out.print(j + " ");
			}
			System.out.print("\n");
		}
	}
	
	public String[][] dealData(String[][] data){
		System.out.print(data.length);
		for(int i=0;i<data.length;i++){
			String[] result = data[i][1].split(",");
			int sum = Integer.parseInt(result[5]);
			int blue = sum%100;
			int sixRed = (sum - blue) / 100;
			result[5] = Integer.toString(sixRed);
			//System.out.print(result[5] + " "+ blue + "\n");
			data[i][1] = result[0] + "," + result[1] + "," + result[2] + "," + result[3] + "," + result[4] + "," + result[5] + "," + Integer.toString(blue); 
		}
		return data;
	}
}
