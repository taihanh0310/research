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
public class ChauPhi extends DatLienFactory
{

    @Override
    public DongVatAnThit TaoDongVatAnThit()
    {
        return new ConSuTu();
    }

    @Override
    public DongVatAnCo TaoDongVatAnCo()
    {
        return new ConLinhDuong();
    }
    
}
