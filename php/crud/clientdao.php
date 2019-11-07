<?php 

	namespace php\crud;

	class clientdao{

		public function insere(){

			$pdo = conexao::getConexao();

			if(isset($_POST["cadastra"])){
				$stmt = $pdo->prepare('INSERT INTO client (name_client, number_house, fone) VALUES (:nome, :numero, :fone)');
				$stmt->execute(
					array(
						":nome" => $_POST["nome"],
						":numero" => $_POST["numero"],
						":fone" => $_POST["fone"]
					)
				);

				if($stmt->rowCount() > 0){
					echo "<script> alert('Cadastrado'); location.href = 'index.php'; </script>";
				}
			}

		}

		public function retorna(){

			$pdo = conexao::getConexao();

			$stmt = $pdo->prepare('SELECT * FROM client');
			$stmt->execute();

			$rd = $stmt->fetchAll(\PDO::FETCH_ASSOC);

			if($stmt->rowCount() > 0){
				foreach($rd as $res){
					echo "
						<tr>
							<th scope='row' class='text-center'>{$res["id_client"]}</th>
					     	<th class='text-center'>{$res["name_client"]}</th>
					      	<td class='text-center'>{$res["number_house"]}</td>
					      	<td class='text-center'>{$res["fone"]}</td>
					      	<td class='text-center'>
					      		<form method='POST'>
					      			<input type='hidden' name='id' value='{$res["id_client"]}'>
					      			<button type='submit' name='delete' class='btn btn-danger'>DELETE</button>
					      			<a href='edit.php?id={$res["id_client"]}' class='btn btn-primary'>EDIT</a>
					      		</form>
					      	</td>
					    </tr>
					";
				}
				clientdao::delete();
			}else{
				echo "
					<tr>
						<th scope='row' class='text-center'>--</th>
				     	<th class='text-center'>--</th>
				      	<td class='text-center'>--</td>
				      	<td class='text-center'>--</td>
				      	<td class='text-center'>--</td>
				    </tr>
				";
			}
		}

		public function delete(){

			$pdo = conexao::getConexao();

			if(isset($_POST["delete"])){
				$stmt = $pdo->prepare('DELETE FROM client WHERE id_client = :id');
				$stmt->execute(
					array(
						':id' => $_POST["id"]
					)
				);

				if($stmt->rowCount() > 0){
					header('Location: index.php');
				}else{
					echo "Somthing is wrong";
				}
			}
		}

		public function dateReturn($atribute){

			$pdo = conexao::getConexao();

			if(isset($_GET["id"])){
				$stmt = $pdo->prepare('SELECT * FROM client WHERE id_client = :ID');
				$stmt->execute(
					array(
						":ID" => $_GET["id"]
					)
				);

				$return = $stmt->fetch(\PDO::FETCH_ASSOC);

				echo $return["$atribute"];
			}
		}

		public function getId(){
			if(isset($_GET["id"])){
				return $id = $_GET["id"];
			}
		}

		public function update(){

			$pdo = conexao::getConexao();
			$id = clientdao::getId();

			if(isset($_POST["update"])){
				$stmt = $pdo->prepare('UPDATE client SET name_client=:newname, number_house=:newnumber, fone=:newfone WHERE id_client=:IDupdate');
				$stmt->execute(
					array(
						':newname' => $_POST["newnome"],
						':newnumber' => $_POST["newnumber"],
						':newfone' => $_POST["newfone"],
						':IDupdate' => $id
					)
				);

				if($stmt->rowCount() > 0){
					header('Location: index.php');
				}else{
					echo "<script> alert('Somthing wrong'); location.href = 'index.php'; </script>";
				}
			}

		}

	}