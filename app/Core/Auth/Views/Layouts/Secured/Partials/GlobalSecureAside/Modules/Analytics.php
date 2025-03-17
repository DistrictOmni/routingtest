<!-- ANALYTICS (HOVER sub-drawer) -->
<li 
  class="relative w-full"
  @mouseenter="openDropdown = 'analyticsDrawer'"
  @mouseleave="openDropdown = (openDropdown === 'analyticsDrawer') ? null : openDropdown"
>
  <!-- Trigger for Analytics Drawer -->
  <div 
    class="flex flex-col items-center justify-center w-full h-20 
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors"
    aria-label="Analytics Drawer"
  >
    <i class="fas fa-chart-bar text-2xl" aria-hidden="true"></i>
    <span class="text-sm mt-1">Analytics</span>
  </div>

  <!-- The Drawer Itself (fixed, multi-column) -->
  <div 
    x-show="openDropdown === 'analyticsDrawer'"
    @click.away="openDropdown = null"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto"
    style="display: none;"
    role="menu" 
    aria-orientation="vertical" 
    aria-label="Analytics Drawer"
  >
    <!-- Full-height flex container -->
    <div class="h-full flex">

      <!-- LEFT COLUMN (Analytics & Quick Actions) -->
      <div 
        class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4"
      >
        <!-- Large Title: "ANALYTICS & QUICK ACTIONS" -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-chart-bar text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">
            Analytics
          </h2>
        </div>

        <!-- Example: Quick Links or Search for analytics items -->
        <div class="flex-1 overflow-y-auto text-sm text-gray-800">
          <!-- Subsection: Favorites / Bookmarks, or frequent tasks for analytics -->
          <div class="mb-8">
            <h3 class="text-gray-700 font-semibold mb-2 flex items-center space-x-2">
              <i class="fas fa-star w-5 text-yellow-500"></i>
              <span>My Analytics Favorites</span>
            </h3>
            <ul class="ml-6 list-disc text-gray-600 space-y-1">
              <li class="cursor-pointer hover:underline">Daily KPI Dashboard</li>
              <li class="cursor-pointer hover:underline">Admissions Funnel</li>
            </ul>
          </div>

          <!-- Additional left-column sections as needed... -->
        </div>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMNS (grid of analytics categories) -->
      <div class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
  <!-- COLUMN #1: Overview -->
  <div>
    <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
      <i class="fas fa-tachometer-alt text-blue-500"></i>
      <span>Overview</span>
    </h2>
    <ul class="space-y-1">
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
        <i class="fas fa-chart-line w-5 text-gray-500"></i>
        <span>Application Dashboard</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-key w-5 text-gray-500"></i>
        <span>License Management</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-sync w-5 text-gray-500"></i>
        <span>App Integration Status</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-heartbeat w-5 text-gray-500"></i>
        <span>System Health Monitor</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-download w-5 text-gray-500"></i>
        <span>Update Manager</span>
      </li>
    </ul>
  </div>

  <!-- COLUMN #2: Integrations & Configuration -->
  <div>
    <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
      <i class="fas fa-cogs text-blue-500"></i>
      <span>Integrations</span>
    </h2>
    <ul class="space-y-1">
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
        <i class="fas fa-user-shield w-5 text-gray-500"></i>
        <span>Single Sign-On (SSO)</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-book-open w-5 text-gray-500"></i>
        <span>LTI/SCORM Integration</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-key w-5 text-gray-500"></i>
        <span>OAuth &amp; API Keys</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-sync-alt w-5 text-gray-500"></i>
        <span>Data Synchronization</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-store w-5 text-gray-500"></i>
        <span>Custom App Store</span>
      </li>
    </ul>
  </div>

  <!-- COLUMN #3: Security & Reporting -->
  <div>
    <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
      <i class="fas fa-shield-alt text-blue-500"></i>
      <span>Security</span>
    </h2>
    <ul class="space-y-1">
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
        <i class="fas fa-ban w-5 text-gray-500"></i>
        <span>App Whitelisting/Blacklisting</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-file-alt w-5 text-gray-500"></i>
        <span>Audit Logs</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-user-lock w-5 text-gray-500"></i>
        <span>Data Privacy Settings</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-lock w-5 text-gray-500"></i>
        <span>Encryption Policies</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-balance-scale w-5 text-gray-500"></i>
        <span>Vendor Risk Management</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-check-circle w-5 text-gray-500"></i>
        <span>Consent Management</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
        <span>Error &amp; Exception Tracking</span>
      </li>
      <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
        <i class="fas fa-chart-area w-5 text-gray-500"></i>
        <span>Trend Analysis</span>
      </li>
    </ul>
  </div>
</div>

    </div>
  </div>
</li>
