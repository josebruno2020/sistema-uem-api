<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ImpressaoController extends Controller
{
    protected function findUser($id)
    {
        $user = User::find($id);
        if(!$user) {
            return response('', 404);
        }

        return $user;
    }

    public function impressao(int $id)
    {
        $user = $this->findUser($id);

        $pdf = \PDF::loadView('certificado.index', compact('user'))->setPaper('a4', 'landscape');
        
        return $pdf->download("$user->name-certificado.pdf");


        // return view('certificado.index', compact('user'));
    }


    public function visualizar(int $id)
    {
        $user = $this->findUser($id);

        $pdf = \PDF::loadView('certificado.index', compact('user'))->setPaper('a4', 'landscape');
        
        return $pdf->stream();
    }


    public function email()
    {

    }
}
