<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\CertificadoMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CertificadoController extends Controller
{
    protected function findUser($id): User
    {
        $user = User::find($id);
        if (!$user || $user->is_finished == 0) {
            return abort(401);
        }

        return $user;
    }

    protected function getCurrentMonth(): string
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        $dt = Carbon::now('America/Sao_Paulo');
        return Str::ucfirst($dt->formatLocalized("%B"));
    }

    public function impressao(int $id)
    {
        $user = $this->findUser($id);
        $name = $user->name;
        $month = $this->getCurrentMonth();

        $pdf = \PDF::loadView('certificado.index', compact('name', 'month'))->setPaper('a4', 'landscape');

        // return $pdf->download("$user->name-certificado.pdf");


        return $pdf->stream();
    }


    public function visualizar()
    {
//        $user = $this->findUser($id);
        $name = 'José Bruno';

//        dd($month);

//        return view('certificado.index', compact('name', 'month'));
        $data = [
          'month'=> $this->getCurrentMonth(),
          'name' => $name
        ];
        $pdf = \PDF::loadView('certificado.index', $data)->setPaper('a4', 'landscape');
//        return $pdf->stream();
//        dd($pdf->stream());
//        dd($pdf);
        return $pdf->download("$name-certificado.pdf");

        return $pdf->stream();
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
        } catch (Exception $e) {
            return response()->json(['message' => 'Não foi possível enviar seu certificado. Tente novamente mais tarde']);
        }
    }
}
