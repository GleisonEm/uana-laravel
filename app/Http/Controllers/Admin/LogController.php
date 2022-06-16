<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use Dompdf\Dompdf;
use Auth;
use Alert;

class LogController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                          TELA DE LOGS DO SISTEMA                                 ##
    ######################################################################################
    public function index()
    {
        $title = 'Logs do Sistema';
        $logs = Log::join('users', 'logs.user_id', '=', 'users.id')
            ->orderBy('datetime', 'desc')
            ->paginate($this->totalPage);

        return view('painel.administrador.logs.index', compact('title', 'logs'));
    }

    ######################################################################################
    ##                              PESQUISAR LOG                                       ##
    ######################################################################################
    public function logs_search(Request $request)
    {
        $title = 'Logs do Sistema';

        $logs = Log::join('users', 'logs.user_id', '=', 'users.id')
            ->orderBy('name', 'asc')
            ->where('name', 'like', '%' . Input::get('texto') . '%')
            ->orWhere('message', 'like', '%' . Input::get('texto') . '%')
            ->paginate($this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.administrador.logs.index', compact('title', 'logs'));
    }

    ######################################################################################
    ##                                 IMPRIMIR LOGS                                    ##
    ######################################################################################
    public function logs_pdf()
    {
        $title = 'Logs do Sistema';

        $logs = Log::join('users', 'logs.user_id', '=', 'users.id')
            ->orderBy('name', 'asc')
            ->where('name', 'like', '%' . Input::get('texto') . '%')
            ->orWhere('message', 'like', '%' . Input::get('texto') . '%')
            ->get();

        $total = $logs->count();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.administrador.logs.pdf', compact('title', 'logs', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name . " em " . date('d/m/Y \à\s H:i'), $font, 7, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("logs.pdf", array("Attachment" => false));
    }
}
