<?php 

abstract class Repo{
	abstract public function find($value,$model);
	abstract public function findAll($model);
	abstract public function save($model);
}
