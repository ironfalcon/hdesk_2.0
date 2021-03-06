@extends('layouts.app')

@section('content')

<style>
.cd{
    display:inline;
}
</style>
<div class="container">

@if(Auth::user()->permission()->value('name') == 'admin')
<div class="row col-md-7 col-lg-7">
<div class="panel panel-primary " style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
    <div class="panel-heading">Заявки не назначеные</div>

    <div class="panel-body" style="padding: 0px;">
        <div class="" style="">
            <table class="table">
                <thead>
                <tr class="active">
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Создал</td>
                    <td>Приоритет</td>
                </tr>
                </thead>
                <tbody style="">
                @foreach($unsigned_tasks as $task)
                    <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-3">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-1">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                        </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $unsigned_tasks->links() }}
        </div>
    </div>
</div>

    <div class="panel panel-primary " style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Все заявки</div>

        <div class="panel-body" style="padding: 0px;">
            <div class="" style="">
                <table class="table">
                    <thead>
                    <tr class="active">
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Создал</td>
                        <td>Приоритет</td>
                        <td>Закрыта</td>
                    </tr>
                    </thead>
                    <tbody style="">
                    @foreach($tasks as $task)
                        <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-8">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-2">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                            <td class="">
                                @if($task->status_id == 4)
                                    <span style="display:flex;justify-content:center;" class="glyphicon">&#xe013;</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>


    {{--<div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">--}}
        {{--<div class="panel-heading">Назначено мне : Закрыто</div>--}}

        {{--<div class="panel-body" style="padding: 0px;">--}}
            {{--<canvas id="assign_close"></canvas>--}}

        {{--</div>--}}
    {{--</div>--}}




</div>



<div class="row col-md-5 col-lg-5">

    <div class="panel panel-primary " style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Заявки назначеные мне</div>

        <div class="panel-body" style="padding: 0px;">
            <div class="" style="">
                <table class="table">
                    <thead>
                    <tr class="active">
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Создал</td>
                        <td>Приоритет</td>
                    </tr>
                    </thead>
                    <tbody style="">
                    @foreach($my_tasks as $task)
                        <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-3">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-1">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $my_tasks->links() }}
            </div>
        </div>
    </div>



    {{--Отношение колличества заявок Назначено мне / закрыто--}}
    <div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Назначено мне : Закрыто</div>

        <div class="panel-body" style="padding: 0px;">
            <canvas id="assign_close"></canvas>

        </div>
    </div>

    <div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Статистика по администраторам</div>

        <div class="panel-body" style="padding: 0px;">
            <canvas id="admin_stat"></canvas>

        </div>
    </div>


    <div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Не закрыто администраторами</div>

        <div class="panel-body" style="padding: 0px;">
            <canvas id="no_close"></canvas>

        </div>
    </div>



</div>



@elseif(Auth::user()->permission()->value('name') == 'stud')
<div class="row col-md-7 col-lg-7">
    <div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
        <div class="panel-heading">Мои заявки</div>

        <div class="panel-body" style="padding: 0px;">
            <div class="" style="">
                <table class="table">
                    <thead>
                    <tr class="active">
                        <td>ID</td>
                        <td>Заголовок</td>
                        <td>Создал</td>
                        <td>Приоритет</td>
                        <td>Закрыта</td>
                    </tr>
                    </thead>
                    <tbody style="">
                    @foreach($user_tasks as $task)
                        <tr>
                            <td class="col-md-1">
                                {{$task->id}}
                            </td>

                            <td class="col-md-8">
                                <a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a>
                            </td>

                            <td class="col-md-2">
                                {{$task->user($task->creator_id)->name}}
                            </td>

                            <td class="col-md-1">
                                {{$task->priority($task->priority_id)->name}}
                            </td>

                            <td class="">
                                @if($task->status_id == 4)
                                    <span style="display:flex;justify-content:center;" class="glyphicon">&#xe013;</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $my_tasks->links() }}
            </div>
        </div>
    </div>
    </div>

        <div class="row col-md-5 col-lg-5">
            {{--Отображение заявок пользователя Созданные/закрытые--}}
            <div class="panel panel-primary" style="margin: 20px 20px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border: none;">
                <div class="panel-heading">Мои заявки</div>

                <div class="panel-body" style="padding: 0px;">
                    <canvas id="myTask"></canvas>

                </div>
            </div>
        </div>



</div>




    <script>
        let myChart = document.getElementById('myTask').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 12;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['Созданно мной', 'Закрыто'],
                datasets:[{
                    label:'Заявки',
                    data:[
                        {{$user_created_task}},
                        {{$user_closed_task}}
                    ],
                    //backgroundColor:'green',
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)'
                        //'rgba(255, 206, 86, 0.6)'
                        // 'rgba(75, 192, 192, 0.6)',
                        // 'rgba(153, 102, 255, 0.6)',
                        // 'rgba(255, 159, 64, 0.6)',
                        // 'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Заявки',
                    fontSize:14
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>

@endif




{{--Отношение Назначено / Закрыто--}}
<script>
    let myChart2 = document.getElementById('assign_close').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart2 = new Chart(myChart2, {
        type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['Назначено мне', 'Закрыто'],
            datasets:[{
                label:'Назначено : Закрыто',
                data:[
                    {{$assign_task}},
                    {{$closed_task}}
                ],
                //backgroundColor:'green',
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)'
                    // 'rgba(255, 206, 86, 0.6)'
                    // 'rgba(75, 192, 192, 0.6)',
                    // 'rgba(153, 102, 255, 0.6)',
                    // 'rgba(255, 159, 64, 0.6)',
                    // 'rgba(255, 99, 132, 0.6)'
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{

            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },



            // title:{
            //     display:true,
            //     text:'',
            //     fontSize:14
            // },
            // legend:{
            //     display:true,
            //     position:'right',
            //     labels:{
            //         fontColor:'#000'
            //     }
            // },
            // layout:{
            //     padding:{
            //         left:50,
            //         right:0,
            //         bottom:0,
            //         top:0
            //     }
            // },
            // tooltips:{
            //     enabled:true
            // }
        }
    });
</script>

{{--не закрыто--}}
<script>
    let myChart3 = document.getElementById('no_close').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart3 = new Chart(myChart3, {
        type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['Админ', 'Админ2', 'Админ3'],
            datasets:[{
                label:'Не закрыто',
                data:[
                    {{$no_close_admin1}},
                    {{$no_close_admin2}},
                    {{$no_close_admin3}}
                ],
                //backgroundColor:'green',
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)'
                    // 'rgba(75, 192, 192, 0.6)',
                    // 'rgba(153, 102, 255, 0.6)',
                    // 'rgba(255, 159, 64, 0.6)',
                    // 'rgba(255, 99, 132, 0.6)'
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{

            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        }
    });
</script>

{{--Отношение Назначено / Закрыто--}}
<script>
    let myChartStat = document.getElementById('admin_stat').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChartStat = new Chart(myChartStat, {
        type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data:{
            labels:['admin', 'admin2', 'admin3'],
            datasets:[{
                label:'Статистика',
                data:[
                    {{$admin1}},
                    {{$admin2}},
                    {{$admin3}}
                ],
                //backgroundColor:'green',
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)'
                    // 'rgba(75, 192, 192, 0.6)',
                    // 'rgba(153, 102, 255, 0.6)',
                    // 'rgba(255, 159, 64, 0.6)',
                    // 'rgba(255, 99, 132, 0.6)'
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            title:{
                display:true,
                text:'',
                fontSize:14
            },
            legend:{
                display:true,
                position:'right',
                labels:{
                    fontColor:'#000'
                }
            },
            layout:{
                padding:{
                    left:50,
                    right:0,
                    bottom:0,
                    top:0
                }
            },
            tooltips:{
                enabled:true
            }
        }
    });
</script>


<script>
    $(document).ready(function() {
        var bloodhound = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/task_search?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });

        $('#search').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'users',
            source: bloodhound,
            display: function(data) {
                return data.title  //Input value to be set when you select a suggestion.
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Совпадений не найдено.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown" style="color:black; background-color: rgba(52, 152, 219, .2); ">'
                ],
                suggestion: function(data) {
                    return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + '<a href="/tasks/' + data.id + '">' + data.title + '</a>' + '</div></div>'
                }
            }
        });
    });
</script>

</div>
@endsection('content')
