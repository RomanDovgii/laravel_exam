<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeletedThing;

class DeletedThingController extends Controller
{
    public function index() {
        $currentPage = request('page');
        $things = DeletedThing::paginate(10);

        return view('pages.deleted-things', ['things' => $things]);
    }

    public function restore($id) {
        DeletedThing::where('id', $id) -> update(['restoration' => '1']);

        $things = DeletedThing::paginate(10);

        return view('pages.deleted-things', ['things' => $things]);
    }
}
