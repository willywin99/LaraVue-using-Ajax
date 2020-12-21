<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\CrudResource;

class CrudController extends Controller
{
    //
    public function index()
    {
        $crud = User::orderBy('created_at', 'desc')->get();

        return CrudResource::collection($crud);
    }

    public function store(Request $request)
    {
        $crud = User::create([
            'name' => $request->name,
        ]);

        return new CrudResource($crud);
        // return $crud;
    }

    public function delete($id)
    {
        User::destroy($id);
        return 'success';
    }

    public function edit(Request $request, $id)
    {
        # code...
        $crud = User::find($id);
        // if($crud->done == 1)

        $crud->update([
            'name' => $request->name
        ]);

        return new CrudResource($crud);
    }
}
