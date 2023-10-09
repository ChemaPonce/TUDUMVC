<?php 
    if (isset($fallo)) {
        echo "
            <div class='error-container'>
                <div id='alerta' class='alert alert-danger fade show'>
                    <strong> Calale de nuevo perro:</strong>{$fallo}
                </div>
            </div>
        ";
    }
?>
	<link rel="stylesheet" href="./style.css">
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

			<div class="login">
				<form action ="" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type ="submit">Login</button>
					<br>
					<br>

					<a  href="/MVC/loginregistro">¿NO tienes una cuenta? Registrate Aqui</a>
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