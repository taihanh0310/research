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
public class InstitutionalPlan extends Plan{
    
    @Override
    public void getRate(){
        rate = 5.50;
    }
}
