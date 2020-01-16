@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ĮKELTI GYVŪNO RŪŠĮ</div>
               <div class="card-body">
                    <form method="POST" action="{{route('specie.store')}}">
                        Specie: <input type="text" name="specie_name">
                        @csrf
                        <button type="submit">ADD</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection




