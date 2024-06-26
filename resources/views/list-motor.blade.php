<x-app-layout>

    <section class="bg-white dark:bg-gray-900 px-4 py-8 ">

        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mx-auto">
            List Type Motor
        </h2>

        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-3">

            @foreach($categoryMotor->typeMotor as $tm)

                @if($tm->listMotor->count() > 0)

                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('order.create', ['typemotor_id' =>$tm->id]) }}">
                        <img class="p-8 rounded-t-lg" src="{{ asset('storage/'.$tm->image) }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="{{ route('order.create', ['typemotor_id' =>$tm->id]) }}">
                            <h3 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $tm->name }}
                            </h3>
                        </a>
                        <div class="flex mb-2 items-center justify-between">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ \Illuminate\Support\Number::currency($tm->price, 'IDR') }}
                            </h4>

                            <a href="{{ route('order.create', ['typemotor_id' =>$tm->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Sewa
                            </a>
                        </div>
                    </div>
                </div>

                @endif
            @endforeach

        </div>

    </section>



</x-app-layout>
