<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use App\Manager;
use App\Specie;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = Manager::all();
        $species = Specie::all();
        return view('animal.create', ['managers' => $managers], ['species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manager = Manager::where('id', $request->manager_id)->first();

        
        // dd($manager);

        if($request->specie_id != $manager->specie_id){
            $request->flash();
            return redirect()->back()->with('info_message', 'Prižiūrėtojas neprižiūri šio tipo gyvūnų, pasirinkite tą kuris prižiūri');
        } else {
            $animal = new Animal;
            $animal->name = $request->animal_name;
            $animal->birth_year = $request->animal_birth_year;
            $animal->animal_book = $request->animal_animal_book;
            $animal->specie_id = $request->specie_id;
            $animal->manager_id = $request->manager_id;
            $animal->save();
            return redirect()->route('animal.index')->with('success_message', 'Sekmingai įrašytas.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
       $species = Specie::all();
       $managers = Manager::all();
       return view('animal.edit', ['animal' => $animal, 'species' => $species, 'managers' =>$managers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->name = $request->animal_name;
        $animal->birth_year = $request->animal_birth_year;
        $animal->animal_book = $request->animal_animal_book;
        $animal->specie_id = $request->specie_id;
        $animal->manager_id = $request->manager_id;
        $animal->save();
        return redirect()->route('animal.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animal.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
