<form action="/survey/remove/item" method="POST" id="form-remove">
    <div class="modal fade" id="removeItem" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">¿Estas seguro que quieres eliminar este elemento?</h5>
                            <button type="button" class="close btn-cerrar" data-dismiss="modal" aria-label="Close">
                                <span>&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                                <div class="form-group row">
                                        
            
                                        <div class="col-md-12 mt-4">
                                            
                                                {{ csrf_field() }}
                                            
                                            <p class="text-white bg-danger font-italic question">Nota: Todos los elementos que dependen de este tambien seran eliminados. Si alguien ya ha contestado esta encuesta no podra borrarla y tendra un error.</p>
                                            <input id="itemId" type="hidden" class="form-control" name="itemId" required>

                                            <input id="itemType" type="hidden" class="form-control" name="itemType" required>
    
                                            
                                        </div>
                                </div>
    
                                
    
                        </div>
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-danger pr-4 pl-4">Si</button>
                                <button class="btn btn-outline-success btn-cerrar pr-4 pl-4"  data-dismiss="modal">No</button>
                            
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
                $('#form-remove').trigger("reset");
            });
    
            
        });
    
    </script>
    