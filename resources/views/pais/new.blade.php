<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nuevo Pais</title>
</head>


<body>
    <div class="container">
        <h1>Nuevo Pais</h1>
        <form method="POST" action="{{ route('paises.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Código</label>
                <input type="text"  require class="form-control" maxlength="3" style="text-transform:uppercase" id="id" aria-describedby="idHelp" name="id" placeholder="Código del Pais (tres letras)">
                <div id="idHelp" class="form-text">Código del Pais</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Pais</label>
                <input type="text" require class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Nombre del Pais">
            </div>

            <label for="capital">Capital:</label>
            <select class="form-select" id="capital" name="code" require>
                <option selected disabled value="">Seleccione uno . . .</option>
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
