<?php

abstract class Database{
	protected $tableName;
	protected $primaryKey;

	protected setPrimaryKey(){
		switch ($tableName) {
			case 'usuarios':
				$this->primaryKey="username";
				break;
			
			case 'productos':
				$this->primaryKey="products";
				break;
		}
	}

	abstract public function save($model);
	abstract public function update($model);
	abstract public function find();
	abstract public function findAll();
	abstract public function findClause($campo, $value);
}

