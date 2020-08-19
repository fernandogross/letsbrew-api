<?php

namespace App\Repositories\Validators;

use App\Models\Hop;

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
            'name' => 'required|string',
            'origin' => 'sometimes|nullable',
            'price' => 'sometimes|nullable',
            'type' => 'required|in:' . implode(',', array_values(Hop::HOP_TYPES)),
            'form' => 'required|in:' . implode(',', array_values(Hop::HOP_FORMS)),
            'alpha' => 'required|int',
            'beta' => 'required|int',
            'characteristics' => 'sometimes|nullable',
        ];
    }
}