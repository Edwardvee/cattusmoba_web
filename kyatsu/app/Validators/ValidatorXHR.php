<?php

namespace App\Validators;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

/*
La razon por la cual se creo este tipo de validador es porque en
request->validate() a veces no se encontraba en la clase request lo enviado por el usuario
Por lo que fue necesario extender al Validator Facade y modificar su manejo de errores y de informacion
Para que sea util y apropiado para utilizar en todas las instancias,
La unica diferencia es que se llama con un new en vez de __make
*/

// https://stackoverflow.com/questions/40171546/php-error-fatal-error-constant-expression-contains-invalid-operations
class ValidatorXHR extends Validator {
    public $validator;
    public function __construct(array $data, array $rules, array $messages = [], array $customAttributes = []) {
        $this->validator = parent::make($data, $rules, $messages, $customAttributes);
        if ($this->validator->fails()) {
            $this->onFails();
        }
    }
    public function onFails(): JsonResponse {
        try {
            throw new ValidationException($this->validator);
        } catch (ValidationException $exception) {
            return response()->json($exception->response, $exception->status);
        }
    }
}