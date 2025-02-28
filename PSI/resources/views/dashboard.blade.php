<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>BPOM Service Dashboard</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
         <a href="#">&#9673; DashBoard</a>
         <a href="#">&#128196; Tiket</a>
         <a href="#">&#9638; Category</a>
         <a href="#">&#10148; Logout</a>
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
               <div class="status-box bg-info">Jumlah Tiket</div>
               <div class="status-box bg-success">Open Ticket</div>
               <div class="status-box bg-danger">Close Ticket</div>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>