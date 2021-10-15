<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;



class DraftProjectsDatatable extends LivewireDatatable
{
    public $model = Project::class;

    public $exportable = true;
    public $hideable = 'select';

    public function builder()
    {
        return Project::query()->whereNull('posted');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->linkTo('project', 6)
            ->label('ID'),

            Column::name('description')
            ->searchable(),

            NumberColumn::name('completion')
            ->label('% Complete'),


            DateColumn::raw('created_at')
                ->label('Created')
                ->format('F j, Y, g:i a'),

        ];
    }
}

