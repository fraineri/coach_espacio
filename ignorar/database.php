<?php

abstract class Database{
	abstract public function save($model);
	abstract public function update($model);
	abstract public function update($model);
	abstract public function getId($id);
	abstract public function getAll();
	abstract public function getBy($table,$reg,$val);
}