<?php

function readLines($fileName)
{
  if (!$file = fopen($fileName, 'r'))
  {
    echo "passs222"; 
    return;
  }
  while (($line = fgets($file)) !== false)
  {
    yield $line;
  }
 
  fclose($file);
}
$generator= readLines('bob.txt');
foreach ($generator as $line)
{
  echo "---> ".$line."<br>";// Effectuer une opération sur $line
}


class SomeClass
{
  protected $attr;

  public function __construct()
  {
    $this->attr = ['Un', 'Deux', 'Trois', 'Quatre'];
  }

  // Le & avant le nom du générateur indique que les valeurs retournées sont des références
  public function &generator()
  {
    // On cherche ici à obtenir les références des valeurs du tableau pour les retourner
    foreach ($this->attr as &$val)
    {
      yield $val;
    }
  }

  public function attr()
  {
    return $this->attr;
  }
}

$obj = new SomeClass;

// On parcourt notre générateur en récupérant les entrées par référence
foreach ($obj->generator() as &$val)
{
  // On effectue une opération quelconque sur notre valeur
  $val = strrev($val);
}

echo '<pre>';
var_dump($obj->attr());
echo '</pre>';

$maFonction = function()
{
  echo 'Hello world';
};

var_dump($maFonction());


$additionneur = function()
{
  $this->_nbr += 5;
};

class MaClasse
{
  private $_nbr = 0;

  public function nbr()
  {
    return $this->_nbr;
  }
}

$obj = new MaClasse;

// On obtient une copie de notre closure qui sera liée à notre objet $obj
// Cette nouvelle closure sera appelée en tant que méthode de MaClasse
// On aurait tout aussi bien pu passer $obj en second argument
$additionneur = $additionneur->bindTo($obj, 'MaClasse');
$additionneur();

echo $obj->nbr();