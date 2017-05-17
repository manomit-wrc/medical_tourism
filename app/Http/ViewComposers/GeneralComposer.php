<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Procedure;
use App\Treatment;

Class GeneralComposer {
	public function compose(View $view)
	{
      $view->with('procedure_list', Procedure::get()->pluck('name','id'));
      $view->with('treatment_list', Treatment::get()->pluck('name','id'));
	}
}
