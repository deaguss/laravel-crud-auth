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
            // Eloquent ORM --get
            // $members = Member::all();

            // Query Builder --get
            // $members = DB::table('members')->get();

            // Query builder --insert
            // DB::table('members')->insert([
            //    'username' => 'arthur',
            //    'email' => 'arthur@gmail.com',
            //    'no_hp' => '08123456789',
            //    'gender' => 1,
            //    'alamat' => 'jl. arthur',
            // ]);

            // Eloquent ORM --insert
            // Member::create([
            //     'username' => 'arthur2',
            //     'email' => 'arthur2@gmail.com',
            //     'no_hp' => '08123456789',
            //     'gender' => 1,
            //     'alamat' => 'jl. arthur',
            // ]);

            // Query builder --update
            // DB::table('members')->where('id', 32)->update([
            //     'gender' => '0'
            // ]);

            // Eloquent ORM --update
            // Member::find(32)->update([
            //     'gender' => '1'
            // ]);

            // Query builder --delete
            // DB::table('members')->where('id', 32)->delete();

            // Eloquent ORM --delete
            // Member::find(31)->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'Data member tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan dalam mengambil data member.');
        }

        // return view('home', ['members' => $members]);
    }
}
