<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>500</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('windmill/public/assets/css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('windmill/public/assets/js/init-alpine.js')}}"></script>
  </head>
  <body>
    <div
      class="flex items-center h-screen bg-gray-50 dark:bg-gray-900"
    >
      <div class="flex flex-col flex-1">
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container flex flex-col items-center px-6 mx-auto">
            <svg
              class="  mt-8 text-red-700"
              fill="currentColor"
              viewBox="0 0 20 20"
              style="height: 120px; width: 120px"
            >
              <path
                fill-rule="evenodd"
                d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <h1 class="text-6xl font-semibold text-gray-700 dark:text-gray-200">
              500
            </h1>
            <p class="text-gray-700 dark:text-gray-300 text-lg font-semibold">
              Whoops somwthing gone wrong, sorry
              .
            </p>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>