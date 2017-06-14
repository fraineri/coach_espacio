<?php

abstract class Database{

	protected $model;


	abstract public function save($model);
	abstract public function update($model);
	abstract public function find();
	abstract public function findAll();
	abstract public function findClause($campo, $value);
}

