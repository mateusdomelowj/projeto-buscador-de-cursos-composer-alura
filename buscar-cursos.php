<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use MateusMelo\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(["base_uri" => "https://www.alura.com.br/"]);

$crawler = new Crawler();
$cursos = $crawler -> filter('span.card-curso__nome');
$buscador = new Buscador($client, $crawler);
$cursos = $buscador -> buscar("cursos-online-programacao/php");

foreach($cursos as $curso)
{
    exibeMensagem($curso);
}