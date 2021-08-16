<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    //Verifica se o utilizador já fez login. Se não fez, redireciona para a página login.php
    if (!isset($_SESSION['loginDone'])||$_SESSION['loginDone']!=true) 
        header("Location: login.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_COOKIE['cart'])) {
    
            require_once("connection/connection.php");

            if (isset($_GET['lang'])) {
                $lang=$_GET['lang'];
                setcookie("lang",$lang);
            }
            else
                if (isset($_COOKIE['lang'])) {
                $lang=$_COOKIE['lang'];
                }
                else {
                setcookie("lang","pt");
                $lang="pt";
                }
            
            if (!str_contains("pt,en",$lang)) {
                setcookie("lang","pt");
                $lang="pt";
            }

        //recordset Utilizador
        $qUser = "SELECT * FROM users$lang  WHERE email='".$_SESSION['usernameLog']."'";
        $rsUser = $csogani->query($qUser);

        if($rsUser === FALSE) {
            die("Erro no SQL: " . $qUser . " Error: " . $csogani->error);
        }

        $rsUser->data_seek(0);
        $row_rsUser=$rsUser->fetch_assoc();

        $qEncomenda="insert into encomendas$lang(utilizador,rua,localidade,pagamento) values('".$_SESSION['usernameLog']."','".$row_rsUser['rua']."','".$row_rsUser['localidade']."','".$_POST['payment']."')";

        if ($csogani->query($qEncomenda)===false) {
            die("Erro no SQL: " . $qEncomenda . " Error: " . $csogani->error);
        }
        else {
            $numEncomenda=$csogani->insert_id;
            $carrinho=unserialize($_COOKIE['cart']);

            foreach ($carrinho as &$item) {
                $qProduto="Select produtos$lang.* from produtos$lang where referencia='".$item['ref']."'";
                $rsProduto=$csogani->query($qProduto);
                $rsProduto->data_seek(0);
                $row_rsProduto=$rsProduto->fetch_assoc();
                
                $qEncomendaDet="insert into encomendasdet$lang(numencomenda,produto,quantidade,preco,designacao) values($numEncomenda,'".$row_rsProduto['referencia']."','".$item['qtd']."','".$row_rsProduto['preco']."','".$row_rsProduto['designacao']."')";

                if ($csogani->query($qEncomendaDet)===false) {
                    die("Erro no SQL: " . $qEncomendaDet . " Error: " . $csogani->error);
                }

                $rsProduto->free();
            }
            
            setcookie('cart');
            header("Location: success.php?numEncomenda=$numEncomenda");

        }

        $rsUser->free();
        $csogani->close();

    } 
    else {
        header("Location: index.php");
    }
?>