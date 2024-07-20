<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use DB;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('user.layouts.navbar', function ($view) {
            $categories = DB::table('kategori')
                ->leftJoin('tbstok', 'kategori.id', '=', 'tbstok.id_kategori')
                ->select('kategori.id', 'kategori.nama_kategori', DB::raw('count(tbstok.id_stok) as total_product'))
                ->groupBy('kategori.id', 'kategori.nama_kategori')
                ->get();

            $view->with('categories', $categories);
        });
    }

    public function register()
    {
        //
    }
}

