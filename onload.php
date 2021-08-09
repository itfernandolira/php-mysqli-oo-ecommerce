<?php
    session_start();
    $sessao=session_id();
    $numProds=0;
    $total=0;

    if (isset($_COOKIE['cart'])) {
        $carrinho=unserialize($_COOKIE['cart']);
        foreach ($carrinho as &$item) {
            $total=$total+($item['qtd']*$item['price']);
        }
        $numProds=count($carrinho);
    } 

    $data=['numProds'=>$numProds,'total'=>$total];

    header('Content-type: application/json');
    echo json_encode( $data );
?>