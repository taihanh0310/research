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
class ConSuTu extends DongVatAnThit
{

    public ConSuTu()
    {
    }

    @Override
    public void AnThit(DongVatAnCo c)
    {
        System.out.println(this.getClass().getName() + " An con " + c.name());
    }
    
}
