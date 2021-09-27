<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    </head>
    <body class="antialiased">

        <div class="container">
            <div class="text-center row col-md-12">
                <h1 class="text-warning">Busca endereços</h1>
            </div>
            <div class="row mt-5">
                <form>
                    <div class="form-group col-md-6 mx-auto">
                      <label for="buscarCep"><strong>Busque</strong></label>
                      <div class="d-flex mt-2">
                        <input type="text" class="form-control" id="buscarCep" name="buscarCep">
                        <button type="submit" id="btnProcurar" class="btn btn-primary">Procurar</button>
                      </div>
                    </div>
                 </form>
             </div>

             <ul>
                 <li></li>
                 <li></li>
                 <li></li>
             </ul>
         </div>

        <script src="{{ asset('/js/actions.js'); }}"></script>
    </body>
</html>
