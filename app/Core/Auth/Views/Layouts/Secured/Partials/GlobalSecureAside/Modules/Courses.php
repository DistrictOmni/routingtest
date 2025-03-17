<li class="relative w-full" x-data="{
                openDropdown: null,
                closeDropdownTimer: null,
                
                toggleMenu() {
                  // Toggle the dropdown visibility when clicked
                  if (this.openDropdown === 'coursesDrawer') {
                    this.openDropdown = null;
                  } else {
                    this.openDropdown = 'coursesDrawer';
                  }
                }
              }" @click="toggleMenu()" @mouseleave="openDropdown = null">
  <!-- Trigger -->
  <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="fas fa-user-cog text-2xl"></i>
    <span class="text-sm mt-1">Courses</span>
  </div>

  <!-- Drawer -->
  <div x-show="openDropdown === 'coursesDrawer'" @click.away="openDropdown = null"
    @mouseenter="clearTimeout(closeDropdownTimer)" @mouseleave="closeMenu()"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;">
    <div class="h-full flex">

      <!-- LEFT COLUMN (Courses & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "COURSES & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-book-open text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Courses
          </h2>
        </div>

        <!-- Example: Favorites / Quick Access -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Course Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Intro to AI</li>
              <li class="cursor-pointer hover:underline">Advanced Math Toolbox</li>
            </ul>
          </div>
          <!-- Additional left-column sections as needed... -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (grid for Course categories, schedules, etc.) -->
      <div 
        class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm"
      >
        <!-- COLUMN #1: Course Management -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-tasks text-blue-500"></i>
            <span>Course Management</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-plus-square w-5 text-gray-500"></i>
              <span>Create New Course</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-edit w-5 text-gray-500"></i>
              <span>Edit Existing Courses</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-clone w-5 text-gray-500"></i>
              <span>Copy Course Template</span>
            </li>
            <!-- Add more items... -->
          </ul>
        </div>

        <!-- COLUMN #2: Scheduling & Sections -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-calendar-alt text-blue-500"></i>
            <span>Scheduling &amp; Sections</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-calendar-check w-5 text-gray-500"></i>
              <span>Build Timetables</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-users w-5 text-gray-500"></i>
              <span>Manage Course Sections</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-chalkboard-teacher w-5 text-gray-500"></i>
              <span>Assign Faculty</span>
            </li>
            <!-- Add more items... -->
          </ul>
        </div>

        <!-- COLUMN #3: Course Catalog & Prerequisites -->
        <div>
          <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
            <i class="fas fa-book text-blue-500"></i>
            <span>Catalog &amp; Prereqs</span>
          </h2>
          <ul class="space-y-1">
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
            >
              <i class="fas fa-list-alt w-5 text-gray-500"></i>
              <span>View Full Catalog</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-link w-5 text-gray-500"></i>
              <span>Manage Prerequisites</span>
            </li>
            <li 
              class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
            >
              <i class="fas fa-tags w-5 text-gray-500"></i>
              <span>Course Tags &amp; Attributes</span>
            </li>
            <!-- Add more items... -->
          </ul>
        </div>

        <!-- Add additional columns if you have more categories (e.g. grading, registration rules, etc.) -->
      </div>
    </div>
  </div>
</li>
