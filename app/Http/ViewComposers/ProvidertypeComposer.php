<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\ProviderType;

Class ProvidertypeComposer {
	public function compose(View $view)
	{
      $view->with('providertype_lists', ProviderType::orderByRaw("RAND()")->take(5)->get());
	}
}
