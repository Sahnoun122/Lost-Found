
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyMatch Transport </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Menu Burger pour mobile -->
    <button id="menuButton" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Sidebar avec classe pour mobile -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-6">EasyMatch Admin</h2>
            <nav>
                <a href="#" class="block py-2 px-4 bg-gray-700 rounded mb-2">Tableau de bord</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Utilisateurs</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Annonces</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Transactions</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded mb-2">Évaluations</a>
            </nav>
        </div>
    </aside>

    <!-- Overlay pour mobile -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Main Content avec ajustement responsive -->
    <main class="lg:ml-64 p-8">
        <!-- Header -->
        <header class="bg-white shadow rounded-lg p-4 mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Tableau de bord</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 hover:bg-gray-100 rounded-full">
                        <span class="sr-only">Notifications</span>
                        🔔
                    </button>
                    <div class="flex items-center">
                        <span class="text-sm mr-2">Admin</span>
                        <img src="/api/placeholder/32/32" alt="Admin" class="w-8 h-8 rounded-full" />
                    </div>
                </div>
            </div>



<div>
    @foreach ($annonce as $annon)
<div class=" grid grid-col2 max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ $annon->photos }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $annon->titre }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $annon->description }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $annon->date  }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $annon->lieu   }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $annon->email   }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $annon->phone   }}</p>
         <a href="{{ route('annonce.edit' , $annon->id)  }}"></a>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
@endforeach
</div>
        </header>


        <div class="container">
            @yield('main')
        </div>


<button data-modal-target="crud-modal"  onclick="btn()"  data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-5 ml-5" type="button">
    Demande
</button>

<!-- Modal -->
<div id="crud-modal"   tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Contenu de la modal -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- En-tête de la modal -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Creé demande
                </h3>
                <button type="button"  onclick="btn()"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>


            <form class="p-4 md:p-5" method="POST" action="/expiditeur/dashboard{id_expiditeur}">
    <div class="grid gap-4 mb-4 grid-cols-2">
        <!-- Champ Longueur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="longueur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longueur (en cm)</label>
            <input type="number" name="longueur" id="longueur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la longueur" required min="1">
        </div>

        <!-- Champ Largeur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="largeur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Largeur (en cm)</label>
            <input type="number" name="largeur" id="largeur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la largeur" required min="1">
        </div>

        <!-- Champ Hauteur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="hauteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hauteur (en cm)</label>
            <input type="number" name="hauteur" id="hauteur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la hauteur" required min="1">
        </div>

        <!-- Champ Poids -->
        <div class="col-span-2 sm:col-span-1">
            <label for="poids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poids (en kg)</label>
            <input type="number" name="poids" id="poids" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez le poids" required min="1">
        </div>

        <!-- Champ Départ -->
        <div class="col-span-2 sm:col-span-1">
            <label for="depart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu de départ</label>
            <input type="text" name="depart" id="depart" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez le lieu de départ" required>
        </div>

        <!-- Champ Destination -->
        <div class="col-span-2 sm:col-span-1">
            <label for="destination" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination</label>
            <input type="text" name="destination" id="destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la destination" required>
        </div>
    </div>



    <!-- Bouton de soumission -->
    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        Demander
    </button>
</form>
        </div>
    </div>
</div>
</div> 


        </div>
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Statistiques mensuelles</h3>
                <canvas id="monthlyStats" class="w-full h-64"></canvas>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Types de transactions</h3>
                <canvas id="transactionTypes" class="w-full h-64"></canvas>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Utilisateurs récents</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Utilisateur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="/api/placeholder/32/32" alt="" class="w-8 h-8 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium">Jean Dupont</div>
                                            <div class="text-sm text-gray-500">Conducteur</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">jean.dupont@example.com</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Vérifié
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-900">Éditer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>

const modal = document.querySelector("#crud-modal");
let isclick = true;
let btn = function() {
    if (isclick == 1) {
        modal.style.display = "block";
        isclick = 0;
    } else {
        modal.style.display = "none";
        isclick = 1;
    }
}


        // Logique du menu burger
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');
        let isMenuOpen = false;

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        menuButton.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Configuration des graphiques
        function initCharts() {
            const monthlyStatsCtx = document.getElementById('monthlyStats').getContext('2d');
            new Chart(monthlyStatsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Transactions',
                        data: [65, 59, 80, 81, 56, 55],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            const transactionTypesCtx = document.getElementById('transactionTypes').getContext('2d');
            new Chart(transactionTypesCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Colis', 'Meubles', 'Documents', 'Autres'],
                    datasets: [{
                        data: [30, 20, 25, 25],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // Initialisation des graphiques
        initCharts();


    </script>
</body>

</html>