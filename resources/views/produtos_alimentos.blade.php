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
        .circle-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px; /* Espaçamento entre os círculos e o texto abaixo */
        }
        .circle {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Fundo dos círculos */
            margin: 0 auto; /* Espaçamento entre os círculos */
            text-align: center;
        }
        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta a imagem para cobrir o círculo */
        }
        .highlight-text {
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 5px; /* Espaço entre a imagem e o texto */
        }
        .circle-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0; /* Espaço entre as linhas de círculos */
        }
        /* Ajuste o espaçamento entre o círculo da primeira linha e o círculo da linha abaixo */
        .row .col-4 {
            margin-bottom: 80px; /* Ajuste esse valor conforme necessário */
        }
        .row .col-4:last-child {
            margin-bottom: 0; /* Remove a margem inferior do último círculo da linha */
        }
        .circle-text {
            text-align: center;
            margin-top: 10px; /* Espaçamento entre o círculo e o texto */
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


<!-- Market Listings -->
<div class="container mt-5">
    <h2 class="text-start mb-4">Produtos em destaque</h2>
    <br>

    <div class="row text-center">
        <div class="col-12">

<!-- Primeira fileira de círculos -->
<div class="row">
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="arroz">
                <img src="images/pd_arroz_tcc.png" alt="Arroz">
            </a>
        </div>
        <h5> Arroz </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="feijao">
                <img src="images/pd_feijao_tcc.png" alt="Feijão">
            </a>
        </div>
        <h5> Feijão </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="acucar">
                <img src="images/pd_acucar_tcc.png" alt="Açúcar">
            </a>
        </div>
        <h5> Açúcar </h5>
        <br>
    </div>
</div>

<!-- Segunda fileira de círculos -->
<div class="row">
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="sal">
                <img src="images/pd_sal_tcc.png" alt="Sal">
            </a>
        </div>
        <h5> Sal </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="cafe">
                <img src="images/pd_cafe_tcc.png" alt="Café">
            </a>
        </div>
        <h5> Café </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="macarrao">
                <img src="images/pd_macarrao_tcc.png" alt="Macarrão">
            </a>
        </div>
        <h5> Macarrão </h5>
        <br>
    </div>
</div>

<!-- Terceira fileira de círculos -->
<div class="row">
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="farinhadetrigo">
                <img src="images/pd_farinhatrigo_tcc.png" alt="Farinha de Trigo">
            </a>
        </div>
        <h5> Farinha de Trigo </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="farinhatemperada">
                <img src="images/pd_farinhatemp_tcc.png" alt="Farinha Temperada">
            </a>
        </div>
        <h5> Farinha Temperada </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="achocolatado">
                <img src="images/pd_achocolatado_tcc.png" alt="Achocolatado em Pó">
            </a>
        </div>
        <h5> Achocolatado em Pó </h5>
        <br>
    </div>
</div>

<!-- Quarta fileira de círculos -->
<div class="row">
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="oleo">
                <img src="images/pd_oleo_tcc.png" alt="Óleo">
            </a>
        </div>
        <h5> Óleo </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="cremedeleite">
                <img src="images/pd_cremeleite_tcc.png" alt="CremeLeite">
            </a>
        </div>
        <h5> Creme de Leite </h5>
        <br>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="molhodetomate">
                <img src="images/pd_molhotomate_tcc.png" alt="MolhoTomate">
            </a>
        </div>
        <h5> Molho de Tomate </h5>
        <br>
    </div>
</div>

<!-- Quinta fileira de círculos -->
<div class="row">
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="bolacha">
                <img src="images/pd_bolacha_tcc.png" alt="Bolacha">
            </a>
        </div>
        <h5> Bolacha </h5>
    </div>
    <div class="col-4 mb-3">
        <div class="circle">
            <a href="leitecondensado">
                <img src="images/pd_leitecondensado_tcc.png" alt="LeiteCondensado">
            </a>
        </div>
        <h5> Leite Condensado </h5>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
