<?php

namespace App\Services;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\Employee;
use App\Models\RewardProgram;
use App\Models\RewardTransaction;
use App\Models\User;
use App\Models\RefAffectedArea;
use DateTime;
use Carbon\Carbon;
use Laravel\Jetstream\Jetstream;
use League\CommonMark\Extension\Footnote\Node\FootnoteRef;

class RewardService extends Component
{
    public static function KaizenApproved(Kaizen $kaizen){
        info(@"Kaizen Approved: {$kaizen->id}");

        $program = RewardProgram::find(1);//Approved Rapid Kaizen
        if($kaizen->just_do_it)
            $program = RewardProgram::find(2);//Approved Just do it Kaizen

        //info($program);
        RewardService::EarnReward($program, get_class($kaizen), $kaizen->id,$kaizen->employee_id);
        foreach ($kaizen->members()->get() as $key => $member) {
            //info($member->name);
            if($kaizen->employee_id != $member->id)
                RewardService::EarnReward($program, get_class($kaizen), $kaizen->id,$member->id);

            //info($member->rewardTransactions()->first());
        }
    }

    public static function EarnReward(RewardProgram $program, $eventType, $eventId, $memberId){
        $member = Employee::find($memberId);
        $lastRewardTransaction = $member->rewardTransactions()->orderBy('created_at', 'desc')->first();
        //info($lastRewardTransaction);
        $balance = 0;
        if($lastRewardTransaction)
            $balance = $lastRewardTransaction->balance + $program->points;

        info("{$member->id} earned {$program->points} from {$eventType}:{$eventId}");
        RewardTransaction::insert(
            [
                'employee_id' => $member->id,
                'transaction_type' => 'earn_points',
                'reward_program_id' => $program->id,
                'event_type' => $eventType,
                'event_type_id'  => $eventId,
                'points' => $program->points,
                'balance' => $balance,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
