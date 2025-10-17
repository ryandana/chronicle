<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile')
                    ->description('Update your public information.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->circleCropper()
                            ->directory('avatars')
                            ->visibility('public')
                            ->required()
                            ->alignCenter()
                            ->previewable(true)
                            ->columnSpanFull(),

                        TextInput::make('username')
                            ->label('Username')
                            ->prefix('@')
                            ->required()
                            ->maxLength(20)
                            ->columnSpanFull(),

                        TextInput::make('nickname')
                            ->label('Display Name')
                            ->required()
                            ->maxLength(40)
                            ->columnSpanFull(),

                        Textarea::make('bio')
                            ->label('About You')
                            ->required()
                            ->autosize()
                            ->placeholder('Tell the world who you are...')
                            ->columnSpanFull(),
                    ])
                    ->extraAttributes([
                        'class' => 'bg-white/10 dark:bg-gray-900/40 backdrop-blur-md rounded-2xl shadow-sm p-6 space-y-6',
                    ]),
            ]);
    }
}
