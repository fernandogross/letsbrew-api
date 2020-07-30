<?php

namespace App\Repositories\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class AbstractValidator
{
    /**
     * @return array
     */
    public function rulesToCreate(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function rulesToUpdate(): array
    {
        return [];
    }

    /**
     * @param array $data
     * @param array $rules
     * @throws ValidationException
     */
    public function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @param array $data
     * @throws ValidationException
     */
    public function validateToCreate(array $data)
    {
        $this->validate($data, $this->rulesToCreate());
    }

    /**
     * @param array $data
     * @throws ValidationException
     */
    public function validateToUpdate(array $data)
    {
        $this->validate($data, $this->rulesToUpdate());
    }
}