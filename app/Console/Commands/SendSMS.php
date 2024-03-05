<?php

namespace App\Console\Commands;

use App\Data\Mails;
use App\Http\Controllers\SMSController;
use App\Managers\SMSC;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class SendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = Customer::where('birthdate', Carbon::now()->toDateString())->get();
        foreach($users as $user){
            $phone = $user->phone;
            SMSC::send_sms($phone, Mails::getBirthdayMessage($user->firstname." ".$user->lastname), 1);
        }
    }
}
