<?php

namespace App\Http\Controllers\Admin;

use App\models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'models' => Categories::query()->paginate(20)
        ]);
    }
}
