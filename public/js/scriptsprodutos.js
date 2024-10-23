console.log("Arquivo JS carregado!");

let produtosArray = []; // Array global para armazenar os produtos
let produtosVisiveis = []; // Array para armazenar os produtos atualmente visíveis

document.addEventListener('DOMContentLoaded', () => {
    console.log("DOM totalmente carregado");

    // Inicializa os produtos
    produtosArray = Array.from(document.getElementsByClassName('product-card'));
    produtosVisiveis = [...produtosArray]; // Preenche produtos visíveis com todos os produtos no início

    console.log("Produtos encontrados: ", produtosArray);

    // Adiciona eventos para os inputs de pesquisa
    const produtoInput = document.getElementById('produtoDigitado');
    const mercadoInput = document.getElementById('mercadoDigitado');
    
    if (produtoInput && mercadoInput) {
        produtoInput.addEventListener('input', pesquisar);
        mercadoInput.addEventListener('input', pesquisar);
    } else {
        console.log("Campos de input de pesquisa não foram encontrados.");
    }

    organizarProdutos(); // Chama a função de organizar produtos

    // Aplica as estrelas de avaliação inicialmente
    aplicarEventosEstrelas();
});

// Função para configurar as estrelas de avaliação
function configurarEstrelas(seletor, hiddenInputId) {
    const estrelas = document.querySelectorAll(seletor);
    const hiddenInput = document.getElementById(hiddenInputId);

    if (estrelas.length > 0 && hiddenInput) {
        console.log("Estrelas encontradas: ", estrelas);
        estrelas.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                hiddenInput.value = value; // Define o valor do input oculto
                console.log("Avaliação clicada: ", value);

                estrelas.forEach(s => {
                    s.classList.remove('fas', 'far');
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.add('fas'); // Adiciona a classe 'fas' para estrelas preenchidas
                    } else {
                        s.classList.add('far'); // Adiciona a classe 'far' para estrelas vazias
                    }
                });
            });
        });
    } else {
        console.log(`Estrelas ou input não encontrados para o seletor: ${seletor} e o hiddenInputId: ${hiddenInputId}`);
    }
}

// Função para reaplicar eventos de avaliação nas estrelas
function aplicarEventosEstrelas() {
    configurarEstrelas('.avaliacaoMercado1 i', 'avaliacao_mercado1');
    configurarEstrelas('.avaliacaoMercado2 i', 'avaliacao_mercado2');
    configurarEstrelas('.avaliacaoMercado3 i', 'avaliacao_mercado3');
    configurarEstrelas('.avaliacaoMercado4 i', 'avaliacao_mercado4');
}

// Função para pesquisar produtos
function pesquisar() {
    const inputProduto = document.getElementById('produtoDigitado').value.toLowerCase();
    const inputMercado = document.getElementById('mercadoDigitado').value.toLowerCase();

    // Filtra os produtos de acordo com a pesquisa
    produtosVisiveis = produtosArray.filter(produto => {
        const produtoNome = produto.getElementsByClassName('product-name')[0].textContent.toLowerCase();
        const mercadoNome = produto.getElementsByClassName('market-name')[0].textContent.toLowerCase();
        return produtoNome.includes(inputProduto) && mercadoNome.includes(inputMercado);
    });

    console.log("Produtos visíveis após pesquisa: ", produtosVisiveis);
    atualizarProdutosContainer(produtosVisiveis); // Atualiza o container com produtos visíveis
}

// Função para organizar produtos
function organizarProdutos() {
    const radios = document.querySelectorAll('input[name="flexRadioDefault"]');

    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.checked) {
                console.log("Opção de ordenação selecionada: ", this.id);
                let produtosOrdenados = [...produtosVisiveis]; // Cópia dos produtos visíveis

                produtosOrdenados.sort((a, b) => {
                    const precoA = parseFloat(a.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                    const precoB = parseFloat(b.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                    return this.id === 'opcaoBarato' ? precoA - precoB : precoB - precoA; // Ordena com base na opção selecionada
                });

                // Atualiza o container com os produtos organizados
                atualizarProdutosContainer(produtosOrdenados);
            }
        });
    });
}

// Função para atualizar o container de produtos
function atualizarProdutosContainer(produtos) {
    const produtosContainer = document.getElementById('produtos-container');
    produtosContainer.innerHTML = ''; // Limpa o container

    produtos.forEach(produto => {
        const colDiv = document.createElement('div'); // Cria um novo elemento div para a coluna
        colDiv.classList.add('col-lg-4', 'col-md-6', 'mb-4'); // Adiciona classes para estilo
        colDiv.appendChild(produto); // Adiciona o card dentro da nova coluna
        produtosContainer.appendChild(colDiv); // Adiciona a coluna ao container
    });

    // Reaplica os eventos das estrelas após a atualização dos produtos
    aplicarEventosEstrelas(); 
}
