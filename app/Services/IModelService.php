<?php namespace App\Services;


use Illuminate\Database\Eloquent\Model;

interface IModelService
{
	public function create($values);

	public function delete($id);

	public function update($values, Model $model);

	public function get($id);
}