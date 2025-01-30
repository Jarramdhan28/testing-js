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
        @endif
    </tr>
@empty
<tr>
    <td colspan="3" class="text-center">No results found.</td>
</tr>
@endforelse
