<?php
    session_start();
    $ref = $_POST['referencia'];
    $qty = $_POST['qty'];
    $sessao=session_id();

    if (isset($_COOKIE['cart']))
        $carrinho=unserialize($_COOKIE['cart']);
    
    $carrinhoNew=[];
    foreach ($carrinho as $item) {
        if ($item['ref']==$ref)
            array_push($carrinhoNew,['id' => $item['id'],'ref' => $item['ref'],'qtd' => $qty,'price' => $item['price']]);
        else
            array_push($carrinhoNew,['id' => $item['id'],'ref' => $item['ref'],'qtd' => $item['qtd'],'price' => $item['price']]);
    }
    
    setcookie('cart',serialize($carrinhoNew),time()+60*60*24*30);
    
    echo "Removido";
?>