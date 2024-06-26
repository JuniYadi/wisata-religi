<x-app-layout>


    <section class="bg-white dark:bg-gray-900">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mx-auto">
            Order Sewa Motor - ID {{ $order->id }}
        </h2>

        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">




                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        User Profile
                    </legend>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email"
                                value="{{ auth()->user()->email }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text"
                                value="{{ auth()->user()->name }}" readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="identity" value="{{ __('Identity') }}" />
                            <x-input id="identity" class="block mt-1 w-full" type="text"
                                value="{{ $order->identity }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                            <x-input id="phone_number" class="block mt-1 w-full" type="text"
                                value="{{ $order->phone_number }}" readonly />
                        </div>
                    </div>
                </fieldset>

                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Order Detail
                    </legend>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="typeMotor" value="{{ __('Type Motor') }}" />
                            <x-input id="typeMotor" class="block mt-1 w-full" type="text"
                                value="{{ $order->motor_name }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="price" value="{{ __('Biaya Sewa Motor Per-Hari') }}" />
                            <x-input id="price" class="block mt-1 w-full" type="text"
                                value="{{ \Illuminate\Support\Number::currency($order->motor_price, 'IDR') }}" readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="pickup_date" value="{{ __('Pick Up TIme') }}" />
                            <x-input id="pickup_date" class="block mt-1 w-full" type="text"
                                value="{{ $order->pickup_date }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="dropoff_date" value="{{ __('Dropoff Time') }}" />
                            <x-input id="dropoff_date" class="block mt-1 w-full" type="text"
                                value="{{ $order->dropoff_date }}" readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="day" value="{{ __('Total Days') }}" />
                            <x-input id="day" class="block mt-1 w-full" type="text"
                                value="{{ $order->days }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="total" value="{{ __('Total Biaya') }}" />
                            <x-input id="total" class="block mt-1 w-full" type="text"
                                value="{{ \Illuminate\Support\Number::currency($order->total, 'IDR') }}" readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="payment" value="{{ __('Metode Pembayaran') }}" />
                            <x-input id="payment" class="block mt-1 w-full" type="text"
                                value="{{ $order->payment }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="status" value="{{ __('Status Pembayaran') }}" />
                            <x-input id="status" class="block mt-1 w-full" type="text"
                                value="{{ $order->status }}" readonly />
                        </div>
                    </div>
                </fieldset>


                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Pickup & Dropoff Detail
                    </legend>

                    <div class="w-full">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="typeMotor" value="{{ __('Pickup Location') }}" />
                            <x-input id="typeMotor" class="block mt-1 w-full" type="text"
                                value="{{ $order->pickupLocation->nama }} - Alamat {{ $order->pickupLocation->alamat }} - Biaya {{ \Illuminate\Support\Number::currency($order->pickup_location_fee, 'IDR')}}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="pickup_date_execute" value="{{ __('Motor di ambil pada tanggal') }}" />
                            <x-input id="pickup_date_execute" class="block mt-1 w-full" type="text"
                                value="{{ $order->pickup_date_execute }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="price" value="{{ __('Biaya Sewa Motor Per-Hari') }}" />
                            <x-input id="typeMotor" class="block mt-1 w-full" type="text"
                                value="{{ $order->dropoffLocation->nama }} - Alamat {{ $order->dropoffLocation->alamat }} - Biaya {{ \Illuminate\Support\Number::currency($order->dropoff_location_fee, 'IDR')}}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="dropoff_date_execute" value="{{ __('Motor di ambil pada tanggal') }}" />
                            <x-input id="dropoff_date_execute" class="block mt-1 w-full" type="text"
                                value="{{ $order->dropoff_date_execute }}" readonly />
                        </div>
                    </div>

                    <div class="mt-2">
                        <p>Jika waktu pengambilan atau pengembalian anda berbeda, maka akan muncul pada halaman diatas untuk tanggal dan waktu nyata motor diambil</p>
                    </div>
                </fieldset>


        </div>

    </section>



</x-app-layout>
