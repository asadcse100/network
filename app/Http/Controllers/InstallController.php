<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use DB;
use Hash;
use App\Models\SystemConfiguration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class InstallController extends Controller
{
    public function step0()
    {
        $this->writeEnvironmentFile('APP_URL', URL::to('/'));
        return view('installation.step0');
    }

    public function step1()
    {
        Artisan::call('key:generate');
        $permission['curl_enabled']           = function_exists('curl_version');
        $permission['db_file_write_perm']     = is_writable(base_path('.env'));
        $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));
        return view('installation.step1', compact('permission'));
    }

    public function step2()
    {
        return view('installation.step2');
    }

    public function step3($error = null)
    {
        if ($error == "") {
            return view('installation.step3');
        } else {
            return view('installation.step3', compact('error'));
        }
    }

    public function step4()
    {
        return view('installation.step4');
    }

    public function step5()
    {        
        return view('installation.step5');
    }

    public function purchase_code(Request $request)
    {
        return redirect('step3');
    }

    public function system_settings(Request $request)
    {
        // $system_config = SystemConfiguration::where('type', 'system_default_currency')->first();
        // $system_config->value = $request->system_default_currency;
        // $system_config->save();
        $systemName = str_replace(' ', '', $request->system_name);
        $this->writeEnvironmentFile('APP_NAME', $systemName);

        $values = array(
            'name' => $request->admin_name,
            'email' => $request->admin_email,
            'password' => Hash::make($request->admin_password),
            'created_at' => Carbon::now()
        );
        DB::table('admins')->insert($values);


        // $user                    = User::first();
        // dd($user);
        // $user->name              = $request->admin_name;
        // $user->email             = $request->admin_email;
        // $user->password          = Hash::make($request->admin_password);
        // $user->email_verified_at = Carbon::now();
        // $user->save();

        $previousRouteServiceProvier = base_path('app/Providers/RouteServiceProvider.php');
        $newRouteServiceProvier      = base_path('app/Providers/RouteServiceProvider.txt');
        copy($newRouteServiceProvier, $previousRouteServiceProvier);
        //sleep(5);
        Artisan::call('cache:clear');
        Artisan::call('route:clear');

        return view('installation.step6');

        // return redirect('step6');
    }

    public function database_installation(Request $request)
    {

        if (self::check_database_connection($request->DB_HOST, $request->DB_DATABASE, $request->DB_USERNAME, $request->DB_PASSWORD)) {
            $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($request->types as $type) {
                    $this->writeEnvironmentFile($type, $request[$type]);
                }
                return redirect('step4');
            } else {
                return redirect('step3');
            }
        } else {
            return redirect('step3/database_error');
        }
    }

    public function import_sql()
    {
        $sql_path = base_path('network.sql');
        DB::unprepared(file_get_contents($sql_path));
        return redirect('step5');
    }

    function check_database_connection($db_host = "", $db_name = "", $db_user = "", $db_pass = "")
    {

        if (@mysqli_connect($db_host, $db_user, $db_pass, $db_name)) {
            return true;
        } else {
            return false;
        }
    }

    public function writeEnvironmentFile($type, $val)
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            // $val = '"'.trim($val).'"';
            file_put_contents($path, str_replace(
                $type . '=' . env($type),
                $type . '=' . $val,
                file_get_contents($path)
            ));
        }
    }
}
