<?php

namespace App\Http\Controllers\Admin;

use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    public function index()
    {
        $rsc = Resources::query()->paginate(6);
        return view('admin.resources.index')->with('resources', $rsc);
    }

    public function create()
    {
        $rsc = new Resources();
        return view('admin.resources.create', [
            'rsc' => $rsc,
        ]);
    }

    public function store(Request $request)
    {
        $rsc = new Resources();

        $this->validate($request, Resources::rules(), [], Resources::attrNames());
        $result = $rsc->fill($request->all())->save();

        if ($result) {
            return redirect()->route('Admin.resources.index')->with('success', 'Ресурс добавлен успешно!');
        } else {
            return redirect()->route('Admin.resources.index')->with('error', 'Ошибка добавления ресурса!');
        }
    }

    public function edit(Resources $rsc)
    {
        return view('admin.resources.create', [
            'rsc' => $rsc,
        ]);
    }

    public function update(Request $request, Resources $rsc)
    {

        $this->validate($request, Resources::rules(), [], Resources::attrNames());
        $result = $rsc->fill($request->all())->save();

        if ($result) {
            return redirect()->route('Admin.resources.index')->with('success', 'Ресурс изменен успешно!');
        } else {
            return redirect()->route('Admin.resources.index')->with('error', 'Ошибка добавления ресурса!');
        }
    }

    public function destroy(Resources $rsc)
    {
        $rsc->delete();
        return redirect()->route('Admin.resources.index')->with('success', 'Ресурс удален успешно!');
    }
}
