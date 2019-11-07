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
					<h1 class="text-center col-md-12 mt-5">Client List</h1>
					<a href="cadastra.php" class='btn btn-primary mt-3'>New Client</a>
					<table class="table mt-2 table-dark">
						<thead>
							<tr>
								<th scope="col" class="text-center">ID</th>
								<th scope="col" class="text-center">NOME</th>
								<th scope="col" class="text-center">NÚMERO DA CASA</th>
								<th scope="col" class="text-center">TELÊFONE</th>
								<th scope="col" class="text-center">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php php\crud\clientdao::retorna(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>