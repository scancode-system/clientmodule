<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Client\Repositories\SettingClientRepository;

class SettingClientController extends Controller
{

    public function update(Request $request)
    {
        SettingClientRepository::update($request->all());
        return back()->with('success', 'Configuração atualizada.');
    }

}
