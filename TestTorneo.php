<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Partido_Futbol.php");
include_once("Partido_Basquet.php");

function mostrarArray($array){
    foreach($array as $obj => $element){
        echo $obj . ": " . $element . "\n";
    }
}

$catMayores = neW Categoria(1,"Mayores");
$catJuveniles = neW Categoria(2,"juveniles");
$catMenores = neW Categoria(1,"Menores");

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$objTorneo = new Torneo([], 100000);

//partidosBasquet
$partdioBasket1 = new Partido_Basquetbol(11, "2024-05-05", $objE7, 80, $objE8, 120, 7);
$partdioBasket2 = new Partido_Basquetbol(12, "2024-05-06", $objE9, 81, $objE10, 110, 8);
$partdioBasket3 = new Partido_Basquetbol(13, "2024-05-07", $objE11, 115, $objE12, 85, 9);

//partidosFutbol
$partidoFutbol1 = new Partido_Futbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$partidoFutbol2 = new Partido_Futbol(15, "2024-05-08", $objE3, 0, $objE4, 1);
$partidoFutbol3 = new Partido_Futbol(16, "2024-05-09", $objE5, 2, $objE6, 3);

echo $objTorneo->ingresarPartido($objE5, $objE11, "2024-05-23", "Futbol") . "\n\n";

echo $objTorneo->ingresarPartido($objE11, $objE11, "2024-05-23", "basquetbol") . "\n\n";

echo $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol') . "\n\n";

echo $objTorneo->darGanadores("basquetbol") . "\n\n";

echo $objTorneo->darGanadores("futbol") . "\n\n";

$arrayPartidoSTornedo = $objTorneo->getColPartdios();
$partido1 = $objTorneo->calcularPremioPartido($arrayPartidoSTornedo[0]);

mostrarArray($partido1);

$partido2 = $objTorneo->calcularPremioPartido($arrayPartidoSTornedo[1]);

mostrarArray($partido2);

$partido3 = $objTorneo->calcularPremioPartido($arrayPartidoSTornedo[2]);

mostrarArray($partido3);

echo $objTorneo;
?>
