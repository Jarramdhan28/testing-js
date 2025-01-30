<div>
    <form action="javascript:void(0);">
        <input type="text" id="{{ $id }}" placeholder="Cari {{ $type }}" class="p-2 border rounded-md w-64">
    </form>

    <div class="mt-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    @foreach($columns as $column)
                        <th class="text-left p-2">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody id="{{ $resultsId }}">
                @include('components.search-results', ['items' => $items, 'type' => $type])
            </tbody>
        </table>

        <div id="{{ $paginationId }}" class="mt-4">
            {{ $items->links() }}
        </div>
    </div>

    <script>
        document.getElementById('{{ $id }}').addEventListener('input', function (e) {
            fetch(`{{ $url }}?q=${e.target.value}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('{{ $resultsId }}').innerHTML = data.data;
                    document.getElementById('{{ $paginationId }}').innerHTML = data.pagination;
                })
                .catch(err => console.error(err));
        });
    </script>
</div>
 