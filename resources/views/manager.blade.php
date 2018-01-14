<style>
<!--
.button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

-->
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">管理者</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form id="from" method="post" name="myform" action="manager" >
{{ csrf_field() }}
<label type="text"  style="background-color:#77DDFF;">開會日期</label>
<input style="font-size:30px;" type="date" name="meeting_time" 
	min="<?php echo date ("y-m-d",strtotime("-1months"));?>"
	max="<?php echo date ("y-m-d",strtotime("+1months"));?>">
<br>
<br>
<label type="text"  style="background-color:#77DDFF;">截止時間</label>
<input style="font-size:30px;" type="date" name="deadline" 
	min="<?php echo date ("y-m-d",strtotime("-1months"));?>"
	max="<?php echo date ("y-m-d",strtotime("+1months"));?>">
<br>
<br>
選擇餐廳
<select style="font-size:30px;" name="store" id="store">
<option value="">Default</option>
@if (count($storelist) > 0)

    @foreach ($storelist as $list)
       <option value="{{$list->name}}"> {{ $list->name }}</option>
    @endforeach

@else 
    nothing

@endif
</select>         
<ol style="font-size:30px;" name="food" id="food">
<li value="">Default</li>
</ol>

<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    $(document).on('change', '#store', function(event){
      event.preventDefault();
      if($('select#store option:selected').val() == '')
      {
        $('#food').children().remove();
        $('#food').append('<li value="">Default</li>');
        return false;
      }
      $.ajax({
          url: "/getFoodList",
          type: 'post',
          data: {
            text1: $('select#store option:selected').val() 
          },
	  success: function( result ) {
            //alert(result); 
            $('#food').children().remove();
            for(var key in result)
            {
              //alert(result[key]['thing']);
              $('#food').append('<li value="' + result[key]['thing'] + '">' + result[key]['thing'] + '</li>');
            } 
          }
      });
    });


});



</script>
</body> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


