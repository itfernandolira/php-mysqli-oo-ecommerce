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

//recordset Links Uteis
$qLinks = "SELECT * FROM linksuteis";
$rsLinks = $csogani->query($qLinks);

if($rsLinks === FALSE) {
    die("Erro no SQL: " . $qLinks . " Error: " . $csogani->error);
  }

$rsLinks->data_seek(0);
//$row_rsVariaveis=$rsVariaveis->fetch_assoc();
?>
<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/<?= $row_rsVariaveis['logotipo']?>" alt=""></a>
                        </div>
                        <ul>
                            <li><?= $row_rsVariaveis['morada']?></li>
                            <li><?= $row_rsVariaveis['telefone']?></li>
                            <li><?= $row_rsVariaveis['emailFooter']?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6><?= $row_rsVariaveis['linksUteis']?></h6>
                        <ul>
                        <?php
                            $numLinks=1; 
                            while ($row_rsLinks = $rsLinks->fetch_assoc()) {  
                                if ($numLinks==7) {
                                    echo "</ul><ul>";
                                }
                                ?>
                            <li><a href="<?= $row_rsLinks['link']?>"><?= $row_rsLinks['texto']?></a></li>
                        <?php 
                            $numLinks++;
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6><?= $row_rsVariaveis['joinNewsletter']?></h6>
                        <p><?= $row_rsVariaveis['textoNewsletter']?></p>
                        <form action="newsletter.php" method="POST">
                            <input type="text" placeholder="<?= $row_rsVariaveis['inputNewsletter']?>" name="email">
                            <button type="submit" class="site-btn" onclick="subscreve()"><?= $row_rsVariaveis['buttonNewsletter']?></button>
                        </form>
                        <div class="footer__widget__social">
                        <?php 
                        $rsRedesSociais->data_seek(0);
                        while ($row_rsRedesSociais = $rsRedesSociais->fetch_assoc()) {  ?>
                                <a href="<?= $row_rsRedesSociais['link']?>"><i class="<?= $row_rsRedesSociais['class']?>"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php
//$rsVariaveis->free();
//$rsRedesSociais->free();
//$rsLinks->free();
//$csogani->close();
?>