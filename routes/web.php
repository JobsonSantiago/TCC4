<?php

use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\AvaliacaoProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PhpOption\Option;

//* Página inicial

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');


// Proteção de rotas para usuários autenticados (usando middleware auth)
Route::middleware('auth')->group(function () {
    // Exemplo de rota protegida
    Route::get('/cadastro_produto', function () {
        return view('cadastro_produto');
    })->name('cadastro_produto');

    //rota para registrar avaliação do preço dos produtos
    Route::post('/avaliacao_produto', [AvaliacaoProdutoController::class, 'avaliacao_produto'])->name('avaliacao_produto');
});

//rota que chama o metodo pesquisa no PesquisaController para que a página seja redirecionada
Route::get('/search', [PesquisaController::class, 'pesquisa'])->name('search');

//rotas de views
Route::get('/mercados', function () {
    return view('mercados');
})->name('mercados');

Route::get('/produtos', function () {
    return view('produtos');
})->name('produtos');


Route::get('/produtos_alimentos', function () {
    return view('produtos_alimentos');
})->name('produtos_alimentos');

Route::get('/produtos_higiene', function () {
    return view('produtos_higiene');
})->name('produtos_higiene');

Route::get('/produtos_bebidas', function () {
    return view('produtos_bebidas');
})->name('produtos_bebidas');

Route::get('/produtos_limpeza', function () {
    return view('produtos_limpeza');
})->name('produtos_limpeza');

Route::get('/arroz', function () {
    return view('arroz');
})->name('arroz');

Route::get('/feijao', function () {
    return view('feijao');
})->name('feijao');

Route::get('/arroz', function () {
    return view('arroz');
})->name('arroz');

Route::get('/acucar', function () {
    return view('acucar');
})->name('acucar');

Route::get('/sal', function () {
    return view('sal');
})->name('sal');

Route::get('/cafe', function () {
    return view('cafe');
})->name('cafe');

Route::get('/macarrao', function () {
    return view('macarrao');
})->name('macarrao');

Route::get('/farinhadetrigo', function () {
    return view('farinhadetrigo');
})->name('farinhadetrigo');

Route::get('/farinhatemperada', function () {
    return view('farinhatemperada');
})->name('farinhatemperada');

Route::get('/achocolatado', function () {
    return view('achocolatado');
})->name('achocolatado');

Route::get('/oleo', function () {
    return view('oleo');
})->name('oleo');

Route::get('/cremedeleite', function () {
    return view('cremedeleite');
})->name('cremedeleite');

Route::get('/molhodetomate', function () {
    return view('molhodetomate');
})->name('molhodetomate');

Route::get('/bolacha', function () {
    return view('bolacha');
})->name('bolacha');

Route::get('/leitecondensado', function () {
    return view('leitecondensado');
})->name('leitecondensado');

Route::get('/sabonete', function () {
    return view('sabonete');
})->name('sabonete');

Route::get('/pasta', function () {
    return view('pasta');
})->name('pasta');

Route::get('/papel', function () {
    return view('papel');
})->name('papel');

Route::get('/leite', function () {
    return view('leite');
})->name('leite');

Route::get('/suco', function () {
    return view('suco');
})->name('suco');

Route::get('/detergente', function () {
    return view('detergente');
})->name('detergente');

Route::get('/sabao', function () {
    return view('sabao');
})->name('sabao');

Route::get('/bombril', function () {
    return view('bombril');
})->name('bombril');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
