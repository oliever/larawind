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
            ->linkTo('project')
            ->label('ID'),

            Column::name('description')
            ->searchable(),



            DateColumn::raw('posted')
                ->label('Posted')
                ->format('F j, Y, g:i a'),

        ];
    }
}

