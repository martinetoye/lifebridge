<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Auth;
use App\User;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function profile($username)
  {
    if(Auth::check()){
      //Get user id
      $user = User::where('username', $username)->first();

      return view('users.profile')->with('user', $user);

    } else {
      return redirect()->route('home');
    }

  }
  public function settings()
  {
    $user = Auth::user();
    return view('users.settings')->with('user', $user);
  }

  public function update(Request $request)
  {
    $user = Auth::user();

    //Validate Inputs
    $validateData = $request->validate([
      'username' => 'required',
      'email' => 'required|email',
      'about' => 'nullable',
      'name' => 'nullable',
      'avatar' => 'image',
    ]);

    if($request->hasFile('avatar')){
      if($user->avatar == 'default-avatar.png'){
          //
      } else {
        //Delete Old Avatar
        $oldFile = Storage::delete('public/userfiles/avatars/' . $user->avatar);
      }
      $avatar = $request->file('avatar');
      $filename = 'avatar-' . $user->id . '-' . time() . '.' . $avatar->getClientOriginalExtension();
      $img = Image::make($avatar->getRealPath())->orientate()->stream();
      $store = Storage::put(
        'public/userfiles/avatars/' . $filename, $img
      );
      //Save updated User Info
      $user->username = $request->get('username');
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->avatar = $filename;
      $user->about = $request->get('about');
      $user->update();
    } else {
      $user->username = $request->get('username');
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->about = $request->get('about');
      $user->update();
    }
      //If Success
      return redirect()->route('profile.update', Auth::user()->username)->with('success', 'Profile Updated');
    }


  public function follow($id)
  {
    $follow = Auth::user()->toggleFollow($id);

    return back();
  }
}
