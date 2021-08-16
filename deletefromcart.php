<?php
    session_start();
    $ref = $_POST['referencia'];
    $sessao=session_id();

    if (isset($_COOKIE['cart']))
        $carrinho=unserialize($_COOKIE['cart']);
    
    $carrinhoNew=[];
    foreach ($carrinho as $item) {
        if ($item['ref']!=$ref)
            array_push($carrinhoNew,['id' => $item['id'],'ref' => $item['ref'],'qtd' => $item['qtd'],'price' => $item['price']]);
    }
    
    if (count($carrinhoNew)>0)
        setcookie('cart',serialize($carrinhoNew),time()+60*60*24*30);
    else
        setcookie('cart');
    
    echo "Removido";
?>