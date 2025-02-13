<x-app-layout>
    <h2 class="text-2xl font-semibold">Tab Article</h2>
    
     <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Tab Buttons -->
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" role="tablist">
                <li class="mr-2">
                    <button class="tab-button inline-block p-4 rounded-t-lg" id="profile-tab" data-tab="profile">Profile</button>
                </li>
                <li class="mr-2">
                    <button class="tab-button inline-block p-4 rounded-t-lg" id="dashboard-tab" data-tab="dashboard">Dashboard</button>
                </li>
                <li class="mr-2">
                    <button class="tab-button inline-block p-4 rounded-t-lg" id="settings-tab" data-tab="settings">Settings</button>
                </li>
                <li>
                    <button class="tab-button inline-block p-4 rounded-t-lg" id="contacts-tab" data-tab="contacts">Contacts</button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="p-4">
            <div id="profile" class="tab-content hidden p-4 rounded-lg bg-gray-50">
                <p class="text-sm text-gray-500">Ini adalah **Profile** tab.</p>
            </div>
            <div id="dashboard" class="tab-content hidden p-4 rounded-lg bg-gray-50">
                <p class="text-sm text-gray-500">Ini adalah **Dashboard** tab.</p>
            </div>
            <div id="settings" class="tab-content hidden p-4 rounded-lg bg-gray-50">
                <p class="text-sm text-gray-500">Ini adalah **Settings** tab.</p>
            </div>
            <div id="contacts" class="tab-content hidden p-4 rounded-lg bg-gray-50">
                <p class="text-sm text-gray-500">Ini adalah **Contacts** tab.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let tabs = document.querySelectorAll(".tab-button");
            let contents = document.querySelectorAll(".tab-content");
            let activeTab = localStorage.getItem("activeTab") || "profile";

            function switchTab(tabId) {
                contents.forEach(content => content.classList.add("hidden"));
                tabs.forEach(tab => tab.classList.remove("border-blue-500", "text-blue-500"));

                document.getElementById(tabId).classList.remove("hidden");
                document.querySelector(`[data-tab="${tabId}"]`).classList.add("border-blue-500", "text-blue-500");

                localStorage.setItem("activeTab", tabId);
            }

            tabs.forEach(tab => {
                tab.addEventListener("click", function () {
                    switchTab(this.getAttribute("data-tab"));
                });
            });

            switchTab(activeTab);
        });
    </script>
</x-app-layout>
