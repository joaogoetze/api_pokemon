<?php

$filename = 'files/data.txt';

if(!file_exists($filename))
{
    $file = fopen($filename, "w");
    $response = getAPIContent();
    fwrite($file, $response);
    fclose($file);
    listarConteudo($response);
}
else
{
    $content = getFileContent($filename);
    listarConteudo($content);
}

function listarConteudo($content)
{
    $nomes = array();

    $meuArrayJSON = json_decode($content, true);

    if (isset($meuArrayJSON['results']))
    {
        foreach ($meuArrayJSON['results'] as $pokemon) 
        {
            if (isset($pokemon['name']))
            {
                array_push($nomes, $pokemon['name']);
            }
        }
    }
    
    $reg_por_pagina = 15;

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    $inicio = ($pagina -1 ) * $reg_por_pagina;

    $dados_pagina = array_slice($nomes, $inicio, $reg_por_pagina);

    $result = array(
        "nomes" => $dados_pagina
    );
   
    echo json_encode($result);    
}

function getFileContent()
{
    $filename = 'files/data.txt';

    $file = fopen($filename, 'r');

    if ($file) 
    {
        $fileSize = filesize($filename);

        $content = fread($file, $fileSize);
        fclose($file);
        return $content;
    }
    return null;
}

function getAPIContent()
{
    $apiUrl = 'https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0';

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) 
    {
        echo 'Erro na requisição cURL: ' . curl_error($ch);
    }

    unset($ch);

    return $response;
}

?>