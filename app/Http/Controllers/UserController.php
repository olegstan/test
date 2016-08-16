<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return View::make('user.index')->with([
            'models' => User::all()
        ]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return View::make('user.create');
    }

    /**
     * register and store
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        if($user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ])){
            if(Auth::check()){
                return redirect()->route('user.index');
            }else{
                return redirect()->to('/');
            }

        }else{
            return redirect()->back();
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return View::make('user.edit')->with([
            'model' => User::where('id', '=', $id)->get()->first()
        ]);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $model = User::where('id', '=', $id)->get()->first();

        if($model->update($request->all())){
            return redirect()->route('user.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UserRequest $request, $id)
    {
        User::where('id', '=', $id)->get()->first()->delete();
        return redirect()->route('user.index');
    }

}
