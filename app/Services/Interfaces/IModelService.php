<?php namespace App\Services\Interfaces;

interface IModelService
{
	public function delete($id);

	public function update(int $id, array $values);

	public function get($id);
}