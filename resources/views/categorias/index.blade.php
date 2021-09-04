@extends('layouts.plantilla')

@section('title', 'Categorias Tv')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumbs')
    {{Breadcrumbs::render('categorias')}}
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
          <h1 style="text-align: center">Categorias <strong style="color: green"> Tv </strong></h1>
        </div>
        <div class="col">
        </div>
    </div>

    <br>

    <!-- Botones -->
    <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarCategoria">Agregar Categoria</button>
        </div>
    </div>

    <br>

    <!-- Tabla de categorias -->
    <div class="container">
        <div class="row">
            <div class="col">
                <table id="videos" class="table table-striped">
                    <thead>
                      <tr style="text-align: center">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion de la categoria </th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($categorias as $categoria)
                      <tr>
                        <td scope="col">{{$categoria->id}}</td>
                        <td>{{$categoria->name}}</td>
                        <td>{{$categoria->description}}</td>
                        <td>
                            <button type="button" class="btn btn-success" ><a href="{{route('categorias.show', $categoria)}}" style="color: white">Ver</a> </button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
        </div>
    </div>

    <!-- Modal agregar categoria -->
    <div class="modal fade" id="agregarCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Nueva Categoria</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::open(['routes' => 'categorias.store', 'id' => 'form-crear']) !!}

                <div class="class-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <br> <br>

                    {!! Form::label('description', 'Descripcion') !!}
                    {!! Form::textarea('description', null,  ['class' => 'form-control', 'placeholder' => 'Descripcion de la categoria']) !!}

                </div>
                <!-- Boton -->
                <div class="container">
                    <div class="row">
                      <div class="col">
                      </div>
                      <div class="col">
                            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
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
        $("#form-crear").validate({
            rules: {
                name:{
                    required: true,
                },
                description:{
                    required: true,
                    minlength: 70
                }
            },
            messages:{
                name:{
                    required: "Ingrese el nombre de la cagegoria",
                },
                description:{
                    required: "Ingrese una descripcion a la categoria",
                    minlength: "La descripcion es muy corta"
                }
            }
        });
        });
    </script>
@endsection
