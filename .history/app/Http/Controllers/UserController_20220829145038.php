<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
// use Illumin\Support\Facades\Hash;

class UserController extends Controller
{

    protected $users;
    protected $roles;
    protected $userRoles;

    public function __construct(User $users,Roles $roles, UserRole $userRoles) {
        $this->users = $users;
        $this->roles = $roles;
        $this->userRoles = $userRoles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $filters = [];
        // $users = User::where('status',1)->orderBy('id','desc');
        $roles = $this->roles->loadList();
        $key = $request->search_key;
        $role = $request->role;
        $userIds = [];
        if(!empty($request->role)) {
            // $userRoles = UserRole::where('role_id',$request->role)->get();
            $userRoles = $this->userRoles->loadList($request->role);
            foreach($userRoles as $item) {
                if(!in_array($item->user_id,$userIds)) {
                    $userIds[] = $item->user_id;
                }
            }
        }
        // $users = $this->users->whereIn('id',$userIds);
        if(!empty($request->search_key)) {
            $filters[] = ['name','LIKE','%'.$request->search_key.'%'];
        }

        $users = $this->users->where($filters,$userIds)->get();
        return view('admin.users.index',[
            'users' => $users,
            'roles' => $roles,
            'key' => $key,
            'search_role' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('admin.users.form-create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // if(errors->any()) {}
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            // $file->move('uploads/images', $fileName);
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/avatar',$fileNameHash);
            $avatar = Storage::url($filePath);
        }
        $pass = Hash::make($request->password);
        $data = [
            "name" => $request->name,
            "avatar" => $avatar ?? null,
            "email" => $request->email,
            "password" => $pass,
        ];
        $user = User::create($data);
        $user->roles()->attach($request->role_ids);
        return redirect()->route('admin.user.create-form')->with('msg', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Roles::all();
        if(!empty($id)) {
            $user = User::find($id);
            $userRoles = $user->roles;
            // dd($userRoles);
            if(!empty($user)) {
                return view('admin.users.form-edit', [
                    'roles' => $roles,
                    'user' => $user,
                    'userRoles' => $userRoles,
                ]);
            }
        }else {
            return redirect()->back()->with('msg_error','Liên kết không tồn tại');
        }
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
    public function update(UserRequest $request, $id)
    {
        
        $userOld = User::find($id);
        // $file = $request->file('avatar');   // Tên file đã mã hóa
        // dd($file);
        // $path = $file->store('images');
        // dd($path);
        // $fileName = $file->getClientOriginalName(); // Lấy ra tên ban đầu của file
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            // $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/avatar',$fileNameHash);
            $avatar = Storage::url($filePath);
            // $file->move('uploads/images', $fileName);
        }else{
            $avatar =  $userOld['avatar'];
        }
        // dd(storage_path().'app/images'. '/' . $fileName);
        // $request->role_id;
        // dd(storage_path());
        // $path = $request->file('avatar')->storeAs('images', $fileName);
        // dd($path);
        // $file = $request->file('avatar')->path();
        $roles = $request->role_ids;
        // dd($roles);
        $data = [
            "name" => $request->name,
            "avatar" => $avatar,
            "email" => $request->email,
        ];
        $user = User::where('id', $id)->update($data);
        $userOld->roles()->sync($roles);
        return redirect()->route('admin.user.edit',['id' => $id])->with('msg', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id='default')
    {
        //
        User::where('id', $id)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }

    public function deleteUsers(Request $request) {
        // print_r($request->ids());
        $ids = $request->ids;
        // dd($ids);
        User::whereIn('id',$ids)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }

    // public function searchUsers(Request $request, $key = 'default') {

    //     // dd($request->all());
    //     $users = Users::all();

    //     if(!empty($request->all())) {
    //         $users = Users::where('name','LIKE','%'.$key.'%')->get(); 
    //     }
    //     return view('admin.users.list',[
    //         'users' => $users,
    //     ]);
    // }
}
