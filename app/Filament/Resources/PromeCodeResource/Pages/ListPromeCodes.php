<?php

namespace App\Filament\Resources\PromeCodeResource\Pages;

use App\Filament\Resources\PromeCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromeCodes extends ListRecords
{
    protected static string $resource = PromeCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
