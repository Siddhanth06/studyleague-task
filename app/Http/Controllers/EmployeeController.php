<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $referral_code = Str::random(6);
        $employee = new employee();
        $employee->name = $request->name;
        $employee->referral_code = $referral_code;
        $employee->referrer_id = $request->code;
        $employee->save();
        return redirect()->route('register');
    }

    public function index()
    {
        $employees = Employee::all();

        //functions to promote employees to pool3
        function pool3Promotion($employee)
        {
            $employee->update(['pool' => 'pool3']);
        }

        function pool2ToPool3Promotion()
        {
            $pool2Promotions = Employee::where('pool', 'pool2')->count();

            if ($pool2Promotions >= 14) {
                $userToPromote = Employee::where('pool', 'pool2')->orderBy('promotion_order')->first();

                if ($userToPromote) {
                    pool3Promotion($userToPromote);
                }
            }
        }

        foreach ($employees as $employee) {

            //fetch the number of referrals for each employee
            $referralCount = $employee->referredEmployees()->count();

            if ($referralCount >= 14 && $employee->pool !== 'pool2') {
                // $newPromotion = Employee::where('pool', 'pool2')->max('promotion_order') + 1;
                // $employee->update(['pool' => 'pool2', 'amount' => 14, 'promotion_order' => $newPromotion]);
                $employee->update(['pool' => 'pool2', 'amount' => 14, 'promotion_order' => Employee::where('pool', 'pool2')->max('promotion_order') + 1]);
                pool2ToPool3Promotion();
            } elseif ($referralCount >= 8 && $employee->pool !== 'pool2') {
                $employee->update(['pool' => 'pool2', 'amount' => 8]);
            }
        }

        return view('employees', ['data' => $employees]);
    }
}
