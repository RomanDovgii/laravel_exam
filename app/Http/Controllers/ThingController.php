<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thing;
use App\Models\Uses;
use App\Models\User;
use App\Models\DeletedThing;

class ThingController extends Controller
{
    public function index() {
        $currentPage = request('page');
        $things = Thing::paginate(10);

        return view('pages.things', ['things' => $things]);
    }

    public function create(Request $request) {
        $newThing = new Thing();
        $newThing -> name = $request -> input('name');
        $newThing -> description = $request -> input('description');
        $newThing -> wrnt = $request -> input('wrnt');
        $newThing -> master = auth() -> user() -> id;
        $newThing -> measurement_id = 1;
        $newThing -> save();

        return redirect(route('all-things'));
    }

    public function view($id) {
        $currentThing = Thing::findOrFail($id);
        return view('things.thing', ['thing' => $currentThing]);
    }

    public function showUpdate($id) {
        $currentThing = Thing::findOrFail($id);
        return view('pages.edit-thing', ['thing' => $currentThing]);
    }

    public function update(Request $request) {

        Thing::where('id', $request -> input('id')) -> update([
            'name' => $request -> input('name'),
            'description' => $request -> input('description'),
            'wrnt' => $request -> input('wrnt'),

        ]);
        return redirect(route('all-things'));
    }

    public function delete($id) {
        $thing = Thing::findOrFail($id);
        $uses = (Uses::where('thing_id', $id) -> take(1) -> get())[0];
        $deletedThing = new DeletedThing();
        $deletedThing -> name = $thing -> name;
        $deletedThing -> description = $thing -> description;
        $deletedThing -> wrnt = $thing -> wrnt;
        $deletedThing -> last_owner_id = $uses -> user_id;
        $deletedThing -> save();
        $thing -> delete();
        return redirect('things/all-things');
    }

    public function showSend($id) {
        $users = User::all();
        return view('pages.send-thing', ['id' => $id, 'users' => $users]);
    }

    public function send(Request $request) {
        Thing::where('id', $request -> input('thing_id')) -> update(['master' => $request -> input('master')]);
        return redirect(route('all-things'));
    }
}
