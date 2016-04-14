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
public class CDBuilder {
    public CDType buildSony(){
        CDType cds = new CDType();
        cds.addItem(new Sony());
        return cds;
    }
    
    public CDType buildSamSung(){
        CDType cds = new CDType();
        cds.addItem(new Samsung());
        return cds;
    }
}
