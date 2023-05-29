<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Blade;
use Filament\Navigation\NavigationItem;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Filament::registerRenderHook(
            'head.end',
            fn (): string => Blade::render('@vite([\'resources/css/app.css\',\'resources/js/app.js\'])'),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Analytics')
                    ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-presentation-chart-line')
                    ->activeIcon('heroicon-s-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('User')
                    // ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-user')
                    ->activeIcon('heroicon-s-user')
                    ->group('Email')
                    ->sort(3),
            ]);
            // $user = Filament::auth()->user();
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Email')
                    // ->label(Filament::getUserName($user))
                    ->icon('heroicon-o-globe-alt')
            ]);
        });

        TextColumn::configureUsing(function (TextColumn $column): void {
            $column
                ->toggleable()
                ->sortable();
        });


        // Filament::registerScripts([
        //     asset('js/my-script.js'),
        // ]);

        Filament::registerScripts([
            'https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@0.x.x/dist/cdn.min.js',
            'https://code.iconify.design/2/2.2.1/iconify.min.js',
        ], true);

        Filament::registerStyles([
            'https://unpkg.com/tippy.js@6/dist/tippy.css',
            asset('css/my-styles.css'),
        ]);
    }
}
