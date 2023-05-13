<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $words = Word::query();
        
        if ($request->has('word')) {
            $searchTerm = $request->input('word');
            $words->where('word', 'like', '%'.$searchTerm.'%')
                ->orWhere('en', 'like', '%'.$searchTerm.'%')
                ->orWhere('ar', 'like', '%'.$searchTerm.'%');
        }
        
        $words = $words->paginate(10);
        return view('words.index', compact('words'));
    }
    
    public function create()
    {
        return view('words.create');
    }
    
    public function store(StoreWordRequest $request)
    {
        $word = new Word();
        $word->word = $request->input('word');
        $word->ar = $request->input('ar');
        $word->en = $request->input('en');
        $word->save();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_added'));
    }
    
    public function edit(Word $word)
    {
        return view('words.edit', compact('word'));
    }
    
    public function update(UpdateWordRequest $request, Word $word)
    {
        $word->ar = $request->input('ar');
        $word->en = $request->input('en');
        $word->save();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_updated'));
    }
    
    public function destroy(Word $word)
    {
        $word->delete();
        
        return redirect()->route('word.index')->withStatus(__('titles.word_deleted'));
    }
}
