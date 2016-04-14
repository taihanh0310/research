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
public class SmallCoke extends Coke
{

    @Override
    public Float price()
    {
        return 3f;
    }

    @Override
    public String name()
    {
        return "300 ml Coke";
    }

    @Override
    public String size()
    {
        return "Small";
    }
    
}
