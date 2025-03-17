<div class=" mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Application Update Manager</h1>
    <p class="text-gray-600">
      Manage and install new updates for your SIS core, modules, and third-party integrations. 
      Keep track of version history, schedule maintenance, and view detailed release notes.
    </p>
  </header>

  <!-- 1) CURRENT VERSION & STATUS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Current SIS Version</h2>
    <div class="bg-white rounded shadow p-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- SIS Version -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-code-branch text-blue-500"></i>
            <span>SIS Core</span>
          </h3>
          <p class="text-xl font-bold">v3.14.7 (Build 2201)</p>
          <p class="text-sm text-gray-500">Last updated: 2023-08-15</p>
        </div>
        <!-- Status -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-heartbeat text-green-500"></i>
            <span>System Status</span>
          </h3>
          <p class="text-lg font-bold text-green-600">Healthy</p>
          <p class="text-sm text-gray-500">No pending patches for this version.</p>
        </div>
        <!-- Next Maintenance -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-clock text-yellow-500"></i>
            <span>Scheduled Maintenance</span>
          </h3>
          <p class="text-sm">
            <strong>Next Window:</strong> 2023-09-15 @ 02:00 - 03:00 AM
          </p>
          <p class="text-xs text-gray-500 mt-1">
            Expect ~1 hour downtime for server OS updates and reindexing.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- 2) PENDING UPDATES -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Pending Updates</h2>
    <p class="text-sm text-gray-600 mb-4">
      Below are any available updates for your SIS core, licensed modules, or integrations. 
      Click “View Notes” to see details, or “Install” to proceed. 
      Consider scheduling updates during off-peak hours.
    </p>

    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Component</th>
            <th class="p-3 text-left font-semibold">Current Version</th>
            <th class="p-3 text-left font-semibold">Available Version</th>
            <th class="p-3 text-left font-semibold">Release Date</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row #1 -->
          <tr>
            <td class="p-3 font-medium">Core SIS</td>
            <td class="p-3">v3.14.7 (Build 2201)</td>
            <td class="p-3 text-blue-600">v3.14.8 (Build 2212)</td>
            <td class="p-3">2023-09-01</td>
            <td class="p-3 flex gap-2">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Install
              </button>
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Schedule
              </button>
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Notes
              </button>
            </td>
          </tr>
          <!-- Row #2 -->
          <tr>
            <td class="p-3 font-medium">SCORM Connector</td>
            <td class="p-3">v1.3.2</td>
            <td class="p-3 text-blue-600">v1.3.5</td>
            <td class="p-3">2023-09-05</td>
            <td class="p-3 flex gap-2">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Install
              </button>
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Notes
              </button>
            </td>
          </tr>
          <!-- Row #3 -->
          <tr>
            <td class="p-3 font-medium">Zoom Video Ed</td>
            <td class="p-3">v4.0</td>
            <td class="p-3 text-blue-600">v4.1</td>
            <td class="p-3">2023-08-28</td>
            <td class="p-3 flex gap-2">
              <button class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">
                Install
              </button>
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                View Notes
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 3) RECENTLY INSTALLED UPDATES (HISTORY) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Recently Installed Updates</h2>
    <p class="text-sm text-gray-600 mb-4">
      A history of updates applied to your system, including date/time, user who triggered them, and any notes.
    </p>

    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Date/Time</th>
            <th class="p-3 text-left font-semibold">Component</th>
            <th class="p-3 text-left font-semibold">New Version</th>
            <th class="p-3 text-left font-semibold">Installed By</th>
            <th class="p-3 text-left font-semibold">Notes</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row #1 -->
          <tr>
            <td class="p-3">2023-08-15 02:15 AM</td>
            <td class="p-3">Core SIS</td>
            <td class="p-3">v3.14.7 (Build 2201)</td>
            <td class="p-3">JaneDoe (Super Admin)</td>
            <td class="p-3 text-sm text-gray-500">
              Scheduled update. <br/>
              Duration: ~20 mins.
            </td>
          </tr>
          <!-- Row #2 -->
          <tr>
            <td class="p-3">2023-08-02 11:00 PM</td>
            <td class="p-3">Behavior Management Module</td>
            <td class="p-3">v2.1.0</td>
            <td class="p-3">MarySIS (District IT)</td>
            <td class="p-3 text-sm text-gray-500">
              Minor bug fixes and new reporting feature.
            </td>
          </tr>
          <!-- Row #3 -->
          <tr>
            <td class="p-3">2023-07-10 01:00 AM</td>
            <td class="p-3">OAuth & API Keys Plugin</td>
            <td class="p-3">v1.0.5</td>
            <td class="p-3">JohnAdmin</td>
            <td class="p-3 text-sm text-gray-500">
              Security patch, forced key rotation.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 4) RELEASE NOTES & CHANGELOG (DETAILED) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Release Notes & Changelog</h2>
    <p class="text-sm text-gray-600 mb-4">
      Below is a list of the most recent versions and their key changes. Click “Show Details” for more extensive
      patch notes or known issues.  
    </p>

    <div class="bg-white rounded shadow p-4">
      <ul class="divide-y divide-gray-200 text-sm">
        <!-- Release #1 -->
        <li class="py-4">
          <strong class="block text-lg">Core SIS v3.14.8 (Build 2212)</strong>
          <span class="text-gray-500 text-xs">
            Released: 2023-09-01
          </span>
          <p class="mt-2 text-gray-600">
            <strong>Key Highlights:</strong> Performance enhancements, improved security for parent portal,
            bug fixes for Gradebook sync. 
            <button class="ml-2 text-blue-600 hover:underline text-xs">
              Show Details
            </button>
          </p>
        </li>
        <!-- Release #2 -->
        <li class="py-4">
          <strong class="block text-lg">SCORM Connector v1.3.5</strong>
          <span class="text-gray-500 text-xs">Released: 2023-09-05</span>
          <p class="mt-2 text-gray-600">
            <strong>Key Highlights:</strong> Additional SCORM 2004 compatibility, new error handling for 
            offline mode. 
            <button class="ml-2 text-blue-600 hover:underline text-xs">
              Show Details
            </button>
          </p>
        </li>
        <!-- Release #3 -->
        <li class="py-4">
          <strong class="block text-lg">Zoom Video Ed v4.1</strong>
          <span class="text-gray-500 text-xs">Released: 2023-08-28</span>
          <p class="mt-2 text-gray-600">
            <strong>Key Highlights:</strong> Auto-provisioning of staff accounts, minor UI tweaks for 
            integrated scheduling. 
            <button class="ml-2 text-blue-600 hover:underline text-xs">
              Show Details
            </button>
          </p>
        </li>
      </ul>
    </div>
  </section>

  <!-- 5) SCHEDULING / AUTOMATION -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Scheduling & Automation</h2>
    <p class="text-sm text-gray-600 mb-4">
      Automate updates to minimize downtime. For critical security patches, you may choose to deploy
      them immediately or within a specific window.
    </p>

    <div class="bg-white rounded shadow p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Schedule Next Core Update -->
        <div>
          <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
            <i class="fas fa-calendar-alt text-blue-600"></i>
            <span>Schedule Next Core Update</span>
          </h3>
          <p class="text-sm text-gray-600 mb-2">
            Current available version: <strong>v3.14.8</strong>
          </p>
          <label class="block text-sm font-medium mb-1" for="updateDate">Select Date & Time</label>
          <input
            id="updateDate"
            type="datetime-local"
            class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring focus:border-blue-300 mb-3"
          />
          <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
            Schedule Update
          </button>
        </div>

        <!-- Auto-Update Settings -->
        <div>
          <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
            <i class="fas fa-robot text-green-600"></i>
            <span>Auto-Update Settings</span>
          </h3>
          <ul class="list-disc list-inside text-sm space-y-1 mb-3">
            <li>Auto-install minor patches overnight (2 AM - 4 AM)</li>
            <li>Prompt manual approval for major or security releases</li>
            <li>Notify #tech-updates Slack channel when updates complete</li>
          </ul>
          <button class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm">
            Edit Settings
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- 6) ACTIONS & CONTROLS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Actions & Controls</h2>
    <div class="flex flex-wrap gap-4">
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        Install All Minor Updates
      </button>
      <button class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 text-sm">
        Roll Back Last Update
      </button>
      <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">
        Maintenance Mode
      </button>
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Check for Updates
      </button>
    </div>
  </section>

</div>