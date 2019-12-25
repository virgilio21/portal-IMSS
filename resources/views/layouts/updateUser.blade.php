@if (isset($user))

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Actualizar Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/user/update/{{$user->id}}">
                           
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->surnames}}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enrollment" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                                <div class="col-md-6">
                                    <input id="enrollment" type="text" class="form-control @error('enrollment') is-invalid @enderror" name="enrollment" value="{{$user->enrollment}}" required autocomplete="enrollment" autofocus>

                                    @error('enrollment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <select name="rol" id="rol" class="form-control" >
                                        @if ($user ->hasRole('teacher'))
                                            <option value="teacher" selected>maestro</option>
                                            <option value="admin" >administrador</option>
                                            <option value="user">estudiante</option>
                                        @endif
                                        @if ($user ->hasRole('admin'))
                                            <option value="admin" selected>administrador</option>
                                            <option value="teacher">maestro</option>
                                            <option value="user">estudiante</option>
                                        @endif
                                        @if ($user ->hasRole('user'))
                                            <option value="user" selected>estudiante</option>
                                            <option value="admin" >administrador</option>
                                            <option value="teacher">maestro</option> 
                                        @endif
                                    </select>
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