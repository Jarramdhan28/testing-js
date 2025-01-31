<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search Select</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-md w-96 relative">
        <h1 class="text-2xl font-semibold text-center mb-4">Live Search Select</h1>

        <!-- Input Search -->
        <div class="relative">
            <input type="text" id="search" placeholder="Cari user..." autocomplete="off"
                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <i class="ph ph-magnifying-glass absolute right-3 top-3 text-gray-500"></i>
        </div>

        <!-- Dropdown List -->
        <ul id="dropdown" class="hidden absolute w-full bg-white border rounded-lg mt-2 shadow-lg max-h-48 overflow-y-auto z-10"></ul>
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const dropdown = document.getElementById('dropdown');

        function fetchUsers(query = '') {
            fetch(`/search-users?q=${query}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.json())
                .then(data => {
                    dropdown.innerHTML = ''; // Reset dropdown
                    if (data.length > 0) {
                        data.forEach(user => {
                            let li = document.createElement('li');
                            li.className = "p-2 cursor-pointer hover:bg-gray-200";
                            li.textContent = `${user.name} - ${user.email}`;
                            li.addEventListener('click', () => {
                                searchInput.value = user.name;
                                dropdown.classList.add('hidden');
                            });
                            dropdown.appendChild(li);
                        });
                        dropdown.classList.remove('hidden');
                    } else {
                        dropdown.classList.add('hidden');
                    }
                })
                .catch(err => console.error(err));
        }

        searchInput.addEventListener('focus', () => fetchUsers()); // Load users on click
        searchInput.addEventListener('input', () => fetchUsers(searchInput.value)); // Filter results

        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
