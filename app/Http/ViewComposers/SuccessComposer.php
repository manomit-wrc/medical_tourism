<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\SuccessStories;

Class SuccessComposer {
	public function compose(View $view)
	{
      $view->with('successstory_lists', SuccessStories::where('status', '=', 1)->get());
	}
}
