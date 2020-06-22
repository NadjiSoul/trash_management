<?php

require_once 'autoload.php';
require_once 'data.json';

use App\Trash\Organic;
use App\Trash\Random;
use App\Trash\Glass;
use App\Trash\Iron;


//recup files
$json = file_get_contents("data.json");
$jsons = file_get_contents("co2.json");
//decode json
$data = json_decode($json);
$datas = json_decode($jsons);


foreach ($data->quartiers as $key => $values) {
	$number = $key + 1;

	$pop = $values->population;
	$plastic = $values->plastiques;
	$paper = $values->papier;
	$iron = $values->metaux;
	$random = $values->autre;
	$glass =  $values->verre;
	$organic = $values->organique;
	$dp = $datas->plastiques;

	$co2incineglass = $datas->papier->incineration * $glass;
	$co2recycleglass = $datas->papier->recyclage * $glass;
	$pop_glass = new Glass($pop, $glass, $co2incineglass, $co2recycleglass);

	$co2incineiron = $datas->papier->incineration * $iron;
	$co2recycleiron = $datas->papier->recyclage * $iron;
	$pop_iron = new Iron($pop, $iron, $co2incineiron, $co2recycleiron);

	$pop_glass = new Glass($pop, $glass, $co2incineglass, $co2recycleglass);

	echo "Ceci est une pop".PHP_EOL;
	echo $pop_glass->getPopulation().PHP_EOL;

	echo "Ceci est le nombre de verre".PHP_EOL;
	echo $pop_glass->getQuantity().PHP_EOL;

	echo "Ceci est le nombre de metaux".PHP_EOL;
	echo $pop_iron->getQuantity().PHP_EOL;

	echo "Ceci est le taux de CO2 rejeté par incinération (verre)".PHP_EOL;
	echo $pop_glass->getCo2incineration().PHP_EOL;
	echo "Ceci est le taux de CO2 rejeté par recyclage (verre)".PHP_EOL;
	echo $pop_glass->getCo2recycling().PHP_EOL;


	echo "Ceci est le taux de CO2 rejeté par incinération (metaux)".PHP_EOL;
	echo $pop_iron->getCo2incineration().PHP_EOL;
	echo "Ceci est le taux de CO2 rejeté par recyclage (metaux)".PHP_EOL;
	echo $pop_iron->getCo2recycling().PHP_EOL;
}
/*
$organic = new Organic(1000, 4, 5, 44);

$random = new Random(4,3,2);



$iron = new Iron(4,3,2,1);

$plastic_pec = new PlasticPET(5,4,3,3);
$plastic_pvc = new PlasticPVC(5,4,3,3);
$plastic_pehd = new PlasticPEHD(5,4,3,3);
$plastic_pc = new PlasticPC(5,4,3,3);

//recup files
$json = file_get_contents("data.json");
//decode json
$data = json_decode($json);

//recup files
$jsons = file_get_contents("co2.json");
//decode json
$datas = json_decode($jsons);
/*
echo "quartier 1 ";
echo $parsed_json->{'quartiers'}[1]->{'population'}." ";
echo $parsed_json->{'quartiers'}[1]->{'plastiques'}->{'PET'}." ";
echo $parsed_json->{'quartiers'}[1]->{'plastiques'}->{'PEHD'}." ";
echo $parsed_json->{'quartiers'}[1]->{'plastiques'}->{'PVC'}." ";

*/


/*
$pop = "pop : ".$data->quartiers[0]->population;
$pet = "pet : ".$data->quartiers[0]->plastiques->PET;

var_dump($pop);
var_dump($pet);
*/
/*
foreach($data->quartiers as $cle => $values){
	//$count = count($data->quartiers);

	$number = $cle + 1;

	$pop = $values->population;
	$plastic = $values->plastiques;
	$paper = $values->papier;
	$iron = $values->metaux;
	$random = $values->autre;
	$organic = $values->organique;
	$dp = $datas->plastiques;

	echo PHP_EOL."=========================".PHP_EOL;
	echo " quartier ".$number.PHP_EOL;
	echo " population : ".$pop.PHP_EOL;
	echo " plastic PET : ".$plastic->PET.PHP_EOL;
	echo " plastic PEHD : ".$plastic->PEHD.PHP_EOL;
	echo " plastic PVC : ".$plastic->PVC.PHP_EOL;
	echo " plastic PC : ".$plastic->PC.PHP_EOL;
	echo " papier : ".$paper.PHP_EOL;
	echo " organique : ".$organic.PHP_EOL;
	echo " metaux : ".$iron.PHP_EOL;
	echo " autre : ".$random.PHP_EOL;
/*

	foreach ($datas as $key => $value) {
		echo $key.PHP_EOL;
		if(isset($value->compostage)){
			echo $value->compostage * $iron.PHP_EOL;
		}		
		if(isset($value->recyclage)){
			echo $value->recyclage * $iron.PHP_EOL;
		}
	}*//*
	echo "-----------------------------------------".PHP_EOL;
	echo "-----------------------------------------".PHP_EOL;
	echo "-----------------------------------------".PHP_EOL;
	echo "-----------------INCINERATION---------------".PHP_EOL;
	echo "co2 incineration PET : ".$dp->PET->incineration * $plastic->PET.PHP_EOL;
	echo "co2 incineration PC : ".$dp->PC->incineration * $plastic->PC.PHP_EOL;
	echo "co2 incineration PEHD : ".$dp->PEHD->incineration * $plastic->PEHD.PHP_EOL;
	echo "co2 incineration PVC : ".$dp->PVC->incineration * $plastic->PVC.PHP_EOL;
	echo "-----------------ORGANIC---------------".PHP_EOL;
	echo "co2 incineration (organic)".$datas->organique->incineration * $organic.PHP_EOL;
	echo "-----------------IRON---------------".PHP_EOL;
	echo "co2 incineration (metaux)".$datas->metaux->incineration * $iron.PHP_EOL;
	echo "-----------------PAPIER---------------".PHP_EOL;
	echo "co2 incineration (papier)".$datas->papier->incineration * $paper.PHP_EOL;
	echo "-----------------------------------------".PHP_EOL;
	echo "-----------------RECYCLAGE---------------".PHP_EOL;
	echo "-----------------PLASTIC---------------".PHP_EOL;
	echo "co2 incineration PET : ".$dp->PET->recyclage * $plastic->PET.PHP_EOL;
	echo "co2 incineration PC : ".$dp->PC->recyclage * $plastic->PC.PHP_EOL;
	echo "co2 incineration PEHD : ".$dp->PEHD->recyclage * $plastic->PEHD.PHP_EOL;
	echo "co2 incineration PVC : ".$dp->PVC->recyclage * $plastic->PVC.PHP_EOL;
	echo "-----------------ORGANIC---------------".PHP_EOL;
	echo "co2 compostage (organic)".$datas->organique->compostage * $organic.PHP_EOL;
	echo "-----------------IRON---------------".PHP_EOL;
	echo "co2 recyclage (metaux)".$datas->metaux->recyclage * $iron.PHP_EOL;
	echo "-----------------PAPIER---------------".PHP_EOL;
	echo "co2 recyclage (papier)".$datas->papier->recyclage * $paper.PHP_EOL;
}



*/
