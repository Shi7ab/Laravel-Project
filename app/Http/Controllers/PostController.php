<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    // This is a test controller for demonstration purposes.
    // public function firstAction() {
    //     $page_name = 'Contact Us';
    //     $page_description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.';
    //     return view('contact', compact('page_name', 'page_description'));
    // }

    public function posts() {

        $postsfromDB = Post::all();

        // @dd($postsfromDB);

        // $all_posts = [
        //     ['id' => 1, 'title' => 'First Post', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.','description' => 'This is the first post.', 'created_at' => '2023-01-01 10:00:00'],
        //     ['id' => 2, 'title' => 'Second Post', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.', 'description' => 'This is the second post.', 'created_at' => '2023-01-02 11:00:00'],
        //     ['id' => 3, 'title' => 'Third Post', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.', 'description' => 'This is the third post.', 'created_at' => '2023-01-03 12:00:00'],
        // ];
         return  view('posts.post', ['posts' => $postsfromDB]);
    }

    // convention over configration
    public function show(Post $post) {
        //   $singlepostfromDB = Post::find($post);
        //   $singlepostfromDB = Post::findOrfail($post);

        // $singlepostfromDB = Post::where('id', $post);
        /*if(is_null($singlepostfromDB)){
            // return to_route(route: 'posts.post');

        }*/

        //  return view('posts.show', ['post' => $singlepostfromDB]);
          return view('posts.show', ['post' => $post]);

    }


    public function create() {
         return view('posts.create');
    }

    public function store(Request $request) {
        // Validate the incoming request data
     /*   $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);*/

        // simple way to insert new record in DB
       /*
        $post = new Post;
         $post->title = $request->title;
         $post->description = $request->description;
         $post->content = $request->content;

         $post->save();

        */
         // another way to insert and avoid Mass Asigment

         Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
         ]);


        // $data = $validatedData;

        // Here you would typically save the validated data to the database
        // For demonstration, we'll just return a success message

         return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }

     public function edit(Post $post) {

         $postid = Post::find($post);

          return view('posts.edit', ['post' => $post]);

       //  return redirect()->route('posts.update', ['post' => $post])->with('success', 'Post updated successfully!');
    }

    public function update($post){
        $title = request()->title;
        $content = request()->content;
        $description = request()->description;

        $postidfromDB = Post::find($post);
        $postidfromDB->update([
           'title' => $title,
           'content' => $content,
           'description' => $description,
        ]);

        return view('posts.show', ['post' => $postidfromDB]);
    }

    public function delete($id) {

            // $postidfromDB = Post::find($post)->delete();
            Post::destroy($id);
            // return redirect()->route('posts.post')->with('success', 'Post deleted successfully!');
    }
}
