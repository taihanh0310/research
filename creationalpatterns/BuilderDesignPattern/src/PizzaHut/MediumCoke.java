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
public class MediumCoke extends Coke
{

    @Override
    public Float price()
    {
        return 33f;
    }

    @Override
    public String name()
    {
        return "330 ml coke";
    }

    @Override
    public String size()
    {
        return "Medium Coke";
    }
    
}
