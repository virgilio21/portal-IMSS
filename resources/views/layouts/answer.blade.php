
    
<form action="/survey/answer/create" method="POST" id="form-answer">
    <div class="modal fade" id="createAnswer" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Escribe tu respuesta aqui.</h5>
                        <button type="button" class="close btn-cerrar" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                    
        
                                    <div class="col-md-12 mt-4">
                                        
                                            {{ csrf_field() }}
                                        <input id="answer" type="text" class="form-control" name="answer" value="{{ old('answer') }}" required autocomplete="answer" >
    
                                        @if( $errors->has('answer'))
    
                                            
                                            @foreach ($errors->get('answer') as $error)
                                                <div class="form-control-feedback" >{{$error}}</div>
                                            @endforeach
                                        @endif
    
    
                                        <input id="questionId" type="hidden" class="form-control" name="questionId" required>
                                        
        
                                        
                                        
                                        
                                    </div>
                            </div>

                            

                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Guardar</button>
                            <button class="btn btn-outline-danger btn-cerrar"  data-dismiss="modal">Cerrar</button>
                        
                    </div>
    
    
                </div>
            </div>
        </div>   
    </form>

    <script>
    $(document).ready(function(){

        //Poner el foco en el input del modal
        $('#createAnswer').on('shown.bs.modal', function(){
            $('#answer').trigger('focus');
        });

        //Vaciar el campo de la pregunta cuando se presiona el boton close o el boton de la parte superior derecha
        $('.btn-cerrar').on("click", function(event){
            event.preventDefault();
            $('#form-answer').trigger("reset");
        });

        
    });

    </script>