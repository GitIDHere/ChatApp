<?php namespace App\Services\Interfaces;

interface IModelService
{
	public function create($values);

	public function delete($id);

	public function update(int $id, array $values);

	public function get($id);
}