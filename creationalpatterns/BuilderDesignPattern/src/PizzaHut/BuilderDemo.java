/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package PizzaHut;

import java.io.IOException;

/**
 *
 * @author nthanh
 */
public class BuilderDemo
{

    public static void main(String[] args) throws IOException
    {
        OrderBuilder ob = new OrderBuilder();
        OrderedItems ois = new OrderedItems();
        ois = ob.preparePizza();
        ois.showItems();

    }
}
