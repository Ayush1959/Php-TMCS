<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Project;
use Illuminate\Support\Facades\Config;
use App\Project_assigned;
use App\Project_user_log;
use App\Project_monthly_log;
use App\Project_delay;
use App\User;
use App\Mail\DemoEmaildays;
use App\Mail\DemoEmail;
use DB;

class MonthlyCronController extends Controller
{
    public function index()
    {
        $dataarr = array();
        $newdate = date("Y-m-d", strtotime("-1 months"));
        $data_array = user::select('id', 'user_name', 'status', 'score')->where('status', 1)->where('user_type', 4)->get();
        $count = project_monthly_log::whereMonth('created_at', '=', date('m'))->count();
        if ($count == 0) {
            foreach ($data_array as $aa) {
                $data = new Project_monthly_log();
                $data->user_id = $aa->id;
                $data->user_name = $aa->user_name;
                $data->date = $newdate;
                $data->score = $aa->score;
                $saved = $data->save();

                $datas = user::findOrFail($aa->id);
                $datas->score = 100;
                $datas->save();
            }
        } else {
            echo "already added";
        }
        if (isset($saved)) {
            echo 'done';
            return response()->json([
                'status' => config::get('constant.Success')
            ]);
        } else {
            return response()->json([
                'status' => config::get('constant.DB_Save_Error')
            ]);
        }
    }
}
