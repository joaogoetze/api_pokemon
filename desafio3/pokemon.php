<?php

$pokemon = $_SERVER['REQUEST_URI'];
$segments = explode('/', $pokemon);
$segments = array_filter($segments);
$nomePokemon = end($segments);
$filename = "files/$nomePokemon.txt";

if(!file_exists($filename))
{
    $file = fopen($filename, "w");
    $response = getAPIContent($nomePokemon);
    fwrite($file, $response);
    fclose($file);
    listarConteudo($response, $nomePokemon);
}
else
{
    $content = getFileContent($filename);
    listarConteudo($content, $nomePokemon);
}

function listarConteudo($content, $nomePokemon)
{
    $data = json_decode($content, true);

    foreach ($data['stats'] as $stat)
    {
        //$baseStas = ;
        $statNames = $stat['stat']['name'];
        $stats[$statNames] = $stat['base_stat'];
    }

    $objeto = array(
        "name" => $nomePokemon,
        "stats" => $stats
    );

    echo json_encode($objeto);  
}

function getFileContent($filename)
{
    $file = fopen($filename, 'r');

    if ($file) 
    {
        $fileSize = filesize($filename);

        $content = fread($file, $fileSize);

        return $content;
    }
}

function getAPIContent($pokemon)
{
    $apiUrl = "https://pokeapi.co/api/v2/pokemon/$pokemon";

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) 
    {
        echo 'Erro na requisição cURL: ' . curl_error($ch);
    }

    curl_close($ch);

    return $response;
}

?>