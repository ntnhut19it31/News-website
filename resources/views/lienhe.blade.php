<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, inital-scale=1">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ek+Mukta">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  
</head>
<body>
<style type="text/css">
	hr {
     border:none;
     border-top:1px solid blue;
     color:#7BB77C;
     background-color:#fff;
     height:2px;
     width:100%;
   }
   p{
   	font-size:17px;
   }
   h5{
   	background: #56aaff;
   }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-9"><br>
    	<p style="color: blue;font-size: 25px;font-weight: 500">Liên hệ <hr></p>
    	<p style="color:#bf0000;font-size: 18px;"><b>THCS Lý Tự Trọng</b> </p>
    	<p>Địa chỉ:<br>232 Phan Chu Trinh, Phường Quyết Thắng, TP. Kon Tum</p>
    	<p>Email:<br>thspltt@gmail.com</p>
    	<p>Điện thoại:<br>02603 862 622</p>
    	<div class="contact-map">
		<div id="map" style="width:100%; height:500px;"></div>
		<script>
			function myMap() {
				var myCenter = new google.maps.LatLng(14.352272, 107.999032);
				var myBounce = new google.maps.LatLng(14.352272, 107.999032);				
				var mapOptions = {
					center: myCenter,
					zoom: 16
				};
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);
				var marker = new google.maps.Marker({position: myBounce,animation: google.maps.Animation.BOUNCE});
				marker.setMap(map);

			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSdPxECtK00UFPs7J0G_HUW5SoBPY20LM&callback=myMap"></script>
	    </div>
                
    </div>

 <style type="text/css">
  .calendar-heading p a {
    font-size: 23px;

  }
  .calendar-section{
      border-left: 1px solid #aaffff;
      border-top: 1px solid #aaffff;
      border-bottom: 1px solid #aaffff;
    }
 </style>

 <div class=" col-md-3">
        <div class="calendar-section">
      <div class="calendar">
        <div class="calendar-heading"><br>
              <p style="color:blue">
            <span>
              <img alt="clock" src="https://thcslytutrong.edu.vn/images/photos/clock.png"width="30px">
            </span>
            
            <a href="#"><font color="blue" >Kế hoạch hoạt động</font></a>

              </p>
        </div>
           
        <iframe src="{{URL::to('/tkb')}}" width="270"height="460"frameborder="0" >
          
        </iframe>

        <div class="videos">

            <div class="videos-row">
              <div class="one-videos">
                <div class="videos-thumb">
                  <h5 style="text-align: center;">Video</h5>
                  <iframe width="270" height="200" src="https://www.youtube.com/embed/pjuigRL0O9w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
                        <div class="statistic">
          <h3>Thống kê truy cập</h3>
          <table>
            <tr>
              <td>Hôm nay</td>
              <td>2643</td>
            </tr>
            <tr>
              <td>Tuần này</td>
              <td>6188</td>
            </tr>
            <tr>
              <td>Tháng này</td>
              <td>16034</td>
            </tr>
            <tr>
              <td>Năm này</td>
              <td>1454149</td>
            </tr>
            <tr>
              <td>Tổng</td>
              <td>1540931</td>
            </tr>
          </table>
        </div>
            </div>        
      </div>
    </div>
  </div>
</div>
 </div>
  </div>   
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>