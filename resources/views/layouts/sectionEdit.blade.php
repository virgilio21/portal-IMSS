<form action="/survey/section/edit" method="POST" id="form-section">
<div class="modal fade" id="editSection" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambia el nombre de la seccion aqui.</h5>
                        <button type="button" class="close btn-cerrar" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                        
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                    
        
                                    <div class="col-md-12 mt-4">
                                        
                                            {{ csrf_field() }}
                                    <input id="nameSection" type="text" class="form-control" name="nameSection" required autocomplete="nameSection" >
    
                                        @if( $errors->has('nameSection'))
    
                                            
                                            @foreach ($errors->get('nameSection') as $error)
                                                <div class="form-control-feedback" >{{$error}}</div>
                                            @endforeach
                                        @endif
                                    
                                    <input id="sectionId" type="hidden" class="form-control" name="sectionId" required >
                                
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
            $('#form-section').trigger("reset");
        });

        
    });

</script>