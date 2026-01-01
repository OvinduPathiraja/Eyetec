<x-guest-layout>
<div class="max-w-xl mx-auto py-20 text-center">

    <h1 class="text-3xl font-bold text-green-600 mb-4">
        Payment Successful 🎉
    </h1>

    <p class="text-gray-600 mb-6">
        Your order #{{ $orderId }} has been placed successfully.
    </p>

    <a href="{{ route('products') }}"
       class="bg-red-600 text-white px-6 py-2 rounded-lg">
        Continue Shopping
    </a>

</div>
</x-guest-layout>
