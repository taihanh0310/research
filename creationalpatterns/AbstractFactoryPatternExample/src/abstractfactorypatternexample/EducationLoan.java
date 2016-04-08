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
public class EducationLoan extends Loan {

    @Override
    void getInterestRate(double r) {
        rate = r;
    }
    
}
