<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Validation\ValidationRule;
//use Illuminate\Validation\Rule as ValidationRule;
//class ColumnExists extends 
class ColumnExists implements ValidationRule
{
    public bool $validationStatus;
    public string $tableName;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($tableName) {
        $this->tableName = $tableName;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->validationStatus = Schema::hasColumn($this->tableName, $value) ? true : false;
    }
    public function passes() {
        return false;
    }
    /*public function __toString() {
        return "No existe el metodo :value de la tabla " . $this->tableName;
    }*/
    public function message() {
        return "No existe el metodo :value del atributo :attribute"; 
    }
}
