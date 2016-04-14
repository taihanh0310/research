/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prototypedesignpattern;

/**
 *
 * @author nthanh
 */
public class EmployeeRecord implements Prototype {

    private String name;
    private String designation;
    private Double salary;
    private String address;

    public EmployeeRecord() {
        System.out.println("   Employee Records of Oracle Corporation ");
        System.out.println("---------------------------------------------");
        System.out.println("Eid" + "\t" + "Ename" + "\t" + "Edesignation" + "\t" + "Esalary" + "\t\t" + "Eaddress");
    }
    
    public EmployeeRecord(String name, String des, Double sa, String addr){
        this.name = name;
        this.designation = des;
        this.salary = sa;
        this.address = addr;
    }
    
    /**
     * @author NTHanh
     * @Param: EmployeeRecord object
     */
    public void showRecord(){
        System.out.println("-----------------Emplayee Information---------------");
        System.out.println("Your Name: " + this.name);
        System.out.println("Your designation: " + this.designation);
        System.out.println("salary: " + this.salary);
        System.out.println("Address: " + this.address);
        System.out.println("-----------------------------------------------------");
    }
    
    @Override
    public Prototype getClone() {
        return new EmployeeRecord(name, name, salary, address);
    }

}
