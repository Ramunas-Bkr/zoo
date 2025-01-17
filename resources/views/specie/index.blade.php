@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">GYVŪNŲ RŪŠYS</div>
               <div class="card-body">
                  @foreach ($species as $specie)
                  <a href="{{route('specie.edit',[$specie])}}">{{$specie->name}}</a>
                  <form method="POST" action="{{route('specie.destroy', [$specie])}}">
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






