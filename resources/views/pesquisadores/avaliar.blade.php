@extends('voyager::master')

@section('page_title', 'testepesquisador')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class=""></i> solicitaçoes
        </h1>
        @can('add', 'solicitacoes')
            <a href="{{ route('pesquisador.solicitar') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @can('delete', 'solicitacoes')
            @include('voyager::partials.bulk-delete')
        @endcan
        @can('edit', 'solicitacoes')
            @if(!empty($dataType->order_column) && !empty($dataType->order_display_column))
                <a href="{{ route('pesquisador.edit') }}" class="btn btn-primary btn-add-new">
                    <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
                </a>
            @endif
        @endcan
        @can('delete', 'solicitacoes')
            @if($usesSoftDeletes)
                <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}" data-off="{{ __('voyager::bread.soft_deletes_on') }}">
            @endif
        @endcan
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>
                                           Nome
                                        </th>
                                        <th>
                                           Email Institucional
                                        </th>
                                        <th>
                                            Currículo Lattes
                                        </th>
                                        <th>
                                            Situação
                                        </th>


                                        <th class="actions text-right dt-not-orderable">{{ __('voyager::generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesquisadores as $pesquisador)
                                    <tr>
                                            <td>
                                               {{$pesquisador->email_institucional}}
                                            </td>
                                            <td>
                                                {{$pesquisador->email_institucional}}
                                             </td>
                                            <td>
                                                <a target="_blank" href="{{$pesquisador->curriculo_lattes}}">Currículo Lattes</a>
                                             </td>
                                             <td>
                                                {{!!$pesquisador->situacao()!!}}
                                             </td>

                                        <td class="no-sort no-click bread-actions">
                                            <form action="{{route('pesquisador.aprovar')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="pesquisador_id" value="{{ $pesquisador->id }}">
                                                <button type="submit" class="btn btn-sm btn-success pull-right"><i class="voyager-check"></i> Aprovar</button>
                                            </form>
                                            <div class="btn btn-sm btn-danger pull-right delete" data-id="{{$pesquisador->id}}" data-toggle="modal" data-target="#{{ $pesquisador->id }}" onclick="mostrarmodal({{$pesquisador->id}})">
                                                <i class="voyager-x"></i> Negar
                                            </div>
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
    </div>
@foreach($pesquisadores as $key => $pesquisador)
@include('pesquisadores.modal-negar')
@endforeach

@endsection

@section('javascript')
<script>
	function mostrarmodal(id) {
		console.log(id);
		$('#modal-' + id).modal('show');
	}
</script>

@endsection

