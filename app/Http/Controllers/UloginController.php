<?php

namespace App\Http\Controllers;

//use App\Matches;
//use App\Message;
use App\user\Props;
use App\user\CombatProps;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Redirect;
//use App\AchivUser;

class UloginController extends Controller
{
    // Login user through social network.
    public function login(Request $request)
    {
//        dd($_POST);
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);
//        dd($user);

        $network = $user['network'];

        // Find user in DB.
        $userData = User::where('email', $user['email'])->first();

        // Check exist user.
        if (isset($userData->id)) {

            // Check user status.
            if ($userData->status) {

                // Make login user.
                Auth::loginUsingId($userData->id, TRUE);
            }
            // Wrong status.
            else {
                \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
            }

            return Redirect::back();
        }
        // Make registration new user.
        else {
//            dd($user);
            // Create new user in DB.
            $newUser = User::create([
                'nik' => $user['nickname'],
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'avatar' => $user['photo'],
                'country' => $user['country'],
                'email' => $user['email'],
                'password' => Hash::make(str_random(8)),
                'role' => 'user',
                'status' => TRUE,
                'ip' => $request->ip(),
                'network' => $user['network'],
            ]);

            // Make login user.
            Auth::loginUsingId($newUser->id, TRUE);

            \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            $user_prop = CombatProps::create([
                'user' => $newUser->id,
            ]);

            $user_combat_prop = Props::create([
                'user' => $newUser->id,
                'health_const' => 50,
                'health_really' => 50,
                'energy_const' => 100,
                'energy_really' => 100,
                'silver' => 100,
                'gold' => 10,
                'cuprum' => 0
            ]);

            // первая ачивка
//            $achiv = AchivUser::create([
//                'user' => $newUser->id,
//                'achiev' => '19',
//                'count' => '1',
//            ]);
            // сообщение об успешной регистрации
//            $mes = Message::create([
//                'seter' => '1',
//                'geter' => $newUser->id,
//                'content' => 'Прветствуем Вас на нашем сайте'
//            ]);

            return Redirect::back();
        }
    }
}
