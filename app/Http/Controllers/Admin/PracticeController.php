<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PracticeRequest;
use App\Models\Practice;
use App\Models\Lawyer;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index(Request $request) {
        $q = $request->get('q');
        $practices = Practice::when($q, fn($qu) => $qu->where('name','like',"%$q%"))
            ->orderBy('order')->orderBy('name')->paginate(20);
        return view('admin.practices.index', compact('practices','q'));
    }

    public function create() {
        $lawyers = Lawyer::orderBy('last_name')->get();
        return view('admin.practices.create', compact('lawyers'));
    }

    public function store(PracticeRequest $request) {
        $data = $request->validated();
        $lawyers = $data['lawyers'] ?? [];
        unset($data['lawyers']);
        $practice = Practice::create($data);
        $practice->lawyers()->sync($lawyers);
        return redirect()->route('admin.practices.index')->with('success','Domaine créé');
    }

    public function edit(Practice $practice) {
        $lawyers = Lawyer::orderBy('last_name')->get();
        return view('admin.practices.edit', compact('practice','lawyers'));
    }

    public function update(PracticeRequest $request, Practice $practice) {
        $data = $request->validated();
        $lawyers = $data['lawyers'] ?? [];
        unset($data['lawyers']);
        $practice->update($data);
        $practice->lawyers()->sync($lawyers);
        return redirect()->route('admin.practices.index')->with('success','Domaine mis à jour');
    }

    public function destroy(Practice $practice) {
        $practice->delete();
        return back()->with('success','Domaine supprimé');
    }

    public function order() {
        $items = Practice::orderBy('order')->get();
        return view('admin.practices.order', compact('items'));
    }

    public function saveOrder(Request $request) {
        $order = $request->validate(['order' => ['required','array']])['order'];
        foreach ($order as $position => $id) {
            Practice::where('id', $id)->update(['order' => $position]);
        }
        return back()->with('success','Ordre sauvegardé');
    }
}