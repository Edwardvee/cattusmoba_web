<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\banReason;

class BanReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banReasons = [
            'Trampas o uso de programas de terceros para obtener ventajas injustas (cheating)',
            'Comportamiento tóxico o abusivo en el chat de voz, texto o juego',
            'Abuso de glitches, exploits o errores del juego',
            'Compartir cuentas, realizar transacciones ilegales o vender objetos del juego',
            'Uso de cuentas de bot para farmear recursos o experiencia',
            'Suplantación de identidad, phishing o engaño a otros jugadores',
            'Participación en actividades de apuestas ilegales con activos del juego',
            'Acoso cibernético, amenazas o mensajes ofensivos hacia otros jugadores',
            'Hacer trampas en competencias, torneos o partidas en línea',
            'Spam de mensajes no deseados o publicidad no autorizada',
            'Compartir información personal de otros jugadores sin su consentimiento',
            'Promoción de contenido inapropiado o ilegal en nombres de usuario, avatares o descripciones',
            'Suplantación de identidad de un administrador del juego',
            'Comportamiento racista, sexista, discriminatorio o contenido de odio',
            'Difusión de teorías de conspiración dañinas o desinformación',
        ];
        foreach ($banReasons as $reason) {
            banReason::create([
                'name' => $reason,
            ]);
        }
    }
}
