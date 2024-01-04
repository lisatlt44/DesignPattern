<?php

// Interface Observer pour les observateurs (abonnés)
interface Observer {
  public function update(string $notification);
}

// Classe météo (sujet observable)
class WeatherStation {
  private $observers = [];
  private $weather;

  public function setWeather(string $weather) {
    $this->weather = $weather;
    $this->notifyObservers();
  }

  public function attach(Observer $observer) {
    $this->observers[] = $observer;
  }

  public function notifyObservers() {
    foreach ($this->observers as $observer) {
      $observer->update($this->weather);
    }
  }
}

// Classe abstraite Observer (abonné concret)
class User implements Observer {
  private $name;

  public function __construct(string $name) {
    $this->name = $name;
  }

  public function update(string $notification) {
    echo "Notification pour {$this->name} : Météo mise à jour - $notification\n";
  }
}

// Exemple d'utilisation
$weatherStation = new WeatherStation();

// Création des abonnés (observateurs)
$user1 = new User("Lisa");
$user2 = new User("Paul");

// Attachement des abonnés à la station météo
$weatherStation->attach($user1);
$weatherStation->attach($user2);

// Mise à jour de la météo et envoi de notifications aux abonnés
$weatherStation->setWeather("Ensoleillé");