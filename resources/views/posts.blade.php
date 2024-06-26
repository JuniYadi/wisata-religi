<x-app-layout>
<!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          <header class="mb-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->user->profilePicture() }}" alt="Jese Leos">
                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->user->name }}</a>
                          <p class="text-base text-gray-500 dark:text-gray-400">
                            Category {{ $post->category }}
                          </p>
                          <p class="text-base text-gray-500 dark:text-gray-400">
                            Published on {{ $post->created_at->format('F j, Y') }}
                          </p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                {{ $post->nama }}
            </h1>
          </header>

          <figure>
            <img src="{{ asset('storage/' . $post->banner) }}" alt="">
          </figure>

          <h3>Informasi Wisata</h3>

            <table>
                <tbody>
                    <tr>
                        <td>Agama</td>
                        <td>{{ $post->agama }}</td>
                    </tr>
                    <tr>
                        <td>Buka</td>
                        <td>{{ $post->buka }}</td>
                    </tr>
                    <tr>
                        <td>Biaya</td>
                        <td>{{ $post->biaya }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $post->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Google Maps</td>
                        <td>
                            <a href="{{ $post->google_maps }}">Lihat di Peta Google Maps</a>
                        </td>
                    </tr>
                </tbody>
            </table>

          {!! $post->deskripsi !!}


          <section class="not-format">
              <div class="flex justify-between items-center mb-6">
                  <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                    Discussion ({{ $post->comments->count() }})
                  </h2>
              </div>
              <form id="form-comment" class="mb-6" method="POST" action="{{ route('posts.comment', $post->slug) }}">
                  <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                      <label for="comment" class="sr-only">Your comment</label>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="nama" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Your name" required>
                        <input type="email" name="email" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Your email" required>

                      <textarea id="comment" name="content" rows="6"
                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                          placeholder="Write a comment..." required></textarea>
                  </div>
                  <button type="submit"
                      class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                      Post comment
                  </button>
              </form>


              @foreach($post->comments as $comment)

                <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ $comment->profilePicture() }} "
                                    alt="{{ $comment->nama }}">
                                    {{ $comment->nama }} - {{ $comment->email }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $comment->created_at->format('F j, Y H:i') }}
                            </p>
                        </div>

                        <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment3"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>
                        {{ $comment->content }}
                    </p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
              @endforeach


          </section>
      </article>
  </div>
</main>

@if($related->count() > 0)

<aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
  <div class="px-4 mx-auto max-w-screen-xl">
      <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
      <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">

        @foreach($related as $rel)
          <article class="max-w-xs">
              <a href="{{ route("posts", $rel->slug) }}">
                  <img src="{{ asset('storage/' . $rel->banner) }}" class="mb-5 rounded-lg" alt="Image 1">
              </a>
              <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                  <a href="{{ route("posts", $rel->slug) }}">{{ $rel->nama }}</a>
              </h2>
              <p class="mb-4 text-gray-500 dark:text-gray-400">
                {{ $rel->summary }}
              </p>
              <a href="{{ route("posts", $rel->slug) }}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                  Read More
              </a>
          </article>
        @endforeach
      </div>
  </div>
</aside>
@endif


@include('newsletter')
@include('footer')

</x-app-layout>
