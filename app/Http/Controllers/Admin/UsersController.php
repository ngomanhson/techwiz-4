<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService =$userService;
    }

    public function index(Request $request)
    {
        $status =$request->input('status');
        $list_act =[
            'delete'=>'Temporary delete'
        ];
        if ($status == 'trash'){
            $list_act =[
                'restore'=>'Restore',
                'forceDelete'=>'Permanently deleted'
            ];
            $users =User::onlyTrashed()->paginate(10);
        }else{

            $search='';
            if ($request->input('search')){
                $search=$request->input('search');
            }
            $users = User::where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%");
            })->paginate(10);
        }
        $count_user_active =User::count();
        $count_user_trash =User::onlyTrashed()->count();
        $count =[$count_user_active,$count_user_trash];
        return view('admin.user.index',compact('users','count','list_act','status'));
    }

    public function show($id){

        $user =User::find($id);
        return view('admin.user.show',['user' => $user]);
    }
    public function edit($id){
        $roles =Role::all();
        $user =User::find($id);
        return view('admin.user.edit',[
            'roles'=>$roles,
            'user' => $user]);
    }

    public function create(){
        $user =User::all();
        $roles =Role::all();
        return view('admin.user.create',[
            'roles'=>$roles,
            'user' => $user]);
    }
    public function store(Request $request){
        $request->validate([
                'email'=>'required|string|email|max:255|unique:users',
                'password'=>'required',
                'password_confirmation'=>'required',
                'company_name'=>'required',
                'country'=>'required',
                'street_address'=>'required',
                'phone'=>'required',
                'town_city'=>'required',
                'postcode_zip'=>'required',

            ]
        );
        // Kiểm tra số điện thoại đã tồn tại trong bảng người dùng chưa
        $phoneExists = User::where('phone', $request->input('phone'))->exists();
        if ($phoneExists) {
            Toastr::error('Phone number already exists.', 'ERROR!');
            return back();
        }

        //KIEM TRA PASSWORD
        if ($request->get('password') != $request ->get('password_confirmation')){
            Toastr::error('Confirm password does not match.', 'ERROR!');
            return back();

        }
        $data =$request->all();
        $data['password'] = bcrypt($request->get('password'));
        $users =$this->userService->create($data);
        Toastr::success('You have successfully added.', 'Success!');
        return redirect('admin/user/show/' . $users->id);
    }
    public function delete($id)
    {

        if (Auth::id() != $id) {
            $user = User::find($id);
            $user->delete();
            Toastr::success('Deleted member successfully.', 'Success!');
            return redirect('admin/user/');
        }else{
            Toastr::error('You cannot remove yourself from the system.', 'Error!');
            return redirect('admin/user/');
        }

    }
    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check){
            foreach ($list_check as $k => $id){
                if (Auth::id() == $id){
                    unset($list_check[$k]);
                }
            }
            if (!empty($list_check)){
                $act =$request->input('act');
                if ($act == 'delete'){
                    User::destroy($list_check);
                    return redirect('admin/user')->with('status','You have successfully deleted');
                }
                if ($act == 'restore'){
                    User::withTrashed()
                        ->whereIn('id',$list_check)
                        ->restore();
                    return redirect('admin/user')->with('status','You have successfully recovered');
                }
                if ($act == 'forceDelete'){
                    User::withTrashed()
                        ->whereIn('id',$list_check)
                        ->forceDelete();
                    return redirect('admin/user')->with('status','You have permanently deleted');
                }
            }
            return redirect('admin/user')->with('status','You cannot operate on your account');
        }else{
            return redirect('admin/user')->with('status','You need to choose to perform');
        }
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();

        // Lấy thông tin người dùng cần cập nhật
        $user = User::findOrFail($id);

        // Kiểm tra số điện thoại
        $phoneNumber = $request->input('phone');
        $existingUser = User::where('phone', $phoneNumber)
            ->where('id', '!=', $user->id)
            ->first();
        if ($existingUser) {
            Toastr::error('Phone number is already taken.', 'ERROR!');
            return back();
        }

        // Xử lý mật khẩu
        $password = $request->input('password');
        $passwordConfirmation = $request->input('password_confirmation');
        if (!empty($password)) {
            if ($password != $passwordConfirmation) {
                Toastr::error('Confirm password does not match.', 'ERROR!');
                return back();
            }
            $data['password'] = bcrypt($password);
        } else {
            unset($data['password']);
        }

        // Cập nhật dữ liệu người dùng

        $user->update($data);
        $user->roles()->sync($request->input('roles'));
        Toastr::success('Success update.', 'success!');
        return redirect('admin/user/show/' . $user->id);

    }
}
