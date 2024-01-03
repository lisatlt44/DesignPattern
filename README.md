# Évaluation 1/1 - Design Pattern : veille et présentation d'un design pattern au choix.

- [Réponses aux questions](#réponses-aux-questions)

## Réponses aux questions

- **Question (`n°1`) : Quel(s) avantage(s) procure le fait de programmer vers une interface et non vers une implémentation ? Vous pouvez illustrer votre réponse avec un code source minimal et/ou avec un diagramme.**

L'un des principaux avantages est la flexibilité et la facilité de modification du code. En programmant vers une interface, on définit un contrat ou un ensemble de méthodes que les classes doivent implémenter, mais on n'est pas lié à une implémentation spécifique. Cela offre une souplesse précieuse : si l'implémentation doit être modifiée ou remplacée, cela peut se faire sans affecter les autres parties du code.

Par exemple, en définissant une interface pour différentes formes géométriques, telles que cercle et rectangle, on peut changer ou ajouter de nouvelles formes sans altérer le code existant, ce qui facilite grandement l'évolution du logiciel au fil du temps.

~~~
// Interface
public interface Animal {
  void makeSound();
}

// Implémentation
public class Dog implements Animal {
  public void makeSound() {
    System.out.println("Woof!");
  }
}

public class Cat implements Animal {
  public void makeSound() {
    System.out.println("Meow!");
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

- **Question (`n°2`) : Pourquoi, de manière générale, vaut-il mieux préférer la composition à l’héritage ? Vous pouvez illustrer votre réponse avec un code source minimal et/ou avec un diagramme.**
>
- **Question (`n°3`) : En programmation orienté objet, qu’est ce qu’une interface ? Remarque : on ne parle pas ici du construct PHP interface.**

