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
public class ICICI implements Bank{
    private final String BName;
    
    public ICICI(){
        BName = "ICICI";
    }
    
    @Override
    public String getBankName() {
        return BName;
    }
    
}
