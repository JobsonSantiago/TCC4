<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoProduto;
use App\Models\ProdutosCaracteristicas;

class AvaliacaoProdutoController extends Controller
{
    public function avaliacao_produto(Request $request)
{
    $validatedData = $request->validate([
        'avaliacao_preco' => 'required|string|in:Correto,Incorreto',
        'id_produto' => 'required|exists:produtos,id_produto', 
        'id_mercado' => 'required|exists:mercados,id_mercado', 
    ]);

    // Criando a avaliação no banco
    AvaliacaoProduto::create([
        'id_produto' => $request->id_produto,
        'id_mercado' => $request->id_mercado,
        'avaliacao_preco' => $request->avaliacao_preco,
    ]);

    return redirect()->back()->with('success', 'Avaliação registrada com sucesso!');
}

}

?>
