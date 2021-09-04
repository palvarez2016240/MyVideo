@extends('layouts.plantilla')

@section('title', '' . $creator->username)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('creator', $creator)}}
@endsection

@section('content')

    <!-- Estilos del los errores -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans");

        form .error {
        color: #ff0000;
        }
    </style>

    <br>

    <!-- Encabezado -->
    <div class="row" style="color: black">
        <div class="col">
        </div>
        <div class="col">
          <h1 style="text-align: center">{{$creator->username}}<strong style="color: green"> Tv </strong></h1>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editarCreador">Editar Creador</button>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#agregarCreador">Eliminar Creador</button>
        </div>
    </div>

    <hr style="background-color: green"> <br>

    <!-- Botones -->
    <div class="row">
        <div class="col" style="text-align: right"><h3>Videos</h3></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarCreador">Agregar Video</button>
        </div>
    </div>

    <br>

    <!-- Tabla de videos -->
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row">

                    <table id="videos" class="table table-striped">
                        <thead>
                          <tr style="text-align: center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre del video</th>
                            <th scope="col">Descripcion del video</th>
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

        </div>
    </div>

    <!-- Modal editar creador -->
    <div class="modal fade" id="editarCreador" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Editar Creador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::model($creator, ['route' => ['creators.update', $creator], 'method' => 'put', 'id' => 'form-editar']) !!}

                <div class="class-group">
                    {!! Form::label('username', 'Nombre de usurio') !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Nuevo nombre del usuario']) !!}

                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                    <br> <br>

                    {!! Form::label('email', 'Correo Electronico') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Nuevo correo del usuario']) !!}
                </div>

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <br>

                <!-- Boton -->
                <div class="container">
                    <div class="row">
                      <div class="col">
                      </div>
                      <div class="col">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                      </div>
                      <div class="col">
                      </div>
                    </div>
                  </div>

                {!! Form::close() !!}

            </div>
          </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
        $("#form-editar").validate({
            rules: {
                username:{
                    required: true,
                },
                email:{
                    required: true,
                    email: true
                }
            },
            messages:{
                username:{
                    required: "Ingrese el correo electronico",
                },
                email:{
                    required: "Ingrese el nombre del creador",
                    email: "Tipo de correo no permitido"
                }
            }
        });
        });
    </script>
@endsection
