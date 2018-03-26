scripts = {
	fechaNac: '#fecha_nac',
	initializeInput: function() {
		$(this.fechaNac).datepicker({
    		locale: 'es-es',
    		uiLibrary: 'bootstrap4',
    		// format: 'dd/mm/yyyy'
		});
	}
}