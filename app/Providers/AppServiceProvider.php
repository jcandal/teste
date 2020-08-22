<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Claim;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;

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
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) 
        {
            if (Gate::allows('user-admin')) 
            {

                $event->menu->add('Administração do Sistema');
                $event->menu->add([
                    'text'        => 'Usuários',
                    'url'         => route('user.index'),
                    'label'       => User::count(),
                    'icon'        => 'far fa-fw fa-user',
                    'label_color' => 'info'
                ]);
    
                $event->menu->add([
                    'text'        => 'Perfis',
                    'url'         => 'admin/blog',
                    'label'       => Role::count(),
                    'icon'        => 'far fa-fw fa-address-book',
                    'label_color' => 'info',
                ]);

                $event->menu->add([
                    'text'        => 'Permissões',
                    'url'         => 'admin/blog',
                    'label'       => Claim::count(),
                    'icon'        => 'far fa-fw fa-hand-paper',
                    'label_color' => 'info',
                ]);
            }
        });
    }
}
