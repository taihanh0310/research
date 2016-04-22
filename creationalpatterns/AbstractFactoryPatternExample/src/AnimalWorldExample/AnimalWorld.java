/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package AnimalWorldExample;

/**
 *
 * @author nthanh
 */
public class AnimalWorld
{
    private DongVatAnCo _dvac;
    private DongVatAnThit _dvat;
    
    public AnimalWorld(DatLienFactory d){
        this._dvac = d.TaoDongVatAnCo();
        this._dvat = d.TaoDongVatAnThit();
    }
    
    public void runFoodChain(){
        this._dvat.AnThit(_dvac);
    }
}
