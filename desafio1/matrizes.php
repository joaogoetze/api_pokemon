<?php

$matriz1 = array(
    array(1,2,3,),
    array(4,5,6),
    array(7,8,9)
);

$matriz2 = array(
    array(1,2,3,),
    array(4,5,6),
    array(7,8,9)
);

echo "Soma de uma matriz quadrada 3x3" . PHP_EOL;

for($x=0; $x<3; $x++)
{
    for($y=0; $y<3; $y++)
    {
        echo $matriz1[$x][$y] * $matriz2[$x][$y] . " ";
    }
    echo " " . PHP_EOL;
}

$matriz3 = array(
    array(1,2,3,4),
    array(5,6,7,8),
    array(9,10,11,12)
);

$matriz4 = array(
    array(1,2,3,4),
    array(5,6,7,8),
    array(9,10,11,12)
);

$numLinhas = count($matriz3);
$numColunas = count($matriz4[0]);

echo " " . PHP_EOL;
echo "Soma de uma matriz não quadrada: " . PHP_EOL;

for($x=0; $x<$numLinhas; $x++)
{
    for($y=0; $y<$numColunas; $y++)
    {
        echo $matriz3[$x][$y] * $matriz4[$x][$y] . " ";
    }
    echo " " . PHP_EOL;
}