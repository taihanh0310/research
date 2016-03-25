# research
> Resource: http://www.fluffycat.com/PHP-Design-Patterns/Abstract-Factory/
### About the Abstract Factory
> In the Abstract Factory Pattern, an abstract factory defines what objects the non-abstract or concrete factory will need to be able to create. 

The concrete factory must create the correct objects for it's context, insuring that all objects created by the concrete factory have been chosen to be able to work correctly for a given circumstance. 

In this example we have an abstract factory, AbstractBookFactory, that specifies two classes, AbstractPHPBook and AbstractMySQLBook, which will need to be created by the concrete factory. 

The concrete class OReillyBookfactory extends AbstractBookFactory, and can create the OReillyMySQLBook and OReillyPHPBook classes, which are the correct classes for the context of OReilly.

