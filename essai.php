<?php
function readLines($fileName)
{
  // Si le fichier est inexistant, on ne continue pas
  if (!$file = fopen($fileName, 'r'))
  {
    return;
  }
 
  // Tant qu'il reste des lignes à parcourir
  while (($line = fgets($file)) !== false)
  {
    // On dit à PHP que cette ligne du fichier fait office de « prochaine entrée du tableau »
    yield $line;
  }
 
  fclose($file);
}
readLines('bob.txt');