@extends('dashboard')

@section('title', 'G. Categoria')

@section('content')
<div class="card-header">
                <h1 class="card-title">
                <i class="fas fa-clock mr-1"></i>
                <b>GESTIONAR CARGO   </b> 
                </h1>
                <div class="float-right d-sm-block"> 
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" data-toggle="modal" data-target="#agregarModal" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Agregar</a>
                    </div> 
                </div>
</div>
    

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    <div class="card table-responsive">
        <div class="card-body">
            <table class="table table-hover" id="categorias">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($cargos as $cargo)
                    <tr>
                        <td>{{ $cargo->id }}</td>
                        <td>{{ $cargo->nombre }}</td>
                        <td>{{ $cargo->descripcion }}</td>
                        <td>{{ $cargo->estado == '1' ? 'Activo' : 'Inactivo' }} </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editModal{{ $cargo->id }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            &nbsp;
                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $cargo->id }}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @include('Cargos.modificar', ['cargo' => $cargo])
                    @include('Cargos.eliminar', ['cargo' => $cargo])                                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('Cargos.agregar')                    
@endsection