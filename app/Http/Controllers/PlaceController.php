<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\DeletedPlace;

class PlaceController extends Controller
{
    public function index() {
        $currentPage = request('page');
        $places = Place::paginate(10);

        return view('pages.places', ['places' => $places]);
    }

    public function create(Request $request) {
        $newPlace = new Place();
        $newPlace -> name = $request -> input('name');
        $newPlace -> description = $request -> input('descriptin');
        $newPlace -> repair = $request -> input('repair');
        $newPlace -> save();

        return redirect('places.place'.$newPlace -> id);
    }

    public function view($id) {
        $currentPlace = Place::findOrFail($id);
        return view('places.place', ['place' => $currentPlace]);
    }

    public function update($id) {
        Gate::authorize('update-place');
        $place = Place::findOrFail($id);
        return view('places.edit-place', ['place' => $place]);
    }

    public function delete($id) {
        Gate::authorize('delete-place');
        $place = place::findOrFail($id);
        $deletedPlace = new DeletedPlace();
        $deletedPlace -> name = $place -> name;
        $deletedPlace -> description = $place -> description;
        $deletedPlace -> save();
        $place -> delete();
        return redirect('places.all-places');
    }
}
