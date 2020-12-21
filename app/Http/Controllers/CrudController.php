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
}
