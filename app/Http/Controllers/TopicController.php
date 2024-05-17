<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TopicController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'desc')->paginate(6);

        return view('topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = Topic::create($request->post());
        return redirect()->route('topic.show', $topic)->with('success', 'Topic was added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $replies = $topic->replies;
        
        return view('topic.show', [
            'topic' => $topic,
            'replies' => $replies,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        return view('topic.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $topic->update($request->post());

        return redirect()->route('topic.show', $topic)->with('success', 'Topic was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        if (Auth::user()->id != 1) {
            return redirect()->back()->with('danger', 'Sorry，only admin user can delete the article！');
        }
        $topic->delete();
        return redirect()->route('topic.index')->with('success', 'Topic was deleted');
    }
}
