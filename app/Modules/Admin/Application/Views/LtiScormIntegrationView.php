<div class="p-6">
  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">LTI/SCORM Integration</h1>
    <p class="text-gray-600">
      Configure and manage LTI (Learning Tools Interoperability) and SCORM (Sharable Content Object Reference Model) integrations.
      These integrations allow seamless connection with third-party learning tools and content.
    </p>
  </header>

  <!-- LTI Configuration Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">LTI Configuration</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- LTI Consumer Key & Secret -->
        <div>
          <label class="block text-sm font-medium mb-1" for="ltiConsumerKey">Consumer Key</label>
          <input
            type="text"
            id="ltiConsumerKey"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter your LTI Consumer Key"
          />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1" for="ltiSecret">Consumer Secret</label>
          <input
            type="password"
            id="ltiSecret"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter your LTI Consumer Secret"
          />
        </div>

        <!-- Save Button -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save LTI Configuration
        </button>
      </form>
    </div>
  </section>

  <!-- SCORM Integration Section -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">SCORM Integration</h2>
    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-6">
        <!-- SCORM API Endpoint -->
        <div>
          <label class="block text-sm font-medium mb-1" for="scormEndpoint">SCORM API Endpoint</label>
          <input
            type="url"
            id="scormEndpoint"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="https://api.yourservice.com/scorm"
          />
        </div>

        <!-- SCORM Authentication Key -->
        <div>
          <label class="block text-sm font-medium mb-1" for="scormAuthKey">Authentication Key</label>
          <input
            type="text"
            id="scormAuthKey"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Enter your SCORM Authentication Key"
          />
        </div>

        <!-- Save Button -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save SCORM Configuration
        </button>
      </form>
    </div>
  </section>
</div>
