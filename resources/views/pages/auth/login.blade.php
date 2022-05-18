<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('windmill/public/assets/js/init-alpine.js')}}"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl "
      >
        <form action="{{route('loginProcess')}}" method="POST">
          @csrf
          <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img
                aria-hidden="true"
                class="object-cover w-full h-full"
                src="{{asset('windmill/public/assets/img/login-office.jpeg')}}"
                alt="Office"
              />
            </div>
            <div class="flex items-center justify-center px-6 py-24 md:w-1/2">
              <div class="w-full">
                <h1
                  class="mb-4 text-xl font-semibold text-gray-700"
                >
                  Login
                </h1>
                <label class="block text-sm">
                  <span class="text-gray-700">Email</span>
                  <input
                    class="block w-full mt-1 p-2 border border-gray-300 rounded text-sm form-input"
                    placeholder="JaneDoe@email.com"
                    name="email"
                    value="{{old('email')}}"
                  />
                  
                  @error('email')
                      <div class="text-red-500">{{ $message }}</div>
                  @enderror
                  @error('login_gagal')
                      <div class="text-red-500">{{ $message }}</div>
                  @enderror
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700">Password</span>
                  <input
                    class="block w-full mt-1 p-2 border border-gray-300 rounded text-sm form-input"
                    placeholder="***************"
                    type="password"
                    name="password"
                  />
                  @error('password')
                      <div class="text-red-500">{{ $message }}</div>
                  @enderror
                </label>
  
                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button
                  class="block w-full px-4 py-2 mt-4 text-sm font-semibold leading-5 text-center text-white transition-colors duration-150 bg-cyan-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Log in
                </button>
                <div class="grid grid-cols-3 mt-4 text-gray-700">
                  <div>
                    Email
                  </div>
                  <div class="col-span-2">
                    : test@example.com
                  </div>
                  <div>
                    Password
                  </div>
                  <div class="col-span-2">
                    : masukaja
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
