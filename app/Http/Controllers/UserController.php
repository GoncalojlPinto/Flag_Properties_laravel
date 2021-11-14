<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\MessageBag;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/users.index', ['users' => User::all()]);
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
    public function store(Request $request, User $user)
    {
        $input = $request->all();

        $input['name'] = $user->name;
        $input['email'] = $user->email;
        $input['addRole'] = $user->addRoleAgent();
        $input['removeRole'] = $user->removeRoleAgent();

        $user = $this->fillUser(new User(), $input);


        try {
            $user->save();
        } catch (QueryException $error) {
            return redirect()->route('admin/users.index')->withErrors(new MessageBag(["error", "Erro ao tentar gravar o Utilizador"]));
        }

        return redirect(route('admin/users.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
        return view('admin/users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin/users.edit', ['users' => User::all()]);
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
        $input = $request->all();

        $input['nome'] = $user->name;
        $input['email'] = $user->email;
        $input['addRole'] = $user->addRoleAgent();
        $input['removeRole'] = $user->removeRoleAgent();

        $user = $this->fillUser($user, $input);


        try {
            $user->save();
        } catch (QueryException $error) {
            return redirect()->route('admin.users.index')->withErrors(new MessageBag(["error", "Erro ao tentar gravar o Utilizador"]));
        }

        return redirect(route('admin.users.index'));
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
        $input['addRoleAgent'] = $user->addRoleAgent();
        $input['removeRoleAgent'] = $user->removeRoleAgent();

        return $user;
    }
}
