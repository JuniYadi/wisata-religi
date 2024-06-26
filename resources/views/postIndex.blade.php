<x-app-layout>

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
        {{ $title }}
    </h2>

      <div class="grid gap-8 lg:grid-cols-2">
        @foreach ($posts as $post)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="my-2">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $post->banner) }}" alt="" />
                    </a>
                </div>

                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ $post->nama }}</a></h2>

                <span class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    Biaya Masuk {{ $post->biaya }}
                </span>

                <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    Buka {{ $post->buka }}
                </span>

                <p class="mb-5 font-light text-gray-500 dark:text-gray-400 my-2">
                    {{ $post->summary }}
                </p>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="{{ $post->user->profilePicture() }}" alt="Jese Leos avatar" />
                        <span class="font-medium dark:text-white">
                        {{ $post->user->name }}
                        </span>
                    </div>

                    <a href="{{ route("posts", $post->slug) }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>
        @endforeach


      </div>
  </div>
</section>

@include('newsletter')
@include('footer')


</x-app-layout>
