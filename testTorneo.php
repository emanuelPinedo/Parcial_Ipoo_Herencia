<?php
include_once('Categoria.php');
include_once('Torneo.php');
include_once('Equipo.php');
include_once('Partido.php');
include_once('Fotbool.php');
include_once('Basket.php');

$catMayores = new Categoria(1,'Mayores');
$catJuveniles = new Categoria(2,'juveniles');
$catMenores = new Categoria(1,'Menores');

$objE1 = new Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = new Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = new Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = new Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);


$objTorneo = new Torneo(100000);


$partidoBasket1 = new Basket(11, '2024-05-05', $objE7, 80, $objE8, 120, 7);
$partidoBasket2 = new Basket(12, '2024-05-06', $objE9, 81, $objE10, 110, 8);
$partidoBasket3 = new Basket(13, '2024-05-07', $objE11, 115, $objE12, 85, 9);


$partidoFutbol1 = new Fotbool(14, '2024-05-07', $objE1, 3, $objE2, 2);
$partidoFutbol2 = new Fotbool(15, '2024-05-08', $objE3, 0, $objE4, 1);
$partidoFutbol3 = new Fotbool(16, '2024-05-09', $objE5, 2, $objE6, 3);


$partido1 =$objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');


$partido2 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');


$partido3 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');


$ganadoresBasquetbol = $objTorneo->darGanadores('Basquetbol');
echo "Ganadores de Basquetbol: ";
foreach ($ganadoresBasquetbol as $ganador) {
    echo $ganador->getNombre() . ", ";
}
echo "\n";

$ganadoresFutbol = $objTorneo->darGanadores('Futbol');
echo "Ganadores de Fútbol: ";
foreach ($ganadoresFutbol as $ganador) {
    echo $ganador->getNombre() . ", ";
}
echo "\n";

if ($partido1) {
    $premioPartido1 = $objTorneo->calcularPremioPartido($partido1);
    echo "Premio de partido 1: " . $premioPartido1['PremioPartido'] . "\n";
} else {
    echo "No se pudo calcular el premio para el partido 1.\n";
}

if ($partido2) {
    $premioPartido2 = $objTorneo->calcularPremioPartido($partido2);
    echo "Premio de partido 2: " . $premioPartido2['PremioPartido'] . "\n";
} else {
    echo "No se pudo calcular el premio para el partido 2.\n";
}

if ($partido3) {
    $premioPartido3 = $objTorneo->calcularPremioPartido($partido3);
    echo "Premio de partido 3: " . $premioPartido3['PremioPartido'] . "\n";
} else {
    echo "No se pudo calcular el premio para el partido 3.\n";
}

echo $objTorneo;
?>