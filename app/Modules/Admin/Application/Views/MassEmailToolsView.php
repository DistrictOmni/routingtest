<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Mass Email Tools</h1>
    <p class="text-gray-600">
      Send bulk email notifications to students, parents, staff, and more. Use mass emails for important updates, system alerts, and announcements.
    </p>
  </header>

  <!-- Email Type Selection -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Select Email Type</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <div>
          <label class="block text-sm font-medium mb-1" for="emailType">Email Type</label>
          <select
            id="emailType"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="announcement">Announcement</option>
            <option value="alert">Alert</option>
            <option value="newsletter">Newsletter</option>
            <option value="reminder">Reminder</option>
          </select>
        </div>

        <!-- Recipient Selection -->
        <div>
          <label class="block text-sm font-medium mb-1" for="recipients">Select Recipients</label>
          <select
            id="recipients"
            multiple
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="students">Students</option>
            <option value="parents">Parents</option>
            <option value="teachers">Teachers</option>
            <option value="staff">Staff</option>
          </select>
        </div>

        <!-- Message Body -->
        <div>
          <label class="block text-sm font-medium mb-1" for="emailBody">Message Body</label>
          <textarea
            id="emailBody"
            rows="4"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter your message here"
          ></textarea>
        </div>

        <!-- Send Button -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Send Email
        </button>
      </form>
    </div>
  </section>
</div>
