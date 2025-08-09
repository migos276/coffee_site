<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LawyerRequest;
use App\Models\Lawyer;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LawyerController extends Controller
{
    public function index(Request $request) {
        $q = $request->get('q');
        $lawyers = Lawyer::with('practices')
            ->when($q, fn($query) => $query->where(fn($qq) => $qq
                ->where('first_name','like',"%$q%")->orWhere('last_name','like',"%$q%")))
            ->orderBy('last_name')->paginate(15);
        return view('admin.lawyers.index', compact('lawyers','q'));
    }

    public function create() {
        $practices = Practice::orderBy('name')->get();
        return view('admin.lawyers.create', compact('practices'));
    }

    public function store(LawyerRequest $request) {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('lawyers','public');
        }
        $practices = $data['practices'] ?? [];
        unset($data['practices']);
        $lawyer = Lawyer::create($data);
        $lawyer->practices()->sync($practices);
        return redirect()->route('admin.lawyers.index')->with('success','Avocat créé');
    }

    public function edit(Lawyer $lawyer) {
        $practices = Practice::orderBy('name')->get();
        return view('admin.lawyers.edit', compact('lawyer','practices'));
    }

    public function update(LawyerRequest $request, Lawyer $lawyer) {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            if ($lawyer->photo) Storage::disk('public')->delete($lawyer->photo);
            $data['photo'] = $request->file('photo')->store('lawyers','public');
        }
        $practices = $data['practices'] ?? [];
        unset($data['practices']);
        $lawyer->update($data);
        $lawyer->practices()->sync($practices);
        return redirect()->route('admin.lawyers.index')->with('success','Avocat mis à jour');
    }

    public function destroy(Lawyer $lawyer) {
        if ($lawyer->photo) Storage::disk('public')->delete($lawyer->photo);
        $lawyer->delete();
        return back()->with('success','Avocat supprimé');
    }

    public function show(Lawyer $lawyer) {
        $lawyer->load('practices');
        return view('admin.lawyers.show', compact('lawyer'));
    }
}