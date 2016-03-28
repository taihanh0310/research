/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package factory.method.pattern;

/**
 *
 * @author nthanh
 */
class DomesticPlan extends Plan {

    @Override
    public void getRate() {
        rate = 3.50;
    }
}
