<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }
        //Property belongsTo User and Property hasMany Favorite  and User hasMany Property
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $input = $request->all();

        $input['nome'] = $user->name;
        $input['email'] = $user->email;

        $user = $this->fillUser(new User(), $input);


        try {
            $user->save();
        } catch (QueryException $error) {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag(["error", "Erro ao tentar gravar o Utilizador"]));
        }

        return redirect(url('/adminpanel'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::all();
        $input = $request->all();

        $input['nome'] = $user->name;
        $input['email'] = $user->email;

        $user = $this->fillUser(new User(), $input);


        try {
            $user->save();
        } catch (QueryException $error) {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag(["error", "Erro ao tentar gravar o Utilizador"]));
        }

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
    }


    private function fillUser(User $user, array $input): User
    {
        $user->name = $input['nome'];
        $user->email = $input['email'];

        return $user;
    }

    }

