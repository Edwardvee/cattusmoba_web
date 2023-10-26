<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{
    public function passes($attribute, $value)
    {
        // Realiza la validación del reCAPTCHA aquí
        // Puedes utilizar la librería reCAPTCHA de Google o cualquier otra forma de validación que prefieras.
        // Retorna true si el reCAPTCHA es válido, o false si no lo es.
        // A continuación, un ejemplo de cómo validar el reCAPTCHA usando la librería de Google.

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $secret = '6LedxM8oAAAAAOiOcKk9Su-WzH51qzc_c29XO_-u'; // Reemplaza con tu clave secreta de reCAPTCHA

        $response = file_get_contents($url . '?secret=' . $secret . '&response=' . $value);
        $data = json_decode($response);

        return $data->success; // Retorna true si el reCAPTCHA es válido, o false si no lo es.
    }

    public function message()
    {
        return 'La validación reCAPTCHA ha fallado.';
    }
}
