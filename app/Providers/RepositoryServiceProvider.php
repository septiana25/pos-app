<?php

namespace App\Providers;

use App\Interfaces\KategoriRepositoryInterface;
use App\Repositories\KategoriRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(KategoriRepositoryInterface::class, KategoriRepository::class);
    }

    public function boot()
    {
        //
    }
}
