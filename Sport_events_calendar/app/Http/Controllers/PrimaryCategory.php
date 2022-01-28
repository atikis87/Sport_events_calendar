<?php
namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;
use App\Models\PrimaryCategory as Category;

class PrimaryCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Category::get() , Response::HTTP_OK);
    }
}
