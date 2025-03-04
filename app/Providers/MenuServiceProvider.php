<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $role = Session::get('role'); // Ensure the role is set during login

    // Determine which menu to load based on the role
    if ($role === 'Admin') {
      $menuFile = 'verticalMenuAdmin.json';
    } else {
      $menuFile = 'verticalMenu.json';
    }

    // Load the appropriate menu file
    $menuJson = file_get_contents(base_path("resources/menu/{$menuFile}"));
    $menuData = json_decode($menuJson);

    // Share the menu data with all views
    \View::share('menuData', [$menuData]);
  }
}
