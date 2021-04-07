<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ApiInstagramController extends Controller
{
    
    public function index(Request $request)
    {

        //Recebendo token da view
        $token = $request->token;

        //Consultando o Id do Usuário através do token
        $getId = Http::get('https://graph.instagram.com/me',[

        'fields'      => 'id,username',
        'access_token'=> $token,
        ]);

        $id       = $getId['id'];
        $username = $getId['username'];

        //Consultando as Midias do usuário
        $getMedia = Http::get('https://graph.instagram.com/'.$id.'/media',[

        'fields'      => 'id,caption,media_type,media_url,permalink,timestamp,username',
        'access_token'=> $token,
        ]);        

        //Retornando os dados captados para a view
        return view('dados', compact('getMedia'));
        
    }

}

    