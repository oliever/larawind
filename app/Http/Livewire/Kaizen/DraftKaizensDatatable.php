<?php

namespace App\Http\Livewire\Kaizen;

use App\Models\Kaizen;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;



class DraftKaizensDatatable extends LivewireDatatable
{
    public $model = Kaizen::class;

    public $exportable = true;
    public $hideable = 'select';

    public function builder()
    {
        return Kaizen::query()->whereNull('posted');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->linkTo('kaizen', 6)
            ->label('ID'),

            Column::name('name')
            ->searchable(),

            BooleanColumn::name('just_do_it')
            ->label('Just Do It'),

            BooleanColumn::name('rapid')
            ->label('Rapid Kaizen'),

            NumberColumn::name('completion')
            ->label('% Completion'),

            BooleanColumn::name('head_office_input')
            ->label('Head Office Input'),

            BooleanColumn::name('handled_at_location')
            ->label('Handle At Branch'),

            DateColumn::raw('created_at')
                ->label('Created')
                ->format('F j, Y, g:i a'),

        ];
    }
}

