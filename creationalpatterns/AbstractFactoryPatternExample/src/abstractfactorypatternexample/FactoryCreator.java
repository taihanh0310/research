/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package abstractfactorypatternexample;

/**
 *
 * @author nthanh
 */
public class FactoryCreator {
    public static AbstractFactory getFactory(String choise){
        if(choise.equalsIgnoreCase("Bank")){
            return new BankFactory();
        }else if(choise.equalsIgnoreCase("Loan")){
            return new LoanFactory();
        }
        return null;
    }
}
