<?php

namespace App\Providers;

use App\Http\Middleware\SaveLocaleMiddleware;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        require_once __DIR__.'/../Helpers/Helpers.php';

//        $file = app_path('Helpers/Helpers.php');
//        if(file_exists($file)) {
//            require_once ($file);
//        }

//        foreach (glob(app_path().'/Helpers/*.php') as $file) {
//            require_once ($file);
//        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootMailConfig();
        $this->registerMiddleware();
        Paginator::useBootstrap();
    }

    protected function registerMiddleware()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', SaveLocaleMiddleware::class);

    }

    public function bootMailConfig()
    {
        // $config = $this->app['config'];

        // $defaultConfigMail = $config->get('mail');

        // $newConfigMail = [
        //     'default' => setting('mail_driver') ?? env('MAIL_DRIVER', 'smtp'),
        //     'mailers' => [
        //         'smtp' => [
        //             'transport' => 'smtp',
        //             'host' => setting('mail_host') ?? env('MAIL_HOST', 'smtp.mailgun.org'),
        //             'port' => setting('mail_port') ?? env('MAIL_PORT', 587),
        //             'encryption' => setting('mail_encryption') ?? env('MAIL_ENCRYPTION', 'tls'),
        //             'username' => setting('mail_username') ?? env('MAIL_USERNAME'),
        //             'password' => setting('mail_password') ?? env('MAIL_PASSWORD'),
        //         ],
        //         'ses' => [
        //             'transport' => 'ses',
        //         ],
        //     ],
        //     'from' => [
        //         'address' => setting('mail_address') ?? env('MAIL_FROM_ADDRESS', 'noreply.newnet@gmail.com'),
        //         'name' => setting('mail_name') ?? env('MAIL_FROM_NAME', 'Newnet'),
        //     ],
        // ];

        // $this->app['config']->set('mail', array_merge($defaultConfigMail, $newConfigMail));

        // $defaultConfigService = $config->get('services');

        // $newConfigService = [
        //     'ses' => [
        //         'key' => setting('mail_key') ?? env('AWS_ACCESS_KEY_ID'),
        //         'secret' => setting('mail_secret') ?? env('AWS_SECRET_ACCESS_KEY'),
        //         'region' => setting('mail_region') ?? env('AWS_DEFAULT_REGION', 'us-east-1'),
        //     ],
        // ];

        // $this->app['config']->set('services', array_merge($defaultConfigService, $newConfigService));
    }
}
