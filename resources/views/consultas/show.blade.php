@extends('consultas.layout')

@section('title',__($consulta->paciente_id . ': CRUD Laravel'))

@push('css')
<style>
table{
font-family: Verdana,sans-serif;
border: 1px solid #ccc;
margin: 20px 0;
}
table th{
    padding:10px;
    font-weight: normal;
}
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span><span class="text-info">{{$consulta->paciente_id}}</span>: (@lang('CRUD Laravel'))</span>
                        <a href="{{ url('consultas') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table class="w3-table-all notranslate" width="100%" border="1">
                        <tbody>
                        <tr>
                          <th align="left"><strong>ID:</strong></th>
                          <th align="left">{{$consulta->id}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Paciente')</strong>:</th>
                            <th align="left">{{$consulta->paciente->nome}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Médico')</strong>:</th>
                            <th align="left">{{$consulta->medico->nome}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Data')</strong>:</th>
                            <th align="left">{{$consulta->data}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Hora')</strong>:</th>
                            <th align="left">{{$consulta->hora}}</th>
                          </tr>
                        <tr>
                            <th align="left"><strong>@lang('Adicionado')</strong>:</th>
                            <th align="left">{{$consulta->created_at}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Atualizado')</strong>:</th>
                            <th align="left">{{$consulta->updated_at}}</th>
                        </tr>
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