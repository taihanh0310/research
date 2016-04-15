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
public class ExtraLargeCoke extends Coke
{

    @Override
    public Float price()
    {
        return 66f;
    }

    @Override
    public String name()
    {
        return "1000 ml";
    }

    @Override
    public String size()
    {
        return "Extra large";
    }
    
}
