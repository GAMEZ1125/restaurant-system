<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de Administración
Route::prefix('admin')
    ->middleware(['auth', \App\Http\Middleware\CheckRole::class . ':admin'])
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        // Categorías
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        // Productos
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

        // Inventario
        Route::resource('inventory', App\Http\Controllers\Admin\InventoryController::class);
        Route::get('/inventory/low-stock', [App\Http\Controllers\Admin\InventoryController::class, 'lowStock'])->name('inventory.low-stock');

        // Movimientos de inventario
        Route::post('/inventory/{inventory}/add-stock', [App\Http\Controllers\Admin\InventoryController::class, 'addStock'])
            ->name('inventory.add-stock');
        Route::post('/inventory/{inventory}/remove-stock', [App\Http\Controllers\Admin\InventoryController::class, 'removeStock'])
            ->name('inventory.remove-stock');
        Route::get('/inventory/{inventory}/movements', [App\Http\Controllers\Admin\InventoryController::class, 'movements'])
            ->name('inventory.movements');

        // Ajustes de inventario
        Route::post('/inventory/{inventory}/adjust', [App\Http\Controllers\Admin\InventoryController::class, 'adjust'])
            ->name('inventory.adjust');

        // Reportes de inventario
        Route::get('/inventory/reports/movements', [App\Http\Controllers\Admin\InventoryController::class, 'movementsReport'])
            ->name('inventory.reports.movements');
        Route::get('/inventory/reports/valuation', [App\Http\Controllers\Admin\InventoryController::class, 'valuationReport'])
            ->name('inventory.reports.valuation');

        // Exportación de inventario
        Route::get('/inventory/export', [App\Http\Controllers\Admin\InventoryController::class, 'export'])
            ->name('inventory.export');

        // Rutas para mesas
        Route::resource('tables', App\Http\Controllers\Admin\TableController::class);
        Route::patch('/tables/{table}/status', [App\Http\Controllers\Admin\TableController::class, 'updateStatus'])->name('tables.update-status');
        Route::get('/map-tables', [App\Http\Controllers\Admin\TableController::class, 'map'])->name('tables.map');

        // Pedidos
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
        Route::patch('/orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');

        // Reservaciones
        Route::resource('reservations', App\Http\Controllers\Admin\ReservationController::class);

        // Reportes
        Route::get('/reports/sales', [App\Http\Controllers\Admin\ReportController::class, 'sales'])->name('reports.sales');
        Route::get('/reports/inventory', [App\Http\Controllers\Admin\ReportController::class, 'inventory'])->name('reports.inventory');
    });

// Rutas de Cliente
Route::get('/', [App\Http\Controllers\Client\MenuController::class, 'index'])->name('home');
Route::get('/menu', [App\Http\Controllers\Client\MenuController::class, 'all'])->name('menu');
Route::get('/menu/{category}', [App\Http\Controllers\Client\MenuController::class, 'category'])->name('menu.category');

// Carrito
Route::get('/cart', [App\Http\Controllers\Client\CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [App\Http\Controllers\Client\CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [App\Http\Controllers\Client\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [App\Http\Controllers\Client\CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [App\Http\Controllers\Client\CheckoutController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout/process', [App\Http\Controllers\Client\CheckoutController::class, 'process'])->middleware('auth')->name('checkout.process');
Route::get('/checkout/success', [App\Http\Controllers\Client\CheckoutController::class, 'success'])->name('checkout.success');

// Reservaciones
Route::get('/reservation', [App\Http\Controllers\Client\ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation', [App\Http\Controllers\Client\ReservationController::class, 'store'])->name('reservation.store');

// Área de cliente
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [App\Http\Controllers\Client\AccountController::class, 'index'])->name('account');
    Route::get('/orders', [App\Http\Controllers\Client\AccountController::class, 'orders'])->name('customer.orders');
    Route::get('/orders/{order}', [App\Http\Controllers\Client\AccountController::class, 'showOrder'])->name('customer.orders.show');
});

require __DIR__ . '/auth.php';
