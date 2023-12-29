<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberCreateRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Models\trainer as Trainer;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index() {
        try {
            // Eloquent ORM --get
            $members = Member::paginate(15);

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


            //collection
            // $checkGender = collect($members)->where("gender", "1")->isNotEmpty() ? "ada" : "tidak ada";

            // $checkUsername = collect($members)->contains("username", "brionna19");

            // $array1 = ["mangga", "apel", "jeruk", "lemon", "jambu"];
            // $array2 = ["apel", "jeruk", "stroberi", "jambu", "anggur"];

            //membandingkan nilai array 1 yg tidak ada dinilai 2
            // $checkDiff = collect($array1)->diff($array2);

            // mencari nilai sama dalam array 1 dan 2
            // $filterBuah = collect($array1)->filter(function ($value) use ($array2) {
            //     return collect($array2)->contains($value);
            // });

            // $array3 = [
            //     ["nama" => "andre", "age" => "18"],
            //     ["nama" => "brionna", "age" => "19"],
            //     ["nama" => "arthur", "age" => "20"],
            // ];

            // memotong data dan mengambil data berdasarkan key, "nama" => "andre"
            // $selectPluk = collect($array3)->pluck("nama");
            // dd($selectPluk);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'Data member tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan dalam mengambil data member.');
        }

        return view('home', ['members' => $members]);
    }

    public function getId($id = null) {
        $memberById = Member::with([
            'trainerMember',
            'items',
            'cards'
        ])->findOrFail($id);
        return view('detail-member', ["memberById" => $memberById]);
    }

    public function create() {
        try {
            $getTrainer = Trainer::select('id', 'train_name')->get();
            return view('add-member', ["trainer" => $getTrainer]);
        } catch (QueryException $e) {
            return 'Terjadi kesalahan!';
        }
    }

    public function store(MemberCreateRequest $request) {
        try {
            $members = Member::create([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'trainer_id' => $request->trainer_id,
                'alamat' => $request->alamat,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            if($members) {
             $status = $members ? 'success' : 'error';
             $message = $members ? 'Data member berhasil ditambahkan!' : 'Data member gagal ditambahkan!';

             Session::flash('status', $status);
             Session::flash('message', $message);

             return redirect('/add-member');
            }
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function edit($id = null) {
        $memberById = Member::with('trainerMember')->findOrFail($id);
        $trainer = Trainer::where('id', '!=', $memberById->trainer_id)->select('id', 'train_name')->get();
        return view('edit-member', ["memberById" => $memberById, "trainer" => $trainer]);
    }

    public function update(MemberCreateRequest $request, $id = null) {
        try {
            $members = Member::find($id)->update([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'trainer_id' => $request->trainer_id,
                'alamat' => $request->alamat,
                'updated_at' => Carbon::now(),
            ]);

            if($members) {
                $status = $members ? 'success' : 'error';
                $message = $members ? 'Data member berhasil diupdate!' : 'Data member gagal diupdate!';

                Session::flash('status', $status);
                Session::flash('message', $message);

                return redirect('/edit-member/'. $id);
            }
        } catch (QueryException $e) {
            throw $e;
        }
    }

    public function destroy($id = null) {
        Member::findOrFail($id)->delete();
        return redirect('/home');
    }

    public function softDelete(){
        $deletedMembers = Member::onlyTrashed()->get();
        return view('deleted-member', ['deletedMembers' => $deletedMembers]);
    }

    public function restore($id = null) {
        Member::withTrashed()->find($id)->restore();
        return redirect('/home');
    }
}
