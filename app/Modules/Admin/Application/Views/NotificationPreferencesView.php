<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Notification Preferences</h1>
    <p class="text-gray-600">
      Set global notification preferences for your district. These settings apply to all users and allow for management of email notifications, system alerts, and event-driven messages.
    </p>
  </header>

  <!-- Global Preferences Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Default Notification Settings</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- Email Notifications -->
        <div>
          <label class="block text-sm font-medium mb-1" for="emailNotifications">Email Notifications</label>
          <select
            id="emailNotifications"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled" selected>Enabled</option>
            <option value="disabled">Disabled</option>
          </select>
        </div>

        <!-- SMS Notifications -->
        <div>
          <label class="block text-sm font-medium mb-1" for="smsNotifications">SMS Notifications</label>
          <select
            id="smsNotifications"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled">Enabled</option>
            <option value="disabled" selected>Disabled</option>
          </select>
        </div>

        <!-- Push Notifications -->
        <div>
          <label class="block text-sm font-medium mb-1" for="pushNotifications">Push Notifications</label>
          <select
            id="pushNotifications"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="enabled">Enabled</option>
            <option value="disabled" selected>Disabled</option>
          </select>
        </div>

        <!-- Save Button -->
        <div class="mt-4 text-right">
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
          >
            Save Global Preferences
          </button>
        </div>
      </form>
    </div>
  </section>
</div>
