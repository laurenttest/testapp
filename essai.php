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