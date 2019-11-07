<?php require_once 'vendor/autoload.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUDE</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 mt-5">
					<form method="POST">
					 	<div class="form-group">
					    	<label>Nome</label>
					    	<input type="text" class="form-control" name="newnome" placeholder="Nome" required value="<?php php\crud\clientdao::dateReturn("name_client"); ?>">
					  	</div>
					  	<div class="form-group">
					    	<label>Número da casa</label>
					    	<input type="text" class="form-control" name="newnumber" placeholder="numero da casa" required value="<?php php\crud\clientdao::dateReturn("number_house"); ?>">
					  	</div>
					  	<div class="form-group">
					    	<label>Telêfone</label>
					    	<input type="text" class="form-control" name="newfone" placeholder="telefone" required value="<?php php\crud\clientdao::dateReturn("fone"); ?>">
					  	</div>
					  	<a href="index.php" class="btn btn-dark">CANCELAR</a>
					  	<button type="submit" name="update" class="btn btn-primary">ATUALIZAR</button>
					</form>
					<?php php\crud\clientdao::update(); ?>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>