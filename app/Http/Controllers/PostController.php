<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;

use Illuminate\Support\Facades\Auth; // <--- Add this!


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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
        ]);

        // Now this will NOT be null because of the Session!
        $validatedData['user_id'] = Auth::id();

        Post::create($validatedData);

        return redirect()->route('posts.create')->with('success', 'Post created!');
     }

     public function edit(Post $post) {

         $postid = Post::find($post);

          return view('posts.edit', ['post' => $post]);

       //  return redirect()->route('posts.update', ['post' => $post])->with('success', 'Post updated successfully!');
    }

    public function update(Post $post){
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

    public function search(Request $request)
        {
            $searchTerm = $request->input('query');

            // Only search if there is actually a query provided
            $searchResults = Post::query()
                ->when($searchTerm, function ($query, $searchTerm) {
                    return $query->where(function ($q)
                     use ($searchTerm) {
                        $q->where('title', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('content', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
                    });
                })
                ->get();

            return view('posts.search_result', [
                'posts' => $searchResults,
                'query' => $searchTerm
            ]);
        }
}
