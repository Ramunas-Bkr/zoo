@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">GYVŪNAI</div>
                    <div class="card-body">
                        @foreach ($animals as $animal)
                        <a href="{{route('animal.edit',[$animal])}}">{{$animal->name}} <br>
                        rūšis: {{$animal->animalSpecie->name}} <br>
                        prižiūrėtojas:{{$animal->animalManager->name}} {{$animal->animalManager->surname}}</a>
                        <form method="POST" action="{{route('animal.destroy', [$animal])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                        </form>
                        <br>
                         @endforeach
                    </div>
           </div>
       </div>
   </div>
</div>
@endsection





