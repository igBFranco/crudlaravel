@extends('tipoexames.layout')

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
                        <span>@lang('Listagem de Tipos de Exames')</span>
                        <a href="{{ url('tipoexames/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Novo Tipo de Exame')
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
                                <td>@lang('Tipo de Exame')</td>
                                <td>@lang('Sigla')</td>
                                <td>@lang('Descrição')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipoexames as $tipoexame)
                            <tr>
                                <td>{{$tipoexame->id}}</td>
                                <td>{{$tipoexame->nome_tpex}}</td>
                                <td>{{$tipoexame->sigla_tpex}}</td>
                                <td>{{$tipoexame->desc_tpex}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('tipoexames.show', $tipoexame->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('tipoexames.edit', $tipoexame->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('tipoexames.destroy', $tipoexame->id)}}" method="post">
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