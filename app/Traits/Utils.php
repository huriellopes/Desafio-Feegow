<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

trait Utils
{
    /**
     * Functions to clear scripts
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function clear_tags($variavel)
    {
        return preg_replace('(<(/?[^\>]+)>)', '', $variavel);
    }

    /**
     * Date format function
     *
     * @param $value
     * @param string $formato
     * @return string
     */
    public static function formatDate($value, $formato = 'd/m/Y')
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }

    /**
     * @param $value
     * @param string $formato
     * @return string
     */
    public function dateTimeFormat($value, $formato = 'd/m/Y H:i:s'): string
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }

    /**
     * Function to clear mask
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function clear_mask($variavel)
    {
        return preg_replace('/\D+/', '', $variavel);
    }

    /**
     * @param $cpf
     * @return mixed|string
     */
    public function mask_cpf($cpf)
    {
        if (!$cpf) {
            return '';
        }

        if (strlen($cpf) == 11) {
            return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
        }

        return $cpf;
    }

    /**
     * Http query function
     *
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function get_api()
    {
        return Http::acceptJson()->withHeaders([
            'Content-Type' => 'application/json',
            'x-access-token' => env('FEEGOW_APIKEY')
        ]);
    }
}
