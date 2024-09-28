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
    @auth
    <div class="container text-center mt-3">
        <p class="alert alert-success">Bem-vindo, {{ Auth::user()->nome }}!</p>
    </div>
    @endauth
    @guest
    <div class="container text-center mt-3">
        <p class="alert alert-danger">Você não está logado.</p>
    </div>
    @endguest

    <!-- Barra de Pesquisa e opções -->
    <div class="container text-center mt-4">
        <form action="{{ route('search') }}" class="d-inline" method="GET">
            <div class="input-group input-group-lg">
                <select name = "pesquisaProdutos" class="form-select" aria-label="Default select example">
                    <option value ="0">Selecione o produto que deseja pesquisar:</option>
                    <option value="Achocolatado">Achocolatado</option>
                    <option value="Açúcar">Açúcar</option>
                    <option value="Arroz">Arroz</option>
                    <option value="Bolacha">Bolacha</option>
                    <option value="Bombril">Bombril</option>
                    <option value="Café">Café</option>
                    <option value="CremeDeLeite">Creme de Leite</option>
                    <option value="Detergente">Detergente</option>
                    <option value="FarinhaDeTrigo">Farinha de Trigo</option>
                    <option value="FarinhaTemperada">Farinha Temperada</option>
                    <option value="Feijão">Feijão</option>
                    <option value="Leite">Leite</option>
                    <option value="LeiteCondensado">Leite Condensado</option>
                    <option value="Macarrão">Macarrão</option>
                    <option value="MolhoDeTomate">Molho de Tomate</option>
                    <option value="Oleo">Óleo</option>
                    <option value="Papel">Papel</option>
                    <option value="Pasta">Pasta de Dente</option>
                    <option value="Sabão">Sabão</option>
                    <option value="Sabonete">Sabonete</option>
                    <option value="Suco">Suco</option>
                </select>
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search">Pesquisar</i>
                </button>
            </div>
        </form>
    </div>

    <!-- Banner Rotativo -->
    <div id="bannerCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/img_home1.png" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="images/banner2.jpg" class="d-block w-100" alt="Banner 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>

    <!-- Melhores Ofertas -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Melhores Ofertas</h2>

        <!-- Primeira linha de produtos -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/arroz_tcc.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Arroz Camil Tipo 1 Pacote 1kg</p>
                            <p class="card-price">R$10.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/feijao_tcc.png" class="card-img-top" alt="Produto 2">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Feijão Carioca Tipo 1 CAMIL Pacote 1kg</p>
                            <p class="card-price">R$12.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/acucar_tcc.png" class="card-img-top" alt="Produto 3">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Açúcar Refinado UNIÃO Pacote 1kg</p>
                            <p class="card-price">R$14.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segunda linha de produtos -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/cafe_tcc.png" class="card-img-top" alt="Produto 4">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Café Pilão Torrado E Moído Tradicional Almofada 250g</p>
                            <p class="card-price">R$16.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/oleo_tcc.png" class="card-img-top" alt="Produto 5">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Óleo De Soja SOYA Garrafa 900ml</p>
                            <p class="card-price">R$18.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-left">
                    <img src="images/cremedeleite_tcc.png" class="card-img-top" alt="Produto 6">
                    <div class="card-body">
                        <div class="product-info">
                            <p class="card-text">Creme de Leite ITALAC Caixa 200g</p>
                            <p class="card-price">R$20.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">

                <!-- Sobre Nós -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Sobre Nós</h5>
                    <p>
                        Somos uma empresa dedicada a trazer os melhores produtos para os nossos clientes com preços acessíveis e qualidade garantida.
                    </p>
                </div>

                <!-- Links Úteis -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Links Úteis</h5>
                    <p>
                        <a href="{{ route('home') }}" class="text-white" style="text-decoration: none;">home</a>
                    </p>
                    <p>
                        <a href="{{ route('mercados') }}" class="text-white" style="text-decoration: none;">Mercados</a>
                    </p>
                    <p>
                        <a href="{{ route('produtos') }}" class="text-white" style="text-decoration: none;">Produtos</a>
                    </p>
                    <p>
                        <a href="{{ route('cadastro_produto') }}" class="text-white" style="text-decoration: none;">Cadastrar Produto</a>
                    </p>
                </div>

                <!-- Contato -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contato</h5>
                    <p><i class="fas fa-home mr-3"></i> Rua Exemplo, 123, Cidade, País</p>
                    <p><i class="fas fa-envelope mr-3"></i> contato@empresa.com</p>
                    <p><i class="fas fa-phone mr-3"></i> +55 (11) 1234-5678</p>
                    <p><i class="fas fa-print mr-3"></i> +55 (11) 8765-4321</p>
                </div>

                <!-- Redes Sociais -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Siga-nos</h5>
                    <a href="#" class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" role="button"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" role="button"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" role="button"><i class="fab fa-linkedin"></i></a>
                </div>

            </div>

            <!-- Linha de separação -->
            <hr class="mb-4">

            <!-- Copyright -->
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p class="text-center text-md-left">© 2024 Copyright:
                        <a href="#" class="text-warning" style="text-decoration: none;">
                            <strong>Compare Bem</strong>
                        </a>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <p class="text-center text-md-right">
                        Desenvolvido por <class="text-warning" style="text-decoration: none;"><strong>Jobson, Samuel, João Vitor e Raphaela</strong></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Font Awesome (para ícones de redes sociais) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>