<li class="relative w-full" x-data="{
                openDropdown: null,
                closeDropdownTimer: null,
                
                toggleMenu() {
                  // Toggle the dropdown visibility when clicked
                  if (this.openDropdown === 'transportationDrawer') {
                    this.openDropdown = null;
                  } else {
                    this.openDropdown = 'transportationDrawer';
                  }
                }
              }" @click="toggleMenu()" @mouseleave="openDropdown = null">
  <!-- Trigger -->
  <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="fas fa-car text-2xl"></i>
    <span class="text-sm mt-1">Transportation</span>
  </div>

  <!-- Drawer -->
  <div x-show="openDropdown === 'transportationDrawer'" @click.away="openDropdown = null"
    @mouseenter="clearTimeout(closeDropdownTimer)" @mouseleave="closeMenu()"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;">
    <div class="h-full flex">

      <!-- LEFT COLUMN (Transportation & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "TRANSPORTATION & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-bus-alt text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Transportation
          </h2>
        </div>

        <!-- Example: Transportation Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Transportation Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Route Planning Dashboard</li>
              <li class="cursor-pointer hover:underline">Field Trip Requests</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Transportation management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Route Management -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-route text-blue-500"></i>
            <span>Route Management</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-map-signs w-5 text-gray-500"></i>
              <span>Bus Route Planning</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
              <span>Stop Assignments</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-broadcast-tower w-5 text-gray-500"></i>
              <span>Real-time Route Updates</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Driver & Fleet -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-id-badge text-blue-500"></i>
            <span>Driver &amp; Fleet</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-user-clock w-5 text-gray-500"></i>
              <span>Driver Scheduling</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-id-card w-5 text-gray-500"></i>
              <span>Licenses &amp; Certifications</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-truck-monster w-5 text-gray-500"></i>
              <span>Vehicle Assignments</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-tools w-5 text-gray-500"></i>
              <span>Fleet Maintenance</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Field Trips & Reports -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-file-signature text-blue-500"></i>
            <span>Field Trips &amp; Reports</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-bus w-5 text-gray-500"></i>
              <span>Field Trip Requests</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clipboard-check w-5 text-gray-500"></i>
              <span>Trip Approvals</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-chart-line w-5 text-gray-500"></i>
              <span>Transportation Reports</span>
            </li>
          </ul>
        </div>
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
