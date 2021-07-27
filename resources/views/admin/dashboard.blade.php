@extends('admin.master.master')

@section('content')
    <div style="flex-basis: 100%;">
        <section class="dash_content_app">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Dashboard</h2>
            </header>

            <div class="dash_content_app_box">
                <section class="app_dash_home_stats">
                    <article class="control radius">
                        <h4 class="icon-users">Usuários</h4>
                        {{-- {{ $lessors }} --}}
                        <p><b>Administradores:</b> </p>
                        {{-- {{ $lessees }} --}}
                        <p><b>Clientes:</b> </p>
                        {{-- {{ $team }} --}}
                        <p><b>Total:</b> </p>
                    </article>

                    <article class="blog radius">
                        <h4 class="icon-cubes">Produtos</h4>
                        {{-- {{ $propertiesAvailable }} --}}
                        <p><b>Disponíveis:</b> </p>
                        {{-- {{ $propertiesUnavailable }} --}}
                        <p><b>Vendidos:</b> </p>
                        {{-- {{ $propertiesTotal }} --}}
                        <p><b>Total:</b> </p>
                    </article>

                    <article class="users radius">
                        <h4 class="icon-file-text">Pedidos</h4>
                        {{-- {{ $requestsPendent }} --}}
                        <p><b>Pendentes:</b> </p>
                        {{-- {{ $requestsActive }} --}}
                        <p><b>Aprovados:</b> </p>
                        {{-- {{ $requestsCanceled }} --}}
                        <p><b>Cancelados:</b> </p>
                        {{-- {{ $requestsTotal }} --}}
                        <p><b>Total:</b> </p>
                    </article>
                </section>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimos Pedidos Cadastrados</h2>
            </header>

            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">
                    <table id="dataTable" class="nowrap hover stripe" width="100" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Pedido</th>
                                <th>Produtos</th>
                                <th>Status</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($requests as $request)
                    <tr>
                        <td><a href="{{ route('admin.requests.edit', ['request' => $request->id]) }}" class="text-orange">{{ $request->id }}</a></td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $request->ownerObject->id]) }}" class="text-orange">{{ $request->ownerObject->name }}</a></td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $request->acquirerObject->id]) }}" class="text-orange">{{ $request->acquirerObject->name }}</a></td>
                        <td>{{ ($request->sale == true ? 'Venda' : 'Locação') }}</td>
                        <td>{{ $request->start_at }}</td>
                        <td>{{ $request->deadline }} meses</td>
                    </tr>
                    @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="dash_content_app" style="margin-top: 40px;">
            <header class="dash_content_app_header">
                <h2 class="icon-tachometer">Últimos Produtos Cadastrados</h2>
            </header>

            <div class="dash_content_app_box">
                <div class="dash_content_app_box_stage">
                    <div class="realty_list">
                        {{-- @if (!empty($properties))
                        @foreach ($properties as $property)
                        <div class="realty_list_item mb-2">
                            <div class="realty_list_item_actions_stats">
                                <img src="{{ $property->cover() }}" alt="">
                                <ul>
                                    @if ($property->sale == true && !empty($property->sale_price))
                                        <li>Venda: R$ {{ $property->sale_price }}</li>
                                    @endif
    
                                    @if ($property->rent == true && !empty($property->promotion_price))
                                        <li>Aluguel: R$ {{ $property->promotion_price }}</li>
                                    @endif
                                </ul>
                            </div>
    
                            <div class="realty_list_item_content">
                                <h4>#{{ $property->id }} {{ $property->category }} - {{ $property->type }}</h4>
    
                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-location"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Bairro:</span>
                                        <span class="realty_list_item_description_content">{{ $property->neighborhood }}</span>
                                    </div>
                                </div>
    
                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-util-area"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Área Útil:</span>
                                        <span class="realty_list_item_description_content">{{ $property->area_util }}m&sup2;</span>
                                    </div>
                                </div>
    
                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-bed"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Domitórios:</span>
                                        <span class="realty_list_item_description_content">{{ $property->bedrooms + $property->suites }} Quartos<br><span>Sendo {{ $property->suites }} suítes</span></span>
                                    </div>
                                </div>
    
                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-garage"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Garagem:</span>
                                        <span class="realty_list_item_description_content">{{ $property->garage + $property->garage_covered }} Vagas<br><span>Sendo {{ $property->garage_covered }} cobertas</span></span>
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="realty_list_item_actions">
                                <ul>
                                    <li class="icon-eye">1234 Visualizações</li>
                                </ul>
                                <div>
                                    <a href="" class="btn btn-blue icon-eye">Visualizar Imóvel</a>
                                    <a href="{{ route('admin.products.edit', ['property' => $property->id]) }}" class="btn btn-green icon-pencil-square-o">Editar
                                        Imóvel</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="no-content">Não foram encontrados registros!</div>
                    @endif --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
