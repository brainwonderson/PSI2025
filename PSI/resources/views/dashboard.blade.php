<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>BPOM Service Dashboard</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <style>
         .sidebar {
            width: 250px;
            height: 100vh;
            background: #444;
            color: white;
            position: fixed;
            padding: 20px;
         }
         .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
         }
         .sidebar a:hover {
            background: #666;
         }
         .content {
            margin-left: 270px;
            padding: 20px;
         }
         .status-box {
            padding: 20px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: black;
         }
      </style>
   </head>
   <body>
      <div class="sidebar">
         <h3>BPOM SERVICE</h3>
         <a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
         <a href="/tickets"><i class="bi bi-ticket-perforated"></i> Tiket</a>
         <a href="/meet"><i class="bi bi-camera-video"></i> Zoom</a>
         <a href="/send-wa"><i class="bi bi-whatsapp"></i> WhatsApp</a>
     </div>
     
     
      <div class="content">
         <nav class="navbar navbar-light bg-primary p-2">
            <div class="container-fluid">
               <div class="ms-auto d-flex align-items-center">
                  <span class="navbar-text text-white me-3">Hello, {{ Auth::user()->name }}</span>
                  <a class="btn btn-light btn-sm" href="{{ route('account.logout') }}">Logout</a>
               </div>
            </div>
         </nav>
         <div class="container mt-4">
            <h3>Hi Admin, Welcome to Dashboard</h3>
            <div class="p-3 bg-light shadow rounded mt-3 d-flex justify-content-around">
               <div class="status-box bg-info">
                  Jumlah Tiket<br>
                  <span>{{ $totalTickets}}</span>
               </div>
               <div class="status-box bg-success">
                  Buka Ticket<br>
                  <span>{{ $bukaTickets}}</span>
               </div>
               <div class="status-box bg-danger">
                  Selesai Ticket<br>
                  <span>{{ $selesaiTickets }}</span>
               </div>
            </div>
            <div class="mt-4">
               <canvas id="ticketChart"></canvas>
            </div>
            <div class="mt-4">
               <h4>Survey Mutu Pelayanan</h4>
               <div>
                  <canvas id="surveyChart" width="400" height="400"></canvas>
               </div>
               
               <script>
                  var ctx = document.getElementById('ticketChart').getContext('2d');
                  var ticketChart = new Chart(ctx, {
                     type: 'bar',
                     data: {
                        labels: ['Total Tiket', 'Buka Tiket', 'Selesai Tiket'],
                        datasets: [{
                           label: 'Jumlah Tiket',
                           data: [{{ $totalTickets }}, {{ $bukaTickets }}, {{ $selesaiTickets }}],
                           backgroundColor: ['blue', 'green', 'red']
                        }]
                     },
                     options: {
                        responsive: true,
                        scales: {
                           y: {
                              beginAtZero: true
                           }
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
                        maintainAspectRatio: true,
                        aspectRatio: 1,  
                        plugins: {
                           legend: {
                              position: 'bottom',
                             
                              labels: {
                                 font: {
                                    size: 10
                                 },
                                 boxWidth: 10
                              }
                           }
                        }
                     }
                  });
               </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
