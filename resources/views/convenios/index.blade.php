@extends('convenios.layout')

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
                        <span>@lang('Listagem de Convênios')</span>
                        <a href="{{ url('convenios/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Novo Convênio')
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
                                <td>@lang('Convênio')</td>
                                <td>@lang('Fone')</td>
                                <td>@lang('Site')</td>
                                <td>@lang('Percentual Consulta')</td>
                                <td>@lang('Percentual Exame')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($convenios as $convenio)
                            <tr>
                                <td>{{$convenio->id}}</td>
                                <td>{{$convenio->nome_conv}}</td>
                                <td>{{$convenio->fone_conv}}</td>
                                <td>{{$convenio->site_conv}}</td>
                                <td>{{$convenio->perccons_conv}}</td>
                                <td>{{$convenio->percexame_conv}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('convenios.show', $convenio->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('convenios.edit', $convenio->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('convenios.destroy', $convenio->id)}}" method="post">
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