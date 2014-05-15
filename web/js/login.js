window.onload = function(){
    document.getElementById('login_email').onblur = comprovaMail;
    document.getElementById('login_password').onblur = comprovaPassword;
    
};


function comprovaMail(e){
    	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	return marcaError(this, 'emailMsg', this.value.match(emailExp));
}

function comprovaPassword(e){
    	if(this.value.length == 0){
		marcaError(this, 'passwordMsg', false);
		return false;
	}else{
            marcaError(this, 'passwordMsg', true);            
        }
}

function marcaError(elem, idMsg, error){
	if (!error){
		document.getElementById(idMsg).innerHTML = "El camp introduït no té un format correcte";
		elem.focus();	
		return false;
	}else{
                document.getElementById(idMsg).innerHTML = "";
		return true;
	}
}