@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.requests.index') }}">Pedido</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.requests.create') }}" class="btn btn-orange icon-file-text ml-1">Criar Pedido</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.requests.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Proprietário</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td><a href="{{ route('admin.requests.edit', ['request' => $request->id]) }}" class="text-orange">{{ $request->id }}</a></td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $request->ownerObject->id]) }}" class="text-orange">{{ $request->ownerObject->name }}</a></td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $request->acquirerObject->id]) }}" class="text-orange">{{ $request->acquirerObject->name }}</a></td>
                    <td>{{ ($request->sale == true ? 'Venda' : 'Locação') }}</td>
                    <td>{{ $request->status }}</td>
                    <td>{{ $request->created_at }} meses</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection