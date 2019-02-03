<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

		$photo     = $request->file('image');
		$extension = $photo->getClientOriginalExtension();
		Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));

		$posts = new Posts;
		$posts->title   = $request->title;
		$posts->content = $request->contents;
		$posts->author  = Auth::user()->name;
		$posts->image   = $photo->getFilename().'.'.$extension;
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
			$photo     = $request->file('image');
			$extension = $photo->getClientOriginalExtension();
			Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));
		}
		// dd($photo->getFilename().'.'.$extension);

		$post = Posts::where('id', $id)->first();
		$post->title   = $request->title;
		$post->content = $request->contents;
		if ($request->hasFile('image')) {
			$post->image   = $photo->getFilename().'.'.$extension;
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
