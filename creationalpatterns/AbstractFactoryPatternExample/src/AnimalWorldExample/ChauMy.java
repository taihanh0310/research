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
public class ChauMy extends DatLienFactory
{

    @Override
    public DongVatAnThit TaoDongVatAnThit()
    {
        return new ConChoSoi();
    }

    @Override
    public DongVatAnCo TaoDongVatAnCo()
    {
        return new ConBoRung();
    }
    
}
