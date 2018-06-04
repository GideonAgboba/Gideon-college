<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FullTimeProgrammeType;
use App\FullTimeDepartment;
use App\FullTimeCourse;
use App\PartTimeProgrammeType;
use App\PartTimeDepartment;
use App\PartTimeCourse;
use App\User;
use App\AdminTask;
use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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




















    public function editadminprofiles(){
        return view('admin.profile');
    }
    public function currentadminchangepassword(Request $request){
        $currentuser = User::findOrFail($request->id)->first();
        $currentuser->update([
            'password' => bcrypt($request['password'])
        ]);
        return back();
    }

    public function createadminuser(Request $request){
        $create_user = User::create([
            'role_id' => 1,
            'surname' => $request['surname'],
            'firstname' => $request['firstname'],
            'othername' => $request['othername'],
            'programme_type' => $request['programme_type'],
            'programme_mode' => $request['programme_mode'],
            'department' => $request['department'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'matric' => $request['surname'],
            'password' => bcrypt($request['password']),
            'path'=> 'admin.png'
        ]);
        return back();
    }
    public function makeadminuser(Request $request){
        $create_user = User::create([
            'role_id' => 1,
            'surname' => $request['surname'],
            'firstname' => $request['firstname'],
            'othername' => $request['othername'],
            'programme_type' => $request['programme_type'],
            'programme_mode' => $request['programme_mode'],
            'department' => $request['department'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'matric' => $request['surname'],
            'password' => bcrypt($request['password']),
            'path'=> 'admin.png'
        ]);
        return back();
    }

    public function adminposttask(Request $request){
        $task = AdminTask::create($request->all());
        return back();
    }
    public function tasksrefresh(Request $request){
        echo "
        <script>
            window.location= '/editadminprofiles#todolist';
        </script>
        ";
    }
    public function tasksdelete(Request $request){
        $task = AdminTask::find($request->id)->delete();
        return back();
    }
    public function taskscompleted(Request $request){
        $task = AdminTask::find($request->id)->update([
            'task_status'=>1
        ]);
        return back();
    }
    public function adminphotoupload(Request $request, $id){
        global $input,$request,$name;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file->getClientOriginalName();
            $file->move('uploads', $name);
            $request->path = $name;
        }else{
            return '404';
        }
        $user = User::find($id)->update(['path'=>$request->path]);      
        return back();
    }
    public function adminsearch(Request $request){
        $searchkey = $request->keyword;
        $ftcourse_result = FullTimeCourse::where('course_title', 'like', '%' .$searchkey. '%')->get();
        $ftdepartment_result = FullTimeDepartment::where('title', 'like', '%' .$searchkey. '%')->get();
        $ftptype_result = FullTimeProgrammeType::where('title', 'like', '%' .$searchkey. '%')->get();
        $ptcourse_result = PartTimeCourse::where('course_title', 'like', '%' .$searchkey. '%')->get();
        $ptdepartment_result = PartTimeDepartment::where('title', 'like', '%' .$searchkey. '%')->get();
        $ptptype_result = PartTimeProgrammeType::where('title', 'like', '%' .$searchkey. '%')->get();
        $usersurname_result = User::where('surname', 'like', '%' .$searchkey. '%')->get();
        $usermatric_result = User::where('matric', 'like', '%' .$searchkey. '%')->get();
        return view('admin.search', compact(
            'ftcourse_result',
            'ftdepartment_result',
            'ftptype_result',
            'ptcourse_result',
            'ptdepartment_result',
            'ptptype_result',
            'usersurname_result',
            'usermatric_result',
            'searchkey'
        ));
    }




    public function fulltimeprogcreate(){
        return view('admin.fulltime.create');
    }

    public function fulltimeprogedit(){
        return view('admin.fulltime.edit');
    }

    public function fulltimeprogview(){
        return view('admin.fulltime.view');
    }

    public function fulltimeprogdelete(){
        return view('admin.fulltime.delete');
    }



    public function fulltimeprogtypesubmitcreate(Request $request){
        $progtype = FullTimeProgrammeType::create($request->all());
        return back();
    }
    public function fulltimedepartmentsubmitcreate(Request $request){
        $department = FullTimeDepartment::create($request->all());
        return back();
    }
    public function fulltimecoursesubmitcreate(Request $request){
        $course = FullTimeCourse::create($request->all());
        return back();
    }

    public function fulltimeprogtypesubmitedit(Request $request){
        $progtype = FullTimeProgrammeType::where('id', $request->id)->first();
        $progtype->update($request->all());
        return back();
    }
    public function fulltimedepartmentsubmitedit(Request $request){
        $department = FullTimeDepartment::where('id', $request->id)->first();
        $department->update($request->all());
        return back();
    }
    public function fulltimecoursesubmitedit(Request $request){
        $course = FullTimeCourse::where('id', $request->id)->first();
        $course->update($request->all());
        return back();
    }

    public function fulltimeprogtypesubmitdelete(Request $request){
        $progtype = FullTimeProgrammeType::where('id', $request->id)->first();
        $progtype->delete();
        return back();
    }
    public function fulltimedepartmentsubmitdelete(Request $request){
        $department = FullTimeDepartment::where('id', $request->id)->first();
        $department->delete();
        return back();
    }
    public function fulltimecoursesubmitdelete(Request $request){
        $course = FullTimeCourse::where('id', $request->id)->first();
        $course->delete();
        return back();
    }






    public function parttimeprogcreate(){
        return view('admin.parttime.create');
    }

    public function parttimeprogedit(){
        return view('admin.parttime.edit');
    }

    public function parttimeprogview(){
        return view('admin.parttime.view');
    }

    public function parttimeprogdelete(){
        return view('admin.parttime.delete');
    }
    public function parttimeprogtypesubmitcreate(Request $request){
        $progtype = PartTimeProgrammeType::create($request->all());
        return back();
    }
    public function parttimedepartmentsubmitcreate(Request $request){
        $department = PartTimeDepartment::create($request->all());
        return back();
    }
    public function parttimecoursesubmitcreate(Request $request){
        $course = PartTimeCourse::create($request->all());
        return back();
    }

    public function parttimeprogtypesubmitedit(Request $request){
        $progtype = PartTimeProgrammeType::where('id', $request->id)->first();
        $progtype->update($request->all());
        return back();
    }
    public function parttimedepartmentsubmitedit(Request $request){
        $department = PartTimeDepartment::where('id', $request->id)->first();
        $department->update($request->all());
        return back();
    }
    public function parttimecoursesubmitedit(Request $request){
        $course = PartTimeCourse::where('id', $request->id)->first();
        $course->update($request->all());
        return back();
    }

    public function parttimeprogtypesubmitdelete(Request $request){
        $progtype = PartTimeProgrammeType::where('id', $request->id)->first();
        $progtype->delete();
        return back();
    }
    public function parttimedepartmentsubmitdelete(Request $request){
        $department = PartTimeDepartment::where('id', $request->id)->first();
        $department->delete();
        return back();
    }
    public function parttimecoursesubmitdelete(Request $request){
        $course = PartTimeCourse::where('id', $request->id)->first();
        $course->delete();
        return back();
    }


    public function viewprofiles(){
        return view('admin.profiles.view');
    }
    public function editprofiles(){
        return view('admin.profiles.edit');
    }
    public function adminsubmitregistrationform(Request $request){
        $create_user = User::create([
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
        return back();
    }

    public function admindeleteprofile(Request $request){
        $profile = User::findorFail($request->id)->delete();
        return back();
    }
    public function admineditprofile(Request $request){
        $profileupdt = User::where('matric', '=', $request->matric, 'and', 'id', $request->id)->first();
        $profileupdt->update($request->all());
        return back();
    }

}

