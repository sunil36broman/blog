<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use DB;
use Purifier;
class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'photo' => 'required|mimes:jpeg,jpg|Max:100',
            'category_id' => 'required|integer',
            'body'  => 'required'
            ));

            $logo = $request->file('photo');
            $upload = 'uploads/logo';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);
            if($success){
                $post = new Post;
                $post->title = $request->title;
                $post->slug = $request->slug;
                $post->photo = $filename;
                $post->category_id = $request->category_id;
                $post->body =Purifier::clean($request->body);
                $post->save();
                $post->tags()->sync($request->tags, false);
                Session::flash('success', 'The blog post was successfully save');
                return redirect()->route('posts.show', $post->id);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id);
       $categories = Category::all();
       $cats = [];
       foreach($categories as $category){
            $cats[$category->id]=$category->name;
       }

       $tags = Tag::all();
       $tags2 = [];
       foreach($tags as $tag){
            $tags2[$tag->id]=$tag->name;
       }
       return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
          $this->validate($request, array(
            'title' => 'required|max:255',
            'file' => 'mimes:jpeg,jpg|Max:100',
            'category_id' => 'required|integer',
            'body'  => 'required'
            ));  
        }else{
            $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'file' => 'mimes:jpeg,jpg|Max:100',
            'category_id' => 'required|integer',
            'body'  => 'required'
            ));  
        }
        
       $logo = $request->file('photo');
       if($logo){
            $upload = 'uploads/logo';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);

            $post = Post::find($id);
            $post->title=$request->input('title');
            $post->slug=$request->input('slug');
            $post->photo = $filename;
            $post->category_id=$request->input('category_id');
            $post->body=Purifier::clean($request->input('body'));
            $post->save();
            if(isset($request->tags)){
                 $post->tags()->sync($request->tags);
            }else{
                 $post->tags()->sync(array());
            }
            Session::flash('success', 'This post was successfully saved');
            return redirect()->route('posts.show', $post->id);
        }else{
            $post = Post::find($id);
            $post->title=$request->input('title');
            $post->slug=$request->input('slug');
            $post->category_id=$request->input('category_id');
            $post->body=Purifier::clean($request->input('body'));
            $post->save();
            if(isset($request->tags)){
                 $post->tags()->sync($request->tags);
            }else{
                 $post->tags()->sync(array());
            }
            Session::flash('success', 'This post was successfully saved');
            return redirect()->route('posts.show', $post->id); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);

       /*
       foreach ($post->tags as $tag) {
            DB::table('post_tag')
               ->where('post_id', $id)
               ->where('tag_id', $tag->id)
               ->delete();
        }
        */
        $post->tags()->detach();

        if(!is_null($post->photo)){
            $file_path = 'uploads/logo'.'/'.$post->photo;
            if(file_exists($file_path)) unlink($file_path);
        }
       $post->delete();
       Session::flash('success', 'The post was successfully deleted');
       return redirect()->route('posts.index');
    }
}
