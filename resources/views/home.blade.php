<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
        <style scoped>
            #main {
                height: 100vh;
            }

            .content-center {
                margin-top: 100px;
            }

            #enderecoCompleto {
                margin: 100px auto 0;
                max-width: 45%;
                background-color: #FAF566;
                box-shadow: 2px 3px 6px #5e564f;
            }

            #enderecoCompleto li {
                margin: 5px;
                padding: 5px;
                border-bottom: 2px solid #272c0f;
                list-style: none;
                font-size: 18px;
                line-height: 1.5em;
                background-color: #FAF566;
                font-weight: bold;
                color: #202731;
            }
        </style>
    </head>
    <body class="antialiased">

        <div id="main" class="container">
            <div class="text-center row col-md-12">
                <h1 class="text-warning mt-3">Busca endereços</h1>
            </div>
            <div class="content-center">
                <form>
                    <div class="form-group col-md-6 mx-auto">
                      <label for="buscarCep"><strong>Insira seu cep</strong></label>
                      <div class="d-flex mt-2">
                        <input type="text" class="form-control" id="buscarCep" name="buscarCep">
                        <button type="submit" id="btnProcurar" class="btn btn-dark">Procurar</button>
                      </div>
                    </div>
                 </form>
             </div>

             <div class="row">
                <ul id="enderecoCompleto" class="list-group"></ul>
             </div>
         </div>

        <script src="{{ asset('/js/actions.js'); }}"></script>
    </body>
</html>

