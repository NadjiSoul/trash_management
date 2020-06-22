<?php

namespace App\Service;

abstract class AbstractService
{
	protected $capacity;

	public function __construct(int $capacity){
		$this->capacity = $capacity;
	}
	public function getCapacity(){
		return $this->capacity;
	}
}