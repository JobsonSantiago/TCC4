// public/js/scriptsprodutos.js
console.log("Arquivo JS carregado!");

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

function favoritarProdutos() {

    // Seleciona todos os botões de favorito e adiciona um ouvinte de evento de clique a cada um
    document.querySelectorAll('.favorite-button').forEach(button => {
        button.addEventListener('click', () => {
            // Encontra o card do produto mais próximo do botão clicado
            const card = button.closest('.product-card');
            // Obtém o nome do produto a partir do card
            const name = card.querySelector('.product-name').innerText;
            // Obtém a lista de favoritos do localStorage ou cria um array vazio
            const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            // Verifica se o produto já está na lista de favoritos
            const isFavorite = favorites.some(fav => fav.name === name);

            if (isFavorite) {
                // Se o produto é favorito, altera a exibição dos ícones
                button.querySelector('.heartEmpty').style.display = 'inline'; // Exibe coração vazio
                button.querySelector('.heartFilled').style.display = 'none'; // Oculta coração preenchido
                // Remove o produto da lista de favoritos e atualiza o localStorage
                localStorage.setItem('favorites', JSON.stringify(favorites.filter(fav => fav.name !== name)));
            } else {
                // Se o produto não é favorito, altera a exibição dos ícones
                button.querySelector('.heartEmpty').style.display = 'none'; // Oculta coração vazio
                button.querySelector('.heartFilled').style.display = 'inline'; // Exibe coração preenchido
                // Adiciona o produto à lista de favoritos
                favorites.push({
                    name: name,
                    price: card.querySelector('.product-price').innerText,
                    market: card.querySelector('.market-name').innerText,
                    img: card.querySelector('img').src
                });
                // Atualiza o localStorage com a nova lista de favoritos
                localStorage.setItem('favorites', JSON.stringify(favorites));
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {

    function organizarProdutos() {
        const produtosArray = Array.from(document.getElementsByClassName('product-card'));
        const radios = document.querySelectorAll('input[name="flexRadioDefault"]');

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    if (this.id === 'opcaoBarato') {
                        produtosArray.sort((a, b) => {
                            const precoA = parseFloat(a.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                            const precoB = parseFloat(b.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                            return precoA - precoB;
                        });
                    } else if (this.id === 'opcaoCaro') {
                        produtosArray.sort((a, b) => {
                            const precoA = parseFloat(a.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                            const precoB = parseFloat(b.getElementsByClassName('product-price')[0].innerText.replace('R$', '').replace(',', '.').trim());
                            return precoB - precoA;
                        });
                    }

                    const produtosContainer = document.getElementById('produtos-container');
                    produtosContainer.innerHTML = ''; // Limpa o container antes de adicionar os produtos ordenados
                    produtosArray.forEach(produto => {
                        const colDiv = document.createElement('div'); // Cria um novo elemento div para a coluna
                        colDiv.classList.add('col-lg-4', 'col-md-6', 'mb-4'); // Adiciona classes para estilo
                        colDiv.appendChild(produto); // Adiciona o card dentro da nova coluna
                        produtosContainer.appendChild(colDiv); // Adiciona a coluna ao container
                    });
                }
            });
        });
    }

    // Chama a função quando o script é carregado
    organizarProdutos();
});

