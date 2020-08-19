<?php


namespace App\Repositories;

use App\Models\Hop;
use App\Repositories\Validators\HopValidator;
use Illuminate\Validation\ValidationException;

class HopRepository
{
    /**
     * @var Hop $model
     */
    protected $model;

    /**
     * @var HopValidator $validator
     */
    protected $validator;

    /**
     * HopRepository constructor.
     * @param Hop $model
     * @param HopValidator $validator
     */
    public function __construct(Hop $model, HopValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * List resources.
     * @return mixed
     */
    public function index()
    {
        return $this->model->get();
    }

    /**
     * Create and return new resource.
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function create(array $data)
    {
        $this->validator->validateToCreate($data);
        return $this->model->create($data);
    }

    /**
     * Update the specified resource.
     * @param $id
     * @return mixed
     */
    public function read($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the specified resource.
     * @param int $id
     * @param array $data
     * @return Hop
     * @throws ValidationException
     */
    public function update(int $id, array $data)
    {
        $this->validator->validateToUpdate($data);
        $this->model->where('id', $id)->update($data);
        return $this->model->find($id);
    }

    /**
     * Delete the specified resource.
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->model->where('id', $id)->delete();
    }
}
