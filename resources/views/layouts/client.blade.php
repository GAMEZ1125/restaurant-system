<!-- filepath: e:\Proyectos_Desarrollos\Restaurante\restaurant-system\resources\views\layouts\client.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Restaurante')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div>
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-red-600">Restaurante</a>
                </div>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="{{ route('home') }}" class="text-gray-800 hover:text-red-600">Inicio</a></li>
                        <li><a href="{{ route('menu') }}" class="text-gray-800 hover:text-red-600">Menú</a></li>
                        <li><a href="{{ route('reservation') }}" class="text-gray-800 hover:text-red-600">Reservaciones</a></li>
                        <li>
                            <div class="relative">
                                <a href="{{ route('cart') }}" class="flex items-center text-gray-800 hover:text-red-600">
                                    <i class="fas fa-shopping-cart"></i>
                                    @if(Session::has('cart') && count(Session::get('cart')) > 0)
                                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                            {{ count(Session::get('cart')) }}
                                        </span>
                                    @endif
                                </a>
                            </div>
                        </li>
                        @auth
                            <li><a href="{{ route('account') }}" class="text-gray-800 hover:text-red-600">Mi Cuenta</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-gray-800 hover:text-red-600">Ingresar</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Restaurante</h3>
                    <p class="mb-4">La mejor experiencia gastronómica para tu paladar.</p>
                    <p class="mb-4">Dirección: Av. Principal #123</p>
                    <p>Teléfono: 123-456-7890</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Horario</h3>
                    <p class="mb-2">Lunes a Viernes: 11:00 - 22:00</p>
                    <p class="mb-2">Sábados: 11:00 - 23:00</p>
                    <p>Domingos: 12:00 - 21:00</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Enlaces</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-red-400">Sobre nosotros</a></li>
                        <li><a href="#" class="hover:text-red-400">Política de privacidad</a></li>
                        <li><a href="#" class="hover:text-red-400">Términos y condiciones</a></li>
                        <li><a href="#" class="hover:text-red-400">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; {{ date('Y') }} Restaurante. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>