<?php

namespace App\Http\Livewire\Rewards;

use App\Models\Employee;
use App\Models\RewardTransaction;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;



class RewardTransactionsDatatable extends LivewireDatatable
{
    public $model = RewardTransaction::class;

    public $employee = null;

    public $exportable = true;
    public $hideable = 'select';

    public function builder()
    {
        //return Kaizen::query()->whereNotNull('posted');
        //return Kaizen::with(['members','locations']);
        //return RewardTransaction::query();
        //return RewardTransaction::with(['employee', 'reward_program']);
        //info($this->employee);
        return RewardTransaction::where('employee_id', $this->employee->id)->leftJoin('reward_programs', 'reward_programs.id', 'reward_transactions.reward_program_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->label('ID'),

            Column::name('reward_programs.name')
                ->label('Program'),

            Column::name('points'),

            Column::name('balance'),

            DateColumn::raw('reward_transactions.created_at')
                ->label('Created At')
            ->format('M j, Y, g:i a'),


        ];
    }
}

