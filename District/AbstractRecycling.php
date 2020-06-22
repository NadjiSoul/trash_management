<?php

namespace App\District;

abstract class AbstractRecycling extends AbstractTrash
{
	protected $co2recycling;

	public function __construct(int $population, int $quantity, int $co2incineration, int $co2recycling){
		parent::__construct($population, $quantity, $co2incineration);
		$this->population = $population;
		$this->quantity = $quantity;
		$this->co2incineration = $co2incineration;
		$this->co2recycling = $co2recycling;
	}
	
	public function getCo2recycling(){
		return $this->co2recycling;
	}
}