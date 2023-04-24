<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IntegracaoAgendaFila;
use App\Models\WebhookControl;
use Symfony\Component\HttpFoundation\Response;


class IntegracoesController extends Controller
{
    public function list(Request $request) {

        $IntegracaoAgendaFila = IntegracaoAgendaFila::all();

        return response()->json([
            'msg' => trans('general.msg.success'),
            'total_results' => $IntegracaoAgendaFila->count(),
            'current_page'  => intval(@$request->current_page && is_numeric($request->current_page) ? $request->current_page : 1),
            'total_pages'   => ceil(IntegracaoAgendaFila::all()->count()/( @$request->limit ?? 50 )),
            'data'          => $IntegracaoAgendaFila,
        ],
        Response::HTTP_OK
);
    }
    public function store(Request $request) {

        //$dado =  json_encode($request['dados'],JSON_FORCE_OBJECT);
        $dados = new IntegracaoAgendaFila();
        $dados->dados =  $request['dados'];
        $dados->created_at = NOW();
        $dados->save();

        return response()->json([
            'msg' => trans('general.msg.success'),
            'dados' => $dados,
        ], Response::HTTP_OK);

    }
     public function webhookcontrol(Request $request)
    {
        $cnpj = $request['cnpj'];
        $consulta = WebhookControl::where('cnpj',$cnpj)->get();
        if($consulta != null ) {
            return response()->json([
                'msg' => trans('general.msg.success'),
                'dados' => $consulta,
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'msg' => trans('general.msg.notFound'),
                'dados' => $consulta,
            ], Response::HTTP_UNAUTHORIZED);
        }


    }

}