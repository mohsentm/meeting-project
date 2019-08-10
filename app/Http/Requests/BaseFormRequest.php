<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return $this->getRules();
            case 'POST':
                return $this->postRules();
            case 'PUT':
            case 'PATCH':
                return $this->putRules();
        }
    }

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    abstract protected function postRules(): array;

    /**
     * Get the validation rules that apply to the get/delete request.
     * @return array
     */
    protected function getRules(): array
    {
        return [];
    }
    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    protected function putRules(): array
    {
        return $this->postRules();
    }
}
