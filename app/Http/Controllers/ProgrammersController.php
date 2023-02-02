<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmer;
use App\Http\Requests\ProgrammerAddRequest;
use App\Http\Requests\ProgrammerUpdateRequest;

class ProgrammersController extends Controller
{
    public function index() {
        $programmers = Programmer::all();
        return view('programmers.index', compact('programmers'));
    }

    public function show(Programmer $programmer) {
        return view('programmers.show', compact('programmer'));
    }
    
    public function store(ProgrammerAddRequest $request) {
        Programmer::create($request->validated());
        
        return redirect('/programmers');
    }

    public function update(ProgrammerUpdateRequest $request, Programmer $programmer) {
        $programmer->update($request->validated());
        $programmer->save();
        
        return redirect('/programmers');
    }

    public function destroy(Programmer $programmer) {
        $programmer->delete();
        
        return response()->json(null, 204);
    }
}
