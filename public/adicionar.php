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

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$nome = $_POST["nome"] ?? "";
$preco = $_POST["preco"] ?? "";
$quantidade = $_POST["quantidade"] ?? "";

if (!empty($nome) && !empty($preco) && !empty($quantidade)) {
$stmt = $mysqli->prepare("INSERT INTO produtos (nome, preco, quantidade) VALUES (?, ?, ?)");
$stmt->bind_param("sdi", $nome, $preco, $quantidade);
if ($stmt->execute()) {
$msg = "Produto adicionado com sucesso!";
} else {
$msg = "Erro ao adicionar produto: " . $stmt->error;
}
$stmt->close();
} else {
$msg = "Preencha todos os campos!";
}
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adicionar Produto</title>
</head>
<body>

<h2>Adicionar Produto</h2>
<p><a href="menu.php">Voltar ao menu</a></p>
<hr>

<?php if ($msg): ?>
<p><strong><?= $msg ?></strong></p>
<?php endif; ?>

<form method="post">
<label>Nome do produto:</label><br>
<input type="text" name="nome" required><br><br>

<label>Preço (R$):</label><br>
<input type="number" name="preco" step="0.01" required><br><br>

<label>Quantidade:</label><br>
<input type="number" name="quantidade" required><br><br>

<button type="submit">Salvar</button>
</form>

</body>
</html>