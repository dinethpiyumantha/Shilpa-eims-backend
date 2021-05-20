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
        <img src="https://cdn.logo.com/hotlink-ok/logo-social-sq.png" style="width:80px; height: 80px" alt="logo"/>
        <div style="margin-left: 100px;">
            <p>Shilpa Educational Institute<br/>Mahiyanganaya</p>
        </div>
    </div>
    <br/>

    <div>
        <p style="margin-top: -70px; font-size: 25px;">Classrooms Report</p>
    </div>
    

    <table id="cr">
        <thead>
            <tr>
                <th>ID</th>
                <th>Capacity</th>
                <th>width</th>
                <th>Length</th>
                <th>Area</th>
                <th>Resources</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $count = 0; $area = 0; ?>
            @foreach($classrooms as $classroom)
            <tr>
                <td>{{$classroom['cid']}}</td>
                <td>{{$classroom['capacity']}}</td>
                <td>{{$classroom['width']}}'</td>
                <td>{{$classroom['length']}}'</td>
                <td>{{$classroom['width'] * $classroom['length']}}'</td>
                <td>{{$classroom['resources']}}</td>
            </tr>
            <?php $count = $count+1;
            $area = $area + ($classroom['width'] * $classroom['length']) ?>
            @endforeach
            <tr>
                <th>Total Classrooms</th>
                <td>{{$count}}</td>
                <th>Total Area</th>
                <td>{{$area}}'</td>
            </tr>
        </tbody>
    </table>
</body>
</html>