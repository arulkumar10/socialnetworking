<?php

namespace App\Http\Controllers;
    

use Session;
use App\User;
use App\post;
use App\like;
use App\Http\Requests;
use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    public function index()
    {
        $User=User::all();
        // print_r($User);die;  
        return view('users.userListing')->with(['user'=>$User]);

    }
    public function store(userRequest $request)
    {
        // print_r( $request->all());die();
        $User = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]); 

        if ($User) 
        {
            return redirect(route('Profile'))->with(['message'=>'Successfully Registered']);           
        }              

    }

    public function edit(Request $request,$id)
    {

        $user=User::findorfail($id);
        return view('users.userDetails')->with(['user'=>$user]);

    }
    public function update(Request $request,$id)
    {
        $user=User::findorfail($id);

            $user->name     = $request->input('name');
            $user->email    = $request->input('email');

            if($request->has('password'))
            {
                $user->password = $request->input('password');
            }            

            if ($user->save())
            {
                return redirect(route('show'))->with(['message'=>'Records Updated Successfully']);
            }

    }

    public function destroy(Request $request,$id)
    {
        $user=User::findorfail($id);

        if ($user->delete()) 
        {
            return redirect(route('show'))->with(['message'=>'Records Deleted']);
        }

    }

    public function dashboard()
    {
    	return view('users.layout');
    }

    public function register()
    {
    	return view('users.userRegister');
    }

    // public function fileUpload(Request $request)
    // {

    //     $random=rand(1000,5000).$request->file('image')->getClientOriginalName();

    //     $request->file('image')->move( public_path() . '/images/' , $random );

    //     User::create([
    //     'image'    => url('/').'/images/'. $random]);

    // }

    /*profile functionality*/
    public function profileindex()
    {

        $post=post::all();
        // print_r($post);die();
        return view('profile.userCommentsListing')->with(['posts'=>$post]);
    }  

    public function userPost(Request $request)
    {

        // die('sdgsd');

        if($request->input('post') !== '')
        {
            $post=post::create([
            'posts'=>$request->input('post')
            ]);

            $countlike=like::where(['user_id'=>$id])->where('like',1)->count();

            

            $countdislike=like::where('dislike',0)->count();            

            return redirect(route('profileindex'))->with(['countlike'=>$countlike])->with(['countdislike'=>$countdislike]);  
        }
        else
        {
            return redirect(route('Profile')); 
        }    

    }


    //like functionlity
    public function userLike(Request $request)
    {

        $likecount=$request['countlike'];
        $dislikecount=$request['countdislike'];

        if(auth()->check())
        {
            $post_like=like::where('post_id',$request['id'])->where('user_id',$user_id)->where('like',1)->count();
            
            if($post_like == 0)
            {
                $delete= like::where('post_id',$request['id'])->where('user_id',$user_id)->delete();
                
                $like=like::create([
                                    'post_id' => $request['id'],
                                    'user_id' => $user_id,
                                    'like'    => 1
                                 ]);

                return Response::json(['status' => true,'likecount' => $likecount,'dislikecount' => $dislikecount]); 
            }
            else
            {
                return Response::json(['status' => false,'liked' => 'liked']); 
            }
        }
    }//
}
