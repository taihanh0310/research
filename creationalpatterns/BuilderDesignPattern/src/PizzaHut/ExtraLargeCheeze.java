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
public class ExtraLargeCheeze extends VegPizza
{

    @Override
    public String name()
    {
        return "Extra Large Cheeze";
    }

    @Override
    public Float price()
    {
        return 25f;
    }

    @Override
    public String size()
    {
        return "Extra Large";
    }
    
}
