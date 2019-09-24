<form action="/survey/update/question" method="POST" id="form-question">
<div class="modal fade" id="editQuestion" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambia el contenido de tu pregunta aqui.</h5>
                        <button type="button" class="close btn-cerrar" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                    
        
                                    <div class="col-md-12 mt-4">
                                        
                                            {{ csrf_field() }}
                                        <input id="question" type="text" class="form-control" name="question" required autocomplete="question" >

                                        @if( $errors->has('question'))

                                        
                                            @foreach ($errors->get('question') as $error)
                                            <div class="form-control-feedback" >{{$error}}</div>
                                            @endforeach
                                        @endif


                                        <input id="questionId" type="hidden" class="form-control" name="questionId" required >
    
                                                                      
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

       

        //Vaciar el campo de la pregunta cuando se presiona el boton close o el boton de la parte superior derecha
        $('.btn-cerrar').on("click", function(event){
            event.preventDefault();
            $('#form-question').trigger("reset");
        });

        
    });

</script>