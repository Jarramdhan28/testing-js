<x-app-layout>
    <h2 class="text-2xl font-semibold">Tab Article</h2>
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Tab Buttons -->
        <div class="flex border-b">
            <button class="tab-button px-4 py-2 text-gray-600 focus:outline-none border-b-2 border-transparent hover:border-blue-500" onclick="openTab(event, 'articles')">Article</button>
            <button class="tab-button px-4 py-2 text-gray-600 focus:outline-none border-b-2 border-transparent hover:border-blue-500" onclick="openTab(event, 'users')">User</button>
            <button class="tab-button px-4 py-2 text-gray-600 focus:outline-none border-b-2 border-transparent hover:border-blue-500" onclick="openTab(event, 'keterangan')">Keterangan</button>
        </div>

        <!-- Tab Content -->
        <div class="p-4">
            <div id="articles" class="tab-content hidden">
                <h2 class="text-xl font-semibold">Article List</h2>
                <p>Ini adalah daftar artikel.</p>
            </div>
            <div id="users" class="tab-content hidden">
                <h2 class="text-xl font-semibold">User List</h2>
                <p>Ini adalah daftar user.</p>
            </div>
            <div id="keterangan" class="tab-content hidden">
                <h2 class="text-xl font-semibold">Keterangan</h2>
                <p>Informasi tambahan tentang sistem.</p>
            </div>
        </div>
    </div>

    <script>
        function openTab(event, tabId) {
            // Sembunyikan semua tab
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('border-blue-500', 'text-blue-500'));

            // Tampilkan tab yang diklik
            document.getElementById(tabId).classList.remove('hidden');
            event.currentTarget.classList.add('border-blue-500', 'text-blue-500');

            // Simpan tab aktif ke localStorage
            localStorage.setItem('activeTab', tabId);
        }

        // Set tab default dari localStorage
        document.addEventListener("DOMContentLoaded", function() {
            let activeTab = localStorage.getItem('activeTab') || 'articles'; // Default ke 'articles' jika belum ada di localStorage
            document.querySelector(`[onclick="openTab(event, '${activeTab}')"]`).click();
        });
    </script>
</x-app-layout>
