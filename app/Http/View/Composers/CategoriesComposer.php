<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * The user repository implementation.
     *
  
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->categories = Category::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
