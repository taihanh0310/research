/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prototypedesignpattern;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 * @Description : Clone mot object va minh customized theo yeu cau 
 * @Description : Neu chi phi tao ra mot object moi chi phi qua lon thi co the dung den p2 nay
 * @author nthanh
 * @refer: http://www.javatpoint.com/prototype-design-pattern
 */
public class PrototypeDesignPattern {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        // TODO code application logic here
        BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
        System.out.print("Enter Employee Name: ");  
        String ename=br.readLine();  
        System.out.print("\n");  
          
        System.out.print("Enter Employee Designation: ");  
        String edesignation=br.readLine();  
        System.out.print("\n");  
          
        System.out.print("Enter Employee Address: ");  
        String eaddress=br.readLine();  
        System.out.print("\n");  
          
        System.out.print("Enter Employee Salary: ");  
        double esalary= Double.parseDouble(br.readLine());  
        System.out.print("\n");  
        
        //create employee 1 
        EmployeeRecord e1 = new EmployeeRecord(ename, eaddress, esalary, eaddress);
        //show information of employee e1
        e1.showRecord();
        
        //employee e2
        EmployeeRecord e2;
        e2 = (EmployeeRecord)e1.getClone();
        e2.showRecord();
    }
    
}
