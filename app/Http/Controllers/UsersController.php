<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository as Repository;

ini_set('max_execution_time', 500);

class UsersController extends Controller
{
    protected $users;    

    public function __construct(Repository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
    	return view('users.index');
    }

    public function create()
    {
    	return view('users.create');
    }

    public function createBulk()
    {
    	return view('users.create_bulk');
    }

    public function store(Request $request)
    {
        return $this->users->store($request);
    }

    public function import() 
    {
        return $this->users->import();    
    }

    public function edit(User $user)
    {
        return view('users.edit')->withUser($user);
    }

    public function update(Request $request, User $user)
    {
        return $this->users->update($request, $user); 
    }

    public function show(Request $request)
    {
        return $this->users->show($request);  
    }

    public function fetch(User $user)
    {
        return $this->users->fetch($user);
    }

    public function delete(User $user)
    {
        $user->delete();

        return back()->withSuccess('Success delete');
    }

    public function showTable(Request $request)
    {
       return $this->users->showTable($request);
    }
}
