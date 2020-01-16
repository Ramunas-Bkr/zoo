@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">KOREGUOTI GYVŪNO PARAMETRUS</div>
                <div class="card-body">
                    <form method="POST" action="{{route('animal.update',[$animal])}}">
                        <div class="form-group">
                            <label>Gyvūnas</label>
                            <input type="text" name="animal_name"  class="form-control" value="{{$animal->name}}">
                        </div>
                        <div class="form-group">
                            <label>Gimimo metai</label>
                            <input type="text" name="animal_birth_year"  class="form-control" value="{{$animal->birth_year}}">
                        </div>
                        <div class="form-group">
                            <label>Įrašai apie gyvūną: </label>
                            <textarea name="animal_animal_book" id="summernote">{{$animal->animal_book}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Gyvūno rūšis: </label>
                            <select name="specie_id">
                            @foreach ($species as $specie)
                                <option value="{{$specie->id}}" @if($specie->id == $animal->specie_id) selected @endif>
                                    {{$specie->name}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Prižiūrėtojai: </label>
                            <select name="manager_id">
                            @foreach ($managers as $manager)
                                <option value="{{$manager->id}}" @if($manager->id == $animal->manager_id) selected @endif>
                                    {{$manager->name}} {{$manager->surname}}, prižiūri: 
                                    @foreach ($species as $specie)
                                    @if ($specie->id == $manager->specie_id) {{$specie->name}}
                                    @endif
                                @endforeach
                                </option>
                            @endforeach
                            </select>
                            <br>
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>
@endsection





