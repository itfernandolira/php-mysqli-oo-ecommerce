<?php
    session_start();
    $ref = $_POST['referencia'];
    $preco = $_POST['preco'];
    $sessao=session_id();
    $numProds=1;
    $total=0;
    $updated=false;

    //se o ainda ainda não tiver nenhum produto
    if (!isset($_COOKIE['cart'])) {
        $carrinho = array(['id' => $sessao,'ref' => $ref,'qtd' => 1,'price' => $preco]);
        $total=$preco;
    }
    else {
        //Lê o cookie
        $carrinho=unserialize($_COOKIE['cart']);
        //percorre o array
        foreach ($carrinho as &$item) {
            //se o produto já existe, atualiza a quantidade
            if ($item['ref']==$ref) {
                $item['qtd']++;
                $updated=true;
            }
            //calcula o total a pagar
            $total=$total+($item['qtd']*$item['price']);
        }
        //se o produto não foi atualizado, acrescenta ao array
        if (!$updated) {
            array_push($carrinho,['id' => $sessao,'ref' => $ref,'qtd' => 1,'price' => $preco]);
            $total=$total+$preco;
        }
    } 

    //define o cookie com o carrinho
    setcookie('cart',serialize($carrinho),time()+60*60*24*30);
    //devolve o total de produtos no carrinho e o total a pagar
    $data=['numProds'=>count($carrinho),'total'=>$total];

    header('Content-type: application/json');
    echo json_encode( $data );
?>