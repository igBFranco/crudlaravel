@extends('consultas.layout')

@section('title',__('(CRUD Laravel)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Listagem de Consultas')</span>
                        <a href="{{ url('consultas/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Nova Consulta')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Paciente')</td>
                                <td>@lang('Médico')</td>
                                <td>@lang('Data')</td>
                                <td>@lang('Hora')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultas as $consulta)
                            <tr>
                                <td>{{$consulta->id}}</td>
                                <td>{{$consulta->paciente->nome}}</td>
                                <td>{{$consulta->medico->nome}}</td>
                                <td>{{$consulta->data}}</td>
                                <td>{{$consulta->hora}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('consultas.show', $consulta->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('consultas.edit', $consulta->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('consultas.destroy', $consulta->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush