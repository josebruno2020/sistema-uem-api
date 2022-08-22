<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\CertificadoMail;
use App\Models\User;
use App\Models\UserModule;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CertificadoController extends Controller
{
    protected function findUser($id): User
    {
        $user = User::find($id);
        if (!$user) {
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

    public function impressao(int $id, Request $request)
    {
        $user = $this->findUser($id);
        $moduleId = $request->get('module');

        $userModule = UserModule::query()->where('module_id', $moduleId)->where('user_id', $user->id)->first();

        if (!$userModule->is_finished) {
            return abort(403);
        }

        $name = $user->name;
        $month = $this->getCurrentMonth();

        $pdf = \PDF::loadView('certificado.index', compact('name', 'month'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }


    public function visualizar()
    {
        $name = Str::random(10);

        $data = [
          'month'=> $this->getCurrentMonth(),
          'name' => $name
        ];
        $pdf = \PDF::loadView('certificado.index', $data)->setPaper('a4', 'landscape');
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
