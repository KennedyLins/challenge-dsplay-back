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

        //Validando se o token é vazio
        if (empty($token)) {           
            echo "Um token é necessário para acessar os dados";

        }else{

        //Consultando o Id do Usuário através do token
        $getId = Http::get('https://graph.instagram.com/me',[

        'fields'      => 'id,username,account_type,media_count',
        'access_token'=> $token,
        ]);

        $id       = $getId['id'];
        
        //Consultando as Midias do usuário
        $getMedia = Http::get('https://graph.instagram.com/'.$id.'/media',[    

        'fields'      => 'id,caption,media_type,media_url,permalink,timestamp,username',
        'access_token'=> $token,
        ]);        
        
        return $getMedia;
        }
    }

}

    