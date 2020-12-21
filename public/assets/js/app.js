
// exibe o modal para confirmação da exclusão 
$(document).ready(function() {
    
	// ==================================== app.blade scripts
	
	$("#menu-home").addClass('menu-top-active');
	
	
	$('.dropdown').hover(function () {
	    $(this).addClass('open');
	},
	function () {
	    $(this).removeClass('open');
	});
	
	
	// desabilita todos os botões de submit após o primeiro click
	$('form').submit(function() {
	    $("#btn-salvar").attr('disabled', true).find('span').text('Carregando...');
	 
	    return true;
	});
			                
	// ==================================== app.blade scripts
	
	
	
	$('[data-toggle="tooltip"]').tooltip();

    // abre a modal ao clicar no botão remover
	$('.btn-remover').on('click', function () {
	 
		var link = $(this).data('link');
		var resource = $(this).data('resource');
		
		$('#name_resource').html(resource);
		$('#modal-remover').modal('show');
		 
		$('#form_delete').attr('action', link);
	});
	
	 
	 //Warning Message
	 $('#link-remover').click(function(e){
	 
	 $('#form_delete').submit();
	     
	 });
	 
	 // ************************************** UPLOAD ************************************** 
	 
	 // mostra uma tela de preview ao selecionar uma imagem para upload
	 $("input[type=file]").change(function() {
		 if (this.files && this.files[0]) {
		    var reader = new FileReader();
		    
		    reader.onload = function(e) {
		    	$('#preview-img').attr('src', e.target.result);
		    }
		
		    reader.readAsDataURL(this.files[0]); // convert to base64 string
		
		 	$('.preview_img').fadeIn(1000).css('display', 'flex');
		 	$('.preview_img h3').text('Preview da imagem');
		 }
	 });
	
	 // botão de remover upload
	 $('#btn-remove-upload').click(function() {
		 $('.preview_img').fadeOut(700);
		 $('input[name=photo]').val('');
	 });
	 
	// ************************************** UPLOAD **************************************
	 
	 
	// ************************************** TEXTAREA COUNTER **************************************
	 $("#textfield").on('keyup paste', function() { // <---remove ',' comma

         var Characters = $("#textfield").val().replace(/(<([^>]+)>)/ig,"").length; // '$' is missing from the selector

         $("#counter").text("Characters left: " + (1500 - Characters));
	 });
    // ************************************** TEXTAREA COUNTER **************************************

});

function showPreviewImage(fullPathImage) {
	if (fullPathImage) {
	    $('#preview-img').attr('src', fullPathImage);
	
	 	$('.preview_img').fadeIn(1000).css('display', 'flex');
	 	$('.preview_img h3').text('Imagem salva');
	}
}

function textareaCounter(idTextarea, idCounter, maxChars) {
	
	// maxChars has 300 max chars as default value
	maxChars = typeof maxChars !== 'undefined' ? maxChars : 200;
	
	$(idTextarea).on('keyup paste', function() {
		
        var Characters = $(idTextarea).val().replace(/(<([^>]+)>)/ig,"").length; // '$' is missing from the selector
        
        if (Characters > maxChars) {
        	$(this).val($(this).val().substr(0, maxChars));
        }

        $(idCounter).text("Caracteres restantes: " + (maxChars - Characters));
	});
}