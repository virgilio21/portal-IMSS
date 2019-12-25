@if (isset($mate))

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actualizar Materia</div>

<div class="card-body">
<form method="POST" action="/matter/update/{{$mate -> id}}"  role="form">

     {{method_field('PATCH')}}
     {{csrf_field()}}

     <div class="form-group row">
            <label for="name_matter" class="col-md-4 col-form-label text-md-right">{{ __('Materia') }}</label>

            <div class="col-md-6">
            <input id="name_matter" type="text" class="form-control @error('description') is-invalid @enderror" name="name_matter" value="{{$mate -> name_matter}}" required autocomplete="name_matter" autofocus>

            @error('name_matter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

     <div class="form-group row">
         <label for="key_matter" class="col-md-4 col-form-label text-md-right">{{ __('Clave materia') }}</label>

         <div class="col-md-6">
         <input id="key_matter" type="text" class="form-control @error('key_matter') is-invalid @enderror" name="key_matter" value="{{$mate -> key_matter}}" required autocomplete="key_matter" autofocus>

         @error('key_matter')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
         </div>
     </div> 

     <div class="form-group row">
        <label for="number_hours" class="col-md-4 col-form-label text-md-right">{{ __('Numero Hrs') }}</label>

        <div class="col-md-6">
        <input id="number_hours" type="text" class="form-control @error('number_hours') is-invalid @enderror" name="number_hours" value="{{$mate -> number_hours}}" required autocomplete="number_hours" autofocus>

       

        @error('number_hours')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="number_credits" class="col-md-4 col-form-label text-md-right">{{ __('Numero Creditos') }}</label>

        <div class="col-md-6">
        <input id="number_credits" type="text" class="form-control @error('number_credits') is-invalid @enderror" name="number_credits" value="{{$mate -> number_credits}}" required autocomplete="number_credits" autofocus>

       

        @error('number_credits')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

     <div class="form-group row">
         <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semestre') }}</label>

         <div class="col-md-6">
         <input id="semester" type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{$mate -> semester}}" required autocomplete="semester" autofocus>

        

         @error('semester')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
         </div>
     </div>
    
     

     <div class="form-group row mb-0">
         <div class="col-md-6 offset-md-4">
             <button type="submit" class="btn btn-warning">
                     {{ __('Modificar') }}
             </button>
         </div>
     </div>


 </form>
</div>
@endif
                </div></div></div></div>