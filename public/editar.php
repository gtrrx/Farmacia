<?php
session_start();
if (empty($_SESSION["user_id"])) {
header("Location: ../index.php");
exit;
}

$mysqli = new mysqli("localhost", "root", "root", "farmacia_db");
if ($mysqli->connect_errno) {
die("Erro de conexão: " . $mysqli->connect_error);
}

// Atualizar produto
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_produto"])) {
$id = $_POST["id_produto"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

$stmt = $mysqli->prepare("UPDATE produtos SET nome=?, preco=?, quantidade=? WHERE id_produto=?");
$stmt->bind_param("sdii", $nome, $preco, $quantidade, $id);
$stmt->execute();
$stmt->close();
}

// Buscar todos os produtos
$result = $mysqli->query("SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Estoque</title>
</head>
<body>

<h2>Editar Estoque</h2>
<p><a href="menu.php">Voltar ao menu</a></p>
<hr>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Quantidade</th>
<th>Ação</th>
</tr>

<?php while ($produto = $result->fetch_assoc()): ?>
<tr>
<form method="post">
<td><?= $produto["id_produto"] ?></td>
<td><input type="text" name="nome" value="<?= htmlspecialchars($produto["nome"]) ?>"></td>
<td><input type="number" name="preco" step="0.01" value="<?= $produto["preco"] ?>"></td>
<td><input type="number" name="quantidade" value="<?= $produto["quantidade"] ?>"></td>
<td>
<input type="hidden" name="id_produto" value="<?= $produto["id_produto"] ?>">
<button type="submit">Salvar</button>
</td>
</form>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>