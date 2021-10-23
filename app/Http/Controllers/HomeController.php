<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Todo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['nav'] = 'Admin Dashboard';
        $data['todos'] = Todo::where('user_id', '=', Auth::id())->get();
        return view('admin.dashboard')->with($data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function posts()
    {
        $data['title'] = 'Posts';
        $data['nav'] = 'Posts';
        $posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'), true);
        $data['total_post'] = count($posts);
        $posts = $this->paginate($posts);
        $posts->withPath('');
        $data['posts'] = $posts;
        return view('admin.posts')->with($data);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Single Post
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function post($id)
    {
        $post = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts/'.$id), true);
        $data['title'] = $post['title'];
        $data['nav'] = 'Posts';
        $data['post'] = $post;
        return view('admin.post')->with($data);
    }

    /**
     * Add ToDo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function todoPost(Request $req)
    {
        $todo = new Todo;
        $todo->todo = strip_tags($req->todo);
        $todo->user_id = Auth::id();
        $todo->save();
        $id = $todo->id;

        $res = array(
                    "id" => $id
                );
        return Response::json($res, 201);
        
    }

    /**
     * Todo Edit
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function todoPostEdit(Request $req)
    {
        $todo = Todo::find($req->todo_id);
        $todo->todo = strip_tags($req->todo);
        $todo->save();

        $res = array(
                    "id" => 1
                );
        return Response::json($res, 201);
        
    }

}
