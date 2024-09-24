<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Exemplo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>

        .product-card {
            background-color: #e0e0e0;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px; /* Espaçamento entre as linhas */
            max-width: 335px; /* Largura máxima dos cards */
        }
        .product-card img {
            width: 95%;
            height: 250px; /* Ajuste a altura da imagem */
            object-fit: cover; /* Ajusta a imagem para cobrir o card */
        }
        .product-price {
            color: red;
            font-size: 24px;
            margin: 10px 0;
        }
        .product-name, .market-name {
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
        <script>
            function pesquisarProduto() {
                // Captura o valor do input de pesquisa
                var input = document.getElementById('produtoDigitado');
                var filter = input.value.toLowerCase(); // Transforma o texto em minúsculas para comparar
                var produtosEncontrados = document.getElementsByClassName('product-card'); // Seleciona todos os produtos

                // Loop para verificar cada produto
                for (var i = 0; i < produtosEncontrados.length; i++) {
                    var produtoNome = produtosEncontrados[i].getElementsByClassName('product-name')[0]; // Pega o nome do produto
                    var textoDigitado = produtoNome.textContent || produtoNome.innerText;

                    // Verifica se o nome do produto contém o texto digitado
                    if (textoDigitado.toLowerCase().indexOf(filter) > -1) {
                        produtosEncontrados[i].style.display = ""; // Mostra o produto
                    } else {
                        produtosEncontrados[i].style.display = "none"; // Esconde o produto
                    }
                }
            }
            function pesquisarMercado() {
                // Captura o valor do input de pesquisa
                var input = document.getElementById('mercadoDigitado');
                var filter = input.value.toLowerCase(); // Transforma o texto em minúsculas para comparar
                var mercadosEncontrados = document.getElementsByClassName('product-card'); // Seleciona todos os produtos

                // Loop para verificar cada Mercado
                for (var i = 0; i < mercadosEncontrados.length; i++) {
                    var mercadoNome = mercadosEncontrados[i].getElementsByClassName('market-name')[0]; // Pega o nome do Mercado
                    var textoDigitado = mercadoNome.textContent || mercadoNome.innerText;

                    // Verifica se o nome do Mercado contém o texto digitado
                    if (textoDigitado.toLowerCase().indexOf(filter) > -1) {
                        mercadosEncontrados[i].style.display = ""; // Mostra o Mercado
                    } else {
                        mercadosEncontrados[i].style.display = "none"; // Esconde o Mercado
                    }
                }
            }
        </script>
        <br>

    <!-- Produtos -->
    <div class="row">
       <!-- Produto 1 -->
       <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_suco1.png" alt="Imagem 1 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco2.png" alt="Imagem 2 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco3.png" alt="Imagem 3 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco4.png"alt="Imagem 4 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco5.png" alt="Imagem 5 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco6.png" alt="Imagem 6 do Produto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco7.png" alt="Imagem 7 do Produto 1">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco em Pó Tang 18g</p>
                    <p class="product-price">R$ 50,00</p>
                    <p class="market-name">Mercado Noemia</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>
        <!-- Produto 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_suco1.png" alt="Imagem 1 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco2.png" alt="Imagem 2 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco3.png" alt="Imagem 3 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco4.png"alt="Imagem 4 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco5.png" alt="Imagem 5 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco6.png" alt="Imagem 6 do Produto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco7.png" alt="Imagem 7 do Produto 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco em Pó Tang 18g</p>
                    <p class="product-price">R$ 50,00</p>
                    <p class="market-name">Mercado Tietê</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>
   <!-- Produto 3 -->
   <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_suco1.png" alt="Imagem 1 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco2.png" alt="Imagem 2 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco3.png" alt="Imagem 3 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco4.png"alt="Imagem 4 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco5.png" alt="Imagem 5 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco6.png" alt="Imagem 6 do Produto 3">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco7.png" alt="Imagem 7 do Produto 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco em Pó Tang 18g</p>
                    <p class="product-price">R$ 50,00</p>
                    <p class="market-name">Mercado Economix</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>
        <!-- Produto 4 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct4" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_suco1.png" alt="Imagem 1 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco2.png" alt="Imagem 2 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco3.png" alt="Imagem 3 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco4.png"alt="Imagem 4 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco5.png" alt="Imagem 5 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco6.png" alt="Imagem 6 do Produto 4">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_suco7.png" alt="Imagem 7 do Produto 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct4" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct4" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco em Pó Tang 18g</p>
                    <p class="product-price">R$ 50,00</p>
                    <p class="market-name">Mercado Atacadinho</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>
         <!-- Produto 5 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct5" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_sucoMID1.png" alt="Imagem 1 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID2.png" alt="Imagem 2 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID3.png" alt="Imagem 3 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID4.png" alt="Imagem 4 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID5.png" alt="Imagem 5 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID6.png" alt="Imagem 6 do Produto 5">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID7.png" alt="Imagem 7 do Produto 5">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct5" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct5" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco Em Pó Mid 20g</p>
                    <p class="product-price">R$ 50,00</p>
                    <p class="market-name">Mercado Noemia</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>

        <!-- Produto 6 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct6" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_sucoMID1.png" alt="Imagem 1 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID2.png" alt="Imagem 2 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID3.png" alt="Imagem 3 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID4.png" alt="Imagem 4 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID5.png" alt="Imagem 5 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID6.png" alt="Imagem 6 do Produto 6">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID7.png" alt="Imagem 7 do Produto 6">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct6" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct6" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco Em Pó Mid 20g</p>
                    <p class="product-price">R$ 55,00</p>
                    <p class="market-name">Mercado Tietê</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>

        <!-- Produto 7 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct7" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_sucoMID1.png" alt="Imagem 1 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID2.png" alt="Imagem 2 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID3.png" alt="Imagem 3 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID4.png" alt="Imagem 4 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID5.png" alt="Imagem 5 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID6.png" alt="Imagem 6 do Produto 7">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID7.png" alt="Imagem 7 do Produto 7">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct7" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct7" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco Em Pó Mid 20g</p>
                    <p class="product-price">R$ 52,00</p>
                    <p class="market-name">Mercado Economix</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>

        <!-- Produto 8 -->
        <div class="col-lg-4 col-md-6">
            <div class="product-card">
                <div id="carouselProduct8" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/pr_sucoMID1.png" alt="Imagem 1 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID2.png" alt="Imagem 2 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID3.png" alt="Imagem 3 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID4.png" alt="Imagem 4 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID5.png" alt="Imagem 5 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID6.png" alt="Imagem 6 do Produto 8">
                        </div>
                        <div class="carousel-item">
                            <img src="images/pr_sucoMID7.png" alt="Imagem 7 do Produto 8">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct8" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct8" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
                <div class="product-info">
                    <br>
                    <p class="product-name">Refresco Em Pó Mid 20g</p>
                    <p class="product-price">R$ 53,00</p>
                    <p class="market-name">Mercado Atacadinho</p>
                    <br>
                    <br>
                    <p class="product-review-label">Avalie o produto:</p>
                    <input type="text" class="form-control product-input" placeholder="Deixe sua avaliação">
                </div>
            </div>
        </div>

    </div> <!-- Fim da linha de produtos -->
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-vt0sVVDzHFC+6TvmndHDVp5hDmvZmnPte9aiO1VfeRo5OfylbZn0AosY7qEDdljM" crossorigin="anonymous"></script>

</body>
</html>
O que foi adicionado:

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
