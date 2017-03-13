@extends('layouts.header')

@section('title', 'แหล่งรวมพื้นที่เช่าทำโฆษณา | ป้ายโฆษณาให้เช่า | ลงประกาศกับเราฟรี')

@section('content')

<div class="container" style="margin-top: 60px;">
	<div class="row">
		<div class="col-sm-12 col-md-9 col-lg-9">
			<img style="width: 100%;height: auto;" src="/img/bg.jpg">
			<div class="billboard-detail-slug" style="margin-top: 10px;">
				<div class="panel panel-default">
				  	<div class="panel-body">
				    	<div class="present-heading">
				    		<span style="color: #e67e22;">ป้ายว่างให้เช่าทำโฆษณา</span> - โดยคุณ <span style="color: black;">Example Example</span> เบอร์โทรติดต่อ <span style="color: black;">099 999 9999</span>
				    	</div>
				    	ลงประกาศเมื่อ 3/2/2017 จำนวนผู้เข้าชม 5,000 ครั้ง
				    	<div id="mInfo">
				    		xzczzxczxczxczxc
				    	</div>
				    	<hr>
				    	<center><a class="more" style="cursor: pointer;"><small>แสดงน้อยลง</small></a></center>
				  	</div>
				</div>
			</div>
			<div class="billboard-detail-slug">
				<div class="panel panel-default">
				  	<div class="panel-body">
				    	Basic panel example
				  	</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3">
			<div id="sponsored">
				<img style="width: 100%;height: auto;" src="/img/placeholder-images.jpg">
				<h5>Sponsored by Example</h5>
				<hr>
				<img style="width: 100%;height: auto;" src="/img/placeholder-images.jpg">
				<h5>Sponsored by Example</h5>
				<hr>
				<img style="width: 100%;height: auto;" src="/img/placeholder-images.jpg">
				<h5>Sponsored by Example</h5>
				<hr>
			</div>
		</div>
	</div>
	<hr style="border: 1px solid #000;">

    <footer>
        <p>worldadsth.com all right reserved.</p>
    </footer>
</div>

<script type="text/javascript">
	$(document).ready(function() {
        document.getElementById('mInfo').style.display = 'none';
        $( ".more" ).click(function() {
        	document.getElementById('mInfo').style.display = 'block';
		});
    });
</script>

@endsection