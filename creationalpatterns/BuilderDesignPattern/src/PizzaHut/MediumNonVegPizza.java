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
public class MediumNonVegPizza extends NonVegPizza
{

    @Override
    public String name()
    {
        return "Medium non veg pizzza";
    }

    @Override
    public Float price()
    {
        return 33f;
    }

    @Override
    public String size()
    {
        return "Medium";
    }
    
}
