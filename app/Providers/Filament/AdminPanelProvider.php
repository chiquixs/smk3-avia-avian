<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use App\Filament\Widgets\CapaStats;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\MonitoringOverviewWidget;
use App\Filament\Widgets\SkorKepatuhanChartWidget;
use App\Filament\Widgets\PenugasanOverdueWidget;
use App\Filament\Widgets\IncidentByTypeChart;
use App\Filament\Widgets\IncidentByDepartmentChart;
use App\Filament\Widgets\IncidentByMonthChart;
use App\Filament\Widgets\IncidentYearComparisonChart;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                \Filament\Widgets\AccountWidget::class,
                \Filament\Widgets\FilamentInfoWidget::class,
                \App\Filament\Widgets\MonitoringOverviewWidget::class,
                \App\Filament\Widgets\SkorKepatuhanChartWidget::class,
                \App\Filament\Widgets\PenugasanOverdueWidget::class,
                \App\Filament\Widgets\IncidentByTypeChart::class,
                \App\Filament\Widgets\IncidentByDepartmentChart::class,
                \App\Filament\Widgets\IncidentByMonthChart::class,
                \App\Filament\Widgets\IncidentYearComparisonChart::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
                CapaStats::class,
                MonitoringOverviewWidget::class,
                SkorKepatuhanChartWidget::class,
                PenugasanOverdueWidget::class,
            ])
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,

                MonitoringOverviewWidget::class,
                SkorKepatuhanChartWidget::class,
                PenugasanOverdueWidget::class,

                IncidentByTypeChart::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
