<?php
error_reporting(E_ERROR | E_PARSE);
//require_once("connection/connection.php");

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

//recordset Variaveis
$qVariaveis = "SELECT * FROM variaveis$lang";
$rsVariaveis = $csogani->query($qVariaveis);

if($rsVariaveis === FALSE) {
    die("Erro no SQL: " . $qVariaveis . " Error: " . $csogani->error);
  }

$rsVariaveis->data_seek(0);
$row_rsVariaveis=$rsVariaveis->fetch_assoc();
//$totalRows_rsCD = $rsCD->num_rows;

//recordset Redes Sociais
$qRedesSociais = "SELECT * FROM redessociais";
$rsRedesSociais = $csogani->query($qRedesSociais);

if($rsRedesSociais === FALSE) {
    die("Erro no SQL: " . $qRedesSociais . " Error: " . $csogani->error);
  }

$rsRedesSociais->data_seek(0);
//$row_rsVariaveis=$rsVariaveis->fetch_assoc();

?>
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?= $row_rsVariaveis['email']?></li>
                                <li><?= $row_rsVariaveis['textotopo']?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                            <?php while ($row_rsRedesSociais = $rsRedesSociais->fetch_assoc()) {  ?>
                                <a href="<?= $row_rsRedesSociais['link']?>"><i class="<?= $row_rsRedesSociais['class']?>"></i></a>
                            <?php } ?>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/<?= $lang?>.png" alt="">
                                <div><?php 
                                    switch ($lang) {
                                        case "pt": echo "Português"; break;
                                        case "en": echo "English"; break;
                                    }
                                ?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="index.php?lang=en">English</a></li>
                                    <li><a href="index.php?lang=pt">Português</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/<?= $row_rsVariaveis['logotipo']?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span id="numProds">0</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span id="total">0.00 €</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <?php
//$rsVariaveis->free();
//$rsRedesSociais->free();
//$csogani->close();
?>