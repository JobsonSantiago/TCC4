// public/js/scriptsprodutos.js
console.log("Arquivo JS carregado!");

function pesquisar() {
    // Captura os valores dos inputs de pesquisa
    var inputProduto = document.getElementById('produtoDigitado').value.toLowerCase();
    var inputMercado = document.getElementById('mercadoDigitado').value.toLowerCase();
    var produtosEncontrados = document.getElementsByClassName('product-card'); // Seleciona todos os produtos

    // Loop para verificar cada produto
    for (var i = 0; i < produtosEncontrados.length; i++) {
        var produtoNome = produtosEncontrados[i].getElementsByClassName('product-name')[0].textContent.toLowerCase();
        var mercadoNome = produtosEncontrados[i].getElementsByClassName('market-name')[0].textContent.toLowerCase();

        // Verifica se o nome do produto e o nome do mercado contêm os textos digitados
        if (produtoNome.indexOf(inputProduto) > -1 && mercadoNome.indexOf(inputMercado) > -1) {
            produtosEncontrados[i].style.display = ""; // Mostra o produto
        } else {
            produtosEncontrados[i].style.display = "none"; // Esconde o produto
        }
    }
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

    const estrelas = document.querySelectorAll('.avaliacaoMercado1 i');
    const hiddenInput = document.getElementById('avaliacao_mercado1');

    estrelas.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            hiddenInput.value = value; // Set the value of the hidden input

            estrelas.forEach(s => {
                s.classList.remove('fas', 'far');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('fas');
                } else {
                    s.classList.add('far');
                }
            });
        });



    });

    const estrelas2 = document.querySelectorAll('.avaliacaoMercado2 i');
    const hiddenInput2 = document.getElementById('avaliacao_mercado2');
    estrelas2.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            hiddenInput2.value = value; // Set the value of the hidden input

            estrelas2.forEach(s => {
                s.classList.remove('fas', 'far');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('fas');
                } else {
                    s.classList.add('far');
                }
            });
        });
    });

    const estrelas3 = document.querySelectorAll('.avaliacaoMercado3 i');
    const hiddenInput3 = document.getElementById('avaliacao_mercado3');
    estrelas3.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            hiddenInput3.value = value; // Set the value of the hidden input

            estrelas3.forEach(s => {
                s.classList.remove('fas', 'far');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('fas');
                } else {
                    s.classList.add('far');
                }
            });
        });
    });

    const estrelas4 = document.querySelectorAll('.avaliacaoMercado4 i');
    const hiddenInput4 = document.getElementById('avaliacao_mercado4');
    estrelas4.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            hiddenInput4.value = value; // Set the value of the hidden input

            estrelas4.forEach(s => {
                s.classList.remove('fas', 'far');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('fas');
                } else {
                    s.classList.add('far');
                }
            });
        });
    });

});

