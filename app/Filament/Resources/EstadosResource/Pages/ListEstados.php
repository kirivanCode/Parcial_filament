<?php

namespace App\Filament\Resources\EstadosResource\Pages;

use App\Filament\Resources\EstadosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstados extends ListRecords
{
    protected static string $resource = EstadosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
