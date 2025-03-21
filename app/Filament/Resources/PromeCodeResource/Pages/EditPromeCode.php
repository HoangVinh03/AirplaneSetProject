<?php

namespace App\Filament\Resources\PromeCodeResource\Pages;

use App\Filament\Resources\PromeCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromeCode extends EditRecord
{
    protected static string $resource = PromeCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
