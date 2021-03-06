<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FullTimeQulificationResult;
use App\PartTimeQulificationResult;
use App\Http\Requests;

class Addits extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitregistrationform(Request $request){
        $create_user = User::create([
            'admission_payment_hash' => $request['admission_payment_hash'],
            'surname' => $request['surname'],
            'firstname' => $request['firstname'],
            'othername' => $request['othername'],
            'programme_type' => $request['programme_type'],
            'programme_mode' => $request['programme_mode'],
            'department' => $request['department'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['surname'])
        ]);
        $reged_user = User::where('email', $request->email)->first();
        $regdate = date('y');
        $pm = $request->programme_mode;
        $pt = $request->programme_type;
        function initials($str){
            $ret = '';
            foreach (explode(' ', $str) as $word)
                $ret .= strtolower($word[0]);
                return $ret;
        }
        $matric =  "temp-" .initials($pm) ."/" .initials($pt) ."/" .$regdate ."/" .$reged_user->id;
        $reged_user->update([
            'admission_payment_hash' => $request['admission_payment_hash'],
            'surname' => $request['surname'],
            'firstname' => $request['firstname'],
            'othername' => $request['othername'],
            'programme_type' => $request['programme_type'],
            'programme_mode' => $request['programme_mode'],
            'department' => $request['department'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'matric' => $matric,
            'password' => bcrypt($request['surname'])
        ]);
        $reged_user = User::where('email', $request->email)->first();
        $id = $reged_user->id;
        $surname = $request->surname;
        $firstname = $request->firstname;
        $othername = $request->othername;
        if($request->programme_mode == 'full-time'){
            return view('layouts.full-time-qualification-form', compact('surname', 'firstname', 'othername', 'id'));
        }elseif($request->programme_mode == 'part-time'){
            return view('layouts.part-time-qualification-form', compact('surname', 'firstname', 'othername', 'id'));
        }else{
            return '404';
        }
        // $reged_user = User::where('email', $request->email)->first();
        // $regdate = date('y');
        // $pm = $request->programme_mode;
        // $pt = $request->programme_type;
        // function initials($str){
        //     $ret = '';
        //     foreach (explode(' ', $str) as $word)
        //         $ret .= strtolower($word[0]);
        //         return $ret;
    
        // }
        // $matric =  "temp-" .initials($pm) ."/" .initials($pt) ."/" .$regdate ."/" .$reged_user->id;
        // $reged_user->update([
        //     'surname' => $request['surname'],
        //     'firstname' => $request['firstname'],
        //     'othername' => $request['othername'],
        //     'programme_type' => $request['programme_type'],
        //     'programme_mode' => $request['programme_mode'],
        //     'department' => $request['department'],
        //     'phone' => $request['phone'],
        //     'email' => $request['email'],
        //     'matric' => $matric,
        //     'password' => bcrypt($request['surname'])
        // ]);



        // // programme mode
        // $pm_temp = explode(' ', $request->programme_mode);
        // $pm_temp_result = '';
        // foreach ($pm_temp as $key => $pm_t) {
        //     $pm_temp_result = $pm_t[0];
        // }

        // // programme type
        // $pt_temp = explode('gg', 'kehinde sma');
        // $pt_temp_result = '';
        // foreach ($pt_temp as $key => $pt_t) {
        //     $pt_temp_result = $pt_t[0] .$pt_t[2];
        // }
        
        // $request->session()->put('successmsg', $request->surname .' ' .$request->firstname .' your registration was successful. Please make sure your matric number below is written down or copied');
        // $request->session()->put('matricmsg', $matric);
        // return redirect('/home');
    }
    public function fullregistration(Request $request){
        $user = User::where('id', $request->id)->first();
        $user_id = $user->id;
        // now we save thier results
        $full_time_qulification_results = FullTimeQulificationResult::create([
            'user_id' => $user_id,
            'examination_number' => $request->examination_number,
            'subject1' => $request->subject1,
            'grade1' => $request->grade1,
            'subject2' => $request->subject2,
            'grade2' => $request->grade2,
            'subject3' => $request->subject3,
            'grade3' => $request->grade3,
            'subject4' => $request->subject4,
            'grade4' => $request->grade4
        ]);

        $request->session()->put('successmsg', $user->surname .' ' .$user->firstname .' your registration was successful. Please make sure your matric number below is written down or copied');
        $request->session()->put('matricmsg', $user->matric);
        return redirect('/home');
    }

    public function submitloginform($request){
        return redirect('/home');
    }


    public function profilelogin(Request $request){
        $request->session()->put('matric', $request->matric);
        if($user = User::where('matric', session()->get('matric'))->first()){
            $request->session()->put('surname', $user->surname);
            $request->session()->put('firstname', $user->firstname);
            $request->session()->put('email', $user->email);
            $request->session()->put('path', $user->path);
            return redirect('/userslogin');
        }else{
            echo "
                <script>
                    alert('Unknow matric number');
                    history.back();
                </script>
            ";
        }
    }


}
