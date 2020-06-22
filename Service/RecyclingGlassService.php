<?php

namespace App\Service;

class RecyclingGlassService extends Service
{
	protected $consigne;

	public function __construct(int $capacity, int $consigne){
		parent::__construct($capacity);
	}
}