<?php

namespace App\Filament\Resources\Advertises\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Advertise Details")
                    ->schema([
                        TextInput::make('company_name')
                            ->required(),
                        TextInput::make('contact_no')
                            ->required(),
                        DatePicker::make('expire_date')
                            ->required(),
                        TextInput::make('redirect_link')
                            ->required(),
                        FileUpload::make('banner')
                            ->openable()
                            ->required(),
                    ])
            ]);
    }
}
