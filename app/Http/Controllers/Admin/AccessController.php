<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access;
use Dompdf\Dompdf;
use Auth;
use Alert;

class AccessController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                       TELA DE ACESSOS AO SISTEMA                                 ##
    ######################################################################################
    public function index()
    {
        $title = 'Acessos ao Sistema';
        $accesses = Access::join('users', 'accesses.user_id', '=', 'users.id')
            ->orderBy('datetime', 'desc')
            ->paginate($this->totalPage);

        return view('painel.administrador.accesses.index', compact('title', 'accesses'));
    }

    ######################################################################################
    ##                              PESQUISAR  ACESSO                                   ##
    ######################################################################################
    public function accesses_search(Request $request)
    {
        $title = 'Acessos ao Sistema';

        $accesses = Access::join('users', 'accesses.user_id', '=', 'users.id')
            ->orderBy('name', 'asc')
            ->where('name', 'like', '%' . Input::get('texto') . '%')
            ->paginate($this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.administrador.accesses.index', compact('title', 'accesses'));
    }

    ######################################################################################
    ##                               IMPRIMIR ACESSOS                                   ##
    ######################################################################################
    public function accesses_pdf()
    {
        $title = 'Acessos ao Sistema';
        $accesses = Access::join('users', 'accesses.user_id', '=', 'users.id')
            ->orderBy('name', 'asc')
            ->where('name', 'like', '%' . Input::get('texto') . '%')
            ->get();

        $total = $accesses->count();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.administrador.accesses.pdf', compact('title', 'accesses', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name . " em " . date('d/m/Y \à\s H:i'), $font, 7, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("accesses.pdf", array("Attachment" => false));
    }
}
