<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex flex-col min-h-screen">

  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5 font-bold text-2xl text-white hover:text-indigo-600">
          strikewak.jeger
        </a>
      </div>
      <a href="{{ route('login') }}" class="font-semibold leading-6 text-white text-base hover:text-indigo-500">
        Log in <span aria-hidden="true">&rarr;</span>
      </a>
    </nav>
  </header>

  <div class="relative isolate px-6 pt-14 lg:px-8 flex-grow flex items-center justify-center">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
      <h1 class="text-balance text-4xl font-bold tracking-tight text-white sm:text-6xl">Hello Hackers!</h1>
      <p class="mt-6 text-lg leading-8 text-gray-300">Your gateway to the latest update in cybersecurity. Join the conversation, explore emerging cyber information, and connect with fellow cybersecurity professionals. Together, we strengthen the digital frontier!</p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{ route('register')}}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
      </div>
    </div>
  </div>

  <footer class="bg-gray-800 text-center p-4 text-white">
    &copy; 2024 strikewak-jeger. All rights reserved.
  </footer>

</body>
</html>
