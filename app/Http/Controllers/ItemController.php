<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = item::all();

        return view("item", ["items" => $items]);
    }
}
