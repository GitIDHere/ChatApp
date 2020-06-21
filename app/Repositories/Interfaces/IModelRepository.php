<?php namespace App\Repositories\Interfaces;

interface IModelRepository
{

	public function exists($params);

	public function create(array $values);

	public function update(int $id, array $values);

	public function delete($id);

	public function get($id);

}