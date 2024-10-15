<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Exemplo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importação do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Inclusão do JavaScript -->
    <script src="{{ asset('js/scriptsprodutos.js') }}"></script>



    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        .product-card {
            background-color: #e0e0e0;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            /* Espaçamento entre as linhas */
            max-width: 335px;
            /* Largura máxima dos cards */
        }

        .product-card img {
            width: 75%;
            height: 250px;
            /* Ajuste a altura da imagem */
            object-fit: cover;
            /* Ajusta a imagem para cobrir o card */
        }

        .product-price {
            color: red;
            font-size: 24px;
            margin: 10px 0;
        }

        .product-name,
        .market-name {
            font-size: 16px;
            color: #333;
        }

        .product-card p {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }

        .product-review-label {
            margin-left: 5px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand me-auto" href="{{ route('home') }}">
                <img src="images/logo_tcc.png" alt="Logo" class="logo-image">
            </a>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('mercados') }}">Mercados</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="{{ route('produtos') }}">
                            Produtos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('cadastro_produto') }}">Cadastrar Produto</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Conta -->
            <a href="{{ route('register') }}" class="navbar-brand ms-auto">
                <img src="{{ asset('images/conta_tcc.png') }}" alt="Conta" class="conta-image">
            </a>

        </div>
    </nav>

    <!-- Seção de Produtos em Destaque -->
    <div class="container mt-5">
        <h2 class="text-start mb-4">Produtos em destaque</h2>

        <!-- Barra de Pesquisa -->
        <div class="container mt-4">
            <input type="text" id="produtoDigitado" class="form-control" placeholder="Pesquisar produto..." onkeyup="pesquisarProduto()"> <br>
            <input type="text" id="mercadoDigitado" class="form-control" placeholder="Pesquisar mercado..." onkeyup="pesquisarMercado()">
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="opcaoBarato" checked onchange="ordenarProdutos()">
            <label class="form-check-label" for="opcaoBarato">
                Organizar do mais barato ao mais caro
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="opcaoCaro" onchange="ordenarProdutos()">
            <label class="form-check-label" for="opcaoCaro">
                Organizar do mais caro ao mais barato
            </label>
        </div>

        <br>

        <!-- Produtos -->
        <div class="row" id="produtos-container">
            <div class="col-lg-4 col-md-4">
                <div class="product-card">
                    <img src="images/pr_papel.png" alt="Imagem do Produto 1">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Sublime Softy's Papel Higiênico Azul 4 Rolos</p>
                        <p class="product-price">R$ 30,00</p>
                        <p class="market-name">Mercado Noemia</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="33"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="1"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 1) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 1) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel.png" alt="Imagem do Produto 2">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Sublime Softy's Papel Higiênico Azul 4 Rolos</p>
                        <p class="product-price">R$ 35,00</p>
                        <p class="market-name">Mercado Tietê</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="33"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="2"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 2) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 2) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel.png" alt="Imagem do Produto 3">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Sublime Softy's Papel Higiênico Azul 4 Rolos</p>
                        <p class="product-price">R$ 40,00</p>
                        <p class="market-name">Mercado Economix</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="33"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="3"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 3) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 3) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel.png" alt="Imagem do Produto 4">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Sublime Softy's Papel Higiênico Azul 4 Rolos</p>
                        <p class="product-price">R$ 45,00</p>
                        <p class="market-name">Mercado Atacadinho</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="33"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="4"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 4) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 4) // ID do mercado
                                ->where('id_produto', 33) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel2.png" alt="Imagem do Produto 5">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Papel Higiênico Personal Neutro Com 4 Rolos</p>
                        <p class="product-price">R$ 50,00</p>
                        <p class="market-name">Mercado Noemia</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="34"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="1"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 1) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 1) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel2.png" alt="Imagem do Produto 6">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Papel Higiênico Personal Neutro Com 4 Rolos</p>
                        <p class="product-price">R$ 55,00</p>
                        <p class="market-name">Mercado Tietê</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="34"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="2"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 2) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 2) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel2.png" alt="Imagem do Produto 7">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Papel Higiênico Personal Neutro Com 4 Rolos</p>
                        <p class="product-price">R$ 60,00</p>
                        <p class="market-name">Mercado Economix</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="34"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="3"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 3) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 3) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <img src="images/pr_papel2.png" alt="Imagem do Produto 8">
                    <div class="product-info">
                            <form action="{{ route('favoritar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produto" value="17">
                                <input type="hidden" name="id_mercado" value="1">
                                <button class="btn btn-danger favorite-button">
                                    <i class="far fa-heart heart-empty"></i>
                                    <i class="fas fa-heart heart-filled" style="display:none;"></i>
                                </button>
                            </form>
                        <br>
                        <p class="product-name">Papel Higiênico Personal Neutro Com 4 Rolos</p>
                        <p class="product-price">R$ 65,00</p>
                        <p class="market-name">Mercado Atacadinho</p>
                        <br>
                        <br>
                        <p class="product-review-label">Avalie a veracidade do preço do produto:</p>
                        <form action="{{ route('avaliacao_produto') }}" class="d-inline" method="POST">
                            <input type="hidden" name="id_produto" value="34"> <!-- ID do produto -->
                            <input type="hidden" name="id_mercado" value="4"> <!-- ID do mercado -->
                            @csrf
                            <div class="input-group input-group-sm">
                                <select name="avaliacao_preco" class="form-select" aria-label="Default select example">
                                    <option value="Correto">Correto</option>
                                    <option value="Incorreto">Incorreto</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search">Registrar</i> <br>
                                </button>
                                @php
                                // Contando as avaliações
                                $correto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Correto')
                                ->where('id_mercado', 4) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();

                                $incorreto = App\Models\AvaliacaoProduto::where('avaliacao_preco', 'Incorreto')
                                ->where('id_mercado', 4) // ID do mercado
                                ->where('id_produto', 34) // ID do produto
                                ->count();
                                @endphp
                                <h6 class="mt-4">Quantidade de Avaliações:</h6>
                                <p class="text-success">O preço está correto: <strong>{{ $correto }}</strong></p>
                                <p class="text-danger">O preço está incorreto: <strong>{{ $incorreto }}</strong></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>