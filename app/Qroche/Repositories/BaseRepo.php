<?php

namespace Qroche\Repositories;

abstract class BaseRepo
{
	protected $model;

	public function __construct()
	{
		$this->model = $this->getModel();
	}

	abstract public function getModel();

	public function find($id, $colums = array('*'))
	{
		return $this->model->find($id, $colums);
	}
}