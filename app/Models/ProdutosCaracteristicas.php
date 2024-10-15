<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class ProdutosCaracteristicas extends Model
    {
        use HasFactory;
    
        protected $table = 'produtos_caracteristicas'; // Nome da tabela no banco de dados
    
        protected $fillable = [
            'id_produto',
            'id_mercado',
            'preco',
        ];
    
        // Definição de relacionamento com o modelo Produto
        public function produto()
        {
            return $this->belongsTo(Produtos::class, 'id_produto', 'id_produto');
        }
    
        // Definição de relacionamento com o modelo Mercado
        public function mercado()
        {
            return $this->belongsTo(Mercados::class, 'id_mercado', 'id_mercado');
        }
    
        // Definição de relacionamento com AvaliacaoProduto
        public function avaliacao()
        {
            return $this->hasMany(AvaliacaoProduto::class, 'id_preco', 'id_preco');
        }
    }    
?>