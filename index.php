<?php
session_start();

include 'inc/functions.php';

if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
	header('Location: account.php');
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'logout') {
		session_unset();
		session_destroy();
	}
}
?>

<?php include 'header.php'; ?>

<div class="container pt-5 pb-4">
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 col-lg-4 col-xl-3">
			<form action="index.php" method="post" class="needs-validation" novalidate>
				<div class="form-group">
					<label for="username">Nome</label>
					<input type="text" class="form-control" id="username" placeholder="Seu nome de usuário ou email" name="myusername" required>
				</div>
				<div class="form-group">
					<label for="password">Senha</label>
					<input type="password" class="form-control" id="password" placeholder="Sua senha" name="mypass" required>
				</div>
				<button type="submit" class="btn btn-info mx-auto d-block w-100 bg-primary" name="submit">Entrar</button>
			</form>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-12 col-md-6 col-lg-4 py-3">
			<div class="d-flex justify-content-center">
				<a id="registerBtn" class="btn btn-link" data-toggle="collapse" href="#register" role="button" aria-expanded="false" aria-controls="register">
					Registrar
				</a>
				<a id="resetBtn" class="btn btn-link" data-toggle="collapse" href="#resetPassword" role="button" aria-expanded="false" aria-controls="resetPassword">
					Esqueci a senha
				</a>
			</div>

			<div class="collapse mt-4" id="register">
				<div class="card">
					<div class="card-header">
						<h5 class="m-0">Novo usuário</h5>
					</div>
					<div class="card-body">
						<form action="register.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
							<div class="form-group">
								<label for="r_username">Usuário</label>
								<input type="text" class="form-control" id="r_username" placeholder="Insira o usuário" name="r_username" required>
							</div>

							<div class="form-group">
								<label for="r_email">Email</label>
								<input type="email" class="form-control" id="r_email" placeholder="Insira o email" name="r_email" required>
							</div>

							<div class="form-group">
								<label for="r_pass">Senha</label>
								<input type="password" class="form-control" id="r_pass" placeholder="Insira a senha" name="r_pass" required>
								<p class="mt-2 text-info show-pass">Mostrar senha</p>
							</div>

							<div class="form-group">
								<label for="r_pass_2">Repita a senha</label>
								<input type="password" class="form-control" id="r_pass_2" placeholder="Repita a senha" name="r_pass_2" required>
								<p class="mt-2 text-info show-pass">Mostrar senha</p>
							</div>

							<div class="form-group">
								<label for="r_date">Data de nascimento</label>
								<input type="date" class="form-control" id="r_date" name="r_dateofbirth" required>
							</div>

							<div class="form-group">
								<label for="r_photo">Foto de perfil</label>
								<input type="file" id="r_photo" name="r_photo" class="w-100" accept=".jpg, .jpeg, .png">
							</div>

							<button type="submit" class="btn btn-warning mx-auto d-block" name="register">Registrar</button>
						</form>
					</div>
				</div>
			</div>

			<div class="collapse mt-4" id="resetPassword">
				<div class="card">
					<div class="card-header">
						<h5 class="m-0">Alterar senha</h5>
					</div>
					<div class="card-body">
						<form action="request_new_pass.php" method="post" class="needs-validation" novalidate>
							<div class="form-group">
								<label for="reset_email">Email</label>
								<input type="email" class="form-control" id="reset_email" placeholder="Insira o email" name="reset_email" required>
							</div>
							<button type="submit" class="btn btn-danger mx-auto d-block" name="reset">Alterar senha</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container pb-4">
	<div class="row">
		<div class="col text-center">

			<?php

			if (isset($_GET['delete_account']) && $_GET['delete_account'] == 'success') {
				echo "Your account has been deleted.";
			}


			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
				// vars
				$username = $password = "";

				// Get post parameters
				if (isset($_POST['myusername'])) {
					$username = $_POST['myusername'];
				}

				if (isset($_POST['mypass'])) {
					$password = $_POST['mypass'];
				}

				if (empty($username) || empty($password)) {
					die("Info missing.");
				}

				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;

				// Login with username/email and password
				login();
			}
			?>

		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
