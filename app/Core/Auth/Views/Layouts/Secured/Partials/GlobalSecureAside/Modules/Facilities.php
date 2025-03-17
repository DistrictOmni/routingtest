<li class="relative w-full" x-data="{
                openDropdown: null,
                closeDropdownTimer: null,
                
                toggleMenu() {
                  // Toggle the dropdown visibility when clicked
                  if (this.openDropdown === 'facilitiesDrawer') {
                    this.openDropdown = null;
                  } else {
                    this.openDropdown = 'facilitiesDrawer';
                  }
                }
              }" @click="toggleMenu()" @mouseleave="openDropdown = null">
  <!-- Trigger -->
  <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="fas fa-user-cog text-2xl"></i>
    <span class="text-sm mt-1">Facilities</span>
  </div>

  <!-- Drawer -->
  <div x-show="openDropdown === 'facilitiesDrawer'" @click.away="openDropdown = null"
    @mouseenter="clearTimeout(closeDropdownTimer)" @mouseleave="closeMenu()"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;">
    <div class="h-full flex">

      <!-- LEFT COLUMN (Facilities & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "FACILITIES & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-building text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Facilities
          </h2>
        </div>

        <!-- Example: Facilities Quick Links or Favorites -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Facilities Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Current Repair Requests</li>
              <li class="cursor-pointer hover:underline">Event Bookings Dashboard</li>
            </ul>
          </div>
          <!-- Additional left-column sections if needed -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (Facilities management sections) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Building Usage -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-clipboard-list text-blue-500"></i>
            <span>Building Usage</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-calendar-check w-5 text-gray-500"></i>
              <span>Room Reservations</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-door-open w-5 text-gray-500"></i>
              <span>Key / Access Requests</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #2: Maintenance & Repairs -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-tools text-blue-500"></i>
            <span>Maintenance</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-wrench w-5 text-gray-500"></i>
              <span>Submit Repair Request</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-hammer w-5 text-gray-500"></i>
              <span>Maintenance Tracking</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-hard-hat w-5 text-gray-500"></i>
              <span>Safety Inspections</span>
            </li>
          </ul>
        </div>

        <!-- COLUMN #3: Events & Rentals -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-calendar-alt text-blue-500"></i>
            <span>Events / Rentals</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-handshake w-5 text-gray-500"></i>
              <span>Facility Rental Requests</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clock w-5 text-gray-500"></i>
              <span>Event Scheduling</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-users w-5 text-gray-500"></i>
              <span>Staffing / Volunteer Needs</span>
            </li>
          </ul>
        </div>
      </div>
      <!-- END RIGHT COLUMNS -->
    </div>
  </div>
</li>
