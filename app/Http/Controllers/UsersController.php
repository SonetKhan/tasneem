<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function alluser()
    {

        $users = User::latest()->paginate(3);



        return view('admin.user.index', compact('users'));
    }
    public function details(Request $request)
    {

        $users = User::select("*")

            ->when(!empty($request->input('name')), function ($query) use ($request) {
                $query->where('name', 'like', $request->name . '%');
            })
            ->when(!empty($request->input('mobile')), function ($query) use ($request) {
                $query->where('mobile', 'like', $request->mobile . '%');
            })
            ->when(!empty($request->input('user_active')), function ($query) use ($request) {
                $query->where('user_active', $request->user_active);
            })
            ->when(!empty($request->input('user_type')), function ($query) use ($request) {
                $query->where('user_type', $request->user_type);
            })->paginate(1);



        return view('admin.user.searchingData', compact('users'));
    }

    public function addUser()
    {

        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([

            'name' => 'required|min:4',

            'mobile' => 'required|unique:users,mobile',

            'password' => 'required',

            'user_type' => 'required',

            'user_active' => 'required',

            'user_picture' => 'required|mimes:jpeg,jpg.jpeg,png',


        ]);

        //        $validateData['password'] = bcrypt($validateData['password']);


        $userImage = $request->file('user_picture');

        $imageName = hexdec(uniqid()) . '.' . strtolower($userImage->getClientOriginalExtension());

        Image::make($userImage)->resize(100, 100)->save('image/users/' . $imageName);

        $uploadedImage = 'image/users/' . $imageName;

        $user = new User();

        $user->name = $request->name;

        $user->mobile = $request->mobile;

        $user->password = bcrypt($request->password);

        $user->user_type = $request->user_type;

        $user->user_active = $request->user_active;

        $user->user_picture = $uploadedImage;

        $user->save();

        return redirect()->route('all.users')->with('success', 'User inserted successfully');
    }

    public function edit($id)
    {

        $editUser = User::find($id);

        return view('admin.user.edit', compact('editUser'));
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([

            'new_password' => 'confirmed'
        ]);


        $userImage = $request->file('user_picture');

        $userPassword = $request->new_password;

        if ($userImage && $userPassword) {



            $imageName = hexdec(uniqid()) . '.' . strtolower($userImage->getClientOriginalExtension());

            Image::make($userImage)->resize(100, 100)->save('image/users/' . $imageName);

            $uploadedImage = 'image/users/' . $imageName;

            $old_image = $request->old_image;

            unlink($old_image);

            $user = User::find($id);

            $user->name = $request->name;

            $user->mobile = $request->mobile;

            $user->user_picture =  $uploadedImage;

            //            if($request->new_password == $request->new_password_confirmed){
            //
            //                $user->password = bcrypt($request->password);
            //
            //            }else{
            //
            //                return redirect()->back()->with('errors','New password and Confirmed password does not match');
            //            }
            $user->password = bcrypt($request->password);

            $user->user_active = $request->user_active;



            $user->save();

            return redirect()->route('all.users')->with('success', 'Information updated successfully');
        } elseif ($userImage) {



            $imageName = hexdec(uniqid()) . '.' . strtolower($userImage->getClientOriginalExtension());

            Image::make($userImage)->resize(100, 100)->save('image/users/' . $imageName);

            $uploadedImage = 'image/users/' . $imageName;

            $old_image = $request->old_image;

            $user = User::find($id);

            $user->name = $request->name;

            $user->mobile = $request->mobile;

            $user->user_active = $request->user_active;



            $user->save();

            return redirect()->route('all.users')->with('success', 'Information updated successfully');
        } elseif ($userPassword) {



            $user = User::find($id);

            $user->name = $request->name;

            $user->mobile = $request->mobile;

            if ($request->new_password == $request->new_password_confirmed) {

                $user->password = bcrypt($request->new_password);
            } else {

                return redirect()->back()->with('errors', 'New password and Confirmed password does not match');
            }

            $user->user_active = $request->user_active;



            $user->save();

            return redirect()->route('all.users')->with('success', 'Information updated successfully');
        } else {

            $user = User::find($id);

            $user->name = $request->name;

            $user->mobile = $request->mobile;

            $user->user_type = $request->user_type;

            $user->user_active = $request->user_active;

            $user->save();




            return redirect()->route('all.users')->with('success', 'Your information update successfully');
        }
    }

    public function delete($id)
    {

        User::find($id)->delete();

        return redirect()->route('all.users')->with('success', 'Information deleted successfully');
    }


    //........................Profile............................................//



    public function profile($id)
    {

        $profile = User::find($id);

        return view('admin.user.profile.index', compact('profile'));
    }

    public function updateProfile(Request $request, $id)
    {



        $validate = $request->validate([

            'name' => 'max:20',

            'user_picture' => 'mimes:jpeg,jpg.jpeg,png'

        ]);

        $old_image = $request->old_image;

        $userImage = $request->user_picture;

        if ($userImage) {

            $imageName = hexdec(uniqid()) . '.' . strtolower($userImage->getClientOriginalExtension());

            Image::make($userImage)->resize(100, 100)->save('image/users/' . $imageName);

            $uploadedImage = 'image/users/' . $imageName;

            //            $uniqueNumberGenerator = hexdec(uniqid());
            //
            //            $imageExtension = strtolower($userImage->getClientOriginalExtension());
            //
            //            $imageName = $uniqueNumberGenerator.'.'.$imageExtension;
            //
            //            $uploadLocation = 'image/users/';
            //
            //            $uploadedImage = $uploadLocation.$imageName;
            //
            //            $userImage->move($uploadLocation,$imageName);

            unlink($old_image);

            $user = User::find($id);

            $user->name = $request->name;

            $user->user_picture = $uploadedImage;

            $user->save();

            return redirect()->route('all.users');
        } else {
            $user = User::find($id);

            $user->name = $request->name;

            $user->save();

            return redirect()->route('all.users');
        }
    }

    public function changePassword($id)
    {

        $profile = User::find($id);

        return view('admin.user.profile.changePassword', compact('profile'));
    }

    public function updatePassword(Request $request, $id)
    {

        $validateData = $request->validate([

            'current_password' => 'required',

            'new_password' => 'required|confirmed',


        ]);
        $user = User::find(auth()->id());


        if (Hash::check($request->current_password, $user->password)) {


            $user->password = bcrypt($request->new_password);

            $user->save();

            Auth::logout();

            return redirect()->route('login')->with('success', 'Your password changed successfully');
        }
    }
}
