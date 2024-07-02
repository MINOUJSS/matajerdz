<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';
    public const SUPERADMINHOME = '/super-admin/dashboard';
    public const SUPPLIERHOME = '/supplier/dashboard';
    public const SELLERHOME = '/seller/dashboard';
    public const DROPSHIPERHOME = '/dropshiper/dashboard';
    public const LOCALLIVEREURHOME = '/local-livereur/dashboard';
    public const COMPANYLIVEREURHOME = '/company-livereur/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        
        //subdomain first here
        $this->mapSupplierSubdomainRoutes();
        $this->mapSellerSubdomainRoutes();
        $this->mapDropshiperSubdomainRoutes();
        //---------end subdomain
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //my Routes
        $this->mapSuperAdminRoutes();
        $this->mapLandingPageRoutes();
        $this->mapSupplierRoutes();
        $this->mapSellerRoutes();
        $this->mapDropshiperRoutes();
        $this->mapLocalLivereurRoutes();
        $this->mapCompanyLivereurRoutes();
        //sub domains
        

    }
    //---------subdomain first here
    protected function mapSupplierSubdomainRoutes()
    {
        Route::domain('{subdomain}.supplier.matajerdz.test')
            ->namespace($this->namespace)    
            ->group(base_path('routes/subdomain_supplier.php'));
    }
    protected function mapSellerSubdomainRoutes()
    {
        Route::domain('{subdomain}.seller.matajerdz.test')
            ->namespace($this->namespace)    
            ->group(base_path('routes/subdomain_seller.php'));
    }
    protected function mapDropshiperSubdomainRoutes()
    {
        Route::domain('{subdomain}.dropshiper.matajerdz.test')
            ->namespace($this->namespace)    
            ->group(base_path('routes/subdomain_dropshiper.php'));
    }
    //---------end subdomain
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "landingpage" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLandingPageRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/landingpage.php'));
    }
    
    /**
     * Define the "seller" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSellerRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/seller.php'));
    }
    
    /**
     * Define the "supplier" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSupplierRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/supplier.php'));
    }

    /**
     * Define the "dropshiper" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDropshiperRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dropshiper.php'));
    }

    /**
     * Define the "local livereur" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLocalLivereurRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/local_livereur.php'));
    }

    /**
     * Define the "company livereur" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCompanyLivereurRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/company_livereur.php'));
    }

    /**
     * Define the "super admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSuperAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/super-admin.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    

}
