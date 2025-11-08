<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use App\Models\Banner;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalPostsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description('All published posts')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('primary'),

            Stat::make('Total Authors', Author::count())
                ->description('Registered authors')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),

            Stat::make('Total Categories', Category::count())
                ->description('Active categories')
                ->descriptionIcon('heroicon-o-tag')
                ->color('warning'),

            Stat::make('Total Banners', Banner::count())
                ->description('Homepage banners')
                ->descriptionIcon('heroicon-o-photo')
                ->color('success'),

            Stat::make('Posts Today', Post::whereDate('created_at', today())->count())
                ->description('Posts created today')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('danger'),
        ];
    }
}
