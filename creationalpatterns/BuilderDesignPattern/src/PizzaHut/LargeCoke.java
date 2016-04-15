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
public class LargeCoke extends Coke
{

    @Override
    public Float price()
    {
        return 45f;
    }

    @Override
    public String name()
    {
        return "500ml Coke";
    }

    @Override
    public String size()
    {
        return "500ml";
    }
    
}
