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


$busca = $_GET["busca"] ?? "";
$sql = "SELECT * FROM produtos WHERE nome LIKE ?";
$stmt = $mysqli->prepare($sql);
$param = "%" . $busca . "%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu - Estoque</title>
</head>
<body>

<h2>Bem-vindo, <?= htmlspecialchars($_SESSION["username"]) ?>!</h2>
<p><a href="../index.php?logout=1">Sair</a></p>

<hr>

<h3>Lista de Produtos</h3>

<form method="get" action="">
<input type="text" name="busca" placeholder="Buscar por nome" value="<?= htmlspecialchars($busca) ?>">
<button type="submit">Buscar</button>
</form>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Quantidade</th>
</tr>
<?php while ($produto = $result->fetch_assoc()): ?>
<tr>
<td><?= $produto["id_produto"] ?></td>
<td><?= htmlspecialchars($produto["nome"]) ?></td>
<td><?= number_format($produto["preco"], 2, ',', '.') ?></td>
<td><?= $produto["quantidade"] ?></td>
</tr>
<?php endwhile; ?>
</table>

<br>


<a href="adicionar.php"><button>Adicionar Produto</button></a>
<a href="editar.php"><button>Editar Estoque</button></a>

</body>
</html>