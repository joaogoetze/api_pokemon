<?php

//Multiplicação de matrizes quadradas
$matriz1 = array(
    array(1,2),
    array(3,4),
);

$matriz2 = array(
    array(4,5),
    array(6,7),
);

$resultado = array();

for ($i = 0; $i < 2; $i++) 
{
    for ($j = 0; $j < 2; $j++) 
    {
        $resultado[$i][$j] = 0;
        for ($k = 0; $k < 2; $k++)
        {
            $resultado[$i][$j] += $matriz1[$i][$k] * $matriz2[$k][$j];
        }
    }
}

foreach ($resultado as $linha) 
{
    foreach ($linha as $elemento)
    {
        echo $elemento . " ";
    }
    echo "<br>";
}

echo "<br><br>";

//Multiplicação de matrizes não quadradas
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

echo "Soma de uma matriz não quadrada: <br>";

for($x=0; $x<$numLinhas; $x++)
{
    for($y=0; $y<$numColunas; $y++)
    {
        echo $matriz3[$x][$y] * $matriz4[$x][$y] . " ";
    }
    echo "<br>";
}

?>