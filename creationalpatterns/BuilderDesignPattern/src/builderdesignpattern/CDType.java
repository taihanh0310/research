/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package builderdesignpattern;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author nthanh
 */
public class CDType {
    private List<Packing> items = new ArrayList<Packing>();
    
    public void addItem(Packing pack){
        items.add(pack);
    }
    
    public void getCost(){
        for(Packing pack: items){
            pack.price();
        }
    }
    
    public void showItems(){
        for(Packing pack: items){
            System.out.print("CD Name " + pack.pack());
            System.out.println(", Price " + pack.price());
        }
    }
}
