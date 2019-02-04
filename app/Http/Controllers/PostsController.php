<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

class PostsController extends Controller
{
	//Display blog post and single page

	public function blog()
	{
		$blogs = Posts::all()->sortByDesc('created_at');
		return view('/blog', compact('blogs'));
	}

	public function single($id)
	{
		$single = Posts::where('id', $id)->first();
		return view('/single', compact('single'));
	}

	// From this line control the admin panel
	
	public function view()
	{
		return view('admin.dashboard');
	}

	public function post(Request $request)
	{
		// $this->validate($request, [
		// 	'title'   => 'required|max:200',
		// 	'content' => 'required|min:10'
		// ]);

		$image = $request->file('image');
		$name = $request->file('image')->getClientOriginalName();
		$image_name = $request->file('image')->getRealPath();;
		Cloudder::upload($image_name, null);
		list($width, $height) = getimagesize($image_name);
		$image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       //save to uploads directory
		$image->move(public_path("uploads"), $name);

       //Save images
		// $this->saveImages($request, $image_url);
		$posts = new Posts;
		$posts->title   = $request->title;
		$posts->content = $request->contents;
		$posts->author  = Auth::user()->name;
		$posts->image   = $image_url;
		$posts->save();
		return redirect(route('show'))->with("created", "created");
	}

	public function show()
	{
		$posts = Posts::all()->sortByDesc('created_at');
		return view('admin.posts_list', compact('posts'));
	}

	public function edit($id)
	{
		$posts = Posts::where('id', $id)->first();
		return view('admin.edit_posts', compact('posts'));
	}

	public function update(Request $request, $id)
	{
		// $this->validate($request, [
		// 	'title'   => 'required|max:400',
		// 	'content' => 'required|min:20'
		// ]);
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$name = $request->file('image')->getClientOriginalName();
			$image_name = $request->file('image')->getRealPath();;
			Cloudder::upload($image_name, null);
			list($width, $height) = getimagesize($image_name);
			$image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       		//save to uploads directory
			$image->move(public_path("uploads"), $name);
		}
		// dd($photo->getFilename().'.'.$extension);

		$post = Posts::where('id', $id)->first();
		$post->title   = $request->title;
		$post->content = $request->contents;
		if ($request->hasFile('image')) {
			$post->image   = $image_url;
		}
		$post->save();
		return redirect(route('show'))->with("success", "success");
	}

	public function destroy($id)
	{
		$post = Posts::where('id', $id)->delete();
		return redirect(route('show'))->with('delete', 'delete');
	}

}
