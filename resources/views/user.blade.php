
<style>
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

</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">使用者</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form action="user" method="post" name="myform">
{{ csrf_field() }}
@foreach ($storelist as $list)
訂餐期限
{{ $list->deadline }}
<br>
開會時間
{{ $list->meeting_time }}
<br>
開會地點
{{ $list->place}}
<br>
開會主題
{{ $list->topic}}
<br>
@endforeach
選擇餐廳
@foreach ($storelist as $list)
    <label value="{{$list->store}}" name="store"> {{ $list->store }}</label>
    <br>
    @foreach ($foods as $food)
        @if ($food->name == $list->store)
	    <input type="radio" value="{{$food->thing}}" id="food" name="food" data-price="{{ $food->price}}">{{ $food->thing }}
	    <label id='' value="{{$food->price}}" >{{ $food->price }}</label>
<br>
        @endif
    @endforeach
@endforeach
<br>
<input  name="price" id="price" value="">

<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    $(document).on('click', 'input[name=food]:checked', function(event){
//$('#price').remove();
$('#price').val($(this).attr('data-price'));
//      event.preventDefault();
//alert($(this).attr('data-price'));
//return false;
/*      $.ajax({
          url: "/getUserOrder",
          type: 'post',
          data: {
            text1: $('input[name=food]:checked').attr('data-price') 
          }
      });*/
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
