@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ĮKELTI GYVŪNĄ</div>
                <div class="card-body">
                    <form method="POST" action="{{route('animal.store')}}">
                        <div class="form-group">
                            <label>Gyvūnas</label>
                            <input type="text" name="animal_name" class="form-control" value="{{old('animal_name')}}">
                            <small class="form-text text-muted">Įvesti gyvūno pavadinimą</small>
                        </div>
                        <div class="form-group">
                            <label>Gimimo metai</label>
                            <input type="text" name="animal_birth_year" class="form-control" value="{{old('animal_birth_year')}}">
                            <small class="form-text text-muted">Įvesti gyvūno gimimo metus</small>
                        </div>
                        <div class="form-group">
                            <label>Įrašai apie gyvūną: </label>
                            <textarea name="animal_animal_book" id="summernote">{{old('animal_animal_book')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Gyvūno rūšis: </label>
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                    <option value="{{$specie->id}}">{{$specie->name}}</option>
                                @endforeach
                            </select>
                            {{-- <small class="form-text text-muted">Pasirinkti gyvūno rūšį</small> --}}
                        </div>
                        <div class="form-group">
                            <label>Prižiūrėtojas: </label>
                            <select name="manager_id">
                                @foreach ($managers as $manager)
                            <option value="{{$manager->id}}"><b>{{$manager->name}} {{$manager->surname}}</b>, prižiūri:{{$manager->managerSpecie->name}}
                                    {{-- @foreach ($species as $specie)
                                        @if ($specie->id == $manager->specie_id) 
                                        @endif
                                    @endforeach --}}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <small class="form-text text-muted">Pasirinkti prižiūrėtoją, kuris prižiūri šią rūšį</small> --}}
                        </div>
                        @csrf
                        <button type="submit">PRIDĖTI</button>
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



