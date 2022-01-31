@extends('layouts.app')

@section('content')
<style>
  h2{-webkit-text-stroke: 2px #4b55eb ;}
h3 {   -webkit-text-stroke: 2px #4b78db ; }
</style>
    <section class="section">
          <div class="section-header">
            <h3 class="text-center">Coordinación de Tecnología y Sistemas de Información</h3>
        </div>
        <div class="section-header">
            <h2 class="page__heading">Articulos</h2>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-articulo')
                        <a class="btn btn-warning" href="{{ route('articulos.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Descripción</th>
                                    <th style="color:#fff;">Nota</th>
                                    <th style="color:#fff;">Cantidad</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($articulos as $articulo)
                            <tr>
                                <td style="display: none;">{{ $articulo->id }}</td>
                                <td>{{ $articulo->nombre }}</td>
                                <td>{{ $articulo->descripcion }}</td>
                                <td>{{ $articulo->nota }}</td>
                                <td>{{ $articulo->cantidad }}</td>
                                <td>
                                    <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                                        @can('editar-articulo')
                                        <a class="btn btn-info" href="{{ route('articulos.edit',$articulo->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-articulo')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $articulos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
