<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        try {
            $posts = Post::orderBy('id', 'desc')->with('categorys')->get();
            $perPage = $request->input('per_page', 50); // Number of posts per page, default 10
            $posts = Post::paginate($perPage);
            if ($posts) {
                return response()->json([
                    'success' => true,
                    'posts' => $posts,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function getTotalPost()
    {
        try {
            $posts = Post::count();
            if ($posts) {
                return response()->json([
                    'success' => true,
                    'posts' => $posts,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    

    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'cat_id' => ['required'],
                'header_id' => ['required'],
                'filter_id' => ['required'],
                'title' => ['required', 'string', 'max:100', 'min:10', 'unique:posts'],
                'description' => ['required', 'string', 'min:10'],
                'image' => ['required'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $filename = "";

                $preview_image_1 = "";
                $preview_image_2 = "";
                $preview_image_3 = "";
                $preview_image_4 = "";
                $preview_image_5 = "";
                $preview_image_6 = "";
                $preview_image_7 = "";
                $preview_image_8 = "";
                $preview_image_9 = "";
                $preview_image_10 = "";
                $preview_image_11 = "";
                $preview_image_12 = "";

                $gif_file = "";

             
                
                if ($request->file('image')) {
                    $filename = $request->file('image')->store('posts', 'public');
                } else {
                    $filename = "null";
                }

                if ($request->file('preview_image_1')) {
                    $preview_image_1 = $request->file('preview_image_1')->store('posts', 'public');
                } else {
                    $preview_image_1 = "null";
                }
                if ($request->file('preview_image_2')) {
                    $preview_image_2 = $request->file('preview_image_2')->store('posts', 'public');
                } else {
                    $preview_image_2 = "null";
                }
                if ($request->file('preview_image_3')) {
                    $preview_image_3 = $request->file('preview_image_3')->store('posts', 'public');
                } else {
                    $preview_image_3 = "null";
                }
                if ($request->file('preview_image_4')) {
                    $preview_image_4 = $request->file('preview_image_4')->store('posts', 'public');
                } else {
                    $preview_image_4 = "null";
                }
                if ($request->file('preview_image_5')) {
                    $preview_image_5 = $request->file('preview_image_5')->store('posts', 'public');
                } else {
                    $preview_image_5 = "null";
                }
                if ($request->file('preview_image_6')) {
                    $preview_image_6 = $request->file('preview_image_6')->store('posts', 'public');
                } else {
                    $preview_image_6 = "null";
                }
                if ($request->file('preview_image_7')) {
                    $preview_image_7 = $request->file('preview_image_7')->store('posts', 'public');
                } else {
                    $preview_image_7 = "null";
                }
                if ($request->file('preview_image_8')) {
                    $preview_image_8 = $request->file('preview_image_8')->store('posts', 'public');
                } else {
                    $preview_image_8 = "null";
                }
                if ($request->file('preview_image_9')) {
                    $preview_image_9 = $request->file('preview_image_9')->store('posts', 'public');
                } else {
                    $preview_image_9 = "null";
                }
                if ($request->file('preview_image_10')) {
                    $preview_image_10 = $request->file('preview_image_10')->store('posts', 'public');
                } else {
                    $preview_image_10 = "null";
                }
                if ($request->file('preview_image_11')) {
                    $preview_image_11 = $request->file('preview_image_11')->store('posts', 'public');
                } else {
                    $preview_image_11 = "null";
                }
                if ($request->file('preview_image_12')) {
                    $preview_image_12 = $request->file('preview_image_12')->store('posts', 'public');
                } else {
                    $preview_image_12 = "null";
                }

                if ($request->file('gif_file')) {
                    $gif_file = $request->file('gif_file')->store('posts', 'public');
                } else {
                    $gif_file = "null";
                }
                

                $result = Post::create([
                    'cat_id' => $request->cat_id,
                    'header_id' => $request->header_id,
                    'filter_id' => $request->filter_id,
                    'read_time' => $request->read_time,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'image' => $filename,

                    'preview_title_1' => $request->preview_title_1,
                    'preview_title_2' => $request->preview_title_2,
                    'preview_title_3' => $request->preview_title_3,
                    'preview_title_4' => $request->preview_title_4,
                    'preview_title_5' => $request->preview_title_5,
                    'preview_title_6' => $request->preview_title_6,
                    'preview_title_7' => $request->preview_title_7,
                    'preview_title_8' => $request->preview_title_8,
                    'preview_title_9' => $request->preview_title_9,
                    'preview_title_10' => $request->preview_title_10,
                    'preview_title_11' => $request->preview_title_11,
                    'preview_title_12' => $request->preview_title_12,

                    'preview_image_1' => $preview_image_1,
                    'preview_image_2' => $preview_image_2,
                    'preview_image_3' => $preview_image_3,
                    'preview_image_4' => $preview_image_4,
                    'preview_image_5' => $preview_image_5,
                    'preview_image_6' => $preview_image_6,
                    'preview_image_7' => $preview_image_7,
                    'preview_image_8' => $preview_image_8,
                    'preview_image_9' => $preview_image_9,
                    'preview_image_10' => $preview_image_10,
                    'preview_image_11' => $preview_image_11,
                    'preview_image_12' => $preview_image_12,

                    'gif_file' => $gif_file,

                    'file_url' => $request->file_url,
                    'preview_url' => $request->preview_url,
                    'author_name' => $request->author_name,
                    'author_url' => $request->author_url,
                    'others' => $request->others,
                    'views' => 0
                ]);
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Post Add Successfully'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Some Problem"
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $posts = Post::findOrFail($id);
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $posts = Post::findOrFail($id);
            $validation = Validator::make($request->all(), [
                'title' => ['string', 'max:100', 'min:10'],
                'description' => ['string', 'max:1000', 'min:10'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $filename = "";

                $preview_image_1 = "";
                $preview_image_2 = "";
                $preview_image_3 = "";
                $preview_image_4 = "";
                $preview_image_5 = "";
                $preview_image_6 = "";
                $preview_image_7 = "";
                $preview_image_8 = "";
                $preview_image_9 = "";
                $preview_image_10 = "";
                $preview_image_11 = "";
                $preview_image_12 = "";

                $gif_file = "";

                // for image
                $destination = public_path('storage\\' . $posts->image);
                if ($request->file('image')) {
                    if (File::exists($destination)) {
                        File::delete($destination);
                    }
                    $filename = $request->file('image')->store('posts', 'public');
                } else {
                    $filename = $request->old_image;
                }

                // preview -1
                $destinationPreview1 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_1')) {
                    if (File::exists($destinationPreview1)) {
                        File::delete($destinationPreview1);
                    }
                    $preview_image_1 = $request->file('preview_image_1')->store('posts', 'public');
                } else {
                    $preview_image_1 = $request->old_image;
                }
                // preview -2
                $destinationPreview2 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_2')) {
                    if (File::exists($destinationPreview2)) {
                        File::delete($destinationPreview2);
                    }
                    $preview_image_2 = $request->file('preview_image_2')->store('posts', 'public');
                } else {
                    $preview_image_2 = $request->old_image;
                }
                // preview -3
                $destinationPreview3 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_3')) {
                    if (File::exists($destinationPreview3)) {
                        File::delete($destinationPreview3);
                    }
                    $preview_image_3 = $request->file('preview_image_3')->store('posts', 'public');
                } else {
                    $preview_image_3 = $request->old_image;
                }
                // preview -4
                $destinationPreview4 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_4')) {
                    if (File::exists($destinationPreview4)) {
                        File::delete($destinationPreview4);
                    }
                    $preview_image_4 = $request->file('preview_image_4')->store('posts', 'public');
                } else {
                    $preview_image_4 = $request->old_image;
                }
                // preview -5
                $destinationPreview5 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_5')) {
                    if (File::exists($destinationPreview5)) {
                        File::delete($destinationPreview5);
                    }
                    $preview_image_5 = $request->file('preview_image_5')->store('posts', 'public');
                } else {
                    $preview_image_5 = $request->old_image;
                }
                // preview -6
                $destinationPreview6 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_6')) {
                    if (File::exists($destinationPreview6)) {
                        File::delete($destinationPreview6);
                    }
                    $preview_image_6 = $request->file('preview_image_6')->store('posts', 'public');
                } else {
                    $preview_image_6 = $request->old_image;
                }
                // preview -7
                $destinationPreview7 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_7')) {
                    if (File::exists($destinationPreview7)) {
                        File::delete($destinationPreview7);
                    }
                    $preview_image_7 = $request->file('preview_image_7')->store('posts', 'public');
                } else {
                    $preview_image_7 = $request->old_image;
                }

                // preview -8
                $destinationPreview8 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_8')) {
                    if (File::exists($destinationPreview8)) {
                        File::delete($destinationPreview8);
                    }
                    $preview_image_8 = $request->file('preview_image_8')->store('posts', 'public');
                } else {
                    $preview_image_8 = $request->old_image;
                }
                // preview -9
                $destinationPreview9 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_9')) {
                    if (File::exists($destinationPreview9)) {
                        File::delete($destinationPreview9);
                    }
                    $preview_image_9 = $request->file('preview_image_9')->store('posts', 'public');
                } else {
                    $preview_image_9 = $request->old_image;
                }
                // preview -10
                $destinationPreview10 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_10')) {
                    if (File::exists($destinationPreview10)) {
                        File::delete($destinationPreview10);
                    }
                    $preview_image_10 = $request->file('preview_image_10')->store('posts', 'public');
                } else {
                    $preview_image_10 = $request->old_image;
                }
                // preview -11
                $destinationPreview11 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_11')) {
                    if (File::exists($destinationPreview11)) {
                        File::delete($destinationPreview11);
                    }
                    $preview_image_11 = $request->file('preview_image_11')->store('posts', 'public');
                } else {
                    $preview_image_11 = $request->old_image;
                }
                // preview -12
                $destinationPreview12 = public_path('storage\\' . $posts->image);
                if ($request->file('preview_image_12')) {
                    if (File::exists($destinationPreview12)) {
                        File::delete($destinationPreview12);
                    }
                    $preview_image_12 = $request->file('preview_image_12')->store('posts', 'public');
                } else {
                    $preview_image_12 = $request->old_image;
                }


                // gif_file
                $destinationGifFile = public_path('storage\\' . $posts->image);
                if ($request->file('gif_file')) {
                    if (File::exists($destinationGifFile)) {
                        File::delete($destinationGifFile);
                    }
                    $gif_file = $request->file('gif_file')->store('posts', 'public');
                } else {
                    $gif_file = $request->old_image;
                }

            
                // update if finds request file
                if($request->cat_id){
                    $posts->cat_id = $request->cat_id;
                }
                if($request->header_id){
                    $posts->header_id = $request->header_id;
                }
                if($request->filter_id){
                    $posts->filter_id = $request->filter_id;
                }
                if($request->read_time){
                    $posts->read_time = $request->read_time;
                }
                if($request->title){
                    $posts->title = $request->title;
                }
                if($request->slug){
                    $posts->slug = $request->slug;
                }
                if($request->description){
                    $posts->description = $request->description;
                }
                if($filename){
                    $posts->image = $filename;
                }
                if($preview_image_1){
                    $posts->preview_image_1 = $preview_image_1;
                }
                if($preview_image_2){
                    $posts->preview_image_2 = $preview_image_2;
                }
                if($preview_image_3){
                    $posts->preview_image_3 = $preview_image_3;
                }
                if($preview_image_4){
                    $posts->preview_image_4 = $preview_image_4;
                }
                if($preview_image_5){
                    $posts->preview_image_5 = $preview_image_5;
                }
                if($preview_image_6){
                    $posts->preview_image_6 = $preview_image_6;
                }
                if($preview_image_7){
                    $posts->preview_image_7 = $preview_image_7;
                }
                if($preview_image_8){
                    $posts->preview_image_8 = $preview_image_8;
                }
                if($preview_image_9){
                    $posts->preview_image_9 = $preview_image_9;
                }
                if($preview_image_10){
                    $posts->preview_image_10 = $preview_image_10;
                }
                if($preview_image_11){
                    $posts->preview_image_11 = $preview_image_11;
                }
                if($preview_image_12){
                    $posts->preview_image_12 = $preview_image_12;
                }
                if($gif_file){
                    $posts->gif_file = $gif_file;
                }
             
                $result = $posts->save();

                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => "Post Update Successfully",
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Some Problem",
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        $posts = Post::findOrFail($id);
        $destination = public_path('storage\\' . $posts->image);

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $result = $posts->delete();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Post Delete Successfully",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Some Problem",
            ]);
        }
    }

    public function search($search)
    {
        try {
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->with('categorys')->get();
            if ($posts) {
                return response()->json([
                    'success' => true,
                    'posts' => $posts,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
