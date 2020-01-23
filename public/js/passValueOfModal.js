function recibirValue( nameOfInput ,myValue , nameOfInputHidden, myValueHidden){
       
    document.getElementById( nameOfInput ).value = myValue;
    document.getElementById( nameOfInputHidden ).value = myValueHidden;
    
}

function deleteSurvey( nameOfInput, myValue ){

    document.getElementById( nameOfInput ).value = myValue;
    
}