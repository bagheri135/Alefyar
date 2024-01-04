<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = 1;
        $users = User::paginate(10);
        return view('management.users.users', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('management.users.edit-user', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $messageIcon = 'error';
        $message = "عملیات با شکست مواجه شد";

        if(empty($request->password)){
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|digits:11',
            ]);
            $result = $user->updateOrFail([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|digits:11',
                'password' => 'confirmed',
            ]);
            $result = $user->updateOrFail($request->all());
        }


        if ($result) {
            $message = 'ویرایش کاربر با موفقیت تغییر کرد';
            $messageIcon = 'success';
        }

        toast($message, $messageIcon);
        return redirect()->back();
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $message = "عملیات حذف با شکست مواجه شد";
        $result = $user->delete();
        if ($result) {
            // alert()->success('حذف کاربر','کاربر با موفقیت حذف شد');
            toast('کاربر با موفقیت حذف شد', 'success');
            $message = "کاربر با موفقیت حذف شد";
        }
        return redirect()->back()->with(['result' => $result, 'message' => $message]);
    }

    /**
     * Change user status in admin panel.
     * تغییر وضعیت کاربر در پنل ادمین
     */
    public function status(User $user)
    {
        $messageIcon = 'error';
        $message = "عملیات با شکست مواجه شد";

        $result = $user->update(['status' => !$user->status]);

        if ($result) {
            $message = 'وضعیت کاربر با موفقیت تغییر کرد';
            $messageIcon = 'success';
        }

        toast($message, $messageIcon);
        return redirect()->back();
    }
}
