<?php

namespace App\Service;

class IncineratorService extends Service
{
	protected $ligneFour;

	public function __construct(int $capacity, int $ligneFour){
		parent::__construct($capacity);
		$this->capacity = $capacity;
		$this->ligneFour = $ligneFour;
	}
}