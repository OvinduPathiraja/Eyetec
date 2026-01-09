<x-guest-layout>
<div class="max-w-xl mx-auto py-16 px-6">

    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h1 class="text-2xl font-bold mb-4">Payment</h1>

        <p class="text-gray-600 mb-6">
            Order #{{ $order->id }}
        </p>

        <div class="text-xl font-semibold mb-6">
            Total: LKR {{ number_format($order->total,2) }}
        </div>

        <form method="POST" action="{{ route('payment.confirm', $order->id) }}">
            @csrf
            <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold">
                Pay Now (Simulated)
            </button>
        </form>

        <p class="text-xs text-gray-400 mt-4">
            * This is a prototype payment simulation
        </p>
    </div>

</div>
</x-guest-layout>
