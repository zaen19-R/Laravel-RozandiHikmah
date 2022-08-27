<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Exports\PostExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

use function PHPUnit\Framework\fileExists;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $img = Image::make('img/x.jpg')->response('jpg');
        // // return $img; 
        return view('/dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
            // 'Image' => $img,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($files = $request->file('image')) {
            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = 'img/';
            $ImageUpload->save($originalPath . time() . $files->getClientOriginalName());
            $validateData['image'] = $originalPath . time() . $files->getClientOriginalName();
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['exerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        return redirect('/dashboard/posts/')->with('success', 'New post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->oldImage;
        $filepath = public_path('/') . $data;

        if (fileExists($filepath)) {
            @unlink($filepath);
        }

        $rules = ([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|file|max:1024',
        ]);

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if ($files = $request->file('image')) {
            //delete Old Image
            if ($request->oldImage) {
                // $image = Image::make($request->oldImage)->destroy('img/' . $request->oldImage);
            }

            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = 'img/';
            $ImageUpload->save($originalPath . time() . $files->getClientOriginalName());
            $validateData['image'] = $originalPath . time() . $files->getClientOriginalName();
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['exerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $post->id)
            ->update($validateData);

        return redirect('/dashboard/posts/')->with('success', 'New post has been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $data = $post->image;
        $filepath = public_path('/') . $data;

        if (fileExists($filepath)) {
            @unlink($filepath);
        }
        Storage::delete(['1661594027ScreenShot-2022-7-20_23-48-47.jpg']);
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        //
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function PostExport()
    {
        return Excel::download(new PostExport, 'All_Post.xlsx');
    }
}
