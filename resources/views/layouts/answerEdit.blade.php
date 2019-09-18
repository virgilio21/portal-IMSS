
    
<form action="/survey/answer/edit" method="POST" id="form-answer">
    <div class="modal fade" id="editAnswer" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambia tu respuesta aqui.</h5>
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

