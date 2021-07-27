@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Editar Produto</h2>

            <div class="dash_content_app_header_actions">
                <nav class="dash_content_app_breadcrumb">
                    <ul>
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="separator icon-angle-right icon-notext"></li>
                        <li><a href="{{ route('admin.products.index') }}">Produtos</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        @include('admin.products.filter')

        <div class="dash_content_app_box">

            <div class="nav">

                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        @message(['color' => 'orange'])
                        <p class="icon-asterisk">{{ $error }}</p>
                        @endmessage
                    @endforeach
                @endif

                @if (session()->exists('message'))
                    @message(['color' => session()->get('color')])
                    <p class="icon-asterisk">{{ session()->get('message') }}</p>
                    @endmessage
                @endif

                <ul class="nav_tabs">
                    <li class="nav_tabs_item">
                        <a href="#data" class="nav_tabs_item_link active">Dados Cadastrais</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#structure" class="nav_tabs_item_link">Cores</a>
                    </li>
                    <li class="nav_tabs_item">
                        <a href="#images" class="nav_tabs_item_link">Imagens</a>
                    </li>
                </ul>

                <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post"
                    class="app_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="nav_tabs_content">
                        <div id="data">

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Categoria:</span>
                                    <select name="category" class="select2">
                                        <option value="Notebook"
                                            {{ old('category') == 'Notebook' ? 'selected' : ($product->category == 'Notebook' ? 'selected' : '') }}>
                                            Notebook</option>
                                        <option value="Smartphone"
                                            {{ old('category') == 'Smartphone' ? 'selected' : ($product->category == 'Smartphone' ? 'selected' : '') }}>
                                            Smartphone</option>
                                        <option value="Tablet"
                                            {{ old('category') == 'Tablet' ? 'selected' : ($product->category == 'Tablet' ? 'selected' : '') }}>
                                            Tablet</option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Tipo:</span>
                                    <select name="type" class="select2">
                                        <optgroup label="Notebook">
                                            <option value="Casa"
                                                {{ old('type') == 'Acer' ? 'selected' : ($product->type == 'Acer' ? 'selected' : '') }}>
                                                Acer</option>
                                            <option value="Cobertura"
                                                {{ old('type') == 'Alienware' ? 'selected' : ($product->type == 'Alienware' ? 'selected' : '') }}>
                                                Alienware</option>
                                            <option value="Apartamento"
                                                {{ old('type') == 'Apple' ? 'selected' : ($product->type == 'Apple' ? 'selected' : '') }}>
                                                Apple</option>
                                            <option value="Studio"
                                                {{ old('type') == 'Asus' ? 'selected' : ($product->type == 'Asus' ? 'selected' : '') }}>
                                                Asus</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'Dell' ? 'selected' : ($product->type == 'Dell' ? 'selected' : '') }}>
                                                Dell</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'eMachines' ? 'selected' : ($product->type == 'eMachines' ? 'selected' : '') }}>
                                                eMachines</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'Gateway' ? 'selected' : ($product->type == 'Gateway' ? 'selected' : '') }}>
                                                Gateway</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'Gigabyte' ? 'selected' : ($product->type == 'Gigabyte' ? 'selected' : '') }}>
                                                Gigabyte</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'HP' ? 'selected' : ($product->type == 'HP' ? 'selected' : '') }}>
                                                HP</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'Lenovo' ? 'selected' : ($product->type == 'Lenovo' ? 'selected' : '') }}>
                                                Lenovo</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'Positivo' ? 'selected' : ($product->type == 'Positivo' ? 'selected' : '') }}>
                                                Positivo</option>
                                            <option value="Kitnet"
                                                {{ old('type') == 'VAIO' ? 'selected' : ($product->type == 'VAIO' ? 'selected' : '') }}>
                                                VAIO</option>
                                        </optgroup>
                                        <optgroup label="Smartphone">
                                            <option value="Apple"
                                                {{ old('type') == 'Apple' ? 'selected' : ($product->type == 'Apple' ? 'selected' : '') }}>
                                                Apple</option>
                                            <option value="Samsung"
                                                {{ old('type') == 'Samsung' ? 'selected' : ($product->type == 'Samsung' ? 'selected' : '') }}>
                                                Samsung</option>
                                            <option value="Xiaomi"
                                                {{ old('type') == 'Xiaomi' ? 'selected' : ($product->type == 'Xiaomi' ? 'selected' : '') }}>
                                                Xiaomi</option>
                                            <option value="Motorola"
                                                {{ old('type') == 'Motorola' ? 'selected' : ($product->type == 'Motorola' ? 'selected' : '') }}>
                                                Motorola</option>
                                            <option value="Realme"
                                                {{ old('type') == 'Realme' ? 'selected' : ($product->type == 'Realme' ? 'selected' : '') }}>
                                                Realme</option>
                                            <option value="Huawei"
                                                {{ old('type') == 'Huawei' ? 'selected' : ($product->type == 'Huawei' ? 'selected' : '') }}>
                                                Huawei</option>
                                            <option value="Google"
                                                {{ old('type') == 'Google' ? 'selected' : ($product->type == 'Google' ? 'selected' : '') }}>
                                                Google</option>
                                            <option value="OnePlus"
                                                {{ old('type') == 'OnePlus' ? 'selected' : ($product->type == 'OnePlus' ? 'selected' : '') }}>
                                                OnePlus</option>
                                            <option value="Nokia"
                                                {{ old('type') == 'Nokia' ? 'selected' : ($product->type == 'Nokia' ? 'selected' : '') }}>
                                                Nokia</option>
                                            <option value="Sony"
                                                {{ old('type') == 'Sony' ? 'selected' : ($product->type == 'Sony' ? 'selected' : '') }}>
                                                Sony</option>
                                            <option value="Asus"
                                                {{ old('type') == 'Asus' ? 'selected' : ($product->type == 'Asus' ? 'selected' : '') }}>
                                                Asus</option>
                                            <option value="LG"
                                                {{ old('type') ==  'LG' ? 'selected' : ($product->type == 'LG' ? 'selected' : '') }}>
                                                LG</option>
                                        </optgroup>
                                        <optgroup label="Terreno">
                                            <option value="Samsung"
                                                {{ old('type') == 'Samsung' ? 'selected' : ($product->type == 'Samsung' ? 'selected' : '') }}>
                                                Samsung</option>
                                            <option value="Acer"
                                                {{ old('type') == 'Acer' ? 'selected' : ($product->type == 'Acer' ? 'selected' : '') }}>
                                                Acer</option>
                                            <option value="Microsoft"
                                                {{ old('type') == 'Microsoft' ? 'selected' : ($product->type == 'Microsoft' ? 'selected' : '') }}>
                                                Microsoft</option>
                                            <option value="Asus"
                                                {{ old('type') == 'Asus' ? 'selected' : ($product->type == 'Asus' ? 'selected' : '') }}>
                                                Asus</option>
                                            <option value="Motorola"
                                                {{ old('type') == 'Motorola' ? 'selected' : ($product->type == 'Motorola' ? 'selected' : '') }}>
                                                Motorola</option>
                                            <option value="Sony"
                                                {{ old('type') == 'Sony' ? 'selected' : ($product->type == 'Sony' ? 'selected' : '') }}>
                                                Sony</option>
                                            <option value="BlackBerry"
                                                {{ old('type') == 'BlackBerry' ? 'selected' : ($product->type == 'BlackBerry' ? 'selected' : '') }}>
                                                BlackBerry</option>
                                            <option value="Dell"
                                                {{ old('type') == 'Dell' ? 'selected' : ($product->type == 'Dell' ? 'selected' : '') }}>
                                                Dell</option>
                                        </optgroup>
                                    </select>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">Proprietário do Produto:</span>
                                <select name="user" class="select2">
                                    <option value="">Selecione o usuário que é o dono desse produto, ele deve um Administrador</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id === $product->user ? 'selected' : '' }}>{{ $user->name }} -
                                            {{ $user->admin === 1 ? 'Administrador' : 'Cliente' }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Status:</span>
                                    <select name="status" class="select">
                                        <option value="1"
                                            {{ old('status') == '1' ? 'selected' : ($product->status == true ? 'selected' : '') }}>
                                            Disponível</option>
                                        <option value="0"
                                            {{ old('status') == '1' ? 'selected' : ($product->status == false ? 'selected' : '') }}>
                                            Indisponível</option>
                                    </select>
                                </label>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Precificação e Valores</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Valor de Venda:</span>
                                            <input type="tel" name="sale_price" class="mask-money"
                                                value="{{ old('sale_price') ?? $product->sale_price }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Valor de Promoção:</span>
                                            <input type="tel" name="promotion_price" class="mask-money"
                                                value="{{ old('promotion_price') ?? $product->promotion_price }}" />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Características</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <label class="label">
                                        <span class="legend">Descrição do Produto:</span>
                                        <textarea name="description" cols="30" rows="10"
                                            class="mce">{{ old('description') ?? $product->description }}</textarea>
                                    </label>
                                </div>
                            </div>

                            <div class="app_collapse">
                                <div class="app_collapse_header mt-2 collapse">
                                    <h3>Endereço</h3>
                                    <span class="icon-plus-circle icon-notext"></span>
                                </div>

                                <div class="app_collapse_content d-none">
                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">CEP:</span>
                                            <input type="text" name="zipcode" class="zip_code_search"
                                                placeholder="Digite o CEP"
                                                value="{{ old('zipcode') ?? $product->zipcode }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">Endereço:</span>
                                        <input type="text" name="street" class="street" placeholder="Endereço Completo"
                                            value="{{ old('street') ?? $product->street }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                value="{{ old('number') ?? $product->number }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                value="{{ old('complement') ?? $product->complement }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                            value="{{ old('neighborhood') ?? $product->neighborhood }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                value="{{ old('state') ?? $product->state }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                value="{{ old('city') ?? $product->city }}" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="structure" class="d-none">
                            <h3 class="mb-2">Cores disponíveis</h3>
                            <div class="label_g5">
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="white"
                                            {{ old('white') == 'on' || old('white') == true ? 'checked' : ($product->white == true ? 'checked' : '') }}><span>Branco</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="black"
                                            {{ old('black') == 'on' || old('black') == true ? 'checked' : ($product->black == true ? 'checked' : '') }}><span>Preto</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="blue"
                                            {{ old('blue') == 'on' || old('blue') == true ? 'checked' : ($product->blue == true ? 'checked' : '') }}><span>Azul</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="green"
                                            {{ old('green') == 'on' || old('green') == true ? 'checked' : ($product->green == true ? 'checked' : '') }}><span>Verde</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="yellow"
                                            {{ old('yellow') == 'on' || old('yellow') == true ? 'checked' : ($product->yellow == true ? 'checked' : '') }}><span>Amarelo</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="red"
                                            {{ old('red') == 'on' || old('red') == true ? 'checked' : ($product->red == true ? 'checked' : '') }}><span>Vermelho</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="pink"
                                            {{ old('pink') == 'on' || old('pink') == true ? 'checked' : ($product->pink == true ? 'checked' : '') }}><span>Rosa</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="purple"
                                            {{ old('purple') == 'on' || old('purple') == true ? 'checked' : ($product->purple == true ? 'checked' : '') }}><span>Roxo</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="gray"
                                            {{ old('gray') == 'on' || old('gray') == true ? 'checked' : ($product->gray == true ? 'checked' : '') }}><span>Cinza</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="brown"
                                            {{ old('brown') == 'on' || old('brown') == true ? 'checked' : ($product->brown == true ? 'checked' : '') }}><span>Marrom</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="beige"
                                            {{ old('beige') == 'on' || old('beige') == true ? 'checked' : ($product->beige == true ? 'checked' : '') }}><span>Bege</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="silver"
                                            {{ old('silver') == 'on' || old('silver') == true ? 'checked' : ($product->silver == true ? 'checked' : '') }}><span>Prata</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="golden"
                                            {{ old('golden') == 'on' || old('golden') == true ? 'checked' : ($product->golden == true ? 'checked' : '') }}><span>Dourado</span>
                                    </label>
                                </div>

                                <h3 class="mt-2 mb-1">Informações do Site</h3>

                                <label class="label">
                                    <span class="legend">*Título: <a href="" target="_blank" class="text-orange icon-link"
                                            style=" margin-left: 10px; font-size: 0.875em;">Link</a></span>
                                    <input type="text" name="title" value="{{ old('title') ?? $product->title }}">
                                </label>

                                <label class="label">
                                    <span class="legend">Subtítulo(Headline):</span>
                                    <input type="text" name="headline"
                                        value="{{ old('headline') ?? $product->headline }}">
                                </label>

                                <div class="label_g">
                                    <label class="label">
                                        <span class="legend">Avaliação no Mercado</span>
                                        <select name="experience" class="select2">
                                            <option value="Excelente"
                                                {{ old('experience') == 'Excelente' ? 'selected' : ($product->experience == 'Excelente' ? 'selected' : '') }}>
                                                Excelente</option>
                                            <option value="Ótimo"
                                                {{ old('experience') == 'Ótimo' ? 'selected' : ($product->experience == 'Ótimo' ? 'selected' : '') }}>
                                                Ótimo</option>
                                            <option value="Bom"
                                                {{ old('experience') == 'Bom' ? 'selected' : ($product->experience == 'Bom' ? 'selected' : '') }}>
                                                Bom</option>
                                            <option value="Ok"
                                                {{ old('experience') == 'Ok' ? 'selected' : ($product->experience == 'Ok' ? 'selected' : '') }}>
                                                Ok</option>
                                            <option value="Ruim"
                                                {{ old('experience') == 'Ruim' ? 'selected' : ($product->experience == 'Ruim' ? 'selected' : '') }}>
                                                Ruim</option>
                                            <option value="Péssimo"
                                                {{ old('experience') == 'Péssimo' ? 'selected' : ($product->experience == 'Péssimo' ? 'selected' : '') }}>
                                                Péssimo</option>
                                        </select>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div id="images" class="d-none">
                            <label class="label">
                                <span class="legend">Imagens</span>
                                <input type="file" name="files[]" multiple>
                            </label>

                            <div class="content_image"></div>

                            <div class="product_image">
                                @foreach ($product->images()->get() as $image)
                                    <div class="product_image_item">
                                        <img src="{{ $image->url_cropped }}" alt="">
                                        <div class="product_image_actions">
                                            <a href="javascript:void(0)"
                                                class="btn btn-small {{ $image->cover == true ? 'btn-green' : '' }} icon-check icon-notext image-set-cover"
                                                data-action="{{ route('admin.products.imageSetCover', ['image' => $image->id]) }}"></a>
                                            <a href="javascript:void(0)"
                                                class="btn btn-small btn-red icon-times icon-notext image-remove"
                                                data-action="{{ route('admin.products.imageRemove', ['image' => $image->id]) }}"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Atualizar Produto</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@section('js')

    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[name="files[]"]').change(function(files) {

                $('.content_image').text('');

                $.each(files.target.files, function(key, value) {
                    var reader = new FileReader();
                    reader.onload = function(value) {
                        $('.content_image').append(
                            '<div class="product_image_item">' +
                            '<div class="embed radius" ' +
                            'style="background-image: url(' + value.target.result +
                            '); background-size: cover; background-position: center center;">' +
                            '</div>' +
                            '</div>');
                    };
                    reader.readAsDataURL(value);
                });
            });

            $('.image-set-cover').click(function(event) {
                event.preventDefault();

                var button = $(this);

                $.post(button.data('action'), {}, function(response) {
                    if (response.success === true) {
                        $('.product_image').find('a.btn-green').removeClass('btn-green');
                        button.addClass('btn-green');
                    }
                }, 'json');
            });

            $('.image-remove').click(function(event) {
                event.preventDefault();

                var button = $(this);

                $.ajax({
                    url: button.data('action'),
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {

                        if (response.success === true) {
                            button.closest('.product_image_item').fadeOut(function() {
                                $(this).remove();
                            });
                        }
                    }
                })
            });
        });
    </script>

@endsection

@endsection
