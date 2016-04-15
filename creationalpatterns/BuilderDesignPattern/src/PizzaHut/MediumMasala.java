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
public class MediumMasala extends VegPizza
{

    @Override
    public String name()
    {
        return "Medium Masala Pizza";
    }

    @Override
    public Float price()
    {
        return 44f;
    }

    @Override
    public String size()
    {
        return "Medium";
    }
    
}
