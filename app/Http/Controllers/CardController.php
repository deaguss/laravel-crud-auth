<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index() {
        try {
            $cards = Card::with('members')->get();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('card')->with('error', 'Data card tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect()->route('card')->with('error', 'Terjadi kesalahan dalam mengambil data card.');
        }

        return view('card', ['cards' => $cards]);
    }
}
