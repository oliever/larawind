<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\RewardTransaction;

class RewardsController extends Controller
{
    public function index(Request $request)
    {

        $employee = $request->instance()->query('selectedEmployee');
        $lastRewardTransaction = $employee->rewardTransactions()->orderBy('created_at', 'desc')->first();
        if(!$lastRewardTransaction){
            $lastRewardTransaction = new RewardTransaction();
            $lastRewardTransaction->balance = 0;
        }
        return view('rewards.index', compact('lastRewardTransaction'));
    }
}
