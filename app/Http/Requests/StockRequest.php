<?php

namespace App\Http\Requests;

use App\Exceptions\CommonValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator){
        throw new CommonValidationException($validator);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();
        switch ($routeName) {
            case 'stock.save':
                return $this->saveStockRules();
            case 'stock.update':
                return $this->updateStockRules();
            default:
                return [];
        }
    }

    public function saveStockRules(){
        return [
            'date' => 'required|date',
            'type' => 'required|in:dep,fragrance',
            'quantity' => 'required',
            'price' => 'required'
        ];
    }
    public function updateStockRules(){
        return [
            'id' => 'required|exists:stocks,id',
            'date' => 'required|date',
            'type' => 'required|in:dep,fragrance',
            'quantity' => 'required',
            'price' => 'required'
        ];
    }
}
