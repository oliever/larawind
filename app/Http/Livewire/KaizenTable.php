<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Kaizen;

class KaizenTable extends DataTableComponent
{

    public bool $perPageAll = true;
    public $columnSearch = [
        'name' => null,
    ];

    public function columns(): array
    {
        return [
            Column::make('Id'),
            Column::make('Name')
            ->sortable()
            ->searchable()
            ->asHtml(),
           /*  ->secondaryHeader(function() {
                return view('tables.cells.input-search', ['field' => 'name', 'columnSearch' => $this->columnSearch]);
            }), */
            Column::make('Assiged','date_assigned')->sortable()->addClass('md:hidden')->addClass('xl:table-cell'),
        ];
    }

    public function query(): Builder
    {
        return Kaizen::query();
    }

    public function setTableRowClass($row): ?string
    {
        if ($row->active === false)  {
            if (config('livewire-tables.theme') === 'tailwind') {
                return '!bg-red-200';
            } else if (config('livewire-tables.theme') === 'bootstrap-4') {
                return 'bg-danger text-white';
            } else if(config('livewire-tables.theme') === 'bootstrap-5') {
                return 'bg-danger text-white';
            }
        }

        return null;
    }
}
