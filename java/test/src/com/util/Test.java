package com.util;
import java.math.BigInteger;
import java.util.Arrays;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.Scanner;

import com.model.Caipiao;

public class Test{
	public static void main(String[] args){
		Test a = new Test();
		a.testSQL();
		//Caipiao cp = new Caipiao();
		//cp.deleteAll("caipiao");
	}
	
	public void testSQL(){
		try{
			ExcelReader er = new ExcelReader();
			String[][] result = er.read("caipiao.xls");
			//er.printData(result);
			result = er.dealData(result);
			//er.printData(result);
			Caipiao cp = new Caipiao();
			cp.insert(result);
			
		}catch(Exception e){
			System.out.println(e);
		}
	}
	
	public void testGregorianCalendar(){
		GregorianCalendar gc = new GregorianCalendar(1970, Calendar.JANUARY, 1);
		System.out.println(gc);
		
	}
	
	public void testObject(){
		Date timeline;
		Date birthday = new Date();
		timeline = new Date();
		System.out.print(birthday.toString());
		
		int a;
		int b = 12;
		a = b;
		b = 13;
		
		System.out.print(a);
	}
	
	public int[] getPrice(int redRange,int blueRange){
		int[] redResult = new int[6];
		int blueResult = 0;
		int[] result = new int[7];
		// 
		int[] redArr = new int[redRange];
		for(int i=0; i<redRange; i++)
			redArr[i] = i+1;
		// 
		int[] blueArr = new int[blueRange];
		for(int i=0; i<blueRange; i++)
			blueArr[i] = i+1;
		int select=0;
		// 
		for(int i=0; i<6; i++){
			select = (int)(Math.random() * redRange);
			redResult[i] = redArr[select];
			redArr[select] = redArr[redRange-1];
			redRange--;
		}
		Arrays.sort(redResult);
		System.out.println("red ball:");
		for (int q:redResult)
			System.out.print(q + " ");
		System.out.print("\n");
		
		// 
		blueResult = (int)(Math.random() * blueRange);
		System.out.println("blue ball:");
		System.out.println(blueResult);
		
		// 
		System.arraycopy(redResult, 0, result, 0, 6);
		result[6] = blueResult;
		System.out.println("result:");
		for (int q:result)
			System.out.print(q + " ");
		System.out.print("\n");
		return result;
	}
	
	public void testArray(){
		//
		int[] o = new int[10];
		for(int p=0; p < 10; p++)
			o[p] = 10 - p;
		for (int q:o)
			System.out.print(q + " ");
		System.out.println("\n");
		// 
		int[] r = o;
		r[5] = 500;
		// 
		for (int q:o)
			System.out.print(q + " ");
		System.out.println("\n");
		
		// 
		int[] s = new int[10];
		System.arraycopy(o, 0, s, 0, 10);
		s[5] = 600;
		// 
		for (int q:o)
			System.out.print(q + " ");
		System.out.println("\n");
		Arrays.sort(o);
		for (int q:o)
			System.out.print(q + " ");
		System.out.println("\n");
	}
	
	public void testBigInteger(){
		BigInteger m = BigInteger.valueOf(100);
		System.out.println(m);
		BigInteger n = m.add(m);
		System.out.println(n);
	}
	
	public void testFor(){
		for(int l=10;l > 0; l--)
			System.out.println("counting down ..." + l);
		System.out.println("over");
	}
	
	public void testFormat(){
		double x = 10000.0 / 3.0;
		System.out.println(x);
		System.out.printf("%8.2f\n", x);
		System.out.printf("%tc\n", new Date());
		System.out.printf("%1$s %2$tB %2$te, %2$tY\n", "Due date:", new Date());
	}
	
	public void testInput(){
		System.out.print("What is your name?");
		Scanner in = new Scanner(System.in);
		String name = in.nextLine();
		System.out.println("Your name is " + name);
	}
	
	public void testNum(){
		System.out.print("hello");
		System.out.println(" world!");
		System.out.println("who i am");
		int a = 2147483647; // 2147483648
		double b = Double.MAX_VALUE;
		double c = Double.NaN;
		System.out.println(c);
		String d = "NaN";
		double e = 1.0/0;
		double f = 0.0;
		double g = f / 0;
		if(Double.isInfinite(e)){
			System.out.println("is Infinite");
		}
		
		if(Double.isNaN(g)){
			System.out.println("is NaN");
		}
		
		int h = 0;
		if(h == 0){  // g = 0
			System.out.println("true");
		}else{
			System.out.println("false");
		}
		
		int i = 123456789;
		int forthBit = (i & 8) / 8;
		System.out.println(forthBit);
		
		System.out.println(i);
		double j = (double)i;
		System.out.println(j);
		float k = (float)i;
		System.out.println(k);
		
		String greeting = "Hello";
		int length = greeting.length();
		System.out.println(length);
		char first = greeting.charAt(0);
		char last = greeting.charAt(length-1);
		System.out.println(first);
		System.out.println(last);
		
		String china = "i am ";
		System.out.println(china.charAt(2));
		String firstname = "i ";
		String lastname = "am";
		System.out.println(lastname + firstname);
		
		String testa = "hello";
		String testb = testa.substring(0,3) + "lo";
		boolean result = (testa == testb);
		System.out.println(result);
		result = testa.equals(testb);
		System.out.println(result);
		
	}
}