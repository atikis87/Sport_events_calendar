<?php
namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Team;

use Illuminate\Http\Request;

class Teams extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Team::get() , Response::HTTP_OK);
    }
}
