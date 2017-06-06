<?php

abstract class Database{
	protected $tableName;
	protected $primaryKey;

	abstract public function save($model);
	abstract public function update($model);
	abstract public function find();
	abstract public function findAll();
	abstract public function findClause($query);
}