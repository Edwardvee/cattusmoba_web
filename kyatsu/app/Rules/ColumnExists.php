<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Validation\ValidationRule;

class ColumnExists implements ValidationRule
{
    public bool $validationStatus;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->validationStatus = (Schema::hasColumn($attribute, $value));
    }
    public function passes() {
        return false;
        //return $this->validationStatus;
    }
    public function messages() {
        return "No existe el metodo :value del atributo :attribute"; 
    }
}
