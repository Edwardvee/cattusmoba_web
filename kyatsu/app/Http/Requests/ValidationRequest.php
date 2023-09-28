<?php

namespace App\Http\Requests;

use App\Rules\ColumnExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected Model $model;
    protected bool $isDatable;

    public function __construct(Model $Model) {
        $this->model = $Model;
    }
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:36'],
            'page' => ['required', 'integer'],
            'method' => [
                'required',
                'string',
                new ColumnExists($this->model, false)      
            ],
            'date_method' => [
                'required',
                'string',
                new ColumnExists($this->model, true)        
        ],
            'date_start' => ['required', 'date_format:d/m/Y'],
            'date_end' => ['required', 'date_format:d/m/Y'],
            'order' => [
                'required', 
                Rule::in(['ASC', 'DESC'])
            ],
        ];
    
    }
 /*   public function afterValidate() {
        $this->replace([
            'date_start' => Carbon::createFromFormat('d/m/Y', $this->validated()['date_start'])->toDateString(),
            'date_end' => Carbon::createFromFormat('d/m/Y', $this->validated()['date_end'])->toDateString(),
        ]);
    }*/
/*    public function afterValidate() {
        $validatedData = $this->validated();
        foreach ($validatedData as $key => $value) {
            if ($key === 'date_start' || $key === 'date_end') {
                $date = Carbon::createFromFormat('d/m/Y', $value);
                $this->merge([$key => $date->toDateString()]);
            }
        }
    }*/
}