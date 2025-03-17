<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Email Template Editor</h1>
    <p class="text-gray-600">
      Customize the email templates used for system notifications such as account creation, password resets, and system alerts.
      Personalize the email content to reflect your district’s branding and requirements.
    </p>
  </header>

  <!-- Template Selection -->
  <section class="mb-8">
    <h2 class="text-2xl font-bold mb-4">Select Template</h2>
    <div class="bg-white rounded shadow p-6">
      <select class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300">
        <option value="account-creation">Account Creation</option>
        <option value="password-reset">Password Reset</option>
        <option value="system-alert">System Alert</option>
      </select>
    </div>
  </section>

  <!-- Template Editor -->
  <section>
    <h2 class="text-2xl font-bold mb-4">Edit Template</h2>
    <div class="bg-white rounded shadow p-6">
      <textarea
        class="w-full h-48 border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
        placeholder="Edit your template here..."
      ></textarea>
      <div class="mt-4 text-right">
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
          Save Changes
        </button>
      </div>
    </div>
  </section>
</div>
