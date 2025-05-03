<!-- filepath: e:\Proyectos_Desarrollos\Restaurante\restaurant-system\resources\views\client\menu\index.blade.php -->
@extends('layouts.client')

@section('title', 'Restaurante - Bienvenidos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">Bienvenidos a nuestro restaurante</h1>
        <p class="text-lg text-gray-600 mt-4">Disfruta de la mejor comida de la ciudad</p>
    </div>

    <!-- Categorías destacadas -->
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-6">Nuestras categorías</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Sin imagen</span>
                </div>
                @endif
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-700 mb-4">{{ $category->description }}</p>
                    <a href="{{ route('menu.category', $category) }}" class="inline-block bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Ver productos</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Productos destacados -->
    <div>
        <h2 class="text-2xl font-semibold mb-6">Destacados del día</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Sin imagen</span>
                </div>
                @endif
                <div class="p-4">
                    <h3 class="font-bold text-xl mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-700 mb-2">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-lg font-bold text-red-600 mb-4">${{ number_format($product->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="flex">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Añadir al carrito</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection