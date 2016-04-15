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
public class LargeNonVegPizza extends NonVegPizza
{

    @Override
    public String name()
    {
        return "Large Non Veg Pizza";
    }

    @Override
    public Float price()
    {
        return 60f;
    }

    @Override
    public String size()
    {
        return "Large";
    }
    
}
