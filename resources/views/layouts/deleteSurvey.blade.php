<form action="/survey/delete/all" method="POST" id="form-remove">
    <div class="modal fade" id="removeSurvey" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">¿Estas seguro que quieres eliminar esta encuesta?</h5>
                            <button type="button" class="close btn-cerrar" data-dismiss="modal" aria-label="Close">
                                <span>&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                                <div class="form-group row">
                                        
            
                                        <div class="col-md-12 mt-4">
                                            
                                                {{ csrf_field() }}
                                            
                                            <p class="text-white bg-danger font-italic question">Nota:Solo podras eliminar esta encuesta si aun no ha sido contestado por un usuario. De lo contrario saldra un error.</p>
                                            <input id="itemId" type="hidden" class="form-control" name="itemId" required>                                            
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
    
    
    
    