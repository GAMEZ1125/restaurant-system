<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tarjetas de acceso rápido -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">
                
                <!-- Tarjeta Categorías -->
                <a href="/admin/categories" class="group relative overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500 group-hover:w-2 transition-all duration-300"></div>
                    <div class="relative p-5">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 text-blue-600 mr-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">Categorías</h3>
                                <p class="text-sm text-gray-500">Gestionar categorías de productos</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-sm font-medium text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Acceder</span>
                            <span class="text-blue-600 transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
                
                <!-- Tarjeta Productos -->
                <a href="/admin/products" class="group relative overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/20 to-green-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-500 group-hover:w-2 transition-all duration-300"></div>
                    <div class="relative p-5">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 p-3 rounded-full bg-emerald-100 text-emerald-600 mr-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h3.006a2.25 2.25 0 0 0 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-emerald-600 transition-colors duration-300">Productos</h3>
                                <p class="text-sm text-gray-500">Administrar catálogo de productos</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-sm font-medium text-emerald-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Acceder</span>
                            <span class="text-emerald-600 transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
                
                <!-- Tarjeta Inventario -->
                <a href="/admin/inventory" class="group relative overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-500 group-hover:w-2 transition-all duration-300"></div>
                    <div class="relative p-5">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 p-3 rounded-full bg-amber-100 text-amber-600 mr-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Inventario</h3>
                                <p class="text-sm text-gray-500">Control de stock y existencias</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-sm font-medium text-amber-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Acceder</span>
                            <span class="text-amber-600 transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
                <!-- Tarjeta Ordenes -->
                <a href="/admin/orders" class="group relative overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-r from-amber-500/20 to-yellow-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-500 group-hover:w-2 transition-all duration-300"></div>
                    <div class="relative p-5">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0 p-3 rounded-full bg-amber-100 text-amber-600 mr-4 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-amber-600 transition-colors duration-300">Órdenes</h3>
                                <p class="text-sm text-gray-500">Gestión de órdenes de pedidos</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-sm font-medium text-amber-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Acceder</span>
                            <span class="text-amber-600 transform translate-x-0 group-hover:translate-x-1 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Panel de bienvenida original -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Has iniciado sesión correctamente. Utiliza las tarjetas de acceso rápido para navegar.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
