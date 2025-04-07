<?php
include_once("conexao.php");

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$nome = $_REQUEST['nome'];
$ra = $_REQUEST['ra'];
$email = $_REQUEST['email'];

if ($id) {
       $sql = "UPDATE aluno SET nome = :nome, ra = :ra, email = :email
        WHERE id = :id";

       $stmt = $conexao->prepare($sql);
       $stmt->bindParam(':id', $id);
       $mensagem = "registro alterado com sucesso";

} else {
       $sql = "INSERT INTO aluno (nome, ra, email) 
       VALUES (:nome, :ra, :email)";
       $stmt = $conexao->prepare($sql);
       $mensagem = "registro salvo com sucesso";
}
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ra', $ra);
$stmt->bindParam(':email', $email);

$stmt->execute();

header("Location: index.php?mensagem=$mensagem");
?>