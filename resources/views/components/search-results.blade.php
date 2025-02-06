@forelse($items as $item)
    <tr>
        @if($type === 'users')
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>Hapus dan Edit</td>
        @elseif($type === 'articles')
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ Str::limit($item->content, 50) }}</td>
            <td>
                <select class="user-select" data-article-id="{{ $item->id }}">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ $item->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </td>
        @endif
    </tr>
@empty
<tr>
    <td colspan="3" class="text-center">No results found.</td>
</tr>
@endforelse

<script>
    document.querySelectorAll('.user-select').forEach(select => {
        select.addEventListener('change', function () {
            let articleId = this.getAttribute('data-article-id');
            let userId = this.value;

            fetch(`/update-article-user/${articleId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ user_id: userId })
            })
            .then(res => res.json())
            .then(data => {
                location.reload(); 
            })
            .catch(err => console.error(err));
        });
    });
</script>

