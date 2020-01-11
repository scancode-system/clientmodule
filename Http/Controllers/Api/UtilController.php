<?php

namespace Modules\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UtilController extends Controller
{

    public function cnpj(Request $request, $cnpj)
    {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://www.receitaws.com.br/v1/cnpj/'.$cnpj);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $dados = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            return response()->json(['cnpj' => $cnpj, 'dados' => json_decode($dados), 'status' => $status], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function cep(Request $request, $cep)
    {
        try {

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://viacep.com.br/ws/'.$cep.'/json/');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $endereco = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            return response()->json(['cep' => $cep, 'endereco' => json_decode($endereco), 'status' => $status], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

}
