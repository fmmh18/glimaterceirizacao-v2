<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function( BuildingMenu $event ){
            $event->menu->add(['header' => 'Administração de Conteúdo','can' =>'isAdmin']);
            $menus = Menu::where('status',1)->get();
            foreach($menus as $menu):
                $event->menu->add([
                    'text' => $menu->title,
                    'url'  => 'dashboard/'.$menu->route,
                    'icon' => $menu->icon,
                    'can'  => 'isAdmin',
                ]);
            endforeach;

            $event->menu->add([
                'type'         => 'fullscreen-widget',
                'topnav_right' => true,
            ]);


            $event->menu->add(['header' => 'Administração de Imagens','can' => 'isAdmin']);
            $event->menu->add([
                'text' => 'Carousel',
                'url'  => 'dashboard/carousel',
                'icon' => 'far fa-images',
                'can'  => 'isAdmin',
            ]);
            $event->menu->add([
                'text' => 'Imagens',
                'url'  => 'dashboard/image',
                'icon' => 'far fa-images',
                'can'  => 'isAdmin',
            ]);

            $event->menu->add(['header' => 'Administração de Usuário','can' => 'isAdmin']);
            $event->menu->add([
                'text' => 'Usuários',
                'url'  => 'dashboard/usuario',
                'icon' => 'fas fa-users',
                'can'  => 'isAdmin',
            ]);

        });

    }
}
