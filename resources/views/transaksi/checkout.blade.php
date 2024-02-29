<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi - Admin') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="container">
                    <h1>Checkout</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Summary</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $transaksi->name }} 1</td>
                                        <td>{{ $transaksi->address }}</td>
                                        <td>{{ $transaksi->phone }}</td>
                                        <td>{{ $transaksi->qty }}</td>
                                        <td>{{ $transaksi->total_price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="total">
                                <h5>Total: $35</h5>
                            </div>
                            <button type="button" class="btn btn-primary">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
