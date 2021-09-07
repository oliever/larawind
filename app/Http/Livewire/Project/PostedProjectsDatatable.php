<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;



class PostedProjectsDatatable extends LivewireDatatable
{
    public $model = Project::class;

    public $exportable = true;
    public $hideable = 'select';

    public function builder()
    {
        return Project::query()->whereNotNull('posted');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->linkTo('kaizen')
            ->label('ID'),

            Column::name('name')
            ->searchable(),

            BooleanColumn::name('just_do_it')
            ->label('Just Do It'),

            BooleanColumn::name('rapid')
            ->label('Rapid Kaizen'),

            BooleanColumn::name('head_office_input')
            ->label('Head Office Input'),

            BooleanColumn::name('handled_at_location')
            ->label('Handle At Branch'),

            BooleanColumn::name('before_after')
            ->label('Before and AFter Report'),

            DateColumn::raw('posted')
                ->label('Posted')
                ->format('F j, Y, g:i a'),

        ];
    }
}

