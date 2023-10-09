<?php 
    if (isset($fallo)) {
        echo "
            <div class='error-container'>
                <div id='alerta' class='alert alert-danger fade show'>
                    <strong>Calale de nuevo perro: </strong>{$fallo}
                </div>
            </div>
        ";
    }
?>	
	<link rel="stylesheet" href="./style.css">
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form  action ="" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
                    <input type="password" name="confirmar" placeholder="Confirma Contraseña" required="">
					<a href="/MVC/login"><button type ="submit">Sign up</button></a>
					<a href="/MVC/login">¿Ya tienes una cuenta? Inicia sesión aquí</a>
				</form>
			</div>

			
			

			
	</div>

	<script>
	setTimeout(()=>{

let alerta = document.getElementById('alerta');
if (alerta) {
	
	alerta.remove();
}
},4000);

</script>