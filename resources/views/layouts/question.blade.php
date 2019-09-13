
    
<form action="/survey/question/create" method="POST">
<div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formula tu pregunta aqui.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                    
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                                
    
                                <div class="col-md-12 mt-4">
                                    
                                        {{ csrf_field() }}
                                    <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}" required autocomplete="question" >

                                    @if( $errors->has('question'))

                                        
                                        @foreach ($errors->get('question') as $error)
                                            <div class="form-control-feedback" >{{$error}}</div>
                                        @endforeach
                                    @endif


                                    <input id="sectionName" type="hidden" class="form-control" name="sectionName" required>
                                    
    
                                    
                                    
                                    
                                </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Guardar</button>
                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    
                </div>


            </div>
        </div>
    </div>   
</form>






