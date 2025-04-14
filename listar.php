<?php
include_once("conexao.php");

session_start();
var_dump($_SESSION);

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $sql = "SELECT * FROM aluno WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $resultItem = $stmt->fetch(PDO::FETCH_OBJ);
}

$sql = "SELECT * FROM aluno";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="inserir.php" method="POST">

        <a href="sair.php">Sair</a>
        
        <br><br>

        <input type="hidden" name="id" value="<?php echo isset($resultItem) ? $resultItem->id : '' ?>">

        NOME: <input type="text" name="nome" value="<?php echo isset($resultItem) ? $resultItem->nome : '' ?>">
        <br><br>
        RA: <input type="number" name="ra" value="<?php echo isset($resultItem) ? $resultItem->ra : '' ?>">
        <br><br>
        EMAIL: <input type="text" name="email" value="<?php echo isset($resultItem) ? $resultItem->email : '' ?>">
        <br><br>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
        <br><br>
    </form>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>RA</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_OBJ)) { ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->nome ?></td>
                <td><?php echo $row->ra ?></td>
                <td><?php echo $row->email ?></td>
                <td>
                    <a href="excluir.php?id=<?php echo $row->id ?>">Excluir</a>
                    <a href="index.php?id=<?php echo $row->id ?>">Editar</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>