@extends('layouts.plantilla')

@section('title', 'Viendo ' . $video->name)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <!-- Hoja de estilos -->
    <style>
        a{
            color: green
        }

        a:hover{
            color: darkgreen
        }
    </style>

    <br>

    <!-- Ver Video -->
    <div class="row" style="color: black">
        <div class="col">
            <img style="width: 600px" src="https://image.shutterstock.com/image-vector/video-player-web-minimalistic-design-260nw-135505508.jpg" alt="">
        </div>
        <div class="col">

            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"><p class="a" style="text-align: center"><a href="javascript:window.history.go(-1);">REGRESAR</a></p></div>
            </div>

            <h2 style="text-align: center"> {{$video->name}}</h2> <br>
            <hr style="background-color: green">
            <p>{{$video->description}}</p>

            <br>

            <div class="row">
                <div class="col">
                    <p style="text-align: center"><strong>Creador</strong>
                         <a href="{{route('creators.show', $video->user_id)}}" style="color: green">: {{$video->user_id}}</a>
                    </p>
                </div>
                <div class="col">
                   <p style="text-align: right"><strong>Categorias:</strong></p>
                </div>
                <div class="col">
                    @foreach ($categorias as $categoria)
                        <button type="button" class="btn btn-outline-success"><a href="{{route('categorias.show', $categoria)}}" style="color: green">{{$categoria->name}}</a></button>
                    @endforeach
                </div>
            </div>

            <hr style="background-color: green">

            <br> <br>

            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarVideo">Editar Video</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarActividad">Eliminar Video</button>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

    <br> <br>

    <!-- Videos Relacionados -->
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <h2>Videos Relacionados</h2>
        </div>
        <div class="col"></div>
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

    <!-- Modal editar video -->
    <div class="modal fade" id="editarVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Editar Video</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body">

                        {!! Form::model($video, ['route' => ['videos.update', $video], 'method' => 'put']) !!}

                            <div class="class-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nuevo nombre del video']) !!}

                                <br> <br>

                                {!! Form::label('description', 'Descripcion') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Cambiar descripcion del video']) !!}

                            </div>

                            <br>

                            <div class="container">
                                <div class="row">
                                  <div class="col">
                                  </div>
                                  <div class="col">
                                        {!! Form::submit('Editar el curso', ['class' => 'btn btn-success']) !!}
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
