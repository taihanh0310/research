/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package PizzaHut;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author nthanh
 */
public class OrderedItems
{

    List<Item> items = new ArrayList<Item>();

    public void addItems(Item item)
    {
        items.add(item);
    }

    public float getCost()
    {
        float cost = 0f;
        for (Item item : items)
        {
            cost += item.price();
        }
        return cost;
    }

    public void showItems()
    {
        for (Item item : items)
        {
            System.out.println("Item is:" + item.name());
            System.out.println("Size is:" + item.size());
            System.out.println("Price is: " + item.price());
        }
    }
}
