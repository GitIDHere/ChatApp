<?php namespace App\Repositories;

use App\Repositories\Interfaces\IModelRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IModelRepository
{
	protected $_model;


	public function __construct(Model $model)
	{
		$this->_model = $model;
	}


	/**
	 * Check if an entry exists in the database for the model record
	 * @param Model $model
	 * @param $params
	 * @return bool
	 */
	public function exists($params)
	{
		$query = $this->_model::query();
		foreach ($params as $param) {
			$query->where($param['col'], $param['op'], $param['val']);
		}
		return $query->exists();
	}


	/**
	 * @param array $values
	 * @return Model
	 */
	public function create(array $values)
	{
		$newRecord = $this->_model::create($values);
		return $newRecord;
	}

	/**
	 * @param $id
	 * @param array $values
	 * @return int
	 */
	public function update(int $id, array $values)
	{
		return $this->_model::where('id', $id)->update($values);
	}


	/**
	 * Delete a record
	 * @param $id
	 */
	public function delete($id)
	{
		return $this->_model::destroy($id);
	}


	/**
	 * Find a record
	 * @param $id
	 * @return mixed
	 */
	public function get($id)
	{
		return $this->_model::find($id);
	}
}