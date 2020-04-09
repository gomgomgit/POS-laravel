<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		// 'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->registerPolicies();

		// Gate::define(Request('role') == 1, function ($user) {
		// 	return $user->Admin;
		// });

		Gate::define('isAdmin', function ($user) {
			return $user->role == 1;
		});

		Gate::define('isStaff', function ($user) {
			return $user->role == 2;
		});
	}
}
