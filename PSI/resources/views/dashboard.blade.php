{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<h3>Hi Admin, Welcome to Dashboard</h3>
<div class="p-3 bg-light shadow rounded mt-3 d-flex justify-content-around">
    <div class="status-box bg-info">
        Jumlah UMKM<br>
        <span>{{ $totalumkm }}</span>
    </div>
    <div class="status-box bg-success">
        Layanan Aktif<br>
        <span>{{ $LayananAktif }}</span>
    </div>
    <div class="status-box bg-danger">
        Layanan Selesai<br>
        <span>{{ $LayananSelesai }}</span>
    </div>
</div>

<div class="mt-4">
    <canvas id="ticketChart"></canvas>
</div>

<div class="mt-4">
    <h4>Survey Mutu Pelayanan</h4>
    <canvas id="surveyChart" width="400" height="400"></canvas>
</div>

<script>
    var ctx = document.getElementById('ticketChart').getContext('2d');
    var ticketChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total UMKM', 'Layanan Aktif', 'Layanan Selesai'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $totalumkm }}, {{ $LayananAktif }}, {{ $LayananSelesai }}],
                backgroundColor: ['lightblue', 'green', 'red']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    var ctxSurvey = document.getElementById('surveyChart').getContext('2d');
    var surveyChart = new Chart(ctxSurvey, {
        type: 'pie',
        data: {
            labels: [
                'Mutu Pelayanan Sangat Baik (88,31 - 100,00)',
                'Mutu Pelayanan Baik (76,61 - 88,30)',
                'Mutu Pelayanan Kurang Baik (65,00 - 76,60)',
                'Mutu Pelayanan Tidak Baik (25,00 - 64,99)'
            ],
            datasets: [{
                data: [
                    {{ $surveyData['Sangat Baik'] }},
                    {{ $surveyData['Baik'] }},
                    {{ $surveyData['Kurang Baik'] }},
                    {{ $surveyData['Tidak Baik'] }}
                ],
                backgroundColor: ['#86B7E1', '#FFFFFF', '#FFC107', '#DC3545'],
                borderColor: ['#000', '#000', '#000', '#000'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { size: 10 }, boxWidth: 10 }
                }
            }
        }
    });
</script>
@endsection
