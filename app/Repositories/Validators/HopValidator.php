<?php

namespace App\Repositories\Validators;

class HopValidator extends AbstractValidator
{
    /**
     * Returns array of rules to create resource
     *
     * @return array
     */
    public function rulesToCreate(): array
    {
        return [
            'user_id' => 'required|integer',
            'name' => 'required|integer',
            'origin' => 'required',
            'price' => 'sometimes|nullable',
            'type' => 'required',
            'form' => 'required',
            'alpha' => 'required',
            'beta' => 'required',
            'characteristics' => 'sometimes|nullable',
        ];
    }
}