@extends('home')
@section('title', 'Thống kê lượt tải về')
@section('content')
    <div class="container mx-auto">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem biểu đồ thống kê lượt tải về
        </h2>
        <form action="{{ route('admin.downloads.search') }}" method="GET">
            <input type="date" name="date" class="rounded-md " value="{{ isset($date) ? $date : '' }}">
            <button type="submit" class="border-gray-500 rounded-md bg-blue-500 text-red-200 font-bold px-2 py-1">Search</button>
        </form>

        @if (isset($downloads))
            <canvas id="downloadsChart" width="400" height="200"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('downloadsChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! $downloads->pluck('date') !!},
                        datasets: [{
                            label: 'Số lượt tải về',
                            data: {!! $downloads->pluck('count') !!},
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        @endif
    </div>
@endsection
