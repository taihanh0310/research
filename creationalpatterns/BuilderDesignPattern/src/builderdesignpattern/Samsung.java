/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package builderdesignpattern;

/**
 *
 * @author nthanh
 */
public class Samsung extends Company{

    @Override
    public Double price() {
        return 15.0;
    }

    @Override
    public String pack() {
        return "Samsung CD";
    }
    
}
