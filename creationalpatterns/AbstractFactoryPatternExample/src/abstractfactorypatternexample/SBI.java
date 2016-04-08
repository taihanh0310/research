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
public class SBI implements Bank {
    private final String BName;
    public SBI(){
        BName = "SBI";
    }

    @Override
    public String getBankName() {
        return BName;
    }
    
    
}
