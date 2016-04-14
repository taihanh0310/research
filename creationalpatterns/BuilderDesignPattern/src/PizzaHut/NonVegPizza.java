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
public abstract class NonVegPizza extends Pizza
{
    @Override
    public abstract String name();
    @Override
    public abstract Float price();
    @Override
    public abstract String size();
    
}