/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package AnimalWorldExample;

/**
 *
 * @author nthanh
 */
public class MainApp
{
    public static void main(String[] args)
    {
        DatLienFactory d = new ChauMy();
        AnimalWorld world = new AnimalWorld(d);
        DatLienFactory chauPhi = new ChauPhi();
        AnimalWorld dongvatChauPhi = new AnimalWorld(chauPhi);
        world.runFoodChain();
        dongvatChauPhi.runFoodChain();
    }
}
