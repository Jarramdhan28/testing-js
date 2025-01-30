<x-app-layout>
    <h2 class="text-2xl font-semibold">Data User</h2>

    <div class="mt-10">
        <x-search 
            id="userSearch" 
            results-id="userList" 
            pagination-id="userPagination" 
            url="{{ route('users.index') }}" 
            type="users" 
            :columns="['ID', 'Name', 'Email', 'Aksi']" 
            :items="$users" 
        />
    </div>
</x-app-layout>
