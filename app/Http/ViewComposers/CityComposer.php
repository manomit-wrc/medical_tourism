<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\City;

Class CityComposer {
	public function compose(View $view)
	{
      //$view->with('city_lists', City::orderByRaw("RAND()")->take(5)->get()); //This will take random data from city
		$view->with('city_lists', City::whereIn('name', ['Kolkata', 'Chennai','Delhi','Mumbai'])->get());
	}
}
