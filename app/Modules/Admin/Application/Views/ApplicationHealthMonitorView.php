
<!-- Main Container -->
<div class=" mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Application Health Monitor</h1>
    <p class="text-gray-600">
      Real-time and historical insights into the SIS application’s health, server performance, microservices,
      background tasks, and more. Keep track of everything from CPU usage to active job queues.
    </p>
  </header>

  <!-- 1) SYSTEM RESOURCE USAGE -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">System Resource Usage</h2>

    <!-- Grid of metrics: CPU, Memory, Disk, Network, etc. -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

      <!-- CPU Usage -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-microchip text-indigo-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">CPU Usage</h3>
        </div>
        <p class="text-3xl font-bold">42%</p>
        <p class="text-sm text-gray-500">Average across 4 cores</p>
        <div class="mt-2 text-sm text-gray-600">
          Load Average: <strong>1.85</strong> (1 min), <strong>2.10</strong> (5 min)
        </div>
      </div>

      <!-- Memory Usage -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-memory text-blue-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Memory Usage</h3>
        </div>
        <p class="text-3xl font-bold">8.1 GB / 16 GB</p>
        <p class="text-sm text-gray-500"> ~51% utilized</p>
        <div class="mt-2 text-sm text-gray-600">
          Swap Usage: <strong>0 GB</strong> (no swap usage)
        </div>
      </div>

      <!-- Disk I/O & Space -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-hdd text-yellow-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Disk Usage</h3>
        </div>
        <p class="text-3xl font-bold">450 GB / 1 TB</p>
        <p class="text-sm text-gray-500"> ~45% used</p>
        <div class="mt-2 text-sm text-gray-600">
          I/O Read: <strong>10 MB/s</strong>, Write: <strong>5 MB/s</strong>
        </div>
      </div>

      <!-- Network Throughput -->
      <div class="bg-white rounded shadow p-4">
        <div class="flex items-center space-x-2 mb-2">
          <i class="fas fa-network-wired text-purple-500 text-2xl"></i>
          <h3 class="text-lg font-semibold">Network Throughput</h3>
        </div>
        <p class="text-3xl font-bold">120 Mbps</p>
        <p class="text-sm text-gray-500">Inbound & outbound combined</p>
        <div class="mt-2 text-sm text-gray-600">
          Peak in last hour: <strong>220 Mbps</strong>
        </div>
      </div>
    </div>

    <!-- Placeholder for CPU / Memory graphs -->
    <div class="mt-6 bg-white rounded shadow p-4">
      <h3 class="text-lg font-semibold mb-3 flex items-center space-x-2">
        <i class="fas fa-chart-area text-blue-500"></i>
        <span>Resource Usage Trends (Last 24h)</span>
      </h3>
      <div class="h-48 bg-gray-200 flex items-center justify-center">
        <span class="text-gray-500 text-sm">[CPU/Memory line chart placeholder]</span>
      </div>
    </div>
  </section>

  <!-- 2) MICROSERVICES / APPLICATION COMPONENTS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Microservices & Application Components</h2>
    <p class="text-sm text-gray-600 mb-4">
      Each component or microservice powering the SIS. Check status, response times, and any error logs.
    </p>

    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Service Name</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">Response Time (ms)</th>
            <th class="p-3 text-left font-semibold">Errors (Last 1h)</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row #1: Auth Service -->
          <tr>
            <td class="p-3 font-medium">Authentication Service</td>
            <td class="p-3">
              <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded">Online</span>
            </td>
            <td class="p-3">120 ms (avg)</td>
            <td class="p-3">0</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Restart
              </button>
            </td>
          </tr>
          <!-- Row #2: Gradebook Service -->
          <tr>
            <td class="p-3 font-medium">Gradebook Service</td>
            <td class="p-3">
              <span class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded">Online</span>
            </td>
            <td class="p-3">200 ms (avg)</td>
            <td class="p-3">1 minor exception</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Restart
              </button>
            </td>
          </tr>
          <!-- Row #3: Notification Service -->
          <tr>
            <td class="p-3 font-medium">Notification Service</td>
            <td class="p-3">
              <span class="inline-block bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Degraded</span>
            </td>
            <td class="p-3">500 ms (spiking)</td>
            <td class="p-3 text-red-600">8 errors</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Restart
              </button>
            </td>
          </tr>
          <!-- Row #4: SIS API Gateway -->
          <tr>
            <td class="p-3 font-medium">SIS API Gateway</td>
            <td class="p-3">
              <span class="inline-block bg-red-100 text-red-700 px-2 py-1 rounded">Offline</span>
            </td>
            <td class="p-3">--</td>
            <td class="p-3 text-red-600">Multiple connection failures</td>
            <td class="p-3">
              <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                Investigate
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 3) BACKGROUND TASKS & QUEUES -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Background Tasks & Queues</h2>
    <p class="text-sm text-gray-600 mb-4">
      Monitor queued jobs, scheduled tasks, and any pending batch operations.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Queue Status -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-3">
          <i class="fas fa-list text-blue-500"></i>
          <span>Queue Overview</span>
        </h3>
        <ul class="space-y-2 text-sm">
          <li>
            <strong>Default Queue:</strong> 
            24 jobs waiting, 3 active workers
          </li>
          <li>
            <strong>Emails Queue:</strong>
            5 jobs waiting, 2 active workers
          </li>
          <li>
            <strong>Notifications Queue:</strong>
            12 jobs waiting, 4 active workers
          </li>
        </ul>
        <div class="mt-4 flex gap-3">
          <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
            Pause All
          </button>
          <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
            Retry Failed
          </button>
        </div>
      </div>

      <!-- Scheduled Tasks -->
      <div class="bg-white rounded shadow p-4">
        <h3 class="flex items-center space-x-2 text-lg font-semibold mb-3">
          <i class="fas fa-clock text-green-500"></i>
          <span>Scheduled Tasks</span>
        </h3>
        <ul class="space-y-2 text-sm">
          <li>
            <strong>2:00 AM - Daily Backup</strong>
            <span class="ml-2 text-gray-500">Last run: successful (4h ago)</span>
          </li>
          <li>
            <strong>3:00 AM - Data Sync</strong>
            <span class="ml-2 text-gray-500">Last run: successful (1h ago)</span>
          </li>
          <li>
            <strong>4:00 AM - Cleanup Logs</strong>
            <span class="ml-2 text-red-600">Last run: failed</span>
          </li>
        </ul>
        <div class="mt-4">
          <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
            Force Rerun Cleanup
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- 4) DATABASE & STORAGE PERFORMANCE -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Database & Storage Performance</h2>
    <p class="text-sm text-gray-600 mb-4">
      Key metrics from the database engine and any external storage services (e.g., AWS S3, Google Cloud).
    </p>

    <div class="bg-white rounded shadow p-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- DB Connections -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-database text-blue-600"></i>
            <span>DB Connections</span>
          </h3>
          <p class="text-3xl font-bold">45 / 100</p>
          <p class="text-sm text-gray-500">active connections used</p>
        </div>

        <!-- DB Queries -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-search text-purple-600"></i>
            <span>Query Rate</span>
          </h3>
          <p class="text-3xl font-bold">550 QPS</p>
          <p class="text-sm text-gray-500">avg queries per second</p>
        </div>

        <!-- Slow Queries -->
        <div>
          <h3 class="flex items-center space-x-2 text-lg font-semibold mb-2">
            <i class="fas fa-tachometer-alt text-red-600"></i>
            <span>Slow Queries</span>
          </h3>
          <p class="text-3xl font-bold">12</p>
          <p class="text-sm text-gray-500">in last 5 minutes</p>
        </div>
      </div>

      <div class="mt-6">
        <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
          <i class="fas fa-database text-green-500"></i>
          <span>Database Health Graph</span>
        </h3>
        <div class="h-48 bg-gray-200 flex items-center justify-center">
          <span class="text-gray-500 text-sm">[DB Performance Chart Placeholder]</span>
        </div>
      </div>

      <!-- External Storage (S3 / GCS) -->
      <div class="mt-6 bg-gray-50 p-4 rounded">
        <h4 class="text-md font-semibold mb-2 flex items-center space-x-2">
          <i class="fas fa-cloud text-blue-600"></i>
          <span>External Storage (S3 Bucket: sis-backups)</span>
        </h4>
        <p class="text-sm">
          <strong>Last Access:</strong> 2023-09-11 02:05 AM (Backup Write)
        </p>
        <p class="text-sm">
          <strong>Total Stored:</strong> ~900 GB in backups and archived logs
        </p>
        <p class="text-sm text-green-600 mt-1">No issues detected. Read/Write success rate: 100%</p>
      </div>
    </div>
  </section>

  <!-- 5) REAL-TIME LOGS & ERRORS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Real-Time Logs & Error Tracking</h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

      <!-- Live Stream of Log Events -->
      <div class="bg-white rounded shadow p-4 flex flex-col">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-list-alt text-blue-600"></i>
          <span>Recent Log Events</span>
        </h3>
        <div class="flex-1 bg-gray-100 p-2 rounded overflow-auto max-h-64 text-xs text-gray-700">
          <!-- Example log lines (dummy) -->
          <p>[09:11:03] INFO  GradebookService - Grades synced for class #2131</p>
          <p>[09:10:58] WARN  NotificationService - Delayed message to user #999</p>
          <p>[09:10:45] ERROR SISApiGateway - Connection refused to vendor #12</p>
          <p>[09:10:30] INFO  AuthService - Token refreshed for user #555</p>
          <p>[09:09:59] INFO  JobQueue - Email job #112 processed successfully</p>
          <p>[09:09:45] ERROR SISApiGateway - Connection refused to vendor #12</p>
          <p>[09:09:30] INFO  DataSync - Teacher roster updated (district #2)</p>
          <!-- More logs... -->
        </div>
        <div class="mt-2 text-right">
          <a href="/admin/application/security/error-tracking" class="text-blue-600 text-sm hover:underline">
            View Full Logs →
          </a>
        </div>
      </div>

      <!-- Error / Exception Summary -->
      <div class="bg-white rounded shadow p-4 flex flex-col">
        <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
          <i class="fas fa-exclamation-circle text-red-500"></i>
          <span>Error & Exception Summary</span>
        </h3>
        <ul class="space-y-2 text-sm">
          <li>
            <strong class="text-red-600">High:</strong> SISApiGateway - 25 connection failures (last 10 mins)
          </li>
          <li>
            <strong class="text-yellow-600">Medium:</strong> NotificationService - 8 errors (last 1 hr)
          </li>
          <li>
            <strong class="text-green-600">Low:</strong> GradebookService - 1 minor exception (last 1 hr)
          </li>
        </ul>
        <p class="text-xs text-gray-500 mt-2">
          For more detail, check the “Error &amp; Exception Tracking” or the real-time logs.
        </p>
        <div class="mt-2 text-right">
          <a href="/admin/application/security/error-tracking" class="text-blue-600 text-sm hover:underline">
            Manage Errors →
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 6) CLUSTER / MULTI-NODE ENVIRONMENT (If Applicable) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Cluster / Multi-Node Environment</h2>
    <p class="text-sm text-gray-600 mb-4">
      If running in a load-balanced or containerized environment, check node status and container health here.
    </p>

    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-left font-semibold">Node/Container</th>
            <th class="p-3 text-left font-semibold">Role</th>
            <th class="p-3 text-left font-semibold">Status</th>
            <th class="p-3 text-left font-semibold">CPU / Mem</th>
            <th class="p-3 text-left font-semibold">Uptime</th>
            <th class="p-3 text-left font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Row #1 -->
          <tr>
            <td class="p-3 font-medium">node-1</td>
            <td class="p-3">App Server</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">30% CPU, 45% Mem</td>
            <td class="p-3">14 days</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Rebalance
              </button>
            </td>
          </tr>
          <!-- Row #2 -->
          <tr>
            <td class="p-3 font-medium">node-2</td>
            <td class="p-3">App Server</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">55% CPU, 65% Mem</td>
            <td class="p-3">7 days</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Rebalance
              </button>
            </td>
          </tr>
          <!-- Row #3 -->
          <tr>
            <td class="p-3 font-medium">db-1</td>
            <td class="p-3">Database Master</td>
            <td class="p-3 text-green-600">Active</td>
            <td class="p-3">20% CPU, 40% Mem</td>
            <td class="p-3">30 days</td>
            <td class="p-3">
              <button class="bg-gray-600 text-white px-3 py-1 rounded text-xs hover:bg-gray-700">
                Promote/Failover
              </button>
            </td>
          </tr>
          <!-- Row #4 -->
          <tr>
            <td class="p-3 font-medium">db-2</td>
            <td class="p-3">Database Replica</td>
            <td class="p-3 text-yellow-600">Sync Delay</td>
            <td class="p-3">15% CPU, 35% Mem</td>
            <td class="p-3">20 days</td>
            <td class="p-3">
              <button class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">
                Resync
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 7) ACTIONS & CONTROLS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Actions & Controls</h2>
    <div class="flex flex-wrap gap-4">
      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
        Restart Degraded Services
      </button>
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        Clear Caches
      </button>
      <button class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 text-sm">
        Run Diagnostics
      </button>
      <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">
        Maintenance Mode
      </button>
    </div>
  </section>

</div> <!-- End Main Container -->