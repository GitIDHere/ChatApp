<?php namespace App\Services;

use App\Repositories\Interfaces\IModelRepository;

class BaseService implements Interfaces\IModelService
{
	protected  $_repo;

	public function __construct(IModelRepository $repository)
	{
		$this->_repo = $repository;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function delete($id)
	{
		return $this->_repo->delete($id);
	}

	/**
	 * @param int $id
	 * @param array $values
	 * @return mixed
	 */
	public function update(int $id, array $values)
	{
		return $this->_repo->update($id, $values);
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function get($id)
	{
		return $this->_repo->get($id);
	}
}