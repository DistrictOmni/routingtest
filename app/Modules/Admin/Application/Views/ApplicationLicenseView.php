<div class=" mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">License Management</h1>
    <p class="text-gray-600">
      Manage your SIS core license, additional modules, and third-party application licenses. Keep track
      of expirations, seats, usage limits, and renewals in one place.
    </p>
  </header>

  <!-- 1) CURRENT SIS LICENSE OVERVIEW -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">SIS Core License</h2>
    <div class="bg-white rounded shadow p-6">
      <div class="flex items-center space-x-3 mb-4">
        <i class="fas fa-certificate text-yellow-500 text-2xl"></i>
        <div>
          <h3 class="text-lg font-semibold">Core SIS License (v3.14)</h3>
          <p class="text-sm text-gray-500">
            <strong>Licensed To:</strong> Sunrise ISD &amp; Affiliated Districts
          </p>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Expiration & Renewal -->
        <div class="space-y-2">
          <p><strong>Expiration Date:</strong> 2024-06-01</p>
          <p>
            <span class="text-red-600 font-semibold">90 days left</span> until renewal.
          </p>
          <p class="text-sm text-gray-600">
            Renewal reminders are emailed to super admins 30 days prior.
          </p>
        </div>
        <!-- Seats & Installation Info -->
        <div class="space-y-2">
          <p><strong>Licensed Seats:</strong> 15,000</p>
          <p>
            <strong>Current Usage:</strong> 12,345 
            <span class="text-gray-500 text-sm">(includes staff &amp; students)</span>
          </p>
          <p><strong>Installation ID:</strong> #SIS-0089123-AZ</p>
        </div>
      </div>
      <!-- Action Buttons -->
      <div class="mt-6 flex flex-wrap gap-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
          Renew License
        </button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm">
          View Terms &amp; Conditions
        </button>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
          Upload New License File
        </button>
      </div>
    </div>
  </section>

  <!-- 2) LICENSED MODULES -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Licensed Modules</h2>
    <p class="text-sm text-gray-600 mb-4">
      These are additional modules licensed under the SIS. Each may have separate usage limits or
      expiration dates. Expand them to view or update details.
    </p>

    <!-- Module Grid / Accordions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Module #1: Attendance -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-user-check text-blue-500"></i>
          <span>Attendance Module</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-06-01 (same as core)
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> 15,000
        </p>
        <p class="text-xs text-gray-500">
          Track daily and period attendance, automate notifications, integrate with official state reporting.
        </p>
      </div>

      <!-- Module #2: Behavior Management -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-exclamation-triangle text-red-500"></i>
          <span>Behavior Management</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-07-15
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> 10,000 
          <span class="text-yellow-600">(Under core capacity)</span>
        </p>
        <p class="text-xs text-gray-500">
          Enables incident tracking, discipline records, and referrals. Integration with parent portals.
        </p>
      </div>

      <!-- Module #3: Gradebook -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-book-open text-green-500"></i>
          <span>Gradebook</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-06-01
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> 15,000
        </p>
        <p class="text-xs text-gray-500">
          Provides web-based grading, progress reports, and parent-student portals.
        </p>
      </div>

      <!-- Module #4: Health Services -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-heartbeat text-pink-500"></i>
          <span>Health Services</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-06-01
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> 5,000 
          <span class="text-red-600">(Limited capacity)</span>
        </p>
        <p class="text-xs text-gray-500">
          Manages immunization records, nurse visits, and health screenings.
        </p>
      </div>

      <!-- Module #5: Fees & Finance -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-dollar-sign text-yellow-500"></i>
          <span>Fees &amp; Finance</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-06-01
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> 15,000
        </p>
        <p class="text-xs text-gray-500">
          Collect and manage student fees, generate invoices, track outstanding balances.
        </p>
      </div>

      <!-- Module #6: Custom Reporting -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-chart-line text-purple-500"></i>
          <span>Custom Reporting</span>
        </h3>
        <p class="text-sm mb-2">
          <strong>Expiration:</strong> 2024-12-31
        </p>
        <p class="text-sm mb-2">
          <strong>Licensed Seats:</strong> Unlimited (Staff-Only)
        </p>
        <p class="text-xs text-gray-500">
          Advanced query builder, data export, and custom dashboards for administrators.
        </p>
      </div>
    </div>
  </section>

  <!-- 3) THIRD-PARTY LICENSES -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Third-Party Licenses</h2>
    <p class="text-sm text-gray-600 mb-4">
      Some integrations or plugins require separate licenses. Manage them here to ensure uninterrupted service.
    </p>

    <!-- Table of Third-Party Licenses -->
    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left text-sm font-semibold">Plugin/App</th>
            <th class="p-3 text-left text-sm font-semibold">Vendor</th>
            <th class="p-3 text-left text-sm font-semibold">License Key</th>
            <th class="p-3 text-left text-sm font-semibold">Expiration</th>
            <th class="p-3 text-left text-sm font-semibold">Status</th>
            <th class="p-3 text-left text-sm font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-sm">
          <!-- Row #1 -->
          <tr>
            <td class="p-3 font-semibold">Canvas LMS Integration</td>
            <td class="p-3">Instructure</td>
            <td class="p-3"><code>CANV-1234-5678</code></td>
            <td class="p-3">2024-07-01</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs">
                Renew
              </button>
              <button class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                View
              </button>
            </td>
          </tr>
          <!-- Row #2 -->
          <tr>
            <td class="p-3 font-semibold">SCORM Cloud Connector</td>
            <td class="p-3">Rustici Software</td>
            <td class="p-3"><code>SCORM-8888-9999</code></td>
            <td class="p-3 text-red-600">Expired (2023-08-31)</td>
            <td class="p-3 text-red-600">Inactive</td>
            <td class="p-3">
              <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                Renew Now
              </button>
              <button class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                View
              </button>
            </td>
          </tr>
          <!-- Row #3 -->
          <tr>
            <td class="p-3 font-semibold">Zoom Video Ed</td>
            <td class="p-3">Zoom Inc.</td>
            <td class="p-3"><code>ZOOM-2468-ABCD</code></td>
            <td class="p-3">2024-01-15</td>
            <td class="p-3 text-yellow-600">Expiring Soon</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs">
                Renew
              </button>
              <button class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 text-xs">
                View
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 4) LICENSE KEYS & UPLOADS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">License Keys &amp; Uploads</h2>
    <div class="bg-white rounded shadow p-6">
      <div class="mb-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
          <i class="fas fa-key text-blue-600"></i>
          <span>Add/Update a License Key</span>
        </h3>
        <p class="text-sm text-gray-600">
          Paste or upload a new license file to update your SIS or third-party modules.
        </p>
      </div>

      <form class="space-y-4">
        <div>
          <label class="block text-sm font-medium mb-1" for="licenseKey">License Key or Code</label>
          <input
            id="licenseKey"
            type="text"
            placeholder="E.g. SIS-1234-5678-ABCD"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1" for="licenseFile">Upload License File</label>
          <input
            id="licenseFile"
            type="file"
            class="block w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded file:border-0
                   file:text-sm file:font-semibold
                   file:bg-blue-50 file:text-blue-700
                   hover:file:bg-blue-100"
          />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1" for="notes">Notes (optional)</label>
          <textarea
            id="notes"
            rows="3"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Describe the license or any relevant details..."
          ></textarea>
        </div>
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Submit License
        </button>
      </form>
    </div>
  </section>

  <!-- 5) NOTIFICATIONS & REMINDERS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Reminders &amp; Automatic Notifications</h2>
    <div class="bg-white rounded shadow p-6">
      <p class="text-sm text-gray-600 mb-4">
        Configure how and when the system notifies admins about upcoming license expirations.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Renewal Notifications -->
        <div>
          <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
            <i class="fas fa-bell text-red-500"></i>
            <span>Renewal Notifications</span>
          </h3>
          <ul class="list-disc list-inside text-sm space-y-1">
            <li>Send email reminders <strong>30 days before</strong> expiration.</li>
            <li>Send additional reminders <strong>7 days before</strong> expiration.</li>
            <li>Send daily reminders if licenses <strong>are past due</strong>.</li>
          </ul>
          <p class="text-xs text-gray-500 mt-2">
            These reminders are sent to super admins and licensing managers.
          </p>
        </div>

        <!-- Slack / Syslog -->
        <div>
          <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
            <i class="fas fa-comments text-green-500"></i>
            <span>Integration Notifications</span>
          </h3>
          <ul class="list-disc list-inside text-sm space-y-1">
            <li>Notify #tech-updates Slack channel for all license changes.</li>
            <li>Post syslog entries for license events (renewed, expired).</li>
          </ul>
          <p class="text-xs text-gray-500 mt-2">
            Adjust these notifications in the <em>System Settings → Notifications</em> panel.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- 6) QUICK LINKS / ACTIONS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Quick Actions</h2>
    <div class="flex flex-wrap gap-4">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Renew All Expiring Soon
      </button>
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        Purchase Additional Seats
      </button>
      <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">
        View License Terms
      </button>
      <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
        Download License Report (CSV)
      </button>
    </div>
  </section>

</div> <!-- End Main Container -->