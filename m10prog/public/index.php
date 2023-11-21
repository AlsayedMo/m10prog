<?php

class Auto {
    // Properties
    private $kleur;
    private $zitplaatsen;
    private $passagiers = 0;
    private $snelheid = 0;

    // Constructor
    public function __construct($kleur, $zitplaatsen) {
        $this->kleur = $kleur;
        $this->zitplaatsen = $zitplaatsen;
    }

    // Methoden
    public function nieuwe_passagier($aantal) {
        if ($aantal > 0 && $this->passagiers + $aantal <= $this->zitplaatsen) {
            $this->passagiers += $aantal;
        } else {
            echo "Ongeldig aantal passagiers.";
        }
    }

    public function versnel($waarde) {
        if ($waarde > 0) {
            $this->snelheid += $waarde;
        } else {
            echo "Ongeldige snelheidswaarde.";
        }
    }

    public function rem($waarde) {
        if ($waarde > 0 && $this->snelheid - $waarde >= 0) {
            $this->snelheid -= $waarde;
        } else {
            echo "Ongeldige remwaarde.";
        }
    }

    // Getter-methoden om de status van de auto te tonen
    public function getPassagiers() {
        return $this->passagiers;
    }

    public function getSnelheid() {
        return $this->snelheid;
    }
}

// Stap 2: Initialiseer een Auto Object
$auto = new Auto("Blauw", 5);
$auto->nieuwe_passagier(3);
$auto->versnel(50);

echo "Aantal passagiers in de auto: " . $auto->getPassagiers() . PHP_EOL;
echo "Snelheid van de auto: " . $auto->getSnelheid() . " km/u" . PHP_EOL;

// Stap 3: Voeg overerving toe
class Vrachtwagen extends Auto {
    // Nieuwe properties
    private $laadvermogen;
    private $lading = 0;

    // Constructor
    public function __construct($kleur, $zitplaatsen, $laadvermogen) {
        parent::__construct($kleur, $zitplaatsen);
        $this->laadvermogen = $laadvermogen;
    }

    // Nieuwe methode voor laden en lossen
    public function lading($hoeveelheid) {
        if ($hoeveelheid > 0 && $this->lading + $hoeveelheid <= $this->laadvermogen) {
            $this->lading += $hoeveelheid;
        } else {
            echo "Ongeldige hoeveelheid lading.";
        }
    }

    // Overschrijven van de versnel methode
    public function versnel($waarde) {
        // Versnel nu maar de helft
        parent::versnel($waarde / 2);
    }
}

// Stap 4: Voeg Validatie Toe
$vrachtwagen = new Vrachtwagen("Rood", 3, 1000);
$vrachtwagen->nieuwe_passagier(2);
$vrachtwagen->lading(500);
$vrachtwagen->versnel(30);

echo "Aantal passagiers in de vrachtwagen: " . $vrachtwagen->getPassagiers() . PHP_EOL;
echo "Hoeveelheid lading in de vrachtwagen: " . $vrachtwagen->lading . " kg" . PHP_EOL;
echo "Snelheid van de vrachtwagen: " . $vrachtwagen->getSnelheid() . " km/u" . PHP_EOL;

?>
