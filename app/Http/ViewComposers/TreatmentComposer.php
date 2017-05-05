<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Treatment;

Class TreatmentComposer {
	public function compose(View $view)
	{
      $view->with('treatment_lists', Treatment::orderByRaw("RAND()")->take(6)->get());
	}
}
