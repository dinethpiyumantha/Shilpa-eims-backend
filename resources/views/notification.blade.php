<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <style>
        #cr {
            border-collapse: collapse;
            width: 100%;
        }
        #cr td, #cr th {
            border: 1px solid #ddd;
            padding: 5px;
        }
        #cr tr:nth-child(even) {
            background-color: #f0f0f0;
        }
        #cr th{
            background-color: #ddd;
        }
    </style>
</head>
<body>
<small>[ Confidential ] - Auto genarated report by SEIMS</small>
<br/>
<div style="display:flex; margin-top:20px;">
    <!-- <img src="/images/logo.png" style="width:80px; height: 80px" alt="logo"/> -->
    <div style="">
        <p>Shilpa Educational Institute<br/>Mahiyanganaya</p>
    </div>
</div>
<h3 style="margin-bottom:10px;">Time Scheduling Report</h3>

<table id="cr">
    <tbody>
    <?php $count = 0; ?>
    @foreach($notification as $notification)
        <thead>
        <tr>
            <th>ID</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Header</th>
            <th>Date</th>
            <th>Post By</th>
        </tr>
        </thead>
        <tr>
            <td>{{$notification['id']}}</td>
            <td>{{$notification['created_at']}}</td>
            <td>{{$notification['updated_at']}}'</td>
            <td>{{$notification['heder']}}'</td>
            <td>{{$notification['date']}}'</td>
            <td>{{$notification['postBy']}}</td>
        </tr>

        <?php $count = $count+1; ?>
    @endforeach
    <tr>
        <th>Total Notification</th>
        <td>{{$count}}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
