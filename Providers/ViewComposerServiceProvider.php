<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('client::index', 'Modules\Client\Http\ViewComposers\IndexComposer');
		View::composer('client::edit', 'Modules\Client\Http\ViewComposers\EditComposer');
	}

	public function register() {
        //
	}

}
