<?php
namespace App\Http\Traits;

use App\Campamento;

trait CampamentoTrait {
    /**
     * Check which edition is editing
     *
     * @return integer campamento_id
     */
    public static function campamentoActual()
    {
        $campamento = Campamento::where('actual', 1)->first();
        if (empty($campamento->actual)) {
            return 0;
        }
        return $campamento->id;
    }
}