/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package factory.method.pattern;

/**
 *
 * @author nthanh
 */
abstract class Plan {
    protected double rate;
    abstract void getRate();
    
    public void calculateBill(int units){
        System.out.println(units * rate);
    }
}
