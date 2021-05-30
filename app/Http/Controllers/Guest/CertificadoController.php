<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\CertificadoMail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CertificadoController extends Controller
{
    protected function findUser($id)
    {
        $user = User::find($id);
        if(!$user || $user->is_finished == 0) {
            return abort(401);
        }

        return $user;
    }

    protected function getCurrentMonth()
    {
        setlocale(LC_TIME, 'ptb');
        $dt = Carbon::now();
        return \Str::ucfirst($dt->formatLocalized("%B"));
    }

    public function impressao(int $id)
    {
        $user = $this->findUser($id);
        $month = $this->getCurrentMonth();

        $pdf = \PDF::loadView('certificado.index', compact('user', 'month'))->setPaper('a4', 'landscape');
        
        // return $pdf->download("$user->name-certificado.pdf");


        return $pdf->stream();

        // return view('certificado.index', compact('user'));
    }


    public function visualizar(int $id)
    {
        $user = $this->findUser($id);
        $month = $this->getCurrentMonth();

        return view('certificado.index', compact('user', 'month'));
        // $pdf = \PDF::loadView('certificado.index', compact('user'))->setPaper('a4', 'landscape');
        
        // return $pdf->stream();
    }


    public function email(int $id)
    {
        $user = $this->findUser($id);
        $month = $this->getCurrentMonth();

        $pdf = \PDF::loadView('certificado.index', compact('user', 'month'))->setPaper('a4', 'landscape')
            ->save(public_path("certificado/$user->name-certificado.pdf"));
        
        
        // Envio de email;
        try {
            Mail::to($user->email)
                ->send(new CertificadoMail($user->name));

            unlink(public_path("certificado/$user->name-certificado.pdf"));

            return $this->sendData(['message' => 'E-mail enviado com sucesso!']);
        } catch(Exception $e) {
            return response()->json(['message' => 'Não foi possível enviar seu certificado. Tente novamente mais tarde']);
        }
    }
}
