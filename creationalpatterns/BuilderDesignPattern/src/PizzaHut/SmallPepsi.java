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
public class SmallPepsi extends Pepsi
{

    @Override
    public Float price()
    {
        return 3f;
    }

    @Override
    public String name()
    {
        return "300 ml pepsi";
    }

    @Override
    public String size()
    {
        return "Small";
    }
    
}
