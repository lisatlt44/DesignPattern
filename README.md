# Évaluation 1/1 - Design Pattern : veille et présentation d'un design pattern au choix.

- [Réponses aux questions](#réponses-aux-questions)

## Réponses aux questions

- **Question (`n°1`) : Quel(s) avantage(s) procure le fait de programmer vers une interface et non vers une implémentation ?**

L'un des principaux avantages est la flexibilité et la facilité de modification du code. En programmant vers une interface, on définit un contrat ou un ensemble de méthodes que les classes doivent implémenter, mais on n'est pas lié à une implémentation spécifique. Cela offre une certaine souplesse : si l'implémentation doit être modifiée ou remplacée, cela peut se faire sans affecter les autres parties du code.

Par exemple, en définissant une interface pour différentes formes géométriques, telles que cercle et rectangle, on peut changer ou ajouter de nouvelles formes sans altérer le code existant, ce qui facilite grandement l'évolution du logiciel au fil du temps.

~~~
// Interface
public interface Animal {
  void makeSound();
}

// Implémentation
public class Dog implements Animal {
  public void makeSound() {
    echo("Woof!");
  }
}

public class Cat implements Animal {
  public void makeSound() {
    echo("Meow!");
  }
}

// Utilisation
public class Main {
  public static void main(String[] args) {
    Animal dog = new Dog();
    Animal cat = new Cat();

    dog.makeSound(); // Output: Woof!
    cat.makeSound(); // Output: Meow!
  }
}
~~~

Ce code illustre comment une interface commune Shape est utilisée pour calculer l'aire de différentes formes géométriques (Circle et Rectangle). Peu importe la forme spécifique, on utilise la même méthode calculateArea() définie dans l'interface, ce qui rend le code facilement adaptable à de nouvelles formes géométriques sans impacter le reste du programme.

- **Question (`n°2`) : Pourquoi, de manière générale, vaut-il mieux préférer la composition à l’héritage ? Vous pouvez illustrer votre réponse avec un code source minimal et/ou avec un diagramme.**

Préférer la composition à l'héritage offre une grande flexibilité. La composition crée une relation "a-un" entre les classes, permettant des ajustements dynamiques des comportements pendant l'exécution du programme. Contrairement à l'héritage, où ces comportements sont définis lors de la compilation. 

De plus, avec l'héritage, les modifications dans la classe parente peuvent affecter les classes enfants, ce qui est moins probable avec la composition. En héritant, on obtient non seulement l'interface mais aussi son implémentation, ce qui peut exposer des détails internes et briser l'encapsulation.

Pour illustrer cela, prenons un exemple simple. Imaginons une classe Car qui utilise un objet Engine via l'héritage dans une structure hiérarchique.

~~~
// Héritage - Relation "est-un"
class Engine {
    // Méthodes de l'Engine
}

class Car extends Engine {
    // Méthodes de la Car
}
~~~

> Dans ce cas, la classe Car hérite non seulement des méthodes de l'Engine, mais aussi de son implémentation, entraînant une forte dépendance et potentiellement une exposition des détails internes.

En revanche, avec la composition :

~~~
// Composition - Relation "a-un"
class Engine {
    // Méthodes de l'Engine
}

class Car {
    private Engine engine;

    public Car() {
        this.engine = new Engine();
    }

    // Méthodes de la Car utilisant l'Engine via la composition
}
~~~

Ici, la classe Car utilise l'Engine via la composition. La Car a une référence vers un objet Engine, utilisant ses fonctionnalités sans exposer les détails internes de l'Engine, préservant ainsi une meilleure encapsulation.

- **Question (`n°3`) : En programmation orienté objet, qu’est ce qu’une interface ? Remarque : on ne parle pas ici du construct PHP interface.**

