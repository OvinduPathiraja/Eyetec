@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-10">
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                <div class="font-semibold">Please fix the errors below.</div>
                <ul class="mt-2 text-sm list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Progress --}}
        <div class="flex items-center justify-center gap-8 mb-10 text-sm">
            <div class="flex items-center gap-2">
                <span class="size-5 flex items-center justify-center rounded-full border border-green-500 text-green-600 font-semibold">1</span>
                <span class="text-gray-700">Cart</span>
            </div>
            <div class="h-px w-12 bg-gray-300"></div>
            <div class="flex items-center gap-2">
                <span class="size-5 flex items-center justify-center rounded-full bg-red-600 text-white font-semibold">2</span>
                <span class="text-gray-900 font-semibold">Checkout</span>
            </div>
            <div class="h-px w-12 bg-gray-300"></div>
            <div class="flex items-center gap-2 opacity-60">
                <span class="size-5 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 font-semibold">3</span>
                <span class="text-gray-500">Order Confirmation</span>
            </div>
        </div>

        <div class="grid md:grid-cols-[2fr,1fr] gap-6">
            <div class="space-y-6">
                <form method="POST" action="{{ route('checkout.place') }}" class="space-y-6">
                    @csrf

                    {{-- Shipping --}}
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Shipping Information</h2>
                            <span class="text-xs text-gray-500">Step 1 of 2</span>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Full Name</label>
                                <input name="full_name" value="{{ old('full_name') }}" type="text" class="mt-1 w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('full_name') border-red-400 @enderror"  required />
                                @error('full_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Email Address</label>
                                <input name="email" value="{{ old('email', auth()->user()->email) }}" type="email" class="mt-1 w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('email') border-red-400 @enderror"  required />
                                @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Phone Number</label>
                                <input name="phone" value="{{ old('phone') }}" type="tel" class="mt-1 w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('phone') border-red-400 @enderror"  required />
                                @error('phone') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">Country</label>
                                <select name="country" class="mt-1 w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('country') border-red-400 @enderror" required>
                                    <option value="">Select country</option>
                                    @foreach(['United States','Canada','United Kingdom','Sri Lanka'] as $country)
                                        <option value="{{ $country }}" @selected(old('country') === $country)>{{ $country }}</option>
                                    @endforeach
                                </select>
                                @error('country') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-xs text-gray-500">Address</label>
                                <input name="address" value="{{ old('address') }}" type="text" class="mt-1 w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('address') border-red-400 @enderror"  required />
                                @error('address') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Payment --}}
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-4">Payment Method</h2>

                        <div class="space-y-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment_method" value="card" class="text-red-600 focus:ring-red-500" {{ old('payment_method', 'card') === 'card' ? 'checked' : '' }}>
                                <span class="text-sm font-medium">Credit / Debit Card</span>
                                <span class="flex gap-1 text-xs text-gray-400">
                                    <span class="px-2 py-1 rounded bg-gray-100">VISA</span>
                                    <span class="px-2 py-1 rounded bg-gray-100">MC</span>
                                    <span class="px-2 py-1 rounded bg-gray-100">AMEX</span>
                                </span>
                            </label>
                            <div class="grid md:grid-cols-2 gap-4">
                                <input type="text" class="w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Card Number" />
                                <input type="text" class="w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="MM/YY" />
                                <input type="text" class="w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="CVV" />
                                <input type="text" class="w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Cardholder Name" />
                            </div>

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="payment_method" value="cod" class="text-red-600 focus:ring-red-500" {{ old('payment_method') === 'cod' ? 'checked' : '' }}>
                                <span class="text-sm font-medium">Cash on Delivery</span>
                            </label>
                            @error('payment_method') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-3">Additional Notes</h2>
                        <textarea name="notes" rows="3" class="w-full border border-gray-200 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 @error('notes') border-red-400 @enderror" placeholder="Special delivery instructions or notes...">{{ old('notes') }}</textarea>
                        @error('notes') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold">
                            Review & Place Order
                        </button>
                    </div>
                </form>
            </div>

            {{-- Summary --}}
            <div class="bg-white shadow rounded-lg p-6 h-fit">
                <h3 class="text-lg font-semibold mb-4">Order Summary</h3>

                <div class="space-y-3 text-sm">
                    @foreach($cart->items as $item)
                        <div class="flex justify-between">
                            <div class="text-gray-700">
                                {{ $item->product->product_name ?? 'Item' }} <span class="text-xs text-gray-500">x{{ $item->quantity }}</span>
                            </div>
                            <div class="font-semibold text-gray-900">
                                LKR {{ number_format($item->price * $item->quantity, 2) }}
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-between pt-2 border-t border-gray-200">
                        <span class="text-gray-600">Shipping</span>
                        <span class="text-green-600 font-semibold">Free</span>
                    </div>

                    @php
                        $total = $cart->items->sum(fn($item) => $item->price * $item->quantity);
                    @endphp
                    <div class="flex justify-between text-base font-semibold">
                        <span>Total</span>
                        <span class="text-red-600">LKR {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span class="text-red-600">●</span>
                        Estimated Delivery: 3-5 business days
                    </div>

                    <a href="{{ route('cart.index') }}" class="block text-center text-sm text-gray-600 hover:text-red-600">
                        ← Back to Cart
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
