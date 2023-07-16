<?php

namespace LaravelLatam\Emnify;

use LaravelLatam\Emnify\Commands\EmnifyCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EmnifyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('emnify')
            ->hasRoute('web')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_emnify_table')
            ->hasCommand(EmnifyCommand::class);
    }
}
