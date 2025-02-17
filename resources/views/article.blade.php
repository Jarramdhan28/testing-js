<x-app-layout>
    <h2 class="text-2xl font-semibold">Data User</h2>

    <div class="mt-10">
        <x-search 
            id="articleSearch" 
            results-id="articleList" 
            pagination-id="articlePagination" 
            url="{{ route('article.index') }}" 
            type="articles" 
            :columns="['ID', 'Title', 'Creator','Content', 'aksi']" 
            :items="$articles" 
            :users="$users"
        />
    </div>
</x-app-layout>


{{-- namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleRating;
use App\Models\AssessmentInstrument;
use Illuminate\Http\Request;

class ArticleRatingController extends Controller {
    public function show(Article $article) {
        $questions = AssessmentInstrument::all(); // Ambil semua pertanyaan

        return view('articles.rating', compact('article', 'questions'));
    }

    public function store(Request $request) {
        $request->validate([
            'article_id'   => 'required|exists:articles,id',
            'scores'       => 'required|array',
            'scores.*'     => 'required|integer|min:1|max:5',
        ]);

        foreach ($request->scores as $instrument_id => $score) {
            ArticleRating::updateOrCreate(
                ['article_id' => $request->article_id, 'instrument_id' => $instrument_id],
                ['score' => $score]
            );
        }

        return response()->json(['message' => 'Penilaian berhasil disimpan!']);
    }
}

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
    <h2 class="text-xl font-bold mb-4">Penilaian Artikel: {{ $article->title }}</h2>

    <form id="ratingForm">
        <input type="hidden" name="article_id" value="{{ $article->id }}">

        @foreach($questions as $question)
            <div class="mb-4">
                <p class="font-semibold">{{ $question->question }}</p>
                <div class="flex space-x-2">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="flex items-center">
                            <input type="radio" name="scores[{{ $question->id }}]" value="{{ $i }}" required class="hidden peer">
                            <span class="cursor-pointer px-3 py-1 bg-gray-200 peer-checked:bg-blue-500 peer-checked:text-white rounded">
                                {{ $i }}
                            </span>
                        </label>
                    @endfor
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>

    <p id="result" class="mt-4 text-green-600 font-bold"></p>
</div>

<script>
    document.getElementById("ratingForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('article-rating.store') }}", {
            method: "POST",
            body: formData,
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("result").innerText = "Penilaian berhasil disimpan!";
        })
        .catch(error => console.error("Error:", error));
    });
</script>
@endsection --}}

