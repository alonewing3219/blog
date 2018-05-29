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
                <div class="panel-heading">新增店家</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form id="from" method="post" name="myform" action="orderlist" >
{{ csrf_field() }}
<label>輸入店名</label>
<input type="text" name="store" class="form-control" required="required">
<label>輸入住址</label>
<input type="text" name="address" class="form-control" required="required">
<label>輸入電話</label>
<input type="text" name="phone" class="form-control" required="required">

<div class="form-row">
    <div class="col-md-4 mb-2">
	<label for="validationCustom01">餐點</label>
	<input type="text" class="form-control"  name="food[]" required>
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control" >
	<input type="text" name="food[]" class="form-control"> 
	<input type="text" name="food[]" class="form-control" >
    </div>
    <div class="col-md-4 mb-2">
	<label for="validationCustom02">價錢</label>
	<input type="text" class="form-control" name="price[]" required>
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control" >
	<input type="text" name="price[]" class="form-control"> 
	<input type="text" name="price[]"class="form-control" >
    </div>
</div>

<input class="button" type="submit" id="btn_smb"  value="新增店家">
</form>


</body> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


