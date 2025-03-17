<li class="relative w-full" x-data="{
                openDropdown: null,
                closeDropdownTimer: null,
                
                toggleMenu() {
                  // Toggle the dropdown visibility when clicked
                  if (this.openDropdown === 'libraryDrawer') {
                    this.openDropdown = null;
                  } else {
                    this.openDropdown = 'libraryDrawer';
                  }
                }
              }" @click="toggleMenu()" @mouseleave="openDropdown = null">
  <!-- Trigger -->
  <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="fas fa-user-cog text-2xl"></i>
    <span class="text-sm mt-1">Library</span>
  </div>

  <!-- Drawer -->
  <div x-show="openDropdown === 'libraryDrawer'" @click.away="openDropdown = null"
    @mouseenter="clearTimeout(closeDropdownTimer)" @mouseleave="closeMenu()"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;">
    <div class="h-full flex">

      <!-- LEFT COLUMN (Library & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "LIBRARY & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-book text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Library
          </h2>
        </div>

        <!-- Example: Library Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Library Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">New Arrivals Dashboard</li>
              <li class="cursor-pointer hover:underline">Overdue Notices</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Library management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Catalog Management -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-list text-blue-500"></i>
            <span>Catalog Management</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-plus-circle w-5 text-gray-500"></i>
              <span>Add / Edit Books</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-search w-5 text-gray-500"></i>
              <span>Search Catalog</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-barcode w-5 text-gray-500"></i>
              <span>Barcode Management</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Circulation -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-exchange-alt text-blue-500"></i>
            <span>Circulation</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-sign-out-alt w-5 text-gray-500"></i>
              <span>Check-Out / Check-In</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-user-clock w-5 text-gray-500"></i>
              <span>Hold Requests</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-book-dead w-5 text-gray-500"></i>
              <span>Fines &amp; Overdue Fees</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Reports & Inventory -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-chart-line text-blue-500"></i>
            <span>Reports &amp; Inventory</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-file-alt w-5 text-gray-500"></i>
              <span>Usage Reports</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
              <span>Inventory Audit</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-file-import w-5 text-gray-500"></i>
              <span>Import / Export Data</span>
            </li>
          </ul>
        </div>

        <!-- Add more columns or sections if needed -->
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
