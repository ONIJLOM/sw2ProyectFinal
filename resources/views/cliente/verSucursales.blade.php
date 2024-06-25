@extends('layouts.cliente')

@section('title', 'Lista Sucursales')

@section('content_header')

@stop

@section('content')

    <br>
    <br>
    <br>
    <br>
    <h1 class="text-center">{{ $producto->nombre }} disponible en:</h1>

    <div class="card-body">
        <table class="table table-striped" id="pedidos">
            <thead>
                <tr class="bg-dark text-center text-white">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ver</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($sucursales as $sucursal)
                    <?php
                    $nombre = DB::table('sucursals')
                        ->where('id', $sucursal->sucursal_id)
                        ->first();
                    ?>
                    <tr>
                        <td>{{ $nombre->id }}</td>
                        <td>{{ $nombre->nombre }}</td>

                        <td width="20px">
                            <a target="_blank" href="{{$nombre->direccion}}" class="btn btn-outline-primary">
                                <i class="material-icons fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pedidos').DataTable();
        });
    </script>
    <script>
        console.log('hi!')
    </script>
@stop
