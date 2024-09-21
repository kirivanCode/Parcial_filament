<?php

namespace App\Filament\Resources\EstadosResource\Pages;

use App\Filament\Resources\EstadosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstados extends EditRecord
{
    protected static string $resource = EstadosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
