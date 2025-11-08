<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class PostsTodayWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Post::query()
            ->whereDate('created_at', today())
            ->with(['author', 'category'])
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->limit(50),

            Tables\Columns\TextColumn::make('author.nickname')
                ->label('Author')
                ->sortable(),

            Tables\Columns\TextColumn::make('category.name')
                ->label('Category')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Posted At')
                ->dateTime('h:i'),
        ];
    }
}
