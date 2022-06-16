<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\CourseFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Dompdf\Dompdf;
use Auth;
use Alert;

class CourseController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                         TELA DE CURSOS                                           ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Cursos';
        $courses = Course::orderBy('name', 'asc')->paginate($this->totalPage);
        $usersForSelect = Course::usersForSelect();
        $institutesForSelect = Course::institutesForSelect();

        return view('painel.cadastros.courses.index', compact('title', 'courses', 'usersForSelect', 'institutesForSelect'));
    }

    ######################################################################################
    ##                         CADASTRAR CURSO                                          ##
    ######################################################################################
    public function store(CourseFormRequest $request)
    {
        $course = new Course;
        $course->name = $request->name;
        $course->institute_id = $request->institute_id;
        $course->save();

        if ($request->users)
            $course->users()->sync($request->users);
        else
            $course->users()->detach();

        if ($course)
            Alert::success('Curso cadastrado');
        else
            Alert::error('Erro ao cadastrar curso');

        return redirect()->route('courses.index');
    }

    ######################################################################################
    ##                           ALTERAR CURSO                                          ##
    ######################################################################################
    public function update(CourseFormRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->institute_id = $request->institute_id;
        $course->save();

        if ($request->users)
            $course->users()->sync($request->users);
        else
            $course->users()->detach();

        if ($course)
            Alert::success('Curso alterado');
        else
            Alert::error('Erro ao alterar curso');

        return back();
    }

    ######################################################################################
    ##                           EXCLUIR CURSO                                          ##
    ######################################################################################
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        if ($course)
            Alert::success('Curso excluído');
        else
            Alert::error('Erro ao excluir curso');

        return back();
    }

    ######################################################################################
    ##                         PESQUISAR CURSO                                          ##
    ######################################################################################
    public function courses_search(Request $request, Course $course)
    {
        $title = 'Listagem de Cursos';

        $dataForm = $request->all();
        $courses = $course->search($dataForm, $this->totalPage);
        $usersForSelect = Course::usersForSelect();
        $institutesForSelect = Course::institutesForSelect();

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&institute_id=' . $request->get('institute_id', 1) . '&page=1');
        else
            return view('painel.cadastros.courses.index', compact('title', 'courses', 'usersForSelect', 'institutesForSelect'));
    }

    ######################################################################################
    ##                          IMPRIMIR CURSOS                                         ##
    ######################################################################################
    public function courses_pdf(Request $request, Course $course)
    {
        $title = 'Listagem de Cursos';

        $dataForm = $request->all();
        $courses = $course->search($dataForm, null);

        $total = $courses->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.cadastros.courses.pdf', compact('title', 'courses', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("courses.pdf", array("Attachment" => false));
    }
}
