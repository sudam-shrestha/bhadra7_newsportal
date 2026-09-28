<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('content')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('meta_title')
                    ->required(),
                TextInput::make('meta_description')
                    ->required(),
                TextInput::make('author_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
