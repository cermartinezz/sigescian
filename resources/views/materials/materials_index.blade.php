@extends('app')

@section('content')

    <div>
        <a href="/materiales/create" class="btn btn-primary">Agregar Nuevo Material</a>
    </div>

    <hr>
    @if($materials->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Descripcion
                </th>
                <th>Acciones</th>
                </thead>
                <tbody>
                @foreach($materials as $material)

                    <tr id="row-{{$material->id}}">
                        <td>{{$material->name}}</td>
                        <td>{{$material->description}}</td>
                        <td>
                            <div class="acciones">
                                <a href="/materiales/{{$material->slug}}/edit" class="btn btn-sm btn-primary"><span class="texto">Editar</span></a> |
                                <form action='/materiales/{{$material->id}}' v-ajax row="row-{{$material->id}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger"><span class="texto">Eliminar</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>No hay materiales en el sistema.</p>
    @endif
@endsection