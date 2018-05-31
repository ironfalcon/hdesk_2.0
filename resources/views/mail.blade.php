<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);background-color: #f9fcff; padding: 20px 20px">
    <div class="panel-heading">H-desk оповещение</div>
    <div class="panel-body">Статус вышей заявки "{{ $task_name }}" был изменен на: {{ $status }}<br><br>
    <hr>
    С наилучшими пожеланиями<br>
    служба технической поддержки ИнПИТ<br>
    {{Auth::user()->name}}</div>
</div>