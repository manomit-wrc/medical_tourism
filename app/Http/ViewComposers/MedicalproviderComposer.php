<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Hospital;

Class MedicalproviderComposer {
	public function compose(View $view)
	{
      $view->with('medicalprovider_lists', Hospital::orderByRaw("RAND()")->take(6)->get());
	}
}
