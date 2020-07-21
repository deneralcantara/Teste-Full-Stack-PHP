<!doctype html>
<html lang="en">

<head>

<!-- BOOTSTRAP MAIS ATUAL -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JQUERY E BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .primary-color{
        color:#364382;
    }

    .primary-color-bg{
        background-color:#364382;
    } 

    .bg-muted{
        background-color:#E5E5E5;
    }

    .pointer{
        cursor:pointer;
    }
    .line-height{
        line-height:3px;
    }

    .description{
        font-weight:100;
    }
    .display-none{
        display:none;
    }
    .btn-primary-color{
        background-color:#364382;
        color:white;
    }

    .min-height{
        min-height: 600px;
    }
</style>

</head>

<body>
    <div class="container">
        <div class="row mt-4 border">
            <div class="col-md-2 text-center border-right">
                <p class="primary-color h4">TESTE</p>   
            </div>
        </div>

        <div class="row mt-2 mb-2">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input id="searchCar" type="text" class="form-control" placeholder="Buscar Veículo" aria-label="Buscar Veículo" aria-describedby="basic-addon1">
                    
                    <div onclick="serach_for_car()" class="input-group-prepend pointer">
                        <span class="input-group-text" id="basic-addon1">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </span>
                    </div>

                    <div data-toggle="modal" data-target="#modalStore" class="input-group-prepend pointer">
                        <span class="input-group-text text-white primary-color-bg" id="basic-addon1">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-muted min-height px-4 py-4">

            <div class="col-md-6 mr-2 bg-white border">
                <div class="row">
                    <div class="col-md-12 py-2">
                        <p class="h6">Lista de Veículos</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12 px-0 my-0">
                        <div id="cars_list">

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5 ml-5 bg-white border details display-none">
                <div class="row">
                    <div class="col-md-12 py-2 border-bottom">
                        <p class="h6">Detalhes do Veículo</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12 mt-3">
                        <span class="primary-color" id="car_name">

                        </span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 mt-3 line-height">
                        <input type="hidden" class="form-control" id="car_id"></input>
                        <p><small>MARCA</small></p>
                        <p class="font-weight-bold" id="car_brand">

                        </p>
                    </div>

                    <div class="col-md-6 mt-3 line-height">
                        <p><small>ANO</small></p>
                        <p class="font-weight-bold" id="car_year">

                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12 mt-3">
                        <p class="description" id="car_description">

                        </p>

                        <p style="display:none;" id="car_sold">

                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12 mt-3 text-right">
                        <button data-toggle="modal" data-target="#modalEditCar" onclick="editCar()" class="btn btn-primary-color">EDITAR</button>
                    </div>
                </div>
                
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEditCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Carro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 line-height">
                        <input type="hidden" class="form-control" id="id_modal"></input>
                        <p><b>Veículo</b></p>
                        <input type="text" class="form-control" id="car_modal"></input>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 line-height">
                        <p><b>Marca</b></p>
                        <input type="text" class="form-control" id="brand_modal"></input>
                    </div>
                    <div class="col-md-6 line-height">
                        <p><b>Ano</b></p>
                        <input type="number" class="form-control" id="year_modal"></input>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 line-height">
                        <p><b>Descrição</b></p>
                        <textarea rows="6" type="text" class="form-control" id="description_modal">
                        
                        </textarea>
                    </div>
                </div>

                <div id="sold_modal" class="row mt-3 display-none">
                    <div class="col-md-12">
                        <span>
                            <svg class="primary-color" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg> Vendido
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button onclick="saveCar()" type="button" class="btn btn-primary">Editar Carro</button>
            </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="modalStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Carro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 line-height">
                        <p><b>Veículo</b></p>
                        <input type="text" class="form-control" id="car_store_modal"></input>
                    </div>
                    
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 line-height">
                        <p><b>Marca</b></p>
                        <input type="text" class="form-control" id="brand_store_modal"></input>
                    </div>
                    <div class="col-md-6 line-height">
                        <p><b>Ano</b></p>
                        <input type="number" class="form-control" id="year_store_modal"></input>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 line-height">
                        <p><b>Descrição</b></p>
                        <textarea rows="6" type="text" class="form-control" id="description_store_modal">
                        
                        </textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button onclick="storeCar()" type="button" class="btn btn-primary">Salvar Carro</button>
            </div>
            </div>
        </div>
    </div>



    <!-- Script para pegar os carros -->
    <script src="includes/get_cars.js"></script>

</body>

</html>