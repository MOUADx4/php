<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include_once 'index.php';



interface Forme {
  public function calculateSurface();
}


trait Description {
  public function getDescription() {
      return "C'est un rectangle.";
  }
}

abstract class Rectangle implements Forme {
  protected $longueur;
  protected $largeur;
  
  public function __construct($longueur, $largeur) {
      $this->longueur = $longueur;
      $this->largeur = $largeur;
  }

  abstract public function calculateSurface();

  public function __destruct() {
      echo "L'objet de la classe " . get_class($this) . " a été détruit.";
  }
}

class BaliseHead {
  public function afficher() {
      return "<head></head>";
  }
}

// Classe Rectangle
class RectangleConcrete extends Rectangle {
    use Description;

    public $Picture;
    private $Description;

    public function __construct($longueur, $largeur, $picture, $description) {
        parent::__construct($longueur, $largeur);
        $this->Picture = $picture;
        $this->Description = $description;
    }

    public function calculateSurface() {
        return $this->longueur * $this->largeur;
    }


      public function generateHTML() {
        echo "<div>";
        echo "<h2>" . get_class($this) . "</h2>";
        echo "<img src='" . $this->Picture . "' alt='Rectangle' />";
        echo "<p>" . $this->getDescription() . "</p>";
        echo "</div>";
    }
    
    
}

echo "<h2>CREATION DE NOUVEAU RECTANGLF...</h2>";

$rectangle = new RectangleConcrete(10, 5, "rectangle.jpg.webp", "Rectangle is the main function");


echo "<h2>Le rectangle est crée correctement !</h2>";

echo "<h2>Claculons la surface du triangle...</h2>";
echo "La surface du rectangle est : " . $rectangle->calculateSurface() . "<br>";

echo "<h2>En cours d'afficher la description du triangle...</h2>";
echo "Description du rectangle : " . $rectangle->getDescription();

?>


<header>
</header>

<main>
   <h1>Rectangle</h1>
</main>

<?php


$rectangle->generateHTML();

echo "<h1>FIN D'EXECUTION</h1>";
?>

</body> 
</html>
