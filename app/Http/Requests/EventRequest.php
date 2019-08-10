<?php

namespace App\Http\Requests;

class EventRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    protected function postRules(): array
    {
        return [];
    }

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    protected function getRules(): array
    {
        return [
            'page' => ['integer', 'min:1'],
            'per_page' => ['integer', 'between:1,50'],
        ];
    }
}
