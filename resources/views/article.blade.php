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
