<!-- Container -->
<div class=" mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Application Integration Status</h1>
    <p class="text-gray-600">
      View and manage all external apps and services connected to the SIS. Check real-time
      status, data sync schedules, and any issues encountered during operation.
    </p>
  </header>

  <!-- 1) QUICK OVERVIEW -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Overview</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- Total Integrations -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-plug text-blue-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Total Integrations</h3>
        </div>
        <p class="text-3xl font-bold">14</p>
        <p class="text-sm text-gray-500">1 in error state</p>
      </div>

      <!-- Sync Success Rate -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-sync-alt text-green-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Sync Success Rate</h3>
        </div>
        <p class="text-3xl font-bold">98.7%</p>
        <p class="text-sm text-gray-500">over last 24 hrs</p>
      </div>

      <!-- Pending Updates -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-exclamation-circle text-yellow-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Pending Updates</h3>
        </div>
        <p class="text-3xl font-bold">2</p>
        <p class="text-sm text-gray-500">Zoom Ed &amp; SCORM plugin</p>
      </div>

      <!-- API Calls Per Hour -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-chart-line text-purple-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">API Calls (Hr)</h3>
        </div>
        <p class="text-3xl font-bold">3,560</p>
        <p class="text-sm text-gray-500">peak ~4,120 at 9 AM</p>
      </div>
    </div>
  </section>

  <!-- 2) INTEGRATION STATUS TABLE -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Integrations</h2>
    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">App Name</th>
            <th class="p-3 text-left font-semibold">Vendor</th>
            <th class="p-3 text-left font-semibold">State</th>
            <th class="p-3 text-left font-semibold">Last Sync</th>
            <th class="p-3 text-left font-semibold">Next Sync</th>
            <th class="p-3 text-left font-semibold">Errors (24h)</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row #1: Google Workspace -->
          <tr>
            <td class="p-3 font-medium">Google Workspace</td>
            <td class="p-3">Google</td>
            <td class="p-3">
              <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded">Active</span>
            </td>
            <td class="p-3">Today 08:15 AM</td>
            <td class="p-3">Today 12:15 PM</td>
            <td class="p-3">0</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Force Sync
              </button>
            </td>
          </tr>
          <!-- Row #2: Canvas LMS -->
          <tr>
            <td class="p-3 font-medium">Canvas LMS</td>
            <td class="p-3">Instructure</td>
            <td class="p-3">
              <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded">Active</span>
            </td>
            <td class="p-3">Today 07:45 AM</td>
            <td class="p-3">Today 11:45 AM</td>
            <td class="p-3">1 (minor)</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Force Sync
              </button>
            </td>
          </tr>
          <!-- Row #3: Zoom Video Ed -->
          <tr>
            <td class="p-3 font-medium">Zoom Video Ed</td>
            <td class="p-3">Zoom Inc.</td>
            <td class="p-3">
              <span class="inline-block bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Degraded</span>
            </td>
            <td class="p-3">Today 09:05 AM</td>
            <td class="p-3">Today 01:05 PM</td>
            <td class="p-3 text-red-600">5</td>
            <td class="p-3">
              <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                Investigate
              </button>
            </td>
          </tr>
          <!-- Row #4: SCORM Connector -->
          <tr>
            <td class="p-3 font-medium">SCORM Cloud Connector</td>
            <td class="p-3">Rustici Software</td>
            <td class="p-3">
              <span class="inline-block bg-red-100 text-red-700 px-2 py-1 rounded">Error</span>
            </td>
            <td class="p-3">Yesterday 11:00 PM</td>
            <td class="p-3 text-gray-400">--</td>
            <td class="p-3 text-red-600">12</td>
            <td class="p-3">
              <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                Fix Now
              </button>
            </td>
          </tr>
          <!-- Row #5: State Reporting Portal -->
          <tr>
            <td class="p-3 font-medium">State Reporting Portal</td>
            <td class="p-3">Arizona DOE</td>
            <td class="p-3">
              <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded">Active</span>
            </td>
            <td class="p-3">Today 07:00 AM</td>
            <td class="p-3">Today 07:00 PM</td>
            <td class="p-3">0</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Force Sync
              </button>
            </td>
          </tr>
          <!-- More rows as needed... -->
        </tbody>
      </table>
    </div>
  </section>

  <!-- 3) SYNC LOGS / RECENT ACTIVITY -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Recent Sync & Activity Logs</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

      <!-- Sync Log Stream -->
      <div class="bg-white rounded shadow p-4 flex flex-col">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-list-alt text-blue-600"></i>
          <span>Live Sync Events</span>
        </h3>
        <div class="flex-1 bg-gray-100 p-2 rounded overflow-auto max-h-64 text-xs text-gray-700">
          <!-- Example log lines (dummy) -->
          <p>[09:14:32] INFO  GoogleWorkspace - 50 new accounts synced</p>
          <p>[09:14:10] WARN  ZoomIntegration - Timeout on meeting data retrieval</p>
          <p>[09:14:02] ERROR SCORMCloud - Connection refused from external API</p>
          <p>[09:13:59] INFO  CanvasLMS - Course #441 updated successfully</p>
          <p>[09:13:45] INFO  StatePortal - Attendance data batch uploaded (district #4)</p>
          <p>[09:13:20] INFO  GoogleWorkspace - Updated 10 staff accounts</p>
          <p>[09:13:00] ERROR SCORMCloud - Connection refused from external API</p>
          <!-- More logs... -->
        </div>
        <div class="mt-2 text-right">
          <a href="/admin/application/security/error-tracking" class="text-blue-600 text-sm hover:underline">
            View Full Logs →
          </a>
        </div>
      </div>

      <!-- Graphical Sync Stats -->
      <div class="bg-white rounded shadow p-4 flex flex-col">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-chart-bar text-purple-600"></i>
          <span>Sync Statistics (Last 24h)</span>
        </h3>
        <div class="flex-1 bg-gray-100 p-2 rounded flex items-center justify-center">
          <!-- Placeholder for a chart -->
          <span class="text-gray-500 text-sm">[Bar/Line Chart of successful vs. failed syncs]</span>
        </div>
        <p class="text-xs text-gray-500 mt-2">
          Data includes both manual (“Force Sync”) and scheduled sync operations.
        </p>
      </div>
    </div>
  </section>

  <!-- 4) SCHEDULING & CONFIGURATION -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Scheduling & Configuration</h2>
    <p class="text-sm text-gray-600 mb-4">
      Control automatic sync frequencies and general settings for each integration.
    </p>

    <!-- Example: 2-Column Layout of Sync Schedules -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
      <!-- Column #1: High-Frequency Integrations -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-cog text-blue-500"></i>
          <span>High-Frequency Sync</span>
        </h3>
        <ul class="space-y-2 text-sm">
          <li>
            <strong>Google Workspace:</strong> every 4 hours
          </li>
          <li>
            <strong>Zoom Video Ed:</strong> every 4 hours (currently degraded)
          </li>
          <li>
            <strong>Canvas LMS:</strong> every 4 hours
          </li>
        </ul>
        <button class="mt-4 bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
          Edit Schedule
        </button>
      </div>

      <!-- Column #2: Low-Frequency Integrations -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-sliders-h text-green-500"></i>
          <span>Low-Frequency Sync</span>
        </h3>
        <ul class="space-y-2 text-sm">
          <li>
            <strong>SCORM Cloud:</strong> currently disabled (error state)
          </li>
          <li>
            <strong>State Reporting Portal:</strong> daily at 7:00 AM &amp; 7:00 PM
          </li>
          <li>
            <strong>Library Catalog:</strong> once per day at 2:00 AM
          </li>
        </ul>
        <button class="mt-4 bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
          Edit Schedule
        </button>
      </div>
    </div>

    <!-- Additional Config / Global Settings -->
    <div class="bg-white rounded shadow p-4 mt-6">
      <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
        <i class="fas fa-wrench text-red-500"></i>
        <span>Global Integration Settings</span>
      </h3>
      <ul class="list-disc list-inside text-sm space-y-1">
        <li><strong>Max Retries:</strong> 3 attempts per sync cycle before marking as failed.</li>
        <li><strong>Backoff Strategy:</strong> exponential (30s → 60s → 120s).</li>
        <li><strong>Log Level:</strong> detailed for all integrations in <em>testing</em> environment, minimal for <em>production</em>.</li>
        <li><strong>Notification Policy:</strong> email super admins on 2+ consecutive sync failures.</li>
      </ul>
      <p class="text-xs text-gray-500 mt-2">Adjust these in System Settings → Integrations if needed.</p>
    </div>
  </section>

  <!-- 5) ACTIONS & CONTROLS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Actions & Controls</h2>
    <div class="flex flex-wrap gap-4">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Force Sync All
      </button>
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        Sync Only Degraded/Errored
      </button>
      <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">
        Pause All Schedules
      </button>
      <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
        Reset to Default Settings
      </button>
    </div>
  </section>

</div> <!-- End Container -->