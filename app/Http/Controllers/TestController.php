<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function guest(){

        $message = 'Ciao User, purtroppo non sei autentificato, non vedrai i contenuti del sito';
        return view('test',compact('message'));
        // Rotta /free-zone/hello
        // Stampare 'Ciao Utente'
    }

    public function logged(){
        $user = Auth::user();
        $message = 'Ciao '.$user->name;
        return view('test', compact('message'));
        //  Rotta: /restricted-zone/hello
        // Stampare 'Ciao @NomeUtente'
    }
}
