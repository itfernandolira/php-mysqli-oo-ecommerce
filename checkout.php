<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//Verifica se o utilizador já fez login. Se não fez, redireciona para a página login.php
if (!isset($_SESSION['loginDone'])||$_SESSION['loginDone']!=true) 
    header("Location: login.php");

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

//recordset Variaveis
$qVariaveis = "SELECT * FROM variaveis$lang";
$rsVariaveis = $csogani->query($qVariaveis);

if($rsVariaveis === FALSE) {
    die("Erro no SQL: " . $qVariaveis . " Error: " . $csogani->error);
  }

$rsVariaveis->data_seek(0);
$row_rsVariaveis=$rsVariaveis->fetch_assoc();
//$totalRows_rsCD = $rsCD->num_rows;

//recordset Categorias
$qCategorias = "SELECT * FROM categorias$lang";
$rsCategorias = $csogani->query($qCategorias);

if($rsCategorias === FALSE) {
    die("Erro no SQL: " . $qCategorias . " Error: " . $csogani->error);
  }

$rsCategorias->data_seek(0);
//$row_rsVariaveis=$rsVariaveis->fetch_assoc();
//$totalRows_rsCD = $rsCD->num_rows;

//recordset Produtos em Destaque
$qProdDestaque="select produtos$lang.*,categorias$lang.slug as slug from produtos$lang,categorias$lang where produtos$lang.destaque=1 and produtos$lang.categoria=categorias$lang.id";
$rsProdDestaque=$csogani->query($qProdDestaque);

if($rsProdDestaque === FALSE) {
    die("Erro no SQL: " . $qProdDestaque . " Error: " . $csogani->error);
  }

$rsProdDestaque->data_seek(0);

//recordset Utilizador
$qUser = "SELECT * FROM users$lang  WHERE email='".$_SESSION['usernameLog']."'";
$rsUser = $csogani->query($qUser);

if($rsUser === FALSE) {
    die("Erro no SQL: " . $qUser . " Error: " . $csogani->error);
  }

$rsUser->data_seek(0);
$row_rsUser=$rsUser->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="functions.js"></script>
</head>

<body onload="onload()">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
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
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php require_once("header.php"); ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php while ($row_rsCategorias = $rsCategorias->fetch_assoc()) { 
                                if ($row_rsCategorias['menu']==true) { ?>
                            <li><a href="shop-grid.php?id=<?= $row_rsCategorias['id']?>"><?= $row_rsCategorias['categoria']?></a></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?= $row_rsVariaveis['suporteTelefone']?></h5>
                                <span><?= $row_rsVariaveis['suporteTexto']?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Detalhes</h4>
                <form  method="POST" action="request.php">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>E-mail</p>
                                <input type="text" readonly value="<?= $row_rsUser['email'] ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Dados</p>
                                <input type="text" class="checkout__input__add" readonly value="<?= $row_rsUser['nome'] ?>">
                                <input type="text" readonly value="<?= $row_rsUser['rua'] ?>">
                                <input type="text" readonly value="<?= $row_rsUser['localidade'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>A sua encomenda</h4>
                                <div class="checkout__order__products">Produtos <span>Total</span></div>
                                <?php
                                if (isset($_COOKIE['cart'])) {
                                    $carrinho=unserialize($_COOKIE['cart']);
                                    $aPagar=0;
                                ?>
                                <ul><?php
                                    foreach ($carrinho as &$item) {
                                        $qProduto="Select produtos$lang.* from produtos$lang where referencia='".$item['ref']."'";
                                        $rsProduto=$csogani->query($qProduto);
                                        $rsProduto->data_seek(0);
                                        $row_rsProduto=$rsProduto->fetch_assoc();
                                        $aPagar=$aPagar+($item['qtd']*$row_rsProduto['preco']);
                                    ?>
                                    <li><?= $row_rsProduto['designacao']?> <span><?= (number_format($row_rsProduto['preco']*$item['qtd'],2)) ?> €</span></li>
                                    <?php 
                                        $rsProduto->free();
                                        } 
                                        
                                    ?>
                                </ul>
                                <?php } ?>
                                <div class="checkout__order__subtotal">Subtotal <span><?= number_format($aPagar,2) ?> €</span></div>
                                <div class="checkout__order__total">Total <span><?= number_format($aPagar,2) ?> €</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="mbway">
                                        MB WAY
                                        <input type="radio" id="mbway" name="payment" value="mbway" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="visa">
                                        VISA / Mastercard
                                        <input type="radio" id="visa" name="payment" value="visa">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="radio" id="paypal" name="payment" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">ENCOMENDAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php require_once("footer.php"); ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

 

</body>

</html>
<?php
$rsVariaveis->free();
$rsRedesSociais->free();
$rsProdDestaque->free();
$rsLinks->free();
$rsUser->free();
$csogani->close();
?>