<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = Task::all();
        $param = ['tasks' => $tasks, 'user' => $user];
        return view('index', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(TaskRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Task::create($form);
        return redirect('/');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Task::find($request->id)->update($form);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }

    public function check(Request $request)
    {
        return view('login');
    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $text =  Auth::user()->name . 'さんがログインしました';
        } else {
            $text = 'パスワードもしくはメールアドレスが間違っています';
        }
    }
}
