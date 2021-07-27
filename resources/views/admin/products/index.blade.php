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
                    <li><a href="{{ route('admin.products.index') }}">Imóveis</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.products.create') }}" class="btn btn-orange icon-home ml-1">Criar Imóvel</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.products.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <div class="realty_list">
                @if(!empty($products))
                    @foreach ($products as $product)
                    <div class="realty_list_item mb-2">
                        <div class="realty_list_item_actions_stats">
                            <img src="{{ $product->cover() }}" alt="" style="top: 0px !important; left: 30px !important; max-width: 80% !important;">
                            <ul>
                                @if(!empty($product->sale_price))
                                    <li>Venda: R$ {{ $product->sale_price }}</li>
                                @endif

                                @if(!empty($product->promotion_price))
                                    <li>Promoção: R$ {{ $product->promotion_price }}</li>
                                @endif
                            </ul>
                        </div>

                        <div class="realty_list_item_content">
                            <h4>#{{ $product->id }} {{ $product->title }} - {{ $product->headline }}</h4>

                            <div class="realty_list_item_card">
                                <div class="realty_list_item_card_image">
                                    <span class="icon-realty-location"></span>
                                </div>
                                <div class="realty_list_item_card_content">
                                    <span class="realty_list_item_description_title">Preço:</span>
                                    <span class="realty_list_item_description_content">R$ {{ $product->sale_price }}</span>
                                </div>
                            </div>

                            <div class="realty_list_item_card">
                                <div class="realty_list_item_card_image">
                                    <span class="icon-realty-util-area"></span>
                                </div>
                                <div class="realty_list_item_card_content">
                                    <span class="realty_list_item_description_title">Promoção:</span>
                                    <span class="realty_list_item_description_content">R$ {{ $product->promotion_price }}</span>
                                </div>
                            </div>

                            <div class="realty_list_item_card">
                                <div class="realty_list_item_card_image">
                                    <span class="icon-realty-bed"></span>
                                </div>
                                <div class="realty_list_item_card_content">
                                    <span class="realty_list_item_description_title">Categoria:</span>
                                    <span class="realty_list_item_description_content">{{ $product->category }}</span>
                                </div>
                            </div>

                            <div class="realty_list_item_card">
                                <div class="realty_list_item_card_image">
                                    <span class="icon-realty-garage"></span>
                                </div>
                                <div class="realty_list_item_card_content">
                                    <span class="realty_list_item_description_title">Marca:</span>
                                    <span class="realty_list_item_description_content">{{ $product->type }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="realty_list_item_actions">
                            <ul>
                                <li class="icon-eye">1234 Visualizações</li>
                            </ul>
                            <div>
                                <a href="" class="btn btn-blue icon-eye">Visualizar Produto</a>
                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-green icon-pencil-square-o">Editar
                                    Produto</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="no-content">Não foram encontrados registros!</div>
                @endif
            </div>
        </div>
    </div>
</section>
    
@endsection