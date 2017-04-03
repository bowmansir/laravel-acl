<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Post;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        Auth::loginUsingId(1);
//        $this->authorize('show',$post);

        if (Gate::denies('edit_form')) {
            abort(403,'sorray');
            // 当前用户不能更新 post...
        }
        return view('posts',compact('post'));
    }

    public function index(Request $requery)
    {
        foreach ($this->getPermissions() as $permission) {
        //  $user =  Auth::loginUsingId(1);
          //  $user = new User();
         //   Auth::loginUsingId(1);
            dd($requery->user());
           // dd($permission->roles);
//            Gate::define($permission->name, function (User $user) use ($permission) {
//                return $user->hasRole($permission->roles);
//            });
        }
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
