




{!!Form::open(['route' => 'loginpost'])!!}

<div id="loginModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3 class="panel-title">Formulario de ingreso</h3>
	</div>
	<div class="modal-body">

		<form role="form">

			<fieldset>
				<div class="form-group">
					{!!Form::text('username',null,['class'=>'form-control', 'required', 'placeholder'=>'Usuario'])!!}
				</div>
				<div class="form-group">
					{!!Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
				</div>
				<div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="Remember Me">Recuerdame
					</label>
				</div>
				<!-- Change this to a button or input when using this as a form -->
				<input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>                            
				<a href="facebook" class="btn btn-primary btn-lg  btn-block">Iniciar sesion con Facebook</a>

			</fieldset>
		</form>

	</div>
	<div class="modal-footer">
		
	</div>
</div>
{!!Form::close()!!}

<script type="text/javascript">

var modal = $('#loginModal');

$(function(){
    //validarFormulario();// validar forularios con kendo
    //EventoFormularioModal(modal, onSuccess)

    $('form').submit(function(event){
    	event.preventDefault();
    	$.ajax({
    		url: $(this).attr('action'),
    		dataType: "json",
    		type: "POST",
    		data: $(this).serialize(),
    		success: function (result) {
    			if(result.estado==true){
    				$.msgbox(result.mensaje, { type: 'success' }, function(){
    					var user = result.usuario;
    					console.log(user);
    					html='<div><img src="data:image/jpeg;base64, '+user.avatar+' " width="40px" style="border-radius:20%;"> '+user.username+'</div>';
    					$('#login').html(html);
    					modalBs.modal('hide');
    				});
    			}else{
    				$.msgbox(result.mensaje, { type: 'error' })
    			}
    		}
    	});
    })
});


</script>