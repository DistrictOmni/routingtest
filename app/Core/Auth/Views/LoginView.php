      
      <!-- Title -->
      <div class="mb-4 text-center">
        <h2 class="text-2xl font-semibold text-indigo-700">Welcome Back!</h2>
        <p class="text-gray-500 text-sm">Login to access your account</p>
      </div>

      <!-- LOGIN FORM -->
      <form class="space-y-4" action="login" method="POST">
        
        <!-- Email Field -->
        <div class="relative">
          <label for="email" class="text-sm text-gray-700">Email</label>
          <div class="relative mt-1">
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
              <i class="fas fa-envelope"></i>
            </span>
            <input 
              id="email" 
              type="email" 
              name="email"
              placeholder="example@domain.com" 
              required
              class="pl-10 pr-4 py-2 w-full border rounded focus:outline-none 
                     focus:ring-2 focus:ring-indigo-500"
            />
          </div>
        </div>

        <!-- Password Field -->
        <div class="relative">
          <label for="password" class="text-sm text-gray-700">Password</label>
          <div class="relative mt-1">
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
              <i class="fas fa-lock"></i>
            </span>
            <input
              id="password"
              type="password"
              name="password"
              placeholder="********"
              required
              class="pl-10 pr-10 py-2 w-full border rounded focus:outline-none 
                     focus:ring-2 focus:ring-indigo-500"
            />
            <!-- Toggle Password Visibility -->
            <span 
              class="absolute right-3 top-1/2 transform -translate-y-1/2 
                     text-gray-400 cursor-pointer"
              onclick="togglePassword()"
            >
              <i id="toggleIcon" class="fas fa-eye"></i>
            </span>
          </div>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="block w-full bg-indigo-600 text-white font-semibold 
                 py-2 rounded hover:bg-indigo-700 
                 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          Login
        </button>
      </form>
      <!-- END LOGIN FORM -->

      <!-- Forgot Password Link -->
      <div class="mt-4 text-center">
        <a href="#" class="text-indigo-600 hover:underline text-sm">
          Forgot password?
        </a>
      </div>
    </div>