<!-- filepath: e:\Proyectos_Desarrollos\Restaurante\restaurant-system\resources\views\client\menu\index.blade.php -->
@extends('layouts.client')

@section('title', 'Restaurante - Bienvenidos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Bienvenidos a nuestro restaurante</h1>
        <p class="text-lg text-gray-600 mt-2">Disfruta de la mejor comida de la ciudad</p>
    </div>

    <!-- Categorías en formato cápsula/sticker -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl md:text-2xl font-semibold">Nuestras categorías</h2>
            <a href="{{ route('menu') }}" class="text-red-600 hover:text-red-800 text-sm font-medium">
                Ver todas <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <!-- Cápsulas de categorías en formato sticker animado -->
        <div class="flex flex-wrap justify-center gap-4 md:gap-5">
            @foreach($categories as $category)
            <a href="{{ route('menu.category', $category) }}" 
               class="group w-24 sm:w-28 md:w-32 text-center transform transition-all duration-300 hover:scale-110">
                <div class="mx-auto w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 rounded-full bg-white shadow-md overflow-hidden border-2 border-red-100 mb-2 
                          transition-all duration-300 hover:shadow-lg hover:border-red-300">
                    @if($category->image)
                    <div class="w-full h-full overflow-hidden">
                        <img src="{{ asset('storage/' . $category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-full object-cover"
                             loading="lazy">
                    </div>
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-red-50 to-red-100 flex items-center justify-center">
                        <i class="fas fa-utensils text-red-400"></i>
                    </div>
                    @endif
                </div>
                <h3 class="text-xs sm:text-sm font-medium truncate">{{ $category->name }}</h3>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Productos destacados con el mismo formato de tarjetas de categorías de admin -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl md:text-2xl font-semibold">Destacados del día</h2>
            <a href="{{ route('menu') }}" class="text-red-600 hover:text-red-800 text-sm font-medium">
                Ver todo el menú <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        
        <!-- Grid de productos al estilo de categorías admin -->
        <div class="flex flex-wrap justify-center sm:justify-start gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition duration-300 ease-in-out transform hover:shadow-lg hover:-translate-y-1 w-full sm:w-64 md:w-72 lg:w-64 xl:w-72">
                <div class="relative bg-gray-50">
                    <!-- Contenedor de imagen con altura fija -->
                    @if($product->image)
                    <div class="h-40 overflow-hidden">
                        <img 
                            class="w-full h-full object-cover transition-transform duration-500 ease-in-out hover:scale-110" 
                            src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}"
                            loading="lazy"
                        >
                        <div class="absolute top-2 right-2 bg-red-600 text-white text-sm font-bold py-1 px-3 rounded-full shadow">
                            ${{ number_format($product->price, 2) }}
                        </div>
                    </div>
                    @else
                    <div class="w-full h-40 bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center">
                        <i class="fas fa-utensils text-3xl text-gray-400"></i>
                    </div>
                    @endif
                    
                    <!-- Badge de categoría -->
                    <div class="absolute bottom-2 left-2">
                        <span class="bg-white bg-opacity-90 text-sm text-gray-700 py-1 px-2 rounded-full shadow-sm">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>
                
                <!-- Contenido con altura fija para mantener uniformidad -->
                <div class="p-4 h-[140px] flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-800 truncate">{{ $product->name }}</h3>
                        
                        <!-- Descripción con truncado elegante -->
                        <div class="mb-3 h-12 overflow-hidden">
                            <p class="text-gray-600 text-sm line-clamp-2">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="flex space-x-2">
                                <div class="relative w-20">
                                    <select name="quantity" class="w-full text-sm appearance-none bg-white border border-gray-300 rounded pl-2 pr-6 py-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                                <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white text-sm py-1 px-2 rounded flex items-center justify-center transition duration-200">
                                    <i class="fas fa-cart-plus mr-1"></i> Añadir
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Sección de Promociones con cápsulas alternando -->
    <div class="mb-12">
        <h2 class="text-xl md:text-2xl font-semibold mb-6">Promociones especiales</h2>
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="flex overflow-x-auto pb-2 space-x-4 no-scrollbar">
                <div class="flex-shrink-0 w-72 h-24 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center p-4 transform transition hover:scale-105">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-red-600 mr-4">
                        <i class="fas fa-pizza-slice text-xl"></i>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold">2x1 en Pizzas</h3>
                        <p class="text-sm text-red-100">Todos los martes</p>
                    </div>
                </div>
                
                <div class="flex-shrink-0 w-72 h-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center p-4 transform transition hover:scale-105">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-yellow-600 mr-4">
                        <i class="fas fa-hamburger text-xl"></i>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold">Combo Familiar</h3>
                        <p class="text-sm text-yellow-100">4 hamburguesas + papas</p>
                    </div>
                </div>
                
                <div class="flex-shrink-0 w-72 h-24 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center p-4 transform transition hover:scale-105">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-blue-600 mr-4">
                        <i class="fas fa-coffee text-xl"></i>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold">Café + Postre</h3>
                        <p class="text-sm text-blue-100">Por solo $9.99</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Información con iconos animados -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
        <div class="bg-white p-6 rounded-lg shadow-sm group hover:shadow-md transition-all">
            <div class="w-16 h-16 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 
                      transition-all duration-300 group-hover:scale-110 group-hover:bg-red-100">
                <i class="fas fa-clock text-2xl text-red-500 group-hover:animate-pulse"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Horario</h3>
            <p class="text-sm text-gray-600">Lunes a Domingo<br>12:00 - 22:00</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm group hover:shadow-md transition-all">
            <div class="w-16 h-16 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 
                      transition-all duration-300 group-hover:scale-110 group-hover:bg-red-100">
                <i class="fas fa-map-marker-alt text-2xl text-red-500 group-hover:animate-bounce"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Ubicación</h3>
            <p class="text-sm text-gray-600">Av. Principal #123<br>Ciudad</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm group hover:shadow-md transition-all">
            <div class="w-16 h-16 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 
                      transition-all duration-300 group-hover:scale-110 group-hover:bg-red-100">
                <i class="fas fa-phone-alt text-2xl text-red-500 group-hover:animate-tada"></i>
            </div>
            <h3 class="font-bold text-lg mb-2">Reservaciones</h3>
            <p class="text-sm text-gray-600">(123) 456-7890</p>
            <a href="{{ route('reservation') }}" class="mt-2 inline-block text-sm text-red-600 hover:text-red-800">
                Reservar ahora <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</div>

<!-- Añadir animación personalizada para el icono del teléfono -->
<style>
    @keyframes tada {
        0% {transform: scale(1);}
        10%, 20% {transform: scale(0.9) rotate(-3deg);}
        30%, 50%, 70%, 90% {transform: scale(1.1) rotate(3deg);}
        40%, 60%, 80% {transform: scale(1.1) rotate(-3deg);}
        100% {transform: scale(1) rotate(0);}
    }
    .group:hover .group-hover\:animate-tada {
        animation: tada 1s ease infinite;
    }
    
    /* Eliminar scrollbar pero mantener funcionalidad */
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
</style>
@endsection