

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $group->school->name . ' - ' . $group->name . ' schedule' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: left;
            
            height: 100vh;
        }
        .schedule-title {
            text-transform: capitalize
        }
        td {
            min-width: 100px;
            
            height: max-content;
            text-transform: capitalize;
            
            word-wrap: break-word;
            text-align: center;
        }
        th {
            min-width: 100px;
            min-height: 200px;
            height: max-content;
            text-transform: capitalize;
            
            word-wrap: break-word;
            text-align: center;
        }
       
        
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="custom-card">
            <h2 class="schedule-title">{{$group->school->name . ' - ' . $group->name}} schedule</h2>
            
        </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Day</th>

                        @foreach ($turns as $time)
                            <th>{{ $time[0].$time[1].$time[2].$time[3].$time[4]  }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    
                    @foreach ($result as $day => $turns)
                        <tr>
                            <td>{{ $days[$day] }}</td>
                            @foreach ($turns as $turn)
                                <td>
                                    <div >{{ Str::words(App\Models\Subject::find($turn)?->name, 4)  }}</div>
                                    
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
