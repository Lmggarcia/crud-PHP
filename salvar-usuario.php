<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasci = $_POST["data_nasci"];

            $sql= "INSERT INTO usuarios (nome, email, senha, data_nasci) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasci}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastro realizado com sucesso')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar')</script>";
                print "<script>location.href='?page=cadastrar';</script>";
            }
            break;
        case 'editar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasci = $_POST["data_nasci"];

            $sql = "UPDATE usuarios SET 
                    nome='{$nome}', 
                    email='{$email}', 
                    senha='{$senha}', 
                    data_nasci='{$data_nasci}' 
                WHERE 
                    id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Alteração realizada com sucesso')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível realizar a alteração')</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
        case 'excluir':
            
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluido com sucesso')</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível excluir!')</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            break;
    }
?>