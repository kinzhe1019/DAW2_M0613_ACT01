<?php
// CONSTANTS: regles del joc
const NOM_JOC = 'LEYENDA del Bosc';
const VIDA_MAXIMA = 120;
const EXP_PER_NIVELL = 1000; // cada nivell necessita 1000 punts mes
const FORCA_MAXIMA = 80;
const LLINDAR_FERIT = 25; // si la vida baixa del 25% esta ferit

// VARIABLES: dades del personatge
$nom = 'Lucas thebest';
$classe = 'Mag';
$nivell = 4;
$vida = 45; // canviant aquest numero es mou la barra
$forca = 60;
$experiencia = 3200;
$atacBase = 10;

// CALCULS
// el percentatge es valor / maxim * 100, i amb round el deixo a 1 decimal
$percentVida = round($vida / VIDA_MAXIMA * 100, 1); 
$percentForca = round($forca / FORCA_MAXIMA * 100, 1);
// l'exp que necessita es nivell * 1000, i li resto la que ja te
$expFalta = $nivell * EXP_PER_NIVELL - $experiencia;
// com mes nivell mes atac (2 punts per nivell)
$poderAtac = $atacBase + $nivell * 2;

// ESTAT:
// la comparacio dona true o false, amb (int) passa a 1 o 0
// i aquest numero es la posicio de l'array: 0 = En forma, 1 = Ferit
$estats = ['En forma', 'Ferit'];
$estat = $estats[(int) ($percentVida < LLINDAR_FERIT)];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>Fitxa</title>
    <style>
        .barra { background: #E1E8E8; border-radius: 99px; height: 14px; overflow: hidden; margin-bottom: 1rem; }
        .barra span { display: block; height: 100%; border-radius: 99px; }
        .barra .vida { background: #C2661F; }
        .barra .mana { background: #02736F; }
    </style>
</head>
<body>
    <h1><?= NOM_JOC ?></h1>

    <?php
    // echo amb cometes dobles
    echo "<h2>$nom</h2>";
    // echo amb cometes simples i concatenacio
    echo '<p>' . $classe . ' - Nivell ' . $nivell . '</p>';
    ?>

    <!-- BARRES: PHP posa l'amplada dins del style -->
    <p>Vida: <?= $vida ?> / <?= VIDA_MAXIMA ?> (<?= $percentVida ?> %)</p>
    <div class="barra"><span class="vida" style="width: <?= $percentVida ?>%"></span></div>

    <p>Forca: <?= $forca ?> / <?= FORCA_MAXIMA ?> (<?= $percentForca ?> %)</p>
    <div class="barra"><span class="mana" style="width: <?= $percentForca ?>%"></span></div>

    <!-- ALTRES DADES -->
    <p>Poder d'atac: <?= $poderAtac ?></p>
    <p>Experiencia: <?= $experiencia ?> (li falten <?= $expFalta ?> per pujar de nivell)</p>
    <p>Estat: <?= $estat ?></p>
</body>
</html>