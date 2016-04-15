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
public class ExtraLargeNonVegPizza extends NonVegPizza
{

    @Override
    public String name()
    {
        return "Extra large non veg pizza";
    }

    @Override
    public Float price()
    {
        return 45f;
    }

    @Override
    public String size()
    {
        return "Extra large";
    }
    
}
