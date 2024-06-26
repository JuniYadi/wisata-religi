<x-app-layout>


    <section class="bg-white dark:bg-gray-900">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mx-auto">
            Order Sewa Motor
        </h2>

        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">



            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Motor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pickup Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dropoff Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                    @foreach($orders as $order)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->motor->name }}
                            </th>
                            <td class="px-6 py-4">
                                <p>{{ $order->pickupLocation->nama }}</p>
                                <p>{{ $order->pickupLocation->alamat }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p>{{ $order->dropoffLocation->nama }}</p>
                                <p>{{ $order->dropoffLocation->alamat }}</p>
                            </td>
                            <td class="px-6 py-4">
                                {{ \Illuminate\Support\Number::currency($order->total, 'IDR') }}
                            </td>
                            <td class="px-6 py-4">
                                @if($order->payment === "cash")
                                    <p>Payment via CASH</p>
                                @else
                                    <p>Payment via {{ $payments[$order->payment] }}</p>
                                @endif
                                <p>Status {{ str_replace('_', ' ', $order->status) }}</p>
                            </td>
                            <td class="px-6 py-4 gap-4">
                                @if($order->payment !== "cash")
                                    <a href="{{ route('order.bayar', $order->id) }}" class="font-medium text-blue-6000 dark:text-blue-500 hover:underline">Bayar</a>
                                @endif
                                <a href="{{ route('order.show', $order->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </section>



</x-app-layout>
