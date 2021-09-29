<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BepCEP</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}"/>
        <link rel="icon" type="imagem/png" href="{{ asset('image/van_transportadora.jpg') }}"/>
        <link rel="stylesheet" href="{{ asset('css/scope.css') }}"/>
    </head>
    <body class="antialiased">

        <div id="main" class="container">
            <div class="text-center row col-md-12">
                <h1 class="text-alert mt-5">Bep<i>CEP</i></h1>
            </div>
            <div class="content-center">
                <form>
                    <div class="form-group col-md-6 mx-auto">
                      <label for="buscarCep" class="insertCep">Insira seu cep</label>
                      <div class="d-flex mt-2">
                        <input type="text" class="form-control" id="buscarCep" required>
                        <button type="submit" id="btnProcurar" class="btn btn-gray">Procurar</button>
                      </div>
                    </div>
                 </form>
             </div>

             <div class="mt-3" id="boxMessage">
                <div class="mx-auto p-3" id="alertMessage">
                    <span id="insertTextResponse"></span>
                </div>
             </div>

             <div class="mx-auto p-3 mt-3" id="boxResponse">
                <div class="form-group mx-auto w-75 mt-2">
                    <label class="titleResponse">Municipio:</label>
                    <input type="text" disabled id="municipio" class="inputResponse form-control">
                </div>

                <div class="form-group mx-auto w-75 mt-2">
                    <div class="titleResponse">Bairro:</div>
                    <input type="text" disabled id="bairro" class="inputResponse form-control">
                </div>

                <div class="form-group mx-auto w-75 mt-2">
                    <span class="titleResponse">Endereço:</span>
                    <input type="text" disabled id="endereco" class="inputResponse form-control">
                </div>

                <div class="form-group mx-auto w-75 mt-2">
                    <span class="titleResponse">UF:</span>
                    <input type="text" disabled id="uf" class="inputResponse form-control">
                </div>

                <div class="form-group mx-auto w-75 mt-2">
                    <span class="titleResponse">CEP:</span>
                    <input type="text" disabled id="cep" class="inputResponse form-control">
                </div>
             </div>
         </div>

        <script src="{{ asset('/js/actions.js'); }}"></script>
    </body>
</html>

