
<div class=" mx-auto p-6">

  <!-- Page Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-bold mb-2">Email Gateway Setup</h1>
    <p class="text-gray-600">
      Configure how the SIS sends outbound emails (e.g., notifications, password resets, mass announcements).
      Set up your SMTP server, domain verification, and test sending to ensure reliable email delivery.
    </p>
  </header>

  <!-- 1) SMTP CONFIGURATION -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">SMTP Configuration</h2>
    <p class="text-sm text-gray-600 mb-4">
      Provide details for your email server (SMTP) to allow the SIS to send emails. If you’re using a 
      third-party service (e.g., Office 365, Gmail, a private SMTP), enter the credentials below.
    </p>

    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- SMTP Host & Port -->
        <div>
          <label class="block text-sm font-medium mb-1" for="smtpHost">SMTP Host</label>
          <input
            id="smtpHost"
            type="text"
            placeholder="smtp.yourdomain.com"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>

        <div>
          <label class="block text-sm font-medium mb-1" for="smtpPort">SMTP Port</label>
          <input
            id="smtpPort"
            type="number"
            placeholder="587"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>

        <!-- Username & Password -->
        <div>
          <label class="block text-sm font-medium mb-1" for="smtpUser">Username</label>
          <input
            id="smtpUser"
            type="text"
            placeholder="noreply@yourdomain.com"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1" for="smtpPass">Password</label>
          <input
            id="smtpPass"
            type="password"
            placeholder="••••••••"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>

        <!-- Encryption & Sender Name -->
        <div>
          <label class="block text-sm font-medium mb-1" for="encryption">Encryption</label>
          <select
            id="encryption"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          >
            <option value="">None</option>
            <option value="tls" selected>TLS</option>
            <option value="ssl">SSL</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1" for="senderName">Default Sender Name</label>
          <input
            id="senderName"
            type="text"
            placeholder="My District SIS"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>

        <!-- Save Button -->
        <div class="col-span-1 md:col-span-2">
          <button
            type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
          >
            Save SMTP Settings
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- 2) DOMAIN VERIFICATION & DNS SETTINGS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Domain Verification & DNS</h2>
    <p class="text-sm text-gray-600 mb-4">
      Prove ownership of your sending domain to reduce spam flags and improve deliverability.
      Add the following DNS records (TXT, CNAME, or DKIM) and then verify.
    </p>

    <div class="bg-white rounded shadow p-6">
      <!-- Example Domain Info -->
      <p class="text-sm mb-4">
        <strong>Domain:</strong> <code>yourdistrict.org</code> 
        <span class="text-green-600 ml-2">Verified</span>
      </p>

      <p class="text-sm text-gray-600">
        <strong>Required DNS Records:</strong> 
      </p>
      <ul class="list-disc list-inside space-y-1 text-sm mb-4">
        <li>
          <code>TXT @ "v=spf1 include:spf.mailprovider.com -all"</code>
        </li>
        <li>
          <code>DKIM record: default._domainkey.yourdistrict.org → "k=rsa; p=MIIBIjANBgkqh..."</code>
        </li>
        <li>
          <code>CNAME: mail._domainkey → mail.dkim.mailprovider.com</code>
        </li>
      </ul>

      <div class="flex gap-3">
        <button class="bg-blue-600 text-white px-4 py-2 rounded text-sm hover:bg-blue-700">
          Verify Now
        </button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded text-sm hover:bg-gray-700">
          Refresh Status
        </button>
      </div>
    </div>
  </section>

  <!-- 3) TEST EMAIL SENDING -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Send Test Email</h2>
    <p class="text-sm text-gray-600 mb-4">
      Check if your SMTP settings are correctly configured. Enter a recipient’s email address
      and click “Send Test” to verify.
    </p>

    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-end">
        <div>
          <label class="block text-sm font-medium mb-1" for="testEmail">Recipient Email</label>
          <input
            id="testEmail"
            type="email"
            placeholder="test@somewhere.com"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
        </div>
        <div class="sm:mt-0">
          <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm"
          >
            Send Test Email
          </button>
        </div>
      </form>

      <div class="mt-4 text-sm text-gray-500">
        * Check your inbox or spam folder for a message titled “SIS SMTP Test”.
      </div>
    </div>
  </section>

  <!-- 4) ADVANCED POLICIES & RATE LIMITS -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Advanced Email Policies</h2>
    <p class="text-sm text-gray-600 mb-4">
      Control how many emails can be sent, who can send them, and additional disclaimers or footers.
      These settings help maintain compliance and mitigate spam.
    </p>

    <div class="bg-white rounded shadow p-6">
      <form action="#" method="POST" class="space-y-4">
        <!-- Rate Limits -->
        <div>
          <label class="block text-sm font-medium mb-1" for="rateLimit">
            Max Emails per Hour (All Users)
          </label>
          <input
            id="rateLimit"
            type="number"
            placeholder="5000"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
          />
          <p class="text-xs text-gray-500 mt-1">
            Total emails allowed per hour across the entire SIS. Set to 0 for no limit.
          </p>
        </div>

        <!-- Allowed Sender Roles -->
        <div>
          <label class="block text-sm font-medium mb-1" for="senderRoles">
            Allowed Sender Roles
          </label>
          <div class="flex items-center space-x-4">
            <label class="inline-flex items-center space-x-2">
              <input
                type="checkbox"
                class="form-checkbox h-4 w-4"
                checked
              />
              <span>Super Admins</span>
            </label>
            <label class="inline-flex items-center space-x-2">
              <input
                type="checkbox"
                class="form-checkbox h-4 w-4"
              />
              <span>District Admins</span>
            </label>
            <label class="inline-flex items-center space-x-2">
              <input
                type="checkbox"
                class="form-checkbox h-4 w-4"
              />
              <span>Principals</span>
            </label>
            <label class="inline-flex items-center space-x-2">
              <input
                type="checkbox"
                class="form-checkbox h-4 w-4"
              />
              <span>Teachers</span>
            </label>
          </div>
          <p class="text-xs text-gray-500 mt-1">
            Check all roles allowed to send system-wide or mass emails.
          </p>
        </div>

        <!-- Disclaimers / Footers -->
        <div>
          <label class="block text-sm font-medium mb-1" for="emailFooter">
            Email Footer / Disclaimer
          </label>
          <textarea
            id="emailFooter"
            rows="3"
            class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="This email and any attachments are intended solely for..."
          ></textarea>
          <p class="text-xs text-gray-500 mt-1">
            Appended to every outgoing message for legal or informational purposes.
          </p>
        </div>

        <!-- Save Button -->
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm"
        >
          Save Policies
        </button>
      </form>
    </div>
  </section>

  <!-- 5) DEBUGGING & LOGS (Optional) -->
  <section class="mb-12">
    <h2 class="text-2xl font-bold mb-4">Debugging & Logs</h2>
    <p class="text-sm text-gray-600 mb-4">
      Review recent outbound email logs, bounces, or spam complaints. For a deeper view, head to
      “Bounce & Spam Tracking” or “Notification Preferences” under Email & Communications.
    </p>

    <div class="bg-white rounded shadow p-4 flex flex-col">
      <h3 class="flex items-center text-lg font-semibold mb-3 space-x-2">
        <i class="fas fa-list-ul text-blue-500"></i>
        <span>Recent Email Logs</span>
      </h3>
      <div class="flex-1 bg-gray-100 p-2 rounded overflow-auto max-h-64 text-xs text-gray-700">
        <!-- Sample logs -->
        <p>[09:20:45] INFO Email sent to parent@domain.com (Subject: Attendance Alert)</p>
        <p>[09:19:10] INFO Email sent to teacher@school.org (Subject: Weekly Bulletin)</p>
        <p>[09:18:05] WARN Email bounced: admin@invalid.com (550 No such user)</p>
        <p>[09:17:59] INFO Email sent to staff@district.gov (Subject: System Update Reminder)</p>
        <p>[09:17:00] INFO Test email success to test@somewhere.com</p>
      </div>
      <div class="mt-2 text-right">
        <a href="/admin/application/email/bounce-tracking" class="text-blue-600 text-sm hover:underline">
          View Bounce &amp; Spam Tracking →
        </a>
      </div>
    </div>
  </section>

</div>