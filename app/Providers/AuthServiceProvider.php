<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
         * 如果你的程序是需要前后端分离形式的OAuth认证而不是多平台认证那么你可以在routers()方法中传递一个匿名函数来自定定义自己需要注册的路由，
        我这里是前后端分离的认证形式，因此我只需要对我的前端一个Client提供Auth的认证，所以我只注册了获取Token的路由，同时我还为它自定义了前缀名。
        */
//        Passport::routes(function(RouteRegister $router) {
//            $router->forAccessTokens();
//        },['prefix' => 'api/oauth']);
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
