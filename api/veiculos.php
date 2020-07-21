<?php

include('../includes/common/util.php'); 

$db = new db(); 

//SE O MÉTODO FOR GET,
if( $_SERVER['REQUEST_METHOD'] === "GET" ){

    if(isset($_GET['search']))
    {
        //CASO ELE QUERIA PROCURAR POR UM CARRO, ELE DEVERÁ INFORMAR O PARÂMETRO SEARCH NA URL;
        $db->query('SELECT * from cars where veiculo like "%'.$_GET['search'].'%"'); 
    }
    else if(isset($_GET['id']))
    {
        //CASO ELE INFORME O PARÂMETRO ID NA URL, DEVERÁ FILTRAR VIA ID;
        $db->query('SELECT * from cars where id = '.$_GET['id']); 
    } else {
        $db->query('SELECT * from cars'); 
    }
    
    $db->execute();

    $result = $db->resultset(); 

    $arr['status'] = 200;
    $arr['data'] = $result ;
    echo json_encode($arr);
    exit(0);
}

//SE O MÉTODO FOR POST
else if ( $_SERVER['REQUEST_METHOD'] === "POST" ){
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    //VALIDAÇÃO DOS CAMPOS;
    if(!isset($data['veiculo'])){ echo json_encode(array("message" => "O campo veículo é obrigatório")); return false; }
    if(!isset($data['marca'])){ echo json_encode(array("message" => "O campo marca é obrigatório")); return false; }
    if(!isset($data['ano'])){ echo json_encode(array("message" => "O campo ano é obrigatório")); return false; }
    if(!isset($data['descricao'])){ echo json_encode(array("message" => "O campo descrição é obrigatório")); return false; }
    if(!isset($data['vendido'])){ echo json_encode(array("message" => "O campo vendido (0 ou 1) é obrigatório")); return false; }

    //VALIDOU OS CAMPOS, CONTINUAR CADASTRO;
    $db->query("INSERT INTO cars (veiculo, marca, ano, descricao, vendido, created, updated) VALUES (:veiculo, 
    :marca, :ano, :descricao, :vendido, :created, :updated)");
    $db->bind(':veiculo', $data['veiculo']);
    $db->bind(':marca', $data['marca']);
    $db->bind(':ano', $data['ano']);
    $db->bind(':descricao', $data['descricao']);
    $db->bind(':vendido', $data['vendido']);
    $db->bind(':created', date("Y-m-d H:i:s"));
    $db->bind(':updated', date("Y-m-d H:i:s"));
    
    if($db->execute()){
        
        $last_id = $db->lastInsertId(); 

        $arr['status'] = 'SUCCESS';
        $arr['id_car'] = $last_id;
        $arr['status_txt'] = 'Cadastro do carro realizado com sucesso!' ;
        echo json_encode($arr);
        exit(0);
    } else {
        $arr['status'] = 'ERROR';
        $arr['status_txt'] = 'Erro ao salvar carro!' ;
        echo json_encode($arr);
        exit(0);
    }
}

//SE O MÉTODO FOR PUT
else if ( $_SERVER['REQUEST_METHOD'] === "PUT" ){

    $data = json_decode(file_get_contents('php://input'), true);

    //VALIDAÇÃO DOS CAMPOS;
    if(!isset($data['id'])){ echo json_encode(array("message" => "O campo ID é obrigatório")); return false; }
    if(!isset($data['veiculo'])){ echo json_encode(array("message" => "O campo veículo é obrigatório")); return false; }
    if(!isset($data['marca'])){ echo json_encode(array("message" => "O campo marca é obrigatório")); return false; }
    if(!isset($data['ano'])){ echo json_encode(array("message" => "O campo ano é obrigatório")); return false; }
    if(!isset($data['descricao'])){ echo json_encode(array("message" => "O campo descrição é obrigatório")); return false; }


    //PROCURAR REGISTRO PARA VERIFICAR SE EXISTE COM O ID INFORMADO
    $db->query('SELECT * from cars where id = '.$data['id']); 
    $db->execute();
    $result = $db->resultset();

    if(!$result){
        $arr['status'] = 'ERROR';
        $arr['status_txt'] = 'Registro não encontrado!' ;
        echo json_encode($arr);
        exit(0);
    }

    //VALIDOU OS CAMPOS, CONTINUAR CADASTRO;
    $db->query("UPDATE cars set veiculo = :veiculo, marca = :marca, ano = :ano, descricao = :descricao, updated = :updated where id = ".$data['id']);
    $db->bind(':veiculo', $data['veiculo']);
    $db->bind(':marca', $data['marca']);
    $db->bind(':ano', $data['ano']);
    $db->bind(':descricao', $data['descricao']);
    $db->bind(':updated', date("Y-m-d H:i:s"));
    
    if($db->execute()){
        
        $last_id = $db->lastInsertId(); 

        $arr['status'] = 'SUCCESS';
        $arr['id_car'] = $last_id;
        $arr['status_txt'] = 'Cadastro atualizado com sucesso!' ;
        echo json_encode($arr);
        exit(0);
    } else {
        $arr['status'] = 'ERROR';
        $arr['status_txt'] = 'Erro ao salvar cadastro!' ;
        echo json_encode($arr);
        exit(0);
    }
}

//SE O MÉTODO FOR DELETE
else if ( $_SERVER['REQUEST_METHOD'] === "DELETE" ){
    
    //VALIDAÇÃO DOS CAMPOS;
    if(!isset($_GET['id'])){ echo json_encode(array("message" => "O campo ID é obrigatório")); return false; }

    //PROCURAR REGISTRO PARA VERIFICAR SE EXISTE COM O ID INFORMADO
    $db->query('SELECT * from cars where id = '.$_GET['id']); 
    $db->execute();
    $result = $db->resultset();

    if(!$result){
        $arr['status'] = 'ERROR';
        $arr['status_txt'] = 'Registro não encontrado!' ;
        echo json_encode($arr);
        exit(0);
    }

    //VALIDOU OS CAMPOS, CONTINUAR CADASTRO;
    $db->query("DELETE from cars where id = :id");
    $db->bind(':id', $_GET['id']);
    
    if($db->execute()){

        $arr['status'] = 'SUCCESS';
        $arr['status_txt'] = 'Cadastro apagado com sucesso!' ;
        echo json_encode($arr);
        exit(0);
    } else {
        $arr['status'] = 'ERROR';
        $arr['status_txt'] = 'Erro ao apagar cadastro!' ;
        echo json_encode($arr);
        exit(0);
    }
}

else{
    echo "ERROR";
    return false;
}

?>