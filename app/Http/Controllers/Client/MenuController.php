<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MenuController extends Controller
{
    /**
     * Muestra la página principal con categorías destacadas y productos
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        $featuredProducts = Product::where('is_available', true)
                            ->inRandomOrder()
                            ->take(6)
                            ->get();
        
        return view('client.menu.index', compact('categories', 'featuredProducts'));
    }

    /**
     * Muestra todo el menú
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $categories = Category::with(['products' => function($query) {
            $query->where('is_available', true);
        }])->orderBy('order', 'asc')->get();
        
        return view('client.menu.all', compact('categories'));
    }

    /**
     * Muestra productos de una categoría específica
     *
     * @param Category $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        $products = $category->products()
                    ->where('is_available', true)
                    ->get();
        
        return view('client.menu.category', compact('category', 'products'));
    }
}
