/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package singletondesignpattern;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

/**
 *
 * @author nthanh
 */
public class SingletonDesignPattern {
    static int count=1;  
    static int  choice;
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        // TODO code application logic here
        JDBCSingleton jdbc = JDBCSingleton.getInstance();
        BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
        
        do{
            System.err.println("DATABASE OPERATIONS");
            System.out.println("---------------------------------------------");
            System.out.println(" 1. Insertion ");
            System.out.println(" 2. View ");
            System.out.println(" 3. Delete ");
            System.out.println(" 4. Update ");
            System.out.println(" 5. Exit ");
            
            System.out.print("\n");  
            System.out.print("Please enter the choice what you want to perform in the database: ");  
            
            choice = Integer.parseInt(br.readLine());
            
            switch(choice){
                case 1:{
                    System.out.println("Enter the username you want to insert data to the database: ");
                    String userName = br.readLine();
                    System.out.println("Enter the password you want to insert to the database");
                    String passWord = br.readLine();
                    try {
                        int i = jdbc.insert(userName, passWord);
                        if(i > 0){
                            System.out.println(count ++ + " Data has been inserted successfully");
                        }
                        else{
                            System.out.println("Data has not been inserted");
                        }
                    } catch (Exception e) {
                        System.out.println(e.getMessage());
                    }
                    System.out.println("Press Enter key to continue ....");
                    System.in.read();
                    break;
                }
                case 2:{
                    break;
                }
                case 3: {
                    break;
                }
                case 4: {
                    break;
                }
            }
        }while (choice != 4);
    }
    
}
