<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Categorías') }}
            </h2>
            <a href="{{ route('categories.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-1"></i> Nueva Categoría
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(count($categories) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($categories as $category)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="relative h-48">
                                        @if($category->image)
                                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-utensils text-4xl text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="absolute top-0 right-0 p-2 flex space-x-1">
                                            <a href="{{ route('categories.edit', $category) }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $category->description }}</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-500">{{ $category->products->count() }} productos</span>
                                            <a href="{{ route('categories.show', $category) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                Ver detalles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $categories->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-folder-open text-5xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">No hay categorías disponibles</h3>
                            <p class="mt-1 text-sm text-gray-500">Comienza creando una nueva categoría para tus productos.</p>
                            <div class="mt-6">
                                <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-800 transition ease-in-out duration-150">
                                    <i class="fas fa-plus mr-2"></i> Crear categoría
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>