@extends('admin.master.master')

@section('content')
    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Cadastrar Novo Pedido</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.requests.index') }}">Pedidos</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.requests.create') }}" class="text-orange">Cadastrar Pedido</a></li>
                    </ul>
                </nav>

                <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
            </div>
        </header>

        @include('admin.requests.filter')

        <div class="dash_content_app_box">

            @if($errors->all())
                @foreach($errors->all() as $error)
                    @message(['color' => 'orange'])
                    <p class="icon-asterisk">{{ $error }}</p>
                    @endmessage
                @endforeach
            @endif

            <div class="nav">
                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#parts" class="nav_tabs_item_link active">Dados do Pedido</a>
                    </li>
                </ul>

                <div class="nav_tabs_content">
                    <div id="parts">
                        <form action="{{ route('admin.requests.store') }}" method="post" class="app_form">
                            @csrf

                            <input type="hidden" name="owner_spouse_persist" value="{{ old('owner_spouse') }}">
                            <input type="hidden" name="owner_company_persist" value="{{ old('owner_company') }}">
                            <input type="hidden" name="acquirer_spouse_persist" value="{{ old('acquirer_spouse') }}">
                            <input type="hidden" name="acquirer_company_persist" value="{{ old('acquirer_company') }}">
                            <input type="hidden" name="property_persist" value="{{ old('property') }}">

                            <div class="label_gc">
                                <span class="legend">Confirmar essa compra?</span>
                                <label class="label">
                                    <input type="checkbox" name="sale"
                                            {{ (old('sale') == 'on' ? 'checked' : '') }}><span>Sim</span>
                                </label>
                                <label class="label">
                                    <input type="checkbox" name="promotion"
                                            {{ (old('promotion') == 'on' ? 'checked' : '') }}><span style="width: 165px !important">Na promoção?</span>
                                </label>
                            </div>

                            {{-- <label class="label">
                                <span class="legend">Status do Contrato:</span>
                                <select name="status" class="select2">
                                    <option value="pending" {{ (old('status') === 'pending' ? 'selected' : '') }}>Pendente</option>
                                    <option value="active" {{ (old('status') === 'active' ? 'selected' : '') }}>Ativo</option>
                                    <option value="canceled" {{ (old('status') === 'canceled' ? 'selected' : '') }}>Cancelado</option>
                                </select>
                            </label> --}}

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Proprietário e Adquirente</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Proprietário do produto:</span>
                                            <select class="select2" name="owner"
                                                    data-action="{{ route('admin.requests.getDataOwner') }}">
                                                <option value="">Informe um Administrados</option>
                                                @foreach($admins->get() as $admin)
                                                    <option value="{{ $admin->id }}" {{ (old('owner') == $admin->id ? 'selected' : '') }}>{{ $admin->name }}
                                                        - {{ ($admin->admin ? 'Administrador' : 'Cliente') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Adquirente do produto:</span>
                                            <select name="acquirer" class="select2"
                                                    data-action="{{ route('admin.requests.getDataAcquirer') }}">
                                                <option value="" selected>Informe um Cliente</option>
                                                @foreach($clients->get() as $client)
                                                    <option value="{{ $client->id }}" {{ (old('acquirer') == $client->id ? 'selected' : '') }}>{{ $client->name }}
                                                        - {{ ($client->client ? 'Cliente' : 'Administrador') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Parâmetros do Contrato</h3>
                                    <span class="icon-minus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content">
                                    <label class="label">
                                        <span class="legend">Produto:</span>
                                        {{-- data-action="{{ route('admin.requests.getDataProduct') }}" --}}
                                        <select name="product" class="select2"
                                                >
                                            <option value="">Não informado</option>
                                            @foreach($products->get() as $product)
                                                    <option value="{{ $product->id }}" {{ (old('product') == $product->id ? 'selected' : '') }}>{{ $product->title }}
                                                        - {{ $product->status }}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Valor Original:</span>
                                            <input type="tel" name="sale_price" class="mask-money"
                                                   placeholder="Valor de Venda" {{ (old('sale') != 'on' ? 'disabled' : '') }}/>
                                        </label>

                                        <label class="label">
                                            <span class="legend">Valor Promocional:</span>
                                            <input type="text" name="promotion_price" class="mask-money"
                                                   placeholder="Valor de Locação" {{ (old('promotion') != 'on' ? 'disabled' : '') }}/>
                                        </label>
                                    </div>

                                    <div class="label_gc" style="background-color: #1a345f !important;">
                                        <span class="legend">Qual cor?</span>
                                        <label class="label">
                                            <input type="checkbox" name="white"
                                                {{ old('white') == 'on' || old('white') == true ? 'checked' : '' }}><span>Branco</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="black"
                                                {{ old('black') == 'on' || old('black') == true ? 'checked' : '' }}><span>Preto</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="blue"
                                                {{ old('blue') == 'on' || old('blue') == true ? 'checked' : '' }}><span>Azul</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="green"
                                                {{ old('green') == 'on' || old('green') == true ? 'checked' : '' }}><span>Verde</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="yellow"
                                                {{ old('yellow') == 'on' || old('yellow') == true ? 'checked' : '' }}><span>Amarelo</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="red"
                                                {{ old('red') == 'on' || old('red') == true ? 'checked' : '' }}><span>Vermelho</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="pink"
                                                {{ old('pink') == 'on' || old('pink') == true ? 'checked' : '' }}><span>Rosa</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="purple"
                                                {{ old('purple') == 'on' || old('purple') == true ? 'checked' : '' }}><span>Roxo</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="gray"
                                                {{ old('gray') == 'on' || old('gray') == true ? 'checked' : '' }}><span>Cinza</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="brown"
                                                {{ old('brown') == 'on' || old('brown') == true ? 'checked' : '' }}><span>Marrom</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="beige"
                                                {{ old('beige') == 'on' || old('beige') == true ? 'checked' : '' }}><span>Bege</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="silver"
                                                {{ old('silver') == 'on' || old('silver') == true ? 'checked' : '' }}><span>Prata</span>
                                        </label>
                                        <label class="label">
                                            <input type="checkbox" name="golden"
                                                {{ old('golden') == 'on' || old('golden') == true ? 'checked' : '' }}><span>Dourado</span>
                                        </label>
                                    </div>


                                    <label class="label">
                                        <span class="legend">Data de confirmação do pedido:</span>
                                        <input type="tel" name="created_at" class="mask-date" placeholder="Data de Início"
                                               value="{{ date('d/m/Y') }}" disabled/>
                                    </label>
                                </div>
                            </div>

                            <div class="text-right mt-2">
                                <button class="btn btn-large btn-green icon-check-square-o">Salvar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function setFieldProduct(response) {
                if (response.product != null) {
                    $('input[name="sale_price"]').val(response.product.sale_price);
                    $('input[name="promotion_price"]').val(response.product.promotion_price);
                } else {
                    $('input[name="sale_price"]').val('0,00');
                    $('input[name="promotion_price"]').val('0,00');
                }
            }

            $('select[name="product"]').change(function () {
                var product = $(this);
                $.post(product.data('action'), {product: product.val()}, function (response) {
                    setFieldProduct(response);
                }, 'json');
            });

            if($('input[name="product_persist"]').val() > 0) {
                var product = $('select[name="product"]');
                $.post(product.data('action'), {product: $('input[name="product"]').val()}, function (response) {
                    setFieldProduct(response);
                }, 'json');
            }
        });
    </script>
@endsection