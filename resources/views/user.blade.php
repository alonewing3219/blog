
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
<?php
$date = '';
$date2 = '';
$text = '';
$text2 = '';
$person = '';
$phone = '';
if(isset($_GET['get_date']) && isset($_GET['get_date2']) && isset($_GET['store'])) {
    $date = $_GET['get_date'];
    $date2 = $_GET['get_date2'];
    $text = $_GET['store'];
    
}
if(isset($_GET['food']) && isset($_GET['person']) && isset($_GET['phone'])){

    $text2 = $_GET['food'];
$person = $_GET['person'];
$phone = $_GET['phone'];
}

?>

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
<form action="" method="get" name="myform">
訂餐日期
<input style="font-size:30px;" type="date" name="get_date" value="<?= $date?>"
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
<!--<input class="button" type="submit" value="選擇餐點囉">
</form>
<form action="" method="get">
--!>
<select style="font-size:30px;" name="food" id="food">
<option value="">Default</option>
</select>

<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>
<label type="text"  style="background-color:#77DDFF;">訂餐日期</label>
<?= $date?>
<br>
<label type="text"  style="background-color:#77DDFF;">取餐日期</label>
<?= $date2?>
<br>
<label type="text"  style="background-color:#77DDFF;">店家</label>
<?= $text?>
<br>
<label type="text"  style="background-color:#77DDFF;">餐點</label>
<?= $text2?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
 //   alert('123');
    $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
    $(document).on('change', '#store', function(event){
      event.preventDefault();
      if($('select#store option:selected').val() == '')
      {
        $('#food').children().remove();
        $('#food').append('<option value="">Default</option>');
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
              $('#food').append('<option value="' + result[key]['thing'] + '">' + result[key]['thing'] + '</option>');
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
