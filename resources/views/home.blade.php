@extends('layouts.plantilla')

@section('title', 'MyVideo Tv')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<br>

    <!-- Encabezado -->
    <div class="row" style="color: black">
        <div class="col">
        </div>
        <div class="col">
          <h1 style="text-align: center">MyVideo <strong style="color: green"> Tv </strong></h1>
        </div>
        <div class="col">
        </div>
    </div>

    <br>

    <!-- Tabla de videos -->
    <div class="container">
        <div class="row">

            <table id="videos" class="table table-striped">
                <thead>
                  <tr style="text-align: center">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del video</th>
                    <th scope="col">Descripcion del video</th>
                    <th scope="col">Creador</th>
                    <th scope="col">Fecha de Subida</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($videos as $video)
                  <tr>
                    <td scope="col">{{$video->id}}</td>
                    <td>{{$video->name}}</td>
                    <td>{{$video->description}}</td>
                    <td>{{$video->user_id}}</td>
                    <td>{{$video->created_at->diffForHumans()}}</td>
                    <td>
                        <button type="button" class="btn btn-success" ><a href="{{route('videos.show', $video)}}" style="color: white">Ver</a> </button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>

        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#videos').DataTable();
    </script>
@endsection

@section('jquery')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"></script>
@endsection
