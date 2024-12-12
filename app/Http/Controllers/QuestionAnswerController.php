<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $questionAnswer = QuestionAnswer::all();
        return view('questionanswer.index',compact('questionAnswer'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $request->user()->questionAnswer()->create($validated);

        return redirect()->route('question_answer.index')->with('success', 'Pesan saran berhasil dikirim!');

    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionAnswer $questionAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionAnswer $questionAnswer): View
    {
        $questionAnswer = QuestionAnswer::findOrFail($questionAnswer->id);

        return view('questionanswer.edit',compact('questionAnswer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionAnswer $questionAnswer)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $questionAnswer = QuestionAnswer::findOrFail($questionAnswer->id);
        $questionAnswer->update($validated);

        return redirect()->route('question_answer.index')->with('success', 'Question answer berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionAnswer $questionAnswer): RedirectResponse
    {
        $questionAnswer->delete();
        return redirect()->route('question_answer.index')->with('success', 'Question answer berhasil dihapus!');
    }
}
