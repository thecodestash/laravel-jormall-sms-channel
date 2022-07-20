<?php

namespace TheCodeStash\JormallSms;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TheCodeStash\JormallSms\Commands\JormallSmsCommand;

class JormallSmsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-jormall-sms-channel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-jormall-sms-channel_table')
            ->hasCommand(JormallSmsCommand::class);
    }
}
