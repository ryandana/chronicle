<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make("post_id")
                ->label("Select Post For Banner")
                ->relationship("post", "title")
                ->searchable()
                ->preload(),
            ]);
    }
}
