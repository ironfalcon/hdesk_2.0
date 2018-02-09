@extends('layouts.app')

@section('content')
<div id="back">
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;">
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right: 25px;">
            <h2>Профиль пользователя: {{ $user->name }}</h2>
            <div style="background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px; float:right;" class="col-xs-9">
            <form enctype="multipart/form-data" action="profile" method="POST">
                {{ csrf_field() }}
                <lable>Обновить фото профиля</lable>
                <br>
                <button type="submit" class="pull-right btn btn-sm btn-primary">Загрузить</button>
                <input type="file" name="avatar" style="display:inline;">
                
            </form>
            </div>

            
  <div class="col-xs-9" style="float:right;background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;">
    <button type="button" class="btn btn-info btn-small" data-toggle="modal" data-target="#myModal">Выбрать фон</button>
<input id="bg">
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
         <img src="backgrounds/1.png" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>
         <img src="backgrounds/2.jpg" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>
         <img src="backgrounds/3.jpg" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>
         <img src="backgrounds/4.jpg" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>
         <img src="backgrounds/5.jpg" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>
         <img src="backgrounds/6.jpg" style="height:150px; width:200px;" onclick="qwe(src)" class="photo"/>         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
function qwe(a) {
a = a.slice(14,);
document.getElementById('bg').value = a;


document.body.style.backgroundImage = "url(" + a + ")";
}
</script>

        
        </div>
    </div>
</div>
</div>
@endsection

<!-- style="background-color:#ecf0f1;padding: 30px 30px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);margin-top: 10px;" -->