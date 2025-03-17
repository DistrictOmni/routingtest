
<!-- Container -->
<div class=" mx-auto p-6">

  <!-- Page Title -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Super Admin Application Overview</h1>
    <p class="text-gray-600">
      Welcome back, <strong>Jane Doe (Super Admin)</strong>. This dashboard provides a comprehensive view of
      the SIS application’s status, usage, integrations, security, and upcoming maintenance.
    </p>
  </header>

  <!-- 1) HIGH-LEVEL SYSTEM METRICS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">System Metrics</h2>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      
      <!-- Total Users -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-users text-blue-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Total Registered Users</h3>
        </div>
        <p class="text-3xl font-bold">12,345</p>
        <p class="text-sm text-gray-500">+120 new this month</p>
      </div>

      <!-- Active Users -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-user-check text-green-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Active Users (Last 7 Days)</h3>
        </div>
        <p class="text-3xl font-bold">8,932</p>
        <p class="text-sm text-gray-500">72% of total users</p>
      </div>

      <!-- Integrations -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-plug text-purple-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Connected Integrations</h3>
        </div>
        <p class="text-3xl font-bold">14</p>
        <p class="text-sm text-gray-500">1 in error state</p>
      </div>

      <!-- Server Load -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-server text-indigo-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Current Server Load</h3>
        </div>
        <p class="text-3xl font-bold">1.78</p>
        <p class="text-sm text-gray-500">Healthy (CPU ~45%)</p>
      </div>
    </div>
    
    <!-- License/Version Overview -->
    <div class="bg-white rounded shadow p-4 mt-6">
      <div class="flex items-center space-x-3 mb-3">
        <i class="fas fa-certificate text-yellow-500 text-2xl"></i>
        <h3 class="text-lg font-semibold">SIS License & Version</h3>
      </div>
      <p class="text-sm mb-2">
        <strong>Current Version:</strong> 3.14.7 (Build 2201) - Last update on 2023-08-15
      </p>
      <p class="text-sm mb-2">
        <strong>License Expiration:</strong> 2024-06-01 <span class="text-red-600">(Renewal due in ~90 days)</span>
      </p>
      <p class="text-sm mb-2">
        <strong>Licensed Modules:</strong> Attendance, Gradebook, Behavior Management, Fees, Health, Reporting, District Setup.
      </p>
      <p class="text-sm text-gray-500">
        <em>Note:</em> Additional modules (e.g., Online Enrollment) are available but not licensed yet.
      </p>
    </div>
  </section>

  <!-- 2) RECENT ACTIVITY & NOTIFICATIONS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Recent Activity & Notifications</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
      <!-- Recent Audit Logs -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-history text-blue-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Recent Audit Logs</h3>
        </div>
        <ul class="text-sm space-y-2">
          <li>
            <span class="font-semibold">2023-09-10 09:15 AM</span> - <strong>JohnAdmin</strong> updated <em>Integration Credentials</em>.
          </li>
          <li>
            <span class="font-semibold">2023-09-09 04:30 PM</span> - <strong>MarySIS</strong> performed a <em>Data Import</em> for new students.
          </li>
          <li>
            <span class="font-semibold">2023-09-08 01:22 PM</span> - <strong>SysBot</strong> auto-synced <em>Grades</em> to the state system.
          </li>
          <li>
            <span class="font-semibold">2023-09-08 11:00 AM</span> - <strong>JaneDoe</strong> added <em>two new roles</em> for staff.
          </li>
        </ul>
        <div class="mt-2 text-blue-600 text-sm cursor-pointer hover:underline">
          <a href="/admin/application/security/audit-logs">View All Logs →</a>
        </div>
      </div>

      <!-- System Alerts -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-3 mb-3">
          <i class="fas fa-bell text-red-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Alerts & Warnings</h3>
        </div>
        <ul class="text-sm space-y-2">
          <li class="text-red-600">
            <strong>Integration Error:</strong> LTI/SCORM #14 failing since 2023-09-09 03:10 PM.
          </li>
          <li class="text-yellow-600">
            <strong>License Renewal Reminder:</strong> SIS license expires in 90 days.
          </li>
          <li class="text-green-600">
            <strong>All Good:</strong> Email Gateway is fully operational, no bounce/spam issues in last 48 hours.
          </li>
        </ul>
        <div class="mt-2 text-blue-600 text-sm cursor-pointer hover:underline">
          <a href="/admin/application/system-health-monitor">Check Full System Health →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 3) SECURITY SNAPSHOT -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Security Snapshot</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      
      <!-- Privileged Users -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-user-shield text-blue-600"></i>
          <span>Privileged Users</span>
        </h3>
        <p class="text-3xl font-bold">12</p>
        <p class="text-sm text-gray-500">Includes Super Admins and District Admins</p>
      </div>

      <!-- MFA Adoption -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-lock text-green-600"></i>
          <span>MFA Adoption Rate</span>
        </h3>
        <p class="text-3xl font-bold">78%</p>
        <p class="text-sm text-gray-500">Goal: 90% by next quarter</p>
      </div>

      <!-- Latest Security Events -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-shield-alt text-red-600"></i>
          <span>Recent Security Events</span>
        </h3>
        <ul class="text-sm space-y-1">
          <li class="text-red-600">3 login failures from IP 10.10.12.22 (Today)</li>
          <li class="text-yellow-600">1 account lockout: <em>jimmy@demo.edu</em></li>
          <li class="text-gray-600">Encrypted backup completed successfully at 2 AM</li>
        </ul>
        <div class="mt-2 text-blue-600 text-sm cursor-pointer hover:underline">
          <a href="/admin/application/security/error-tracking">View All Security Logs →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 4) INTEGRATIONS & FEATURE USAGE -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Integrations & Feature Usage</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      
      <!-- Top 5 Integrated Apps -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-plug text-purple-500"></i>
          <span>Top Integrated Apps</span>
        </h3>
        <ol class="list-decimal list-inside space-y-1 text-sm">
          <li><strong>Google Workspace</strong> - Active, last sync 1 hr ago</li>
          <li><strong>Canvas LMS</strong> - Active, last sync 2 hrs ago</li>
          <li><strong>Zoom</strong> - Degraded, reconnection required</li>
          <li><strong>Library Catalog</strong> - Active, last sync 30 mins ago</li>
          <li><strong>State Reporting Portal</strong> - Active, last sync 4 hrs ago</li>
        </ol>
        <p class="text-xs text-gray-500 mt-2">1 more app in error state: SCORM #14</p>
        <a href="/admin/application/integrations" class="text-blue-600 text-sm hover:underline">Manage Integrations →</a>
      </div>

      <!-- Feature Adoption -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-th-list text-green-500"></i>
          <span>Feature Adoption</span>
        </h3>
        <ul class="text-sm space-y-2">
          <li>
            <strong>Gradebook Usage:</strong>
            <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded ml-2">
              85% of Teachers
            </span>
          </li>
          <li>
            <strong>Behavior Management:</strong>
            <span class="inline-block bg-yellow-100 text-yellow-700 px-2 py-1 rounded ml-2">
              60% of Staff
            </span>
          </li>
          <li>
            <strong>Fees & Finance:</strong>
            <span class="inline-block bg-red-100 text-red-700 px-2 py-1 rounded ml-2">
              30% (Underutilized)
            </span>
          </li>
          <li>
            <strong>Health Module:</strong>
            <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded ml-2">
              78% of Nurse Staff
            </span>
          </li>
        </ul>
        <p class="text-xs text-gray-500 mt-2">Consider training sessions for underutilized modules.</p>
      </div>
    </div>
  </section>

  <!-- 5) UPDATES & MAINTENANCE -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Updates & Maintenance</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Pending App Updates -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-download text-indigo-500"></i>
          <span>Pending Application Updates</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Core SIS Update 3.14.8</strong> available. Release notes mention performance improvements
          and bug fixes. <em>~2.5MB patch size</em>.
        </p>
        <p class="text-sm">
          <strong>Recommended Action:</strong> Schedule during off-peak hours (11 PM - 4 AM).
        </p>
        <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Schedule Update
        </button>
      </div>

      <!-- Scheduled Maintenance -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-toolbox text-orange-500"></i>
          <span>Scheduled Maintenance</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Next Window:</strong> 2023-09-15 @ 02:00 - 03:00 AM
        </p>
        <p class="text-sm mb-2 text-gray-700">
          Planned maintenance includes server OS updates and reindexing the SIS database. Expect ~1 hour downtime.
        </p>
        <p class="text-xs text-gray-500">
          <em>All staff and students will be logged out during this period.</em>
        </p>
      </div>
    </div>

    <!-- Backup Status -->
    <div class="bg-white rounded shadow p-4 mt-6">
      <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
        <i class="fas fa-database text-green-600"></i>
        <span>Backup Status</span>
      </h3>
      <p class="text-sm mb-2">
        <strong>Last Backup:</strong> 2023-09-10 @ 02:00 AM (Full Database + Files)
      </p>
      <p class="text-sm mb-2">
        <strong>Next Scheduled:</strong> 2023-09-11 @ 02:00 AM
      </p>
      <p class="text-xs text-gray-500">
        ~150GB total backup size. Stored in <em>S3 bucket: sis-backups/2023-09-10</em>.
      </p>
      <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Force Manual Backup
      </button>
    </div>
  </section>

  <!-- 6) QUICK ACCESS PANELS / TILES -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Quick Access</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- Users -->
      <a href="/admin/auth/users" class="bg-white rounded shadow p-4 flex flex-col hover:shadow-md transition">
        <div class="flex items-center space-x-2 mb-3">
          <i class="fas fa-user-cog text-blue-600 text-2xl"></i>
          <h3 class="text-lg font-semibold">User Management</h3>
        </div>
        <p class="text-sm text-gray-600 flex-1">
          Add, remove, or edit users and assign roles. Manage user permissions and group memberships.
        </p>
        <div class="text-blue-600 text-sm mt-3">Go →</div>
      </a>

      <!-- District Management -->
      <a href="/admin/districts" class="bg-white rounded shadow p-4 flex flex-col hover:shadow-md transition">
        <div class="flex items-center space-x-2 mb-3">
          <i class="fas fa-school text-orange-600 text-2xl"></i>
          <h3 class="text-lg font-semibold">District Management</h3>
        </div>
        <p class="text-sm text-gray-600 flex-1">
          Configure district-level profiles, addresses, contact info, and advanced setup.
        </p>
        <div class="text-blue-600 text-sm mt-3">Go →</div>
      </a>

      <!-- Email Gateway -->
      <a href="/admin/application/email/gateway-setup" class="bg-white rounded shadow p-4 flex flex-col hover:shadow-md transition">
        <div class="flex items-center space-x-2 mb-3">
          <i class="fas fa-envelope text-red-600 text-2xl"></i>
          <h3 class="text-lg font-semibold">Email Gateway</h3>
        </div>
        <p class="text-sm text-gray-600 flex-1">
          Configure SMTP credentials, domain verification, mass email tools, and bounce tracking.
        </p>
        <div class="text-blue-600 text-sm mt-3">Go →</div>
      </a>

      <!-- Security Center -->
      <a href="/admin/application/security/audit-logs" class="bg-white rounded shadow p-4 flex flex-col hover:shadow-md transition">
        <div class="flex items-center space-x-2 mb-3">
          <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
          <h3 class="text-lg font-semibold">Security Center</h3>
        </div>
        <p class="text-sm text-gray-600 flex-1">
          Review audit logs, manage whitelists/blacklists, data privacy, encryption policies, and more.
        </p>
        <div class="text-blue-600 text-sm mt-3">Go →</div>
      </a>
    </div>
  </section>

  <!-- 7) GRAPHICAL ANALYTICS / TRENDS (Placeholder) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Analytics & Trends</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Login Trends -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-chart-line text-blue-500"></i>
          <span>Login Trends (Past 30 Days)</span>
        </h3>
        <div class="h-48 bg-gray-200 flex items-center justify-center">
          <!-- Chart Placeholder -->
          <span class="text-gray-500">[Line Chart Placeholder]</span>
        </div>
      </div>

      <!-- Error Rate Trends -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-exclamation-triangle text-red-500"></i>
          <span>Error & Exception Rate</span>
        </h3>
        <div class="h-48 bg-gray-200 flex items-center justify-center">
          <!-- Chart Placeholder -->
          <span class="text-gray-500">[Bar/Area Chart Placeholder]</span>
        </div>
      </div>
    </div>
  </section>

  <!-- 8) MULTI-DISTRICT SUMMARY (If applicable) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Multi-District Overview</h2>
    <p class="text-sm text-gray-600 mb-4">
      This section applies if multiple districts are managed under one SIS instance.
      Quick glance at each district’s usage, enrollment, and compliance status.
    </p>

    <table class="w-full bg-white rounded shadow overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 text-left text-sm font-semibold">District</th>
          <th class="p-3 text-left text-sm font-semibold">Schools</th>
          <th class="p-3 text-left text-sm font-semibold">Enrollment</th>
          <th class="p-3 text-left text-sm font-semibold">Admin Users</th>
          <th class="p-3 text-left text-sm font-semibold">Last Sync</th>
          <th class="p-3 text-left text-sm font-semibold">Compliance</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 text-sm">
        <tr>
          <td class="p-3 font-semibold">Sunrise District</td>
          <td class="p-3">8</td>
          <td class="p-3">5,500</td>
          <td class="p-3">15</td>
          <td class="p-3">3 hours ago</td>
          <td class="p-3 text-green-600">OK</td>
        </tr>
        <tr>
          <td class="p-3 font-semibold">Riverdale ISD</td>
          <td class="p-3">5</td>
          <td class="p-3">3,200</td>
          <td class="p-3">8</td>
          <td class="p-3">1 day ago</td>
          <td class="p-3 text-yellow-600">Minor Issues</td>
        </tr>
        <tr>
          <td class="p-3 font-semibold">Westview District</td>
          <td class="p-3">11</td>
          <td class="p-3">7,100</td>
          <td class="p-3">20</td>
          <td class="p-3">45 mins ago</td>
          <td class="p-3 text-green-600">OK</td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- 9) GLOBAL SEARCH / QUICK JUMP (Optional) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Global Search / Quick Jump</h2>
    <div class="bg-white rounded shadow p-4">
      <p class="text-sm text-gray-600 mb-4">
        Quickly find and jump to any user, district, or admin setting using an instant search:
      </p>
      <input
        type="text"
        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
        placeholder="Search by user name, district, or setting..."
      />
      <p class="mt-2 text-xs text-gray-500">e.g., “John Smith,” “Riverdale,” “Email Gateway,” “Gradebook.”</p>
    </div>
  </section>

  <!-- 10) ACTIONABLE BUTTONS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Actions</h2>
    <div class="flex flex-wrap gap-4">
      <!-- Add New Admin/User -->
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Add New Admin
      </button>
      <!-- Maintenance Mode -->
      <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">
        Launch Maintenance Mode
      </button>
      <!-- Force Sync All -->
      <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
        Force Sync All Integrations
      </button>
      <!-- Generate System Report -->
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        Generate System Report
      </button>
    </div>
  </section>

</div> 