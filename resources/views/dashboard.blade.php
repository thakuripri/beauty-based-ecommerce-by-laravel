@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-blue-800">Dashboard</h2>
    <hr class="h-1 bg-red-600">

    <div class="grid grid-cols-3 gap-10 mt-10">
        <div class="bg-blue-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Total Products</p>
            <h2 class="text-5xl font-bold">{{$totalproducts}}</h2>
        </div>

        <div class="bg-red-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Total Orders</p>
            <h2 class="text-5xl font-bold">{{$totalorders}}</h2>
        </div>

        <div class="bg-green-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Pending Orders</p>
            <h2 class="text-5xl font-bold">{{$pendingorders}}</h2>
        </div>

        <div class="bg-orange-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Processing Orders</p>
            <h2 class="text-5xl font-bold">{{$processingorders}}</h2>
        </div>

        <div class="bg-red-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Delivered Orders</p>
            <h2 class="text-5xl font-bold">{{$deliveredorders}}</h2>
        </div>

        <div class="bg-green-600 py-5 px-4 flex justify-between text-white rounded-lg shadow">
            <p class="text-xl">Total Sales</p>
            <h2 class="text-5xl font-bold">{{$totalsales}}</h2>
        </div>

        <div class="shadow-lg rounded-lg overflow-hidden bg-gray-100">
            <div class="py-3 px-5 bg-gray-50">Beauty Purchase</div>
            <canvas class="p-10" id="chartPie2"></canvas>
        </div>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const dataPie2 = {
            labels: ["Pending Orders", "Processing Orders", "Delivered Orders"],
            datasets: [{
                label: "Value",
                data: [{{$pendingorders}}, {{$processingorders}}, {{$deliveredorders}}],
                backgroundColor: [
                    "rgb(90, 50, 241)",
                    "rgb(101, 143, 200)",
                    "rgb(0, 200, 20)",
                    "rgb(150, 143, 0)",
                    "rgb(100, 200, 0)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie2 = {
            type: "pie",
            data: dataPie2,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartPie2"), configPie2);
    </script>
@endsection