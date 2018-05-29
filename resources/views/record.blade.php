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
                <div class="panel-heading">訂單</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form id="from" method="post" name="myform" action="manager" >
{{ csrf_field() }}
    @foreach ($select_stores as $select_store)
<label type="text"  style="background-color:#77DDFF;">開會日期</label>
{{$select_store->meeting_time}}
<label type="text"  style="background-color:#77DDFF;">截止時間</label>
{{$select_store->deadline}}
<label type="text"  style="background-color:#77DDFF;">開會主題</label>
{{$select_store->place}}
<label type="text"  style="background-color:#77DDFF;">開會地點</label>
{{$select_store->topic}}
    @endforeach
<br>
<br>
選擇餐廳
<ol style="font-size:30px;" name="food" id="food">
@if (count($users) > 0)

    @foreach ($users as $user)
       <li > {{ $user->name }}  {{ $user->food }}  {{ $user->price }}</li>

    @endforeach

@else 
    nothing

@endif
</ol>

<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>


</body> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


