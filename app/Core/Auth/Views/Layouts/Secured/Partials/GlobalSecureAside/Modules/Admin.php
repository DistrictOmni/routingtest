<li class="relative w-full" x-data="{
    openDropdown: null,
    hoveredCategory: null,
    closeDropdownTimer: null,

    openMenu() {
      clearTimeout(this.closeDropdownTimer);
      this.openDropdown = 'adminDrawer';
    },

    closeMenu() {
      this.closeDropdownTimer = setTimeout(() => {
        this.openDropdown = null;
        this.hoveredCategory = null;
      }, 200);
    },

    toggleMenu() {
      // If it's open, close it; if it's closed, open it.
      if (this.openDropdown === 'adminDrawer') {
        clearTimeout(this.closeDropdownTimer);
        this.openDropdown = null;
        this.hoveredCategory = null;
      } else {
        clearTimeout(this.closeDropdownTimer);
        this.openDropdown = 'adminDrawer';
      }
    }
  }" @mouseenter="openMenu()" @mouseleave="closeMenu()" @click="toggleMenu()">
  <!-- Trigger -->
  <div class="flex flex-col items-center justify-center w-full h-20
           p-3 border-l-4 border-transparent cursor-pointer
           text-gray-300 hover:bg-gray-700 hover:text-white
           hover:border-blue-400 transition-colors" aria-label="Admin Drawer">
    <i class="fas fa-user-cog text-2xl"></i>
    <span class="text-sm mt-1">Admin</span>
  </div>

  <!-- Drawer -->
  <div x-show="openDropdown === 'adminDrawer'" @click.away="openDropdown = null"
    @mouseenter="clearTimeout(closeDropdownTimer)" @mouseleave="closeMenu()"
    class="fixed top-12 bottom-0 left-20 w-3/4 bg-white shadow-xl z-50 overflow-auto" style="display: none;">
    <div class="h-full flex">
      <!-- LEFT COLUMN -->
      <div class="flex-shrink-0 w-80 h-full flex flex-col border-r border-gray-200
               bg-gradient-to-br from-white to-gray-50 p-4">
        <!-- Large Title -->
        <div class="flex items-center space-x-3 mb-2">
          <div class="p-2 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-user-cog text-xl"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-700">Admin</h2>
        </div>

        <!-- CATEGORY LIST (Click-only; each has .stop to prevent toggling the drawer) -->
        <ul class="space-y-1 text-gray-800 text-sm mb-4">
          <!-- Core Application Settings -->
          <li @click.stop="hoveredCategory = 'application'"
            :class="hoveredCategory === 'application' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-th-large"></i>
                </span>
                <span>Application</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Assets -->
          <li @click.stop="hoveredCategory = 'assets'"
            :class="hoveredCategory === 'assets' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-boxes"></i>
                </span>
                <span>Assets</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Attendance -->
          <li @click.stop="hoveredCategory = 'attendance'"
            :class="hoveredCategory === 'attendance' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-user-check"></i>
                </span>
                <span>Attendance</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Authentication -->
          <li @click.stop="hoveredCategory = 'authentication'"
            :class="hoveredCategory === 'authentication' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-user-check"></i>
                </span>
                <span>Authentication</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Behavior -->
          <li @click.stop="hoveredCategory = 'behavior'"
            :class="hoveredCategory === 'behavior' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
                <span>Behavior</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Compliance -->
          <li @click.stop="hoveredCategory = 'compliance'"
            :class="hoveredCategory === 'compliance' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-balance-scale"></i>
                </span>
                <span>Compliance</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Courses -->
          <li @click.stop="hoveredCategory = 'courses'"
            :class="hoveredCategory === 'courses' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-book-open"></i>
                </span>
                <span>Courses</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Display Preferences -->
          <li @click.stop="hoveredCategory = 'display_preferences'"
            :class="hoveredCategory === 'display_preferences' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-desktop"></i>
                </span>
                <span>Display Preferences</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- District Setup -->
          <li @click.stop="hoveredCategory = 'district_setup'"
            :class="hoveredCategory === 'district_setup' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-tools"></i>
                </span>
                <span>District Setup</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- School Setup -->
          <li @click.stop="hoveredCategory = 'school_setup'"
            :class="hoveredCategory === 'school_setup' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-school"></i>
                </span>
                <span>School Setup</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Fees -->
          <li @click.stop="hoveredCategory = 'fees'"
            :class="hoveredCategory === 'fees' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-dollar-sign"></i>
                </span>
                <span>Fees</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Health -->
          <li @click.stop="hoveredCategory = 'health'"
            :class="hoveredCategory === 'health' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-heartbeat"></i>
                </span>
                <span>Health</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- People -->
          <li @click.stop="hoveredCategory = 'people'"
            :class="hoveredCategory === 'people' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-users"></i>
                </span>
                <span>People</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Postsecondary Plans -->
          <li @click.stop="hoveredCategory = 'postsecondary_plans'"
            :class="hoveredCategory === 'postsecondary_plans' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-graduation-cap"></i>
                </span>
                <span>Postsecondary Plans</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Public Site -->
          <li @click.stop="hoveredCategory = 'public_site'"
            :class="hoveredCategory === 'public_site' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-graduation-cap"></i>
                </span>
                <span>Public Site</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- Scheduling -->
          <li @click.stop="hoveredCategory = 'scheduling'"
            :class="hoveredCategory === 'scheduling' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-calendar-alt"></i>
                </span>
                <span>Scheduling</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>

          <!-- School Rollover -->
          <li @click.stop="hoveredCategory = 'school_rollover'"
            :class="hoveredCategory === 'school_rollover' ? 'bg-gray-100 font-semibold' : ''"
            class="cursor-pointer px-3 py-2 rounded hover:bg-gray-200">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-2">
                <span class="w-5 flex justify-center text-gray-500">
                  <i class="fas fa-sync-alt"></i>
                </span>
                <span>School Rollover</span>
              </div>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
          </li>
        </ul>
      </div>
      <!-- END LEFT COLUMN -->

      <!-- RIGHT COLUMN -->
      <div class="flex-1 overflow-auto p-6 text-gray-800 text-sm">
        <!-- Default placeholder if no category selected -->
        <div x-show="!hoveredCategory" style="display: none;">
          <h2 class="text-2xl font-bold mb-2">Select a category</h2>
          <p class="text-gray-600">
            Please choose an option from the left to see more details...
          </p>
        </div>


<!-- Application -->
<div x-show="hoveredCategory === 'application'" style="display: none;">
  <!-- Application -->
  <div x-show="hoveredCategory === 'application'" style="display: none;">
    <!-- Title & Intro -->
    <h2 class="text-2xl font-bold mb-4">Application</h2>
    <p class="text-gray-600 mb-6">
      Configure and manage all integrated applications across your district’s SIS environment.
      Monitor licenses, data flow, security policies, and overall performance to ensure a smooth
      and compliant experience for staff and students.
    </p>

    <div
      class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
      <!-- COLUMN #1: Overview -->
      <div>
        <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
          <i class="fas fa-tachometer-alt text-blue-500"></i>
          <span>Overview</span>
        </h2>
        <ul class="space-y-1">
        <li>
    <a
      href="/admin/application/overview"
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600"
    >
      <i class="fas fa-chart-line w-5 text-gray-500"></i>
      <span>Application Dashboard</span>
    </a>
  </li>

  <!-- License Management -->
  <li>
    <a
      href="/admin/application/license-management"
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-key w-5 text-gray-500"></i>
      <span>License Management</span>
    </a>
  </li>

  <!-- App Integration Status -->
  <li>
    <a
      href="/admin/application/integration-status"
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-sync w-5 text-gray-500"></i>
      <span>App Integration Status</span>
    </a>
  </li>

  <!-- System Health Monitor -->
  <li>
    <a
      href="/admin/application/system-health-monitor"
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-heartbeat w-5 text-gray-500"></i>
      <span>System Health Monitor</span>
    </a>
  </li>

  <!-- Update Manager -->
  <li>
    <a
      href="/admin/application/update-manager"
      class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer"
    >
      <i class="fas fa-download w-5 text-gray-500"></i>
      <span>Update Manager</span>
    </a>
  </li>
        </ul>

        <h2 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
  <i class="fas fa-envelope text-blue-500"></i>
  <span>Email &amp; Communications</span>
</h2>
<ul class="space-y-1">
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
    <a href="/admin/application/email/gateway-setup">
      <i class="fas fa-mail-bulk w-5 text-gray-500"></i>
      <span>Email Gateway Setup</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/domain-verification">
      <i class="fas fa-globe-americas w-5 text-gray-500"></i>
      <span>Domain Verification</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/outbound-policies">
      <i class="fas fa-paper-plane w-5 text-gray-500"></i>
      <span>Outbound Email Policies</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/template-editor">
      <i class="fas fa-edit w-5 text-gray-500"></i>
      <span>Email Template Editor</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/mass-tools">
      <i class="fas fa-envelope-open-text w-5 text-gray-500"></i>
      <span>Mass Email Tools</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/bounce-tracking">
      <i class="fas fa-bomb w-5 text-gray-500"></i>
      <span>Bounce &amp; Spam Tracking</span>
    </a>
  </li>
  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
    <a href="/admin/application/email/notification-preferences">
      <i class="fas fa-bell w-5 text-gray-500"></i>
      <span>Notification Preferences</span>
    </a>
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
      <a href="/admin/application/integrations/sso">
        <i class="fas fa-user-shield w-5 text-gray-500"></i>
        <span>Single Sign-On (SSO)</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/integrations/lti-scorm">
        <i class="fas fa-book-open w-5 text-gray-500"></i>
        <span>LTI/SCORM Integration</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/integrations/oauth-keys">
        <i class="fas fa-key w-5 text-gray-500"></i>
        <span>OAuth &amp; API Keys</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/integrations/data-synchronization">
        <i class="fas fa-sync-alt w-5 text-gray-500"></i>
        <span>Data Synchronization</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/integrations/custom-store">
        <i class="fas fa-store w-5 text-gray-500"></i>
        <span>Custom App Store</span>
      </a>
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
      <a href="/admin/application/security/whitelist-blacklist">
        <i class="fas fa-ban w-5 text-gray-500"></i>
        <span>App Whitelisting/Blacklisting</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/audit-logs">
        <i class="fas fa-file-alt w-5 text-gray-500"></i>
        <span>Audit Logs</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/privacy-settings">
        <i class="fas fa-user-lock w-5 text-gray-500"></i>
        <span>Data Privacy Settings</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/encryption-policies">
        <i class="fas fa-lock w-5 text-gray-500"></i>
        <span>Encryption Policies</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/vendor-risk">
        <i class="fas fa-balance-scale w-5 text-gray-500"></i>
        <span>Vendor Risk Management</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/consent-management">
        <i class="fas fa-check-circle w-5 text-gray-500"></i>
        <span>Consent Management</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/error-tracking">
        <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
        <span>Error &amp; Exception Tracking</span>
      </a>
    </li>
    <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
      <a href="/admin/application/security/trend-analysis">
        <i class="fas fa-chart-area w-5 text-gray-500"></i>
        <span>Trend Analysis</span>
      </a>
    </li>
  </ul>
</div>
    </div>

  </div>

</div>
<div x-show="hoveredCategory === 'assets'" style="display: none;">
  <h2 class="text-2xl font-bold mb-4">Assets</h2>
  <p class="text-gray-600 mb-6">
    Manage your district’s assets from acquisition to disposal. This includes everything from hardware and
    software to textbooks and furniture. Below are the advanced configuration options for each section of the asset management system.
  </p>
  <div class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
    
    <!-- COLUMN #1: Inventory Management -->
    <div>
      <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-boxes text-blue-500"></i>
        <span>Inventory</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/assets/dashboard">
            <i class="fas fa-tachometer-alt w-5 text-gray-500"></i>
            <span>Asset Dashboard</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/import">
            <i class="fas fa-upload w-5 text-gray-500"></i>
            <span>Add/Import Assets</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/categories">
            <i class="fas fa-layer-group w-5 text-gray-500"></i>
            <span>Asset Categories</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/tagging">
            <i class="fas fa-tags w-5 text-gray-500"></i>
            <span>Asset Tagging &amp; RFID Setup</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/map">
            <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
            <span>Real-Time Asset Map</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- COLUMN #2: Tracking & Assignment -->
    <div>
      <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-location-arrow text-blue-500"></i>
        <span>Tracking</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/assets/checkout">
            <i class="fas fa-exchange-alt w-5 text-gray-500"></i>
            <span>Device Checkout/Check-in</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/barcodes">
            <i class="fas fa-qrcode w-5 text-gray-500"></i>
            <span>Barcode/QR Code Management</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/location">
            <i class="fas fa-map-signs w-5 text-gray-500"></i>
            <span>Location Tracking</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/assignment-history">
            <i class="fas fa-history w-5 text-gray-500"></i>
            <span>Asset Assignment History</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/scanning">
            <i class="fas fa-mobile-alt w-5 text-gray-500"></i>
            <span>Mobile Asset Scanning</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- COLUMN #3: Maintenance, Lifecycle & Reporting -->
    <div>
      <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-tools text-blue-500"></i>
        <span>Lifecycle</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/assets/warranty">
            <i class="fas fa-wrench w-5 text-gray-500"></i>
            <span>Warranty &amp; Repair</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/depreciation">
            <i class="fas fa-chart-line w-5 text-gray-500"></i>
            <span>Depreciation &amp; Replacement</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/audit">
            <i class="fas fa-clipboard-check w-5 text-gray-500"></i>
            <span>Asset Audits</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/loss-theft">
            <i class="fas fa-exclamation-circle w-5 text-gray-500"></i>
            <span>Loss/Theft Reporting</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/funding">
            <i class="fas fa-dollar-sign w-5 text-gray-500"></i>
            <span>Funding Source Tracking</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/maintenance-schedule">
            <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
            <span>Maintenance Scheduling</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/disposal">
            <i class="fas fa-trash-alt w-5 text-gray-500"></i>
            <span>Asset Disposal Management</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/reporting">
            <i class="fas fa-file-export w-5 text-gray-500"></i>
            <span>Custom Asset Reporting</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/compliance-reporting">
            <i class="fas fa-balance-scale w-5 text-gray-500"></i>
            <span>Compliance &amp; Regulatory Reporting</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/assets/environmental-impact">
            <i class="fas fa-leaf w-5 text-gray-500"></i>
            <span>Environmental Impact Tracking</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

        <div x-show="hoveredCategory === 'attendance'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Attendance</h2>
          <p class="text-gray-600 mb-6">
            Configure and monitor student attendance with precision. Manage codes, schedules, and interventions while
            keeping detailed records.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Setup & Configuration -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-cogs text-blue-500"></i>
                <span>Setup</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-code w-5 text-gray-500"></i>
                  <span>Attendance Codes</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
                  <span>Attendance Calendars</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-gavel w-5 text-gray-500"></i>
                  <span>Attendance Rules</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sliders-h w-5 text-gray-500"></i>
                  <span>Custom Configurations</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-users-cog w-5 text-gray-500"></i>
                  <span>Role-Based Permissions</span>
                </li>
              </ul>

              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-calendar-check text-blue-500"></i>
        <span>Attendance Tracking</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/attendance/daily">
            <i class="fas fa-calendar-day w-5 text-gray-500"></i>
            <span>Daily Attendance Tracking</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/attendance/periodic">
            <i class="fas fa-calendar-week w-5 text-gray-500"></i>
            <span>Periodic Attendance Setup</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/attendance/classroom">
            <i class="fas fa-chalkboard-teacher w-5 text-gray-500"></i>
            <span>Classroom Attendance Settings</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/attendance/remote">
            <i class="fas fa-laptop w-5 text-gray-500"></i>
            <span>Remote/Hybrid Attendance Tracking</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/attendance/tardy">
            <i class="fas fa-clock w-5 text-gray-500"></i>
            <span>Tardy Tracking</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/attendance/excused">
            <i class="fas fa-user-check w-5 text-gray-500"></i>
            <span>Excused Absence Management</span>
          </a>
        </li>
      </ul>
            </div>

            <!-- COLUMN #2: Monitoring & Administration -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-chart-line text-blue-500"></i>
                <span>Monitoring</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-eye w-5 text-gray-500"></i>
                  <span>Daily Attendance Overview</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-school w-5 text-gray-500"></i>
                  <span>Period Attendance</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-edit w-5 text-gray-500"></i>
                  <span>Bulk Attendance Adjustments</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-archive w-5 text-gray-500"></i>
                  <span>Historical Archive</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-circle w-5 text-gray-500"></i>
                  <span>Exception Reporting</span>
                </li>
              </ul>
            </div>

            <!-- COLUMN #3: Notifications & Interventions -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-bell text-blue-500"></i>
                <span>Interventions</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-envelope w-5 text-gray-500"></i>
                  <span>Parent/Guardian Alerts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-route w-5 text-gray-500"></i>
                  <span>Intervention Workflows</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-bell-slash w-5 text-gray-500"></i>
                  <span>Automated Reminders</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sms w-5 text-gray-500"></i>
                  <span>SMS &amp; Email Integration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Attendance Analytics</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Custom Reporting &amp; Export</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-contract w-5 text-gray-500"></i>
                  <span>Compliance Reporting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-mobile-alt w-5 text-gray-500"></i>
                  <span>Mobile Attendance Capture</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-pie w-5 text-gray-500"></i>
                  <span>Behavioral Analysis</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
                  <span>Real-Time Incident Alerts</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div x-show="hoveredCategory === 'authentication'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Authentication</h2>
          <p class="text-gray-600 mb-6">
            Configure and manage user authentication, security policies, and monitoring across your district. Ensure
            secure access and compliance with comprehensive tools.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">

            <!-- COLUMN #1: User & Group Management -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-users text-blue-500"></i>
                <span>User &amp; Groups</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-address-book w-5 text-gray-500"></i>
                  <span>User Directory</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-shield w-5 text-gray-500"></i>
                  <span>Role-Based Access Control (RBAC)</span>
                </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/roles">
            <i class="fas fa-user-tag w-5 text-gray-500"></i>
            <span>Manage Roles</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/permissions">
            <i class="fas fa-lock w-5 text-gray-500"></i>
            <span>Manage Permissions</span>
          </a>
        </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sync w-5 text-gray-500"></i>
                  <span>Group Synchronization</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-upload w-5 text-gray-500"></i>
                  <span>Bulk User Import/Export</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-edit w-5 text-gray-500"></i>
                  <span>Custom User Fields</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-unlock-alt w-5 text-gray-500"></i>
                  <span>Self-Service Password Reset</span>
                </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/audit">
            <i class="fas fa-history w-5 text-gray-500"></i>
            <span>User Activity Audit</span>
          </a>
        </li>
              </ul>
            </div>

            <!-- COLUMN #2: Security Settings -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-lock text-blue-500"></i>
                <span>Security Settings</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-key w-5 text-gray-500"></i>
                  <span>Password Policies</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-shield-alt w-5 text-gray-500"></i>
                  <span>Two-Factor Authentication (2FA)</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sign-in-alt w-5 text-gray-500"></i>
                  <span>Single Sign-On (SSO)</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-fingerprint w-5 text-gray-500"></i>
                  <span>Biometric Integration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-robot w-5 text-gray-500"></i>
                  <span>Captcha &amp; Rate Limiting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-clock w-5 text-gray-500"></i>
                  <span>Session Timeout Configuration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-mobile-alt w-5 text-gray-500"></i>
                  <span>Device Trust Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-lock-open w-5 text-gray-500"></i>
                  <span>Account Recovery Options</span>
                </li>
              </ul>


              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-key text-blue-500"></i>
        <span>Authentication Methods</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/auth/sso">
            <i class="fas fa-sign-in-alt w-5 text-gray-500"></i>
            <span>Single Sign-On (SSO)</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/ldap">
            <i class="fas fa-server w-5 text-gray-500"></i>
            <span>LDAP Integration</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/oidc">
            <i class="fab fa-openid w-5 text-gray-500"></i>
            <span>OpenID Connect (OIDC)</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/saml">
            <i class="fab fa-sitemap w-5 text-gray-500"></i>
            <span>SAML 2.0 Authentication</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/mfa">
            <i class="fas fa-shield-alt w-5 text-gray-500"></i>
            <span>Multi-Factor Authentication (MFA)</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/oauth">
            <i class="fas fa-lock-open w-5 text-gray-500"></i>
            <span>OAuth 2.0 Integration</span>
          </a>
        </li>
      </ul>
            </div>

            <!-- COLUMN #3: Monitoring & Audits -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-clipboard-list text-blue-500"></i>
                <span>Monitoring</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-history w-5 text-gray-500"></i>
                  <span>Login Activity Logs</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-desktop w-5 text-gray-500"></i>
                  <span>Session Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-lock w-5 text-gray-500"></i>
                  <span>Account Lockout Policies</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-bell w-5 text-gray-500"></i>
                  <span>Failed Login Alerts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-circle w-5 text-gray-500"></i>
                  <span>Security Incident Reports</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Audit Trail Exports</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-list-ul w-5 text-gray-500"></i>
                  <span>IP Whitelist/Blacklist</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-line w-5 text-gray-500"></i>
                  <span>Real-Time Security Dashboard</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Authentication Error Analytics</span>
                </li>
              </ul>

              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
        <i class="fas fa-shield-alt text-blue-500"></i>
        <span>Security & Compliance</span>
      </h3>
      <ul class="space-y-1">
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
          <a href="/admin/auth/password-policy">
            <i class="fas fa-key w-5 text-gray-500"></i>
            <span>Password Policy</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/terms">
            <i class="fas fa-file-alt w-5 text-gray-500"></i>
            <span>Terms of Service</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/compliance">
            <i class="fas fa-gavel w-5 text-gray-500"></i>
            <span>Compliance Settings</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/audit-logs">
            <i class="fas fa-file-invoice w-5 text-gray-500"></i>
            <span>Audit Logs</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/encryption">
            <i class="fas fa-lock w-5 text-gray-500"></i>
            <span>Data Encryption Settings</span>
          </a>
        </li>
        <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
          <a href="/admin/auth/gdpr">
            <i class="fas fa-user-shield w-5 text-gray-500"></i>
            <span>GDPR Compliance</span>
          </a>
        </li>
      </ul>
            </div>

          </div>
        </div>



        <div x-show="hoveredCategory === 'behavior'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Behavior</h2>
          <p class="text-gray-600 mb-6">
            Monitor and manage student behavior using comprehensive tools. Track incidents, enforce policies, and deploy
            interventions to create a positive school climate.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">

            <!-- COLUMN #1: Behavior Codes & Policies -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-book text-blue-500"></i>
                <span>Policies</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-list w-5 text-gray-500"></i>
                  <span>Behavior Incident Types</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-gavel w-5 text-gray-500"></i>
                  <span>Disciplinary Actions</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-star w-5 text-gray-500"></i>
                  <span>Behavior Points System</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-cog w-5 text-gray-500"></i>
                  <span>Custom Behavior Categories</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user w-5 text-gray-500"></i>
                  <span>Student Behavioral Profiles</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-alt w-5 text-gray-500"></i>
                  <span>Policy Exception Management</span>
                </li>
              </ul>
            </div>

            <!-- COLUMN #2: Incident Reporting -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-exclamation-triangle text-blue-500"></i>
                <span>Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-desktop w-5 text-gray-500"></i>
                  <span>Behavior Dashboard</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-pen-square w-5 text-gray-500"></i>
                  <span>Report an Incident</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-check w-5 text-gray-500"></i>
                  <span>Incident Review &amp; Approval</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-comment-dots w-5 text-gray-500"></i>
                  <span>Anonymous Reporting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-stream w-5 text-gray-500"></i>
                  <span>Real-Time Incident Feed</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-search w-5 text-gray-500"></i>
                  <span>Incident Status Tracking</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-alt w-5 text-gray-500"></i>
                  <span>Digital Incident Logs</span>
                </li>
              </ul>
            </div>

            <!-- COLUMN #3: Intervention & Follow-Up -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-handshake text-blue-500"></i>
                <span>Interventions</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-plus-circle w-5 text-gray-500"></i>
                  <span>Intervention Programs</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-check w-5 text-gray-500"></i>
                  <span>Assigned Counseling Tracker</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-tasks w-5 text-gray-500"></i>
                  <span>Behavior Improvement Plans</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-envelope-open-text w-5 text-gray-500"></i>
                  <span>Parent/Guardian Notifications</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-bell w-5 text-gray-500"></i>
                  <span>Automated Alerts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-area w-5 text-gray-500"></i>
                  <span>Intervention Effectiveness Analytics</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-redo w-5 text-gray-500"></i>
                  <span>Incident Recurrence Analysis</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-project-diagram w-5 text-gray-500"></i>
                  <span>Custom Intervention Workflows</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-contract w-5 text-gray-500"></i>
                  <span>Outcome Reporting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-link w-5 text-gray-500"></i>
                  <span>Resource Referral Integration</span>
                </li>
              </ul>
            </div>

          </div>
        </div>



        <div x-show="hoveredCategory === 'compliance'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Compliance</h2>
          <p class="text-gray-600 mb-6">
            Configure your district’s compliance settings with tools for regulatory frameworks, data governance, and
            reporting submissions.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Regulatory Framework -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-balance-scale text-blue-500"></i>
                <span>Regulatory</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-user-secret w-5 text-gray-500"></i>
                  <span>FERPA/COPPA Configuration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-contract w-5 text-gray-500"></i>
                  <span>State Reporting Requirements</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-university w-5 text-gray-500"></i>
                  <span>IDEA &amp; Section 504</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-book w-5 text-gray-500"></i>
                  <span>Privacy Policy Manager</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Data Governance -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-database text-blue-500"></i>
                <span>Data Governance</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-clock w-5 text-gray-500"></i>
                  <span>Data Retention Policies</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-signature w-5 text-gray-500"></i>
                  <span>Consent Forms</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-history w-5 text-gray-500"></i>
                  <span>Audit Trails</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-shield-alt w-5 text-gray-500"></i>
                  <span>Data Encryption Policies</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Reporting & Submissions -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-file-export text-blue-500"></i>
                <span>Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-chart-line w-5 text-gray-500"></i>
                  <span>State/Federal Reporting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
                  <span>Compliance Calendar</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-check w-5 text-gray-500"></i>
                  <span>Policy Acknowledgements</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-signature w-5 text-gray-500"></i>
                  <span>Digital Submission Manager</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div x-show="hoveredCategory === 'courses'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Courses</h2>
          <p class="text-gray-600 mb-6">
            Manage every aspect of your district’s course offerings—from creation to performance analytics—to support a
            comprehensive curriculum.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Course Catalog Management -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-book-open text-blue-500"></i>
                <span>Catalog</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-list-ul w-5 text-gray-500"></i>
                  <span>Course Master List</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-code w-5 text-gray-500"></i>
                  <span>Course Codes &amp; Standards</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-check-double w-5 text-gray-500"></i>
                  <span>Prerequisites &amp; Requirements</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sliders-h w-5 text-gray-500"></i>
                  <span>Custom Course Attributes</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Section Management -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-layer-group text-blue-500"></i>
                <span>Sections</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-magic w-5 text-gray-500"></i>
                  <span>Section Creation Wizard</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chalkboard-teacher w-5 text-gray-500"></i>
                  <span>Teacher Assignments</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
                  <span>Room/Location Assignments</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exchange-alt w-5 text-gray-500"></i>
                  <span>Section Transfers &amp; Merges</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Course Materials & Reporting -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-file-alt text-blue-500"></i>
                <span>Materials &amp; Reports</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                  <span>Curriculum Alignment</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-book w-5 text-gray-500"></i>
                  <span>Resource Library</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Enrollment Statistics</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-percent w-5 text-gray-500"></i>
                  <span>Course Performance Analytics</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Custom Reporting</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div x-show="hoveredCategory === 'display_preferences'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Display Preferences</h2>
          <p class="text-gray-600 mb-6">
            Customize the user interface for a tailored experience. Adjust themes, layouts, localization, and
            accessibility options to meet your district’s needs.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: General UI Settings -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-desktop text-blue-500"></i>
                <span>General UI</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-palette w-5 text-gray-500"></i>
                  <span>Theme &amp; Branding</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-columns w-5 text-gray-500"></i>
                  <span>Layout Options</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-cogs w-5 text-gray-500"></i>
                  <span>Custom CSS &amp; Scripts</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Localization -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-language text-blue-500"></i>
                <span>Localization</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-globe w-5 text-gray-500"></i>
                  <span>Language Settings</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-clock w-5 text-gray-500"></i>
                  <span>Date/Time Formats</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
                  <span>Regional Formats</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Accessibility & User Customization -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-universal-access text-blue-500"></i>
                <span>Accessibility</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-adjust w-5 text-gray-500"></i>
                  <span>High Contrast Mode</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-text-height w-5 text-gray-500"></i>
                  <span>Text Size &amp; Font</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-cog w-5 text-gray-500"></i>
                  <span>User Dashboard Defaults</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-bell w-5 text-gray-500"></i>
                  <span>Notification Preferences</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sliders-h w-5 text-gray-500"></i>
                  <span>Custom Widget Settings</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div x-show="hoveredCategory === 'district_setup'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">District Setup</h2>
          <p class="text-gray-600 mb-6">
            Configure your district’s foundational settings including profiles, multi-school configurations, and
            integration tools to ensure a seamless operational framework.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: District Profile -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-address-card text-blue-500"></i>
                <span>District Profile</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-info-circle w-5 text-gray-500"></i>
                  <span>District Information</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
                  <span>Calendar Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-contract w-5 text-gray-500"></i>
                  <span>District Policies</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-phone w-5 text-gray-500"></i>
                  <span>Contact &amp; Emergency Info</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Multi-School Configuration -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-school text-blue-500"></i>
                <span>Multi-School Config</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-th-list w-5 text-gray-500"></i>
                  <span>School Directory</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sitemap w-5 text-gray-500"></i>
                  <span>Feeder Patterns</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-users w-5 text-gray-500"></i>
                  <span>Shared Services</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exchange-alt w-5 text-gray-500"></i>
                  <span>Inter-School Communication</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exchange-alt w-5 text-gray-500"></i>
                  <span>School Branding</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Data & Integrations -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-plug text-blue-500"></i>
                <span>Data &amp; Integrations</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-link w-5 text-gray-500"></i>
                  <span>State Integration Setup</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-import w-5 text-gray-500"></i>
                  <span>Mass Data Imports/Exports</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-pencil-ruler w-5 text-gray-500"></i>
                  <span>Custom Fields</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-database w-5 text-gray-500"></i>
                  <span>Data Quality Tools</span>
                </li>
              </ul>
            </div>
          </div>
        </div>



        <div x-show="hoveredCategory === 'school_setup'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">School Setup</h2>
          <p class="text-gray-600 mb-6">
            Tailor each school’s environment with individualized profiles, scheduling options, grading policies, and
            local configurations for optimal performance.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: School Profile & Settings -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-school text-blue-500"></i>
                <span>Profile &amp; Settings</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-info w-5 text-gray-500"></i>
                  <span>Basic Info</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-bell w-5 text-gray-500"></i>
                  <span>Bell Schedules</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
                  <span>Term Setup</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
                  <span>Campus Map</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Grade Scales & Policies -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-graduation-cap text-blue-500"></i>
                <span>Grading &amp; Policies</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-calculator w-5 text-gray-500"></i>
                  <span>Grading Schemas</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-medal w-5 text-gray-500"></i>
                  <span>Honor Roll Criteria</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-level-up-alt w-5 text-gray-500"></i>
                  <span>Retention/Promotion Settings</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-balance-scale w-5 text-gray-500"></i>
                  <span>Behavior &amp; Discipline Policies</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Local Configuration -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-tools text-blue-500"></i>
                <span>Local Configuration</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-door-open w-5 text-gray-500"></i>
                  <span>Facilities &amp; Room Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-address-book w-5 text-gray-500"></i>
                  <span>Staff Directory</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-pencil-alt w-5 text-gray-500"></i>
                  <span>School Custom Fields</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-cogs w-5 text-gray-500"></i>
                  <span>Local System Settings</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div x-show="hoveredCategory === 'fees'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Fees</h2>
          <p class="text-gray-600 mb-6">
            Manage fee structures and billing processes with flexible configuration for fee categories, billing cycles,
            and integrated reporting.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Fee Setup & Configuration -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-tags text-blue-500"></i>
                <span>Setup</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-list w-5 text-gray-500"></i>
                  <span>Fee Categories</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-credit-card w-5 text-gray-500"></i>
                  <span>Payment Methods</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-percentage w-5 text-gray-500"></i>
                  <span>Waiver/Reduced Fee Eligibility</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Management & Billing -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-file-invoice-dollar text-blue-500"></i>
                <span>Billing</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-user-tag w-5 text-gray-500"></i>
                  <span>Fee Assignment</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-receipt w-5 text-gray-500"></i>
                  <span>Invoices &amp; Receipts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-check w-5 text-gray-500"></i>
                  <span>Payment Plans</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Reporting & Reconciliation -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-chart-line text-blue-500"></i>
                <span>Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-chart-pie w-5 text-gray-500"></i>
                  <span>Fee Collection Reports</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
                  <span>Unpaid Balances Alerts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Accounting Integration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-alt w-5 text-gray-500"></i>
                  <span>Reconciliation Reports</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div x-show="hoveredCategory === 'health'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Health</h2>
          <p class="text-gray-600 mb-6">
            Manage comprehensive student health data—from immunizations and screenings to clinic visits and state
            reporting—ensuring every health detail is tracked accurately.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Health Records -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-notes-medical text-blue-500"></i>
                <span>Health Records</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-syringe w-5 text-gray-500"></i>
                  <span>Immunization Tracking</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
                  <span>Medical Alerts</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-eye w-5 text-gray-500"></i>
                  <span>Vision &amp; Hearing Screenings</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-ruler w-5 text-gray-500"></i>
                  <span>BMI &amp; Scoliosis Checks</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Clinic Visits -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-clinic-medical text-blue-500"></i>
                <span>Clinic Visits</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-notes-medical w-5 text-gray-500"></i>
                  <span>Nurse Log</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-pills w-5 text-gray-500"></i>
                  <span>Medication Administration</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-calendar-check w-5 text-gray-500"></i>
                  <span>Visit Scheduling</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-comments w-5 text-gray-500"></i>
                  <span>Follow-Up Appointments</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Compliance & Reporting -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-file-medical-alt text-blue-500"></i>
                <span>Compliance &amp; Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-file-upload w-5 text-gray-500"></i>
                  <span>Health Forms &amp; Documentation</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-medical w-5 text-gray-500"></i>
                  <span>State Health Reporting</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Compliance Audit Logs</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-shield-alt w-5 text-gray-500"></i>
                  <span>Data Privacy Controls</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div x-show="hoveredCategory === 'people'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">People</h2>
          <p class="text-gray-600 mb-6">
            Oversee all user profiles and manage relationships within your district. From student enrollments to staff
            management, configure roles and track demographics with precision.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: User Management -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-user-friends text-blue-500"></i>
                <span>User Management</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-user-plus w-5 text-gray-500"></i>
                  <span>Student Enrollment</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-tie w-5 text-gray-500"></i>
                  <span>Staff Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-circle w-5 text-gray-500"></i>
                  <span>Parent/Guardian Profiles</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-users w-5 text-gray-500"></i>
                  <span>Bulk User Operations</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Permissions & Roles -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-user-shield text-blue-500"></i>
                <span>Permissions &amp; Roles</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-layer-group w-5 text-gray-500"></i>
                  <span>Role Assignments</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-object-group w-5 text-gray-500"></i>
                  <span>User Groups</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-cog w-5 text-gray-500"></i>
                  <span>Permission Templates</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-shield-alt w-5 text-gray-500"></i>
                  <span>Access Audit Logs</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Analytics & Reporting -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-chart-pie text-blue-500"></i>
                <span>Analytics &amp; Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Population Demographics</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-certificate w-5 text-gray-500"></i>
                  <span>Staff Certifications</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-check w-5 text-gray-500"></i>
                  <span>Credential Expirations</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Custom Reports</span>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div x-show="hoveredCategory === 'postsecondary_plans'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Postsecondary Plans</h2>
          <p class="text-gray-600 mb-6">
            Empower students for life beyond high school with tools for college planning, career pathway tracking, and
            comprehensive outcome reporting.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: College/Career Readiness -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-university text-blue-500"></i>
                <span>College/Career</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                  <span>College Planning Tools</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-briefcase w-5 text-gray-500"></i>
                  <span>Career Pathways</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chalkboard-teacher w-5 text-gray-500"></i>
                  <span>Counselor Portal</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-tasks w-5 text-gray-500"></i>
                  <span>Internship &amp; Apprenticeship Tracking</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Student Tracking -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-graduation-cap text-blue-500"></i>
                <span>Student Tracking</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-check w-5 text-gray-500"></i>
                  <span>Graduation Requirements</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-alt w-5 text-gray-500"></i>
                  <span>Transcripts &amp; GPA</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-hand-holding-usd w-5 text-gray-500"></i>
                  <span>Scholarship Management</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-check w-5 text-gray-500"></i>
                  <span>Application Tracking</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Reporting & Outcomes -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-chart-line text-blue-500"></i>
                <span>Reporting</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-chart-pie w-5 text-gray-500"></i>
                  <span>Post-Grad Tracking</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>College Acceptance Stats</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-clipboard-check w-5 text-gray-500"></i>
                  <span>Outcome Surveys</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-chart-bar w-5 text-gray-500"></i>
                  <span>Custom Reporting</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div x-show="hoveredCategory === 'public_site'" style="display: none;">
        <h2 class="text-2xl font-bold mb-4">Scheduling</h2>
          <p class="text-gray-600 mb-6">
            Build and manage dynamic schedules for every school with advanced tools for master scheduling, conflict
            resolution, and real-time reporting.
          </p>  
        <!-- RIGHT COLUMN (MAIN CONTENT) -->
          <div class="flex-1 overflow-auto p-6 text-gray-800 text-sm">
        
            <!-- 3-COLUMN GRID ON LARGE SCREENS -->
            <!-- Using lg:grid-cols-3 for three columns at large breakpoints -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
              <!-- COLUMN #1: OVERVIEW & ANALYTICS + THEMES & MEDIA -->
              <div>
                <!-- OVERVIEW & ANALYTICS -->
                <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                  <i class="fas fa-chart-line text-blue-500"></i>
                  <span>Overview &amp; Analytics</span>
                </h3>
                <ul class="space-y-1 mb-6">
                  <li
                    class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                    <i class="fas fa-tachometer-alt w-5 text-gray-500"></i>
                    <span>Site Dashboard</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-chart-pie w-5 text-gray-500"></i>
                    <span>Traffic Analytics</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-users w-5 text-gray-500"></i>
                    <span>Visitor Insights</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-newspaper w-5 text-gray-500"></i>
                    <span>Latest Updates</span>
                  </li>
                </ul>
        
                <!-- THEMES & MEDIA -->
                <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                  <i class="fas fa-brush text-blue-500"></i>
                  <span>Themes &amp; Media</span>
                </h3>
                <ul class="space-y-1">
                  <li
                    class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                    <i class="fas fa-palette w-5 text-gray-500"></i>
                    <span>Theme Manager</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-images w-5 text-gray-500"></i>
                    <span>Media Library</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-th w-5 text-gray-500"></i>
                    <span>Widgets &amp; Modules</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-code w-5 text-gray-500"></i>
                    <span>Custom HTML/CSS</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-mobile-alt w-5 text-gray-500"></i>
                    <span>Mobile Responsiveness</span>
                  </li>
                </ul>
              </div>
        
              <!-- COLUMN #2: PAGES & NAVIGATION -->
              <div>
                <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                  <i class="fas fa-copy text-blue-500"></i>
                  <span>Pages &amp; Navigation</span>
                </h3>
                <ul class="space-y-1">
                  <li
                    class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                    <i class="fas fa-sitemap w-5 text-gray-500"></i>
                    <span>Site Structure</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-edit w-5 text-gray-500"></i>
                    <span>Page Editor</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-bars w-5 text-gray-500"></i>
                    <span>Menus &amp; Navigation</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-trash-alt w-5 text-gray-500"></i>
                    <span>Recycle Bin</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                    <span>Drafts &amp; Approvals</span>
                  </li>
                </ul>
              </div>
        
              <!-- COLUMN #3: SEO & INTEGRATIONS -->
              <div>
                <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                  <i class="fas fa-search text-blue-500"></i>
                  <span>SEO &amp; Integrations</span>
                </h3>
                <ul class="space-y-1">
                  <li
                    class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                    <i class="fas fa-bullhorn w-5 text-gray-500"></i>
                    <span>SEO Settings</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-link w-5 text-gray-500"></i>
                    <span>Social Media Integration</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-file-alt w-5 text-gray-500"></i>
                    <span>Meta &amp; Schema Markup</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-tags w-5 text-gray-500"></i>
                    <span>Tags &amp; Keywords</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fab fa-google w-5 text-gray-500"></i>
                    <span>Analytics Integrations</span>
                  </li>
                  <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                    <i class="fas fa-plug w-5 text-gray-500"></i>
                    <span>3rd Party Plugins</span>
                  </li>
                </ul>
              </div>
        
            </div><!-- End 3-column grid -->
        
          </div>
        </div>
        



        <div x-show="hoveredCategory === 'scheduling'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">Scheduling</h2>
          <p class="text-gray-600 mb-6">
            Build and manage dynamic schedules for every school with advanced tools for master scheduling, conflict
            resolution, and real-time reporting.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Master Schedule Setup -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-layer-group text-blue-500"></i>
                <span>Master Setup</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-magic w-5 text-gray-500"></i>
                  <span>Master Schedule Builder</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-sync-alt w-5 text-gray-500"></i>
                  <span>Block Scheduling</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-door-open w-5 text-gray-500"></i>
                  <span>Room &amp; Resource Constraints</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: Student Scheduling -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-user-clock text-blue-500"></i>
                <span>Student Scheduling</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-robot w-5 text-gray-500"></i>
                  <span>Automated Scheduler</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exclamation-triangle w-5 text-gray-500"></i>
                  <span>Conflict Resolution</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-exchange-alt w-5 text-gray-500"></i>
                  <span>Schedule Change Requests</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Reports & Analytics -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-chart-area text-blue-500"></i>
                <span>Reports</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-balance-scale w-5 text-gray-500"></i>
                  <span>Schedule Load Balancing</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-print w-5 text-gray-500"></i>
                  <span>Student Schedule Reports</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-file-export w-5 text-gray-500"></i>
                  <span>Custom Schedule Exports</span>
                </li>
              </ul>
            </div>
          </div>
        </div>



        <div x-show="hoveredCategory === 'school_rollover'" style="display: none;">
          <h2 class="text-2xl font-bold mb-4">School Rollover</h2>
          <p class="text-gray-600 mb-6">
            Execute a seamless transition to a new academic year with comprehensive tools for closing out the old year,
            setting up the new one, and validating all data.
          </p>
          <div
            class="flex-1 overflow-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-800 text-sm">
            <!-- COLUMN #1: Year-End Procedures -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-archive text-blue-500"></i>
                <span>Year-End</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-book w-5 text-gray-500"></i>
                  <span>Academic Year Closeout</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-check w-5 text-gray-500"></i>
                  <span>Promotions &amp; Retentions</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-graduation-cap w-5 text-gray-500"></i>
                  <span>Graduation Processing</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #2: New Year Setup -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-calendar-plus text-blue-500"></i>
                <span>New Year Setup</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-calendar-alt w-5 text-gray-500"></i>
                  <span>Calendar Rollout</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-copy w-5 text-gray-500"></i>
                  <span>Course Catalog Rollover</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-user-cog w-5 text-gray-500"></i>
                  <span>Staff Reassignments</span>
                </li>
              </ul>
            </div>
            <!-- COLUMN #3: Validation & Auditing -->
            <div>
              <h3 class="flex items-center text-gray-700 font-bold text-base mb-3 space-x-2">
                <i class="fas fa-check-double text-blue-500"></i>
                <span>Validation</span>
              </h3>
              <ul class="space-y-1">
                <li
                  class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer font-semibold text-blue-600">
                  <i class="fas fa-clipboard-list w-5 text-gray-500"></i>
                  <span>Rollover Checklists</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-cloud-upload-alt w-5 text-gray-500"></i>
                  <span>Archive &amp; Backup</span>
                </li>
                <li class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 cursor-pointer">
                  <i class="fas fa-search w-5 text-gray-500"></i>
                  <span>Post-Rollover Audit</span>
                </li>
              </ul>
            </div>
          </div>
        </div>



      </div>
      <!-- END RIGHT COLUMN -->
    </div>
  </div>
</li>