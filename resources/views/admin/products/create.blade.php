@extends('admin.master.master')

@section('content')

    <section class="dash_content_app">

        <header class="dash_content_app_header">
            <h2 class="icon-search">Cadastrar Novo Produto</h2>

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

                <form action="{{ route('admin.products.store') }}" method="post" class="app_form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="nav_tabs_content">
                        <div id="data">
                            <div class="label_g2">
                                <label class="label">
                                    <span class="legend">Categoria:</span>
                                    <select name="category" class="select2">
                                        <option value="Notebook" {{ old('category') == 'Notebook' ? 'selected' : '' }}>
                                            Notebook</option>
                                        <option value="Smartphone" {{ old('category') == 'Smartphone' ? 'selected' : '' }}>
                                            Smartphone</option>
                                        <option value="Tablet" {{ old('category') == 'Tablet' ? 'selected' : '' }}>
                                            Tablet</option>
                                    </select>
                                </label>

                                <label class="label">
                                    <span class="legend">Marca:</span>
                                    <select name="type" class="select2">
                                        <optgroup label="Notebook">
                                            <option value="Acer" {{ old('type') == 'Acer' ? 'selected' : '' }}>
                                                Acer</option>
                                            <option value="Alienware" {{ old('type') == 'Alienware' ? 'selected' : '' }}>
                                                Alienware</option>
                                            <option value="Apple" {{ old('type') == 'Apple' ? 'selected' : '' }}>
                                                Apple</option>
                                            <option value="Asus" {{ old('type') == 'Asus' ? 'selected' : '' }}>
                                                Asus</option>
                                            <option value="Dell" {{ old('type') == 'Dell' ? 'selected' : '' }}>
                                                Dell</option>
                                            <option value="eMachines" {{ old('type') == 'eMachines' ? 'selected' : '' }}>
                                                eMachines</option>
                                            <option value="Gateway" {{ old('type') == 'Gateway' ? 'selected' : '' }}>
                                                Gateway</option>
                                            <option value="Gigabyte" {{ old('type') == 'Gigabyte' ? 'selected' : '' }}>
                                                Gigabyte</option>
                                            <option value="HP" {{ old('type') == 'HP' ? 'selected' : '' }}>
                                                HP</option>
                                            <option value="Lenovo" {{ old('type') == 'Lenovo' ? 'selected' : '' }}>
                                                Lenovo</option>
                                            <option value="Positivo" {{ old('type') == 'Positivo' ? 'selected' : '' }}>
                                                Positivo</option>
                                            <option value="VAIO" {{ old('type') == 'VAIO' ? 'selected' : '' }}>
                                                VAIO
                                            </option>
                                        </optgroup>
                                        <optgroup label="Smartphone">
                                            <option value="Apple" {{ old('type') == 'Apple' ? 'selected' : '' }}>
                                                Apple</option>
                                            <option value="Samsung" {{ old('type') == 'Samsung' ? 'selected' : '' }}>
                                                Samsung</option>
                                            <option value="Xiaomi" {{ old('type') == 'Xiaomi' ? 'selected' : '' }}>
                                                Xiaomi</option>
                                            <option value="Motorola" {{ old('type') == 'Motorola' ? 'selected' : '' }}>
                                                Motorola</option>
                                            <option value="Realme" {{ old('type') == 'Realme' ? 'selected' : '' }}>
                                                Realme</option>
                                            <option value="Huawei" {{ old('type') == 'Huawei' ? 'selected' : '' }}>
                                                Huawei</option>
                                            <option value="Google" {{ old('type') == 'Google' ? 'selected' : '' }}>
                                                Google</option>
                                            <option value="OnePlus" {{ old('type') == 'OnePlus' ? 'selected' : '' }}>
                                                OnePlus</option>
                                            <option value="Nokia" {{ old('type') == 'Nokia' ? 'selected' : '' }}>
                                                Nokia</option>
                                            <option value="Sony" {{ old('type') == 'Sony' ? 'selected' : '' }}>
                                                Sony</option>
                                            <option value="Asus" {{ old('type') == 'Asus' ? 'selected' : '' }}>
                                                Asus</option>
                                            <option value="LG" {{ old('type') == 'LG' ? 'selected' : '' }}>
                                                LG</option>
                                        </optgroup>
                                        <optgroup label="Tablet">
                                            <option value="Samsung" {{ old('type') == 'Samsung' ? 'selected' : '' }}>
                                                Samsung</option>
                                            <option value="Acer" {{ old('type') == 'Acer' ? 'selected' : '' }}>
                                                Acer</option>
                                            <option value="Microsoft" {{ old('type') == 'Microsoft' ? 'selected' : '' }}>
                                                Microsoft</option>
                                            <option value="Asus" {{ old('type') == 'Asus' ? 'selected' : '' }}>
                                                Asus</option>
                                            <option value="Motorola" {{ old('type') == 'Motorola' ? 'selected' : '' }}>
                                                Motorola</option>
                                            <option value="Sony" {{ old('type') == 'Sony' ? 'selected' : '' }}>
                                                Sony</option>
                                            <option value="BlackBerry" {{ old('type') == 'BlackBerry' ? 'selected' : '' }}>
                                                BlackBerry</option>
                                            <option value="Dell" {{ old('type') == 'Dell' ? 'selected' : '' }}>
                                                Dell</option>
                                        </optgroup>
                                    </select>
                                </label>
                            </div>

                            <label class="label">
                                <span class="legend">Proprietário do Produto:</span>
                                <select name="user" class="select2">
                                    <option value="">Selecione o usuário que é o dono desse produto, ele deve um
                                        Administrador </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} -
                                            {{ $user->admin === 1 ? 'Administrador' : 'Cliente' }}</option>
                                    @endforeach
                                </select>
                            </label>

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
                                                value="{{ old('sale_price') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Valor de Promoção:</span>
                                            <input type="tel" name="promotion_price" class="mask-money"
                                                value="{{ old('promotion_price') }}" />
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
                                            class="mce">{{ old('description') }}</textarea>
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
                                                placeholder="Digite o CEP" value="{{ old('zipcode') }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">Endereço:</span>
                                        <input type="text" name="street" class="street" placeholder="Endereço Completo"
                                            value="{{ old('street') }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Número:</span>
                                            <input type="text" name="number" placeholder="Número do Endereço"
                                                value="{{ old('number') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Complemento:</span>
                                            <input type="text" name="complement" placeholder="Completo (Opcional)"
                                                value="{{ old('complement') }}" />
                                        </label>
                                    </div>

                                    <label class="label">
                                        <span class="legend">Bairro:</span>
                                        <input type="text" name="neighborhood" class="neighborhood" placeholder="Bairro"
                                            value="{{ old('neighborhood') }}" />
                                    </label>

                                    <div class="label_g2">
                                        <label class="label">
                                            <span class="legend">Estado:</span>
                                            <input type="text" name="state" class="state" placeholder="Estado"
                                                value="{{ old('state') }}" />
                                        </label>

                                        <label class="label">
                                            <span class="legend">Cidade:</span>
                                            <input type="text" name="city" class="city" placeholder="Cidade"
                                                value="{{ old('city') }}" />
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
                                            {{ old('white') == 'on' || old('white') == true ? 'checked' : '' }}><span>Branco</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="black"
                                            {{ old('black') == 'on' || old('black') == true ? 'checked' : '' }}><span>Preto</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="blue"
                                            {{ old('blue') == 'on' || old('blue') == true ? 'checked' : '' }}><span>Azul</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="green"
                                            {{ old('green') == 'on' || old('green') == true ? 'checked' : '' }}><span>Verde</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="yellow"
                                            {{ old('yellow') == 'on' || old('yellow') == true ? 'checked' : '' }}><span>Amarelo</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="red"
                                            {{ old('red') == 'on' || old('red') == true ? 'checked' : '' }}><span>Vermelho</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="pink"
                                            {{ old('pink') == 'on' || old('pink') == true ? 'checked' : '' }}><span>Rosa</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="purple"
                                            {{ old('purple') == 'on' || old('purple') == true ? 'checked' : '' }}><span>Roxo</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="gray"
                                            {{ old('gray') == 'on' || old('gray') == true ? 'checked' : '' }}><span>Cinza</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="brown"
                                            {{ old('brown') == 'on' || old('brown') == true ? 'checked' : '' }}><span>Marrom</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="beige"
                                            {{ old('beige') == 'on' || old('beige') == true ? 'checked' : '' }}><span>Bege</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="silver"
                                            {{ old('silver') == 'on' || old('silver') == true ? 'checked' : '' }}><span>Prata</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="label">
                                        <input type="checkbox" name="golden"
                                            {{ old('golden') == 'on' || old('golden') == true ? 'checked' : '' }}><span>Dourado</span>
                                    </label>
                                </div>
                            </div>
                            <div class="label_g3">

                                <h3 class="mt-2 mb-1">Informações do Site</h3>

                                <label class="label">
                                    <span class="legend">*Título: <a href="#" target="_blank" class="text-orange icon-link"
                                            style=" margin-left: 10px; font-size: 0.875em;">Link</a></span>
                                    <input type="text" name="title" value="{{ old('title') }}">
                                </label>

                                <label class="label">
                                    <span class="legend">Subtítulo(Headline):</span>
                                    <input type="text" name="headline" value="{{ old('headline') }}">
                                </label>

                                <div class="label_g">
                                    <label class="label">
                                        <span class="legend">Avaliação no Mercado</span>
                                        <select name="experience" class="select2">
                                            <option value="Excelente" {{ old('experience') == 'Excelente' ? 'selected' : '' }}>
                                                Excelente</option>
                                            <option value="Ótimo" {{ old('experience') == 'Ótimo' ? 'selected' : '' }}>
                                                Ótimo</option>
                                            <option value="Bom" {{ old('experience') == 'Bom' ? 'selected' : '' }}>
                                                Bom</option>
                                            <option value="Ok" {{ old('experience') == 'Ok' ? 'selected' : '' }}>
                                                Ok</option>
                                            <option value="Ruim" {{ old('experience') == 'Ruim' ? 'selected' : '' }}>
                                                Ruim</option>
                                            <option value="Péssimo" {{ old('experience') == 'Péssimo' ? 'selected' : '' }}>
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
                        </div>
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-large btn-green icon-check-square-o">Criar Produto</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@section('js')

    <script>
        $(function() {
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

            // MASK
            var cellMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                cellOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(cellMaskBehavior.apply({}, arguments), options);
                    }
                };
        });
    </script>

@endsection

@endsection
