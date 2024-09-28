<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" id="favoritesContainer">
                <!-- Favoritos aparecerão aqui -->
                Meus Favoritos
                </div>
            </div>
        </div>
        
    </div>
    <script>
        // Carrega os favoritos do Local Storage ao carregar a página
        document.addEventListener('DOMContentLoaded', () => {
            const favoritesContainer = document.getElementById('favoritesContainer');
            const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

            // Exibe cada favorito
            favorites.forEach(favorite => {
                const card = document.createElement('div');
                card.className = 'col-lg-4 col-md-6';
                card.innerHTML = `
                    <div class="product-card">
                        <img src="${favorite.img}" alt="Imagem do Produto">
                        <div class="product-info">
                            <p class="product-name">${favorite.name}</p>
                            <p class="product-price">${favorite.price}</p>
                            <p class="market-name">${favorite.market}</p>
                        </div>
                    </div>
                `;
                favoritesContainer.appendChild(card);
            });
        });
    </script>
</x-app-layout>