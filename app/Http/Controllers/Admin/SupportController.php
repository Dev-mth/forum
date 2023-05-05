<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) { }

    /* listagem */
    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter,
        );
        $filters = ['filter' => $request->get('filter','')];

        return view('admin/supports/index', compact('supports', 'filters'));
    }

    /* interações do suporte */
    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {

            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    /*formulário de cadastro*/
    public function create()
    {
        return view('admin/supports/create');
    }

    /* pegar dados do formulário */
    public function store(StoreUpdateSupport $request, Support $support)
    {

        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        /*Redirecionar usuário para a listagem */
        return redirect()->route('supports.index');
    }

    /* Editar dúvida */
    public function edit(string $id)
    {
        //if (!$support = $support->where('id', $id)->first()) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    /* update dúvida */
    public function update(StoreUpdateSupport $request, string $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if (!$support) {

            return back();
        }

        return redirect()->route('supports.index');
    }

    /* Delete */
    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
