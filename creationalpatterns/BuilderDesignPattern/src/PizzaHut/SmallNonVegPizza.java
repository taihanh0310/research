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
public class SmallNonVegPizza extends NonVegPizza
{

    @Override
    public String name()
    {
       return "Small non veg pizza";
    }

    @Override
    public Float price()
    {
        return 13f;
    }

    @Override
    public String size()
    {
        return "Small";
    }
    
}
