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

       #map {
        height: 400px;
        width: 100%;
       }
    

</style>



<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">使用者</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form action="user" method="post" name="myform">
<?php echo e(csrf_field()); ?>

<?php $__currentLoopData = $storelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
訂餐期限
<?php echo e($list->deadline); ?>

<br>
開會時間
<?php echo e($list->meeting_time); ?>

<br>
開會主題
<?php echo e($list->topic); ?>

<br>
開會地點
<input id="address" name="address"value="<?php echo e($list->place); ?>">
<br>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
 <div id="map"></div>
    <script>
var map;
var marker;
  
function initialize() 
{
  //初始化地圖時的定位經緯度設定
  var latlng = new google.maps.LatLng(23.973875,120.982024); //台灣緯度Latitude、經度Longitude：23.973875,120.982024
  //初始化地圖options設定
  var mapOptions = {
      zoom: 10,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  //初始化地圖
  map = new google.maps.Map(document.getElementById("map"),mapOptions);
  //加入標記點
  marker = new google.maps.Marker({
     draggable:true,
     position: latlng,
     title:"台灣 Taiwan",
     map:map
  }); 
  //增加標記點的mouseup事件
  google.maps.event.addListener(marker, 'mouseup', function() {
      LatLng = marker.getPosition();
    //  $("#NowLatLng").html("【移動標記點後的位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
  });
 
}
 
function GetAddressMarker()
{//重新定位地圖位置與標記點位置
address = $("#address").val();
geocoder = new google.maps.Geocoder();
geocoder.geocode(
 {
  'address':address
 },function (results,status) 
 {
 if(status==google.maps.GeocoderStatus.OK) 
 {
    //console.log(results[0].geometry.location);
    LatLng = results[0].geometry.location;
    map.setCenter(LatLng);  //將地圖中心定位到查詢結果
    marker.setPosition(LatLng); //將標記點定位到查詢結果
    marker.setTitle(address); //重新設定標記點的title
  //  $("#SearchLatLng").html("【您輸入的地址位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
 }
 }
); 
}
 
$(document).ready(function() { 
  //綁定地址輸入框的keyup事件以即時重新定位
  $("#address").bind("keyup",function(){ 
    GetAddressMarker();
//    $("#NowLatLng").html("【移動標記點後的位置】");
  }); 
});

/*var address = document.getElementById("address").value;
console.log(address);
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
  */  </script>

   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFRPgCQSdlPl2pLXC7Ie1hasqjIXGLUgs&callback=initialize">
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
選擇餐廳
<?php $__currentLoopData = $storelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label value="<?php echo e($list->store); ?>" name="store"> <?php echo e($list->store); ?></label>
    <br>
    <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($food->name == $list->store): ?>
	    <input type="radio" value="<?php echo e($food->thing); ?>" id="food" name="food" data-price="<?php echo e($food->price); ?>"><?php echo e($food->thing); ?>

	    <label id='' value="<?php echo e($food->price); ?>" ><?php echo e($food->price); ?></label>
<br>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>