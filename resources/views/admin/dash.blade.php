@extends('admin/master')
@section('content')

@if (Session::has('messageAction'))
<div class="alert alert-success" role="alert">
    {{Session::get('messageAction')}}
</div>
@endif

<div class="row dash-row">
    <div class="col-xl-4">
        <div class="stats stats-primary">
            <h3 class="stats-title"> Sign ups </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{$countUsers}}</div>
                    <div class="stats-change">
                        <span class="stats-percentage">+25%</span>
                        <span class="stats-timeframe">from last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-success ">
            <h3 class="stats-title"> Groups </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{$countGroups}} </div>
                    <div class="stats-change">
                        <span class="stats-percentage"></span>
                        <span class="stats-timeframe"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-warning">
            <h3 class="stats-title"> Posts </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-layer-group
                    "></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">{{$countPosts}} </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="easion-card-title"> Bar Chart </div>
                <div class="easion-card-menu">
                    <div class="dropdown show">
                        <a class="easion-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body easion-card-body-chart">
                <canvas id="easionChartjsBar"></canvas>
                <script>
                    var ctx = document.getElementById("easionChartjsBar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                            datasets: [{
                                label: 'Blue',
                                data: [50, 19, 3, 5, 2],
                                backgroundColor: window.chartColors.primary,
                                borderColor: 'transparent'
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
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
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="easion-card-title"> Notifications </div>
            </div>
            <div class="card-body ">
                <div class="notifications">
                   
                    @foreach ($messages as $item)
                    <a href='{{url("admin/addMember/$item->user_id")}}' class="notification">
                        <div class="notification-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        
                        <div class="notification-text">{{$item->message}}</div>
                        <span class="notification-time">{{$item->created_at}}</span>
                    </a>
                    @endforeach
                    
                   
                    <div class="notifications-show-all">
                        <a href="#!">Show all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection