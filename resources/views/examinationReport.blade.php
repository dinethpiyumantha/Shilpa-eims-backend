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
        <thead>
            <tr>
                <th>Exam Name</th>
                <th>Exam ID</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Term</th>
                <th>Date</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $count = 0; ?>
            @foreach($exam as $exam)
            <tr>
                <td>{{$exam['examName']}}</td>
                <td>{{$exam['examId']}}</td>
                <td>{{$exam['subject']}}'</td>
                <td>{{$exam['grade']}}'</td>
                <td>{{$exam['term'] }}'</td>
                <td>{{$exam['date']}}</td>
            </tr>
            <?php $count = $count+1; ?>
            @endforeach
            <tr>
                <th>Total exams</th>
                <td>{{$count}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>