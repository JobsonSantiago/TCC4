<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Valor do Produto</title>

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
        <a class="navbar-brand me-auto" href="#">
            <img src="images/logo_tcc.png" alt="Logo" class="logo-image">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('mercados') }}">Mercados</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('produtos') }}">Produtos</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('cadastro_produto') }}">Cadastrar Produto</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a href="{{ route('login') }}" class="navbar-brand ms-auto">
            <img src="images/conta_tcc.png" alt="Conta" class="conta-image">
        </a>
    </div>
</nav>

<!-- Formulário de register de Valor do Produto -->
<div class="container mt-5">
    <h2 class="text-start mb-4">Cadastre o Valor do Produto</h2>
    
    <form method="POST" action="{{ route('cadastro_produto') }}">
        <!-- Produto -->
        <div class="mb-3">
            <label for="produto" class="form-label">Produto</label>
            <div class="input-group">
                <input type="text" class="form-control" id="produto_nome" name="produto_nome" placeholder="Selecione um produto" readonly>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#produtoModal">Selecionar Produto</button>
            </div>
        </div>

        <!-- Mercado -->
        <div class="mb-3">
            <label for="mercado" class="form-label">Mercado</label>
            <div class="input-group">
                <input type="text" class="form-control" id="mercado_nome" name="mercado_nome" placeholder="Selecione um mercado" readonly>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#mercadoModal">Selecionar Mercado</button>
            </div>
        </div>

        <!-- Valor do Produto -->
        <div class="mb-3">
            <label for="valor_produto" class="form-label">Valor do Produto</label>
            <input type="text" class="form-control" id="valor_produto" name="valor_produto" placeholder="Digite o valor do Produto">
        </div>

   <!-- Botão de Enviar -->
<div class="d-flex justify-content-center mt-4">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</div>



<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6p3dF8jZ8mDdpeDWjOU4n3dD3/21zWcJwFzY5MzAE+8n/Y1cnh8TwJXVzV1J7fgF" crossorigin="anonymous"></script>

</body>
</html>
