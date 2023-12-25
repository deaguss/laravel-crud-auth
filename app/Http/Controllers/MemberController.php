<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index() {
        try {
            // Eloquent ORM
            // $members = Member::all();

            // Query Builder
            $members = DB::table('members')->get();

        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'Data member tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan dalam mengambil data member.');
        }

        return view('home', ['members' => $members]);
    }
}
