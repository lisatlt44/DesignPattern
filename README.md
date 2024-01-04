# Évaluation 1/1 - Design Pattern : veille et présentation d'un design pattern au choix.

- [Réponses aux questions](#réponses-aux-questions)

## Réponses aux questions

- **Question (`n°1`) : Quel(s) avantage(s) procure le fait de programmer vers une interface et non vers une implémentation ?**

L'un des principaux avantages est la flexibilité et la facilité de modification du code. En programmant vers une interface, on définit un contrat ou un ensemble de méthodes que les classes doivent implémenter, mais on n'est pas lié à une implémentation spécifique. Cela offre une certaine souplesse : si l'implémentation doit être modifiée ou remplacée, cela peut se faire sans affecter les autres parties du code.

Par exemple, en définissant une interface pour différentes formes géométriques, telles que cercle et rectangle, on peut changer ou ajouter de nouvelles formes sans altérer le code existant, ce qui facilite grandement l'évolution du logiciel au fil du temps :

~~~
# PHP
// Interface
interface Shape {
    public function calculateArea();
}

// Implémentations
class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return M_PI * $this->radius * $this->radius;
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

// Utilisation
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo "Aire du cercle : " . $circle->calculateArea() . "\n"; // Output: Aire du cercle
echo "Aire du rectangle : " . $rectangle->calculateArea() . "\n"; // Output: Aire du rectangle
~~~

Ce code illustre comment une interface commune Shape est utilisée pour calculer l'aire de différentes formes géométriques (Circle et Rectangle). Peu importe la forme spécifique, on utilise la même méthode calculateArea() définie dans l'interface, ce qui rend le code facilement adaptable à de nouvelles formes géométriques sans impacter le reste du programme.

- **Question (`n°2`) : Pourquoi, de manière générale, vaut-il mieux préférer la composition à l’héritage ?**

Opter pour la composition plutôt que l'héritage apporte une grande souplesse. La composition établit une relation *"a-un"* entre les classes, permettant des ajustements dynamiques des comportements durant **l'exécution** du programme. Contrairement à l'héritage, où ces comportements sont fixés lors de la phase de **compilation**. 

De plus, les modifications apportées à la **classe parente** dans le cadre de l'héritage peuvent impacter les **classes enfants**, une situation moins probable avec la composition. En héritant, on hérite non seulement de l'interface, mais aussi de son implémentation, risquant d'exposer des **détails internes** et compromettant ainsi **l'encapsulation**.

Pour illustrer cela, prenons un exemple simple. Imaginons une classe *Car* qui utilise un objet *Engine* via l'héritage dans une structure hiérarchique :

~~~
# PHP
// Héritage - Relation "est-un"
class Engine {
    // Méthodes de l'Engine
}

class Car extends Engine {
    // Méthodes de la Car
}
~~~

> Dans ce cas, la classe *Car* hérite non seulement des méthodes de l'*Engine*, mais aussi de son implémentation, entraînant une forte dépendance et potentiellement une exposition des détails internes.

En revanche, avec la composition :

~~~
# PHP
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

Ici, la classe *Car* utilise l'*Engine* via la composition. La *Car* a une référence vers un objet *Engine*, utilisant ses fonctionnalités sans exposer les détails internes de l'*Engine*, préservant ainsi une meilleure encapsulation.

- **Question (`n°3`) : En programmation orienté objet, qu’est ce qu’une interface ? Remarque : on ne parle pas ici du construct PHP interface.**

En programmation orientée objet, une interface représente **l'ensemble des signatures de méthode d'un objet**. Elle définit quelles méthodes un objet doit mettre à disposition sans fournir d'implémentation concrète. 

Cela signifie que tout message correspondant à une des signatures définies dans l'interface peut être envoyé à l'objet. L'interface d'un objet est synonyme de **type** de l'objet. 

Dans un **système orienté objet** respectant l'encapsulation, l'interface joue un rôle crucial : les objets ne sont connus que par le biais de leurs interfaces, c'est-à-dire ce qu'ils rendent visible à l'extérieur.
