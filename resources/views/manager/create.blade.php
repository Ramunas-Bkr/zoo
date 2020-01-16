@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ĮKELTI PRIŽIŪRĖTOJĄ</div>
                <div class="card-body">
                    <form method="POST" action="{{route('manager.store')}}">
                        Name: <input type="text" name="manager_name">
                        Surname: <input type="text" name="manager_surname">
                        <select name="specie_id">
                            @foreach ($species as $specie)
                                <option value="{{$specie->id}}">{{$specie->name}} </option>
                            @endforeach
                     </select>
                        @csrf
                        <button type="submit">ADD</button>
                     </form>
                </div>
           </div>
       </div>
   </div>
</div>
@endsection



