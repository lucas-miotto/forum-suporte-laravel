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
    ) {
    }

    public function index(Request $request)
    {
        // $supports = $support->all();
        // dd($request->filter);
        // $supports = $this->service->getAll($request->filter);

        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 6),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/supports/index', compact('supports', 'filters'));
    }

    public function show(string $id)
    {
        // if (!$support = Support::find($id)) {
        //     return back();
        // }

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        // // $data = $request->all();
        // $data = $request->validated();
        // $data['status'] = 'a';

        // $support->create($data);

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()
            ->route('supports.index')
            ->with('message', 'Cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        // if (!$support = $support->where('id', $id)->first()) {
        //     return back();
        // }

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        // if (!$support = $support->find($id)) {
        //     return back();
        // }

        // // $support->update($request->only([
        // //     'subject',
        // //     'body'
        // // ]));

        // $support->update($request->validated());

        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return back();
        }

        return redirect()
            ->route('supports.index')
            ->with('message', 'Atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        // if (!$support = Support::find($id)) {
        //     return back();
        // }
        // $support->delete();

        $this->service->delete($id);

        return redirect()
            ->route('supports.index')
            ->with('message', 'Deletado com sucesso!');
    }
}
