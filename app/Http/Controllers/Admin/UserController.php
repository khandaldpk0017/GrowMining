<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use App\Services\AllUserViewService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(AllUserViewService $allUserViewService)
    {
        $this->allUserViewService = $allUserViewService;
    }
       protected function index(Request $request)
    {
        if ($request->ajax()) {
                
            return $this->allUserViewService->view($request);
         }   

        $data = [
            'menuUsers' => 'active',
            'menuUsersView' => 'active',
            'menuUsersCollapsed' => 'show',
        ];
        return view('admin.user.user',$data);
    }
    public function add()
    {
        
        return view('admin.user.add');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
           
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $created_at = $request->date ?? date('Y-m-d h:i:s');
        // $parent_id = $request->parent_id ?? null;
        // $mentor_one = $request->mentor_one ?? null;
        // $mentor_two = $request->mentor_two ?? null;
        // dd($created_at)
        
        // dd($request->all()); 
        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
          
            'password' => bcrypt($request->post('password')),
           
            'created_at' => $created_at
        ]);
        $user->assignRole('admin');
        $user->givePermissionTo('all');
        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }
    public function edit($id)
    {
        $cuser = User::find($id);
        $users = User::all();
      

        $data = [
            'users' => $users,
            'cuser' => $cuser,
            'menuUsers' => 'active',
            'menuUsersCollapsed' => 'show',
        ];
        return view('admin.user.edit', $data);

    }
    public function update(Request $request)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        if ($validator->fails()) {
            // return response()->json(["success"=>false,"errors"=>$validator->errors()],400);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // dd($request->all());
        $Id = $request->id;
        $user = User::find($Id);

        $name = $request->name;
        $email = $request->email;

        $user->name = $name;
        $user->email = $email;
        
        $user->save();
        // return response()->json(["success"=>true,"message"=>"user updated successfully"]);
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        // return response()->json(["success"=>true,'message'=>'user deleted successfully']);
    }
    
}

