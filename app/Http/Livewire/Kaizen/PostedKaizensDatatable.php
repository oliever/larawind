<?php

namespace App\Http\Livewire\Kaizen;

use App\Models\Kaizen;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;



class PostedKaizensDatatable extends LivewireDatatable
{
    public $model = Kaizen::class;

    public $exportable = true;
    public $hideable = 'select';

    public function builder()
    {
        //return Kaizen::query()->whereNotNull('posted');
        return Kaizen::with(['members','locations']);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->linkTo('kaizen', 6)
            ->label('ID'),

            Column::name('name')
            ->searchable(),

            Column::name('members.name')
            ->label('Members'),

            BooleanColumn::raw("IF (all_locations = 1, true, false)  AS All Stores"),

            Column::name('locations.name')
            ->label('Stores'),

            BooleanColumn::name('rapid')
            ->label('Rapid Kaizen'),

            NumberColumn::name('completion')
            ->label('% Complete'),

            BooleanColumn::name('head_office_input')
            ->label('Head Office Input'),

            BooleanColumn::name('handled_at_location')
            ->label('Handle At Branch'),

            DateColumn::raw('posted')
                ->label('Posted')
            ->format('j M Y'),
                //->format('M j, Y, g:i a'),


        ];
    }
}

