@if (isset($gro))

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modificar grupo</div>
                    <div class="card-body">
                        <form method="POST" action="/group/update/{{$gro -> id}}">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="matter" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>
                    
                                <div class="col-md-6">
                                <select name="matter" id="matter" class="form-control @error('matter') is-invalid @enderror">
                                    <option value="{{$gro -> matter_id}}">{{$gro -> matter -> name_matter}}</option>

                                    @foreach ($materias as $item)
                                        @if($item -> id == $gro -> matter -> id)
                                           
                                        @else
                                            <option value="{{$item->id}}">{{$item -> name_matter}}</option>
                                        @endif
                                    @endforeach
                               
                                </select>
                                @error('matter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="teacher" class="col-md-4 col-form-label text-md-right">{{ __('Maestro') }}</label>
                    
                                <div class="col-md-6">
                                <select name="teacher" id="teacher" class="form-control @error('teacher') is-invalid @enderror">
                                    <option value="{{$gro -> user_id}}">{{$gro -> user -> name}} {{$gro -> user -> surnames}}</option>

                                        @foreach ($maestros as $item)
                                        @if ($item -> hasRole('teacher'))
                                            @if($gro -> user -> id == $item -> id)

                                            @else
                                                <option value="{{$item->id}}">{{$item -> name}} {{$item -> surnames}}</option> 
                                            @endif     
                                        @endif  
                                        @endforeach
                                </select>
                    
                                @error('teacher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description2" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                    
                                <div class="col-md-6">
                                <input id="description2" type="text" class="form-control @error('description2') is-invalid @enderror" name="description2" value="{{$gro -> description}}" required autocomplete="description2" autofocus  >
                    
                                @error('description2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>
                    
                                <div class="col-md-6">
                                <input id="group" type="text" class="form-control @error('group') is-invalid @enderror" name="group" value="{{$gro -> group}}" required autocomplete="group" autofocus >
                    
                                @error('group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Actualizar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<br>