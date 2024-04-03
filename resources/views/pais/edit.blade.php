<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Pais </title>
</head>


<body>
    <div class="container">
        <h1>Editar Pais {{ $pais }}</h1>
        <form method="POST" action="{{ route('paises.update', ['pais' => $pais->pais_codi]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Código</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled" value="{{ $pais->pais_codi}}">
                <div id="idHelp" class="form-text">Código de pais</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Pais</label>
                <input type="text" require class="form-control" id="name" aria-describedby="nameHelp" name="name" placeholder="Nombre del pais" value="{{ $pais->pais_nomb}}">
            </div>

            <label for="capital">Capital:</label>
            <select class="form-select" id="capital" name="code" require>
                <option selected disabled value="">Seleccione uno . . .</option>
                @foreach ($municipios as $municipio)
                    @if ($municipio->muni_codi == $pais->pais_capi)
                        <option selected value="{{ $municipio->muni_codi}}">{{$municipio->muni_nomb}}</option>
                    @else
                        <option value="{{ $municipio->muni_codi}}">{{$municipio->muni_nomb}}</option>
                    @endif
                @endforeach
            </select>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
