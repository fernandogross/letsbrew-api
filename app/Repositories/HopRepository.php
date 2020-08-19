<?php


namespace App\Repositories;

use App\Models\Hop;
use App\Repositories\Validators\HopValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            $result = $this->model->where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            throw $exception;
        }

        return $result;
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
        try {
            $result = $this->model->where('id', $id)->firstOrFail();
            $result->update($data);
        } catch (ModelNotFoundException $exception) {
            throw $exception;
        }

        return $result;
    }

    /**
     * Delete the specified resource.
     * @param int $id
     */
    public function delete(int $id): void
    {
        try {
            $result = $this->model->where('id', $id)->firstOrFail();
            $result->delete();
        } catch (ModelNotFoundException $exception) {
            throw $exception;
        }
    }
}
