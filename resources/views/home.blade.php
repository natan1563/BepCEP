<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BepCEP</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
        <style scoped>

            body {
                background: #C2C2C2;
            }

            #main {
                height: 100vh;
            }

            .content-center {
                margin-top: 30px;
            }

            #boxResponse {
                background-color: #54565B;
                box-shadow: 2px 3px 6px #5e564f;
                height: 400px;
                max-width: 800px;
                border-radius: 25px;
                padding: 0 30px;
                display: none;
            }

            #btnProcurar {
                margin-left: 3px;
            }

            .btn-gray {
                background-color: #54565B;
                color: #ffffff;
            }

            .text-alert,
            .titleResponse,
            .insertCep {
                color: #FAD41B;
                text-shadow: 1px 1px 1px #111111;
                font-weight: bold;
            }
            .inputResponse {
                box-shadow: 1px 1px 3px #111111;
            }

            /* Alerts */
            .alerta-erro {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
                border-radius: 15px;
                text-align: center;
            }

            .alerta-sucesso {
                color: #155724;
                background-color: #d4edda;
                border-color: #c3e6cb;
                border-radius: 15px;
                text-align: center;
            }
        </style>
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
                <div class="mx-auto w-50 p-3" id="alertMessage">
                    <span id="insertTextResponse"></span>
                </div>
             </div>

             <div class="mx-auto p-3 mt-5" id="boxResponse">
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

