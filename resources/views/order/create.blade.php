<x-app-layout>

    <section class="bg-white dark:bg-gray-900">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mx-auto">
            Order Sewa Motor
        </h2>

        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">

            @if ($errors->any())
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Error</span>
                    <div>
                        <span class="font-medium">Order Gagal!</span> Silahkan coba lagi.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('order.store') }}">
                @csrf

                <input type="hidden" name="motor_id" value="{{ $typeMotorId }}" />

                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        User Profile
                    </legend>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="email"
                                value="{{ auth()->user()->email }}" readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name"
                                value="{{ auth()->user()->name }}" readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 my-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="identity" value="{{ __('Identitas') }}" />
                            <x-radio name="identity" :options="[
                                ['value' => 'ktp', 'label' => 'KTP'],
                                ['value' => 'sim', 'label' => 'SIM'],
                                ['value' => 'pasport', 'label' => 'PASPORT'],
                            ]" />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="phoneNumber" value="{{ __('Phone Number') }}" />
                            <x-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber"
                                :value="old('phoneNumber')" required autofocus autocomplete="phoneNumber"
                                value="{{ auth()->user()->phoneNumber }}" />
                        </div>
                    </div>
                </fieldset>


                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Order Details
                    </legend>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="typeMotor" value="{{ __('Type Motor') }}" />
                            <x-input id="typeMotor" class="block mt-1 w-full" type="text" name="typeMotor"
                                :value="old('typeMotor')" required autofocus autocomplete="typeMotor"
                                value="{{ $typeMotor->name }}"  readonly />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="biaya" value="{{ __('Biaya Sewa Motor Per-Hari') }}" />

                            <input type="hidden" id="biayaPerhari" value="{{ $typeMotor->price }}" />
                            <x-input id="biaya" class="block mt-1 w-full" type="text" name="biaya"
                                :value="old('typeMotor')" required autofocus autocomplete="biaya"
                                value="{{ \Illuminate\Support\Number::currency($typeMotor->price, 'IDR') }}"  readonly />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="pickupTime" value="{{ __('Pickup Time') }}" />
                            <x-input id="pickupTime" class="block mt-1 w-full" type="datetime-local" name="pickupTime"
                                x-model="pickupTime"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d H:m')}}"
                                    max="{{ \Carbon\Carbon::now()->addDays(14)->format('Y-m-d H:m') }}"
                                    required autofocus />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="dropoffTime" value="{{ __('Dropoff Time') }}" />
                            <x-input id="dropoffTime" class="block mt-1 w-full" type="datetime-local" name="dropoffTime"
                                x-model="dropoffTime"
                                    min="{{ \Carbon\Carbon::now()->addDays(1)->format('Y-m-d H:m')}}"
                                    max="{{ \Carbon\Carbon::now()->addDays(30)->format('Y-m-d H:m') }}"
                                    required autofocus />
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <x-label for="totalDays" value="{{ __('Total Days') }}" />
                            <x-input id="totalDays" class="block mt-1 w-full" type="number" name="totalDays"
                                x-bind:value="totalDays" readonly />
                        </div>
                    </div>

                    <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Pickup Details
                    </legend>

                        <div class="grid gap-4">
                            <div class="col-span-2 md:col-span-1">
                                <x-label for="pickup_location_id" value="{{ __('Lokasi Penjemputan') }}" />

                                <x-radio name="pickup_location_id" :options="$lokasiPickup" />
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Dropoff Details
                    </legend>

                        <div class="grid gap-4">
                            <div class="col-span-2 md:col-span-1">
                                <x-label for="dropoff_location_id" value="{{ __('Lokasi Pengembalian') }}" />
                                <x-radio name="dropoff_location_id" :options="$lokasiDropoff" />
                            </div>
                        </div>
                    </fieldset>


                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Total Biaya Sewa <span id="total-biaya">Rp 0</span>
                    </h3>
                    <p>(Belum termasuk biaya penjemputan/pengembalian)</p>
                </fieldset>

                <fieldset class="fi-fieldset rounded-xl border border-gray-200 p-6 dark:border-white/10 my-4">
                    <legend class="-ms-2 px-2 text-sm font-medium leading-6 text-gray-950 dark:text-white">
                        Payment Details
                    </legend>

                    <div class="grid md:grid-cols-4 gap-2">
                        <x-radio name="payment" :options="$payments" />
                    </div>

                    <div class="mt-2">
                        <p>Untuk pembayaran cash, anda dapat membayar di lokasi.</p>
                        <p>Untuk pembayaran Credit Card/Virtual Account, anda akan diarahkan ke halaman pembayaran. Silahkan ikuti instruksi yang ada.</p>
                    </div>
                </fieldset>

                <x-button class="ms-4">
                    {{ __('Proses Sewa Motor') }}
                </x-button>
            </form>

        </div>

    </section>


@vite(['resources/js/orderCreate.js'])

</x-app-layout>
