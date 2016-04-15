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
public class ExtraLargeOnion extends VegPizza
{

    @Override
    public String name()
    {
        return "Extra Large Onion Veg Pizza";
    }

    @Override
    public Float price()
    {
        return 55f;
    }

    @Override
    public String size()
    {
        return "Extra Large";
    }
    
}
