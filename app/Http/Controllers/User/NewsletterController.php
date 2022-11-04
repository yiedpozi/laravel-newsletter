<?php

namespace App\Http\Controllers\User;

use App\Models\Newsletter;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::where('user_id', Auth::user()->id)
                            ->withTrashed()
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('user.newsletters.index', compact(
            'newsletters',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.newsletters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsletterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {
        $validated = $request->validated();

        $newsletter = Newsletter::create([
            'user_id' => Auth::user()->id,
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('user.newsletters.index')->withSuccess(__('Successfully create newsletter :title.', ['title' => $newsletter->title]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        return view('user.newsletters.show', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        return view('user.newsletters.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsletterRequest  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterRequest $request, Newsletter $newsletter)
    {
        $validated = $request->validated();

        $newsletter->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('user.newsletters.index')->withSuccess(__('Successfully update newsletter <strong>:title</strong>.', ['title' => $newsletter->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('user.newsletters.index')->withSuccess(__('Successfully delete newsletter <strong>:title</strong>.', ['title' => $newsletter->title]));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function restore(Newsletter $newsletter)
    {
        $newsletter->restore();

        return redirect()->route('user.newsletters.index')->withSuccess(__('Successfully restore newsletter <strong>:title</strong>.', ['title' => $newsletter->title]));
    }
}
