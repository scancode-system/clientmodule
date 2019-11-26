<?php

namespace Modules\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Client\Http\ViewComposers\Settings\SettingComposer;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('client::index', 'Modules\Client\Http\ViewComposers\IndexComposer');
		View::composer('client::edit', 'Modules\Client\Http\ViewComposers\EditComposer');
		View::composer('client::create', 'Modules\Client\Http\ViewComposers\CreateComposer');
				// setting
		View::composer('client::loader.settings.body', SettingComposer::class);
	}

	public function register() {
        //
	}

}
