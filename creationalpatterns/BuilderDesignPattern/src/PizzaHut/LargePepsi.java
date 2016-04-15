/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package PizzaHut;

/**
 *
 * @author nthanh
 */
public class LargePepsi extends Pepsi
{

    @Override
    public Float price()
    {
        return 45f;
    }

    @Override
    public String name()
    {
        return "500 ml Pepsi";
    }

    @Override
    public String size()
    {
        return "Large";
    }
    
}
