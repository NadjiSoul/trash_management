<?php

namespace App\Trash;

abstract class AbstractDistrict
{
	protected $population;

	public function __construct(int $population){
		$this->population = $population;
	}
	public function getPopulation(){
		return $this->population;
	}
}