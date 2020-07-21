
get_cars();

function get_cars(){
	
	$.ajax({
     url:"api/veiculos.php",
     method:"GET",
		success:function(response){
		var status = response.status;
        var cars = response.data;

			if(status == 200) {

                var content = "";

                content = "<table class='table table-striped table-condensed'>";

                    content = content + "<thead>";
                    content = content + "</thead>";

                    content = content + "<tbody>";

                        $.each(cars, function(index, value) {

                            content = content + "<tr>";
                                content = content + "<td>";
                                        content = content + "<b>" + value.marca + "</b>";

                                        content = content + "<div class='primary-color'>";
                                            content = content + "<b>" + value.veiculo + "</b>";
                                        content = content + "</div>";

                                        content = content + value.ano;

                                content = content + "<td>";

                                content = content + "<td>";
                                    content = content + `<svg onclick='callModal("${value.veiculo}", "${value.marca}", "${value.ano}", "${value.descricao}", "${value.vendido}", "${value.id}")' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square pointer' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>`;
                                content = content + "</td>";
                            content = content + "</tr>";

                        });
                    content = content + "</tbody>";

                content = content + "</table>";

				$('#cars_list').html(content);
				
				//if(lista_usuario.foto != ""){
					//$('#image_funcionario').attr('src','./images/pet/upload/funcionarios/' + lista_usuario.foto);
				//}
            }
		}
    }); 

  }

  function storeCar(){
    var data = {
        veiculo : $("#car_store_modal").val(),
        marca : $("#brand_store_modal").val(),
        ano : $("#year_store_modal").val(),
        descricao : $("#description_store_modal").val(),
        vendido: 0,
    };
    
    $.ajax({
        url: 'api/veiculos.php', 
        type : 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(data),
            success: function(response){
                status = response.status; 
                status_txt = response.status_txt;
                
                if(status == 'SUCCESS') {
                    alert("Cadastrado com sucesso!"); 
                    location.reload();
                } 
                else {
                    alert("Erro ao cadastrar carro!");
                } 
            },
            error:function(response){
                alert("Erro ao cadastrar carro!");
            } 
    });
  }

  function callModal(veiculo, marca, ano, descricao, vendido, id){
    $('.display-none').show();

    $("#car_id").html(id);
    $("#car_name").html("<b>" + veiculo + "</b>");
    $("#car_brand").html("<b>" + marca + "</b>");
    $("#car_year").html("<b>" + ano + "</b>");
    $("#car_description").html("<b>" + descricao + "</b>");
    $("#car_sold").html(vendido);
  }

  function editCar(){
    $("#id_modal").val($("#car_id").text());
    $("#car_modal").val($("#car_name").text());
    $("#brand_modal").val($("#car_brand").text());
    $("#year_modal").val($("#car_year").text());
    $("#description_modal").val($("#car_description").text());
    
    if($("#car_sold").text() == 1){
        $("#sold_modal").show();
    }else{
        $("#sold_modal").hide();
    }
  }

  function saveCar(){

    var data = {
        id : $("#id_modal").val(),
        veiculo : $("#car_modal").val(),
        marca : $("#brand_modal").val(),
        ano : $("#year_modal").val(),
        descricao : $("#description_modal").val(),
    };
    
    $.ajax({
        url: 'api/veiculos.php', 
        type : 'PUT',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(data),
            success: function(response){
                status = response.status; 
                status_txt = response.status_txt;
                
                if(status == 'SUCCESS') {
                    alert("Atualizado com sucesso!"); 
                    location.reload();
                } 
                else {
                    alert("Erro ao atualizar carro!");
                } 
            },
            error:function(response){
                alert("Erro ao atualizar carro!");
            } 
    });
}

function serach_for_car(){

    var search = $("#searchCar").val();

	$.ajax({
     url:"api/veiculos.php?search=" + search,
     method:"GET",
		success:function(response){
		var status = response.status;
        var cars = response.data;

			if(status == 200) {

                var content = "";

                content = "<table class='table table-striped table-condensed'>";

                    content = content + "<thead>";
                    content = content + "</thead>";

                    content = content + "<tbody>";

                        $.each(cars, function(index, value) {

                            content = content + "<tr>";
                                content = content + "<td>";
                                        content = content + "<b>" + value.marca + "</b>";

                                        content = content + "<div class='primary-color'>";
                                            content = content + "<b>" + value.veiculo + "</b>";
                                        content = content + "</div>";

                                        content = content + value.ano;

                                content = content + "<td>";

                                content = content + "<td>";
                                    content = content + `<svg onclick='callModal("${value.veiculo}", "${value.marca}", "${value.ano}", "${value.descricao}", "${value.vendido}", "${value.id}")' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square pointer' fill='currentColor' xmlns='http://www.w3.org/2000/svg'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg>`;
                                content = content + "</td>";
                            content = content + "</tr>";

                        });
                    content = content + "</tbody>";

                content = content + "</table>";

				$('#cars_list').html(content);
				
				//if(lista_usuario.foto != ""){
					//$('#image_funcionario').attr('src','./images/pet/upload/funcionarios/' + lista_usuario.foto);
				//}
            }
		}
    }); 

  }