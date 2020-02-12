<?php  

namespace App\Repositories;

use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\User as UserApi;

ini_set('max_execution_time', 500);

class UserRepository extends BaseRepository
{
	protected $users; 

    public function __construct()
    {
        parent::__construct();
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'username' => 'required|string',
    		'password' => 'required|string|confirmed'
    	]);

    	User::create([
    		'username' => $request->username,
    		'password' => bcrypt($request->password),
    	]);

    	return back()->withSuccess('Success add new user');
    }

    public function update($request, $user)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $user->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'e_password' => Crypt::encrypt($request->password)
        ]);

        return redirect(route('users.index'))->withSuccess('Success edit user ' . $user->username);
    }

    public function import() 
    {
        Excel::import(new UsersImport, request()->file('file'));

        return back()->withSuccess('Success add new users');
    }

    public function show(Request $request)
    {
        $this->admin = $request->user()->hasRole('administrator');

        $this->users = User::whereId($request->user()->id);

        if ($this->admin) {
            $this->users = User::where('id', '!=', 1);
        } 

        $this->users = $this->users->get();

        $this->api = new UserApi($this->users);

        return $this->api;
    }

    public function fetch(User $user)
    {
        $this->username = $user->username;
        $this->password = Crypt::decrypt($user->e_password);

        try {

            $this->prepare();
            $this->login();

            if ($user->pegawai) {
               $user->pegawai()->update($this->getData('nip'));
            } else {
                $user->pegawai()->create($this->getData()); 
            }

            return back()->withSuccess('Success tambah data pegawai');

        } catch (\Exception $e) {

            return back()->withWarning('Internal Server Error with message : ' . $e->getMessage());

        }
    }

    public function showTable(Request $request)
    {
       $this->show($request);

        return datatables($this->users)->addIndexColumn()
        ->addColumn('action', function($user) {

            if ($this->admin) {
                return '
                <a href="'. route('users.edit', $user->id) .'" class="btn btn-primary btn-xs">
                    <i class="fa fa-edit"></i> Edit
                </a> 
                <a href="'. route('users.destroy', $user->id) .'" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Delete
                </a>
                <a href= "'. route('users.fetch', $user->id) .'"  class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i> Tarik data pegawai dari sim asn 
                </a>';
            } 

            return '';
        })
        ->make(true);
    }
}