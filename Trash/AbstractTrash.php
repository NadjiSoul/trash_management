<?php

namespace App\Trash;
use App\Management\IncineratorInterface;

abstract class AbstractTrash extends AbstractDistrict implements IncineratorInterface
{
	protected $quantity;
	protected $co2incineration;

	public function __construct(int $population, int $quantity, int $co2incineration){
		parent::__construct($population);
		$this->population = $population;
		$this->quantity = $quantity;
		$this->co2incineration = $co2incineration;

	}

	public function getQuantity(){
		return $this->quantity;
	}

	public function getCo2incineration(){
		return $this->co2incineration;
	}
}