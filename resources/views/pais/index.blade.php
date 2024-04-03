<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Paises</title>
</head>

<body>
    <div class="container">
        <h1>Listado de Paises</h1>
        <a href="{{ route('paises.create') }}" class="btn btn-success">Crear Pais</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais)
                    <tr>
                        <th scope="row">{{ $pais->pais_codi }}</th>
                        <td>{{ $pais->pais_nomb }}</td>
                        <td>{{ $pais->muni_nomb }}</td>
                        <td>
                            <a href="{{ route('paises.edit', ['pais' => $pais->pais_codi]) }}" class="btn btn-info">Edetar</a>
                            {{-- <form action="{{ route('paises.destroy', ['pais' => $pais->pais_codi]) }}" method="POST" style="display: inline-block"> --}}
                                @method('delete')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
