<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab; 
use Illuminate\Database\Eloquent\Builder; 

class ListPatients extends ListRecords
{
    protected static string $resource = PatientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->label('All'),
                'cats' => Tab::make()
                ->label('Cats')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'cat')), // Menggunakan Builder yang benar
                'dogs' => Tab::make()
                    ->label('Dogs')
                    ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'dog')), // Menggunakan Builder yang benar
        ];
    }

}
