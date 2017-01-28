function validateChar(x){
	var TCode = x.value;
	var id = x.id;
	var regex = new RegExp("/^[ A-Za-z0-9_@./#&+-]*$/");
	if( !regex.test( TCode ) ) {
		document.getElementById
	    document.getElementById(id).value= null;
	    alert('No se permite ingresar caracteres especiales');
	    document.getElementById("mensaje").display=show();
	}
	
	String.prototype.replaceAll = function(target, replacement) {
		return this.split(target).join(replacement);
	};
}
