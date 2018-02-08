@extends('layouts.app')

@section('content')
@include('errors')
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <div class="container">

        <h3>Новое сообщение</h3>
        <div class="row col-xs-10 col-xs-offset-1" style="background-color: #ecf0f1; padding: 30px 30px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
               
               {!! Form::open(['route' => ['messages.store']]) !!}
               <div class="form-group">
                   <label for="body">Текст сообщения:</label>
                   <textarea class="form-control" rows="5" name="body" id="body">{{ old('body')}}</textarea>
               <br>

                   <div class="panel-group" id="accordion">
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <h4 class="panel-title">
                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                       Отправить группе</a>
                               </h4>
                           </div>
                           <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">


                                <label for="group">Получатель:</label>
                                <select name="to_group_id" id="group">
                                @foreach($groups as $group)
                                    <option selected value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                                </select>
                                <input type="hidden" name="from_user_id" value="{{ Auth::user()->id }}">
                                <br>
                                <br>
                                <button class="btn btn-success">Отправить</button>
                                </div>
                           </div>
                       </div>


                       <div class="panel panel-default">
                       <div class="panel-heading">
                           <h4 class="panel-title">
                               <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                   Отправить пользователю</a>
                           </h4>
                       </div>
                       <div id="collapse2" class="panel-collapse collapse">
                           <div class="panel-body">
                           <input placeholder="Search Text" class="form-control" id="search_text" name="search_text" type="text" autocomplete="off">
                           
                           <br>
                           <br>
                           <button class="btn btn-success">Отправить</button>
                           
                           </div>
                       </div>
                   </div>
               </div>



               {!! Form::close() !!}
        </div>
    </div>


<script type="text/javascript">

    var url = "{{ route('autocomplete.ajax') }}";
        $('#search_text').typeahead({
            source:  function (query, process) {
            return $.get(url, { query: query }, function (data) {
            return process(data);
        });
    }
});

</script>



@endsection('content')

