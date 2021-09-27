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
            <div class="row">
                <form>
                    <div class="form-group col-md-6 mx-auto">
                      <label for="buscarCep"><strong>Busque</strong></label>
                      <div class="d-flex mt-2">
                        <input type="text" class="form-control" id="buscarCep" name="buscarCep">
                        <input type="submit" class="btn btn-primary" value="Procurar">
                      </div>
                    </div>
                 </form>
            </div>
        </div>

        <script src="{{asset('site/jquery.js') }}"></script>
        <script src="{{asset('site/bootstrap.js') }}"></script>
    </body>
</html>
