@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KOREGUOTI GYVŪNO RŪŠĮ</div>
               <div class="card-body">
                    <form method="POST" action="{{route('specie.update',[$specie])}}">
                        Specie: <input type="text" name="specie_name" value="{{$specie->name}}">
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection





