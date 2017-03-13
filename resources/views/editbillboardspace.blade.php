@extends('layouts.header')

@section('title', 'แก้ไขข้อมูลป้ายโฆษณาที่ลงประกาศ')

@section('content')

<div class="container" style="margin-top: 50px;">
	<div class="worldadsth-addspace-form">
		<h3>ระบุรายละเอียด "<span style="color: #e67e22;">ป้ายโฆษณา</span>" ของคุณได้เลยครับ</h3>
		<p>รายละเอียดที่ครอบคลุมและการอัพโหลดภาพที่คมชัด จะช่วยทำให้พื้นที่โฆษณาของคุณ "<span style="color: #e67e22;">ดูดี</span>" ขึ้นมากครับ</p>
		<div class="row">
			<div class="col-sm-12 col-md-9">
				<form role="form" method="POST" action="{{ url('/home/upload',$billboard->id) }}" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					{{ csrf_field() }}

					<div class="panel panel-default">
			            <div class="panel-body">
			                <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;color: #000;">ข้อมูลเฉพาะของ "ป้ายโฆษณา"</span>
			                <hr>

							<div class="form-group">
							    <label for="title" class="col-sm-4 control-label">ชื่อโปรโมท<span style="color: red;"> *</span></label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="title" value="{{ old('title',$billboard->title) }}" placeholder="">
							      	@if ($errors->has('title'))
		                            	<span style="color: red;">{{ $errors->first('title') }}</span>
		                            @endif
							    </div>
							</div>

							<div class="form-group">
							    <label for="type" class="col-sm-4 control-label">ประเภทของป้ายโฆษณา<span style="color: red;"> *</span></label>
							    <div class="col-sm-8">
							      	<select class="form-control" name="billboardtype">
									  	<!-- <option value="1">1</option>
									  	<option value="2">2</option>
									  	<option value="3">3</option>
									  	<option value="4">4</option>
									  	<option value="5">5</option>
									  	<option value="6">5</option>
									  	<option value="7">5</option>
									  	<option value="8">5</option>
									  	<option value="9">5</option>
									  	<option value="10">5</option> -->
									  	@foreach ($billboardtypes as $billboardtype)
									  		<option value="{{ $billboardtype->id }}" {{ (old("billboardtype",$billboard->billboardtype) == $billboardtype->id ? "selected":"") }}>{{ $billboardtype->name }}</option>
									  	@endforeach
									</select>
							    </div>
							</div>

							<div class="form-group">
							    <label for="billboardroad" class="col-sm-4 control-label">ถนน *</label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="billboardroad" value="{{ old('billboardroad',$billboard->billboardroad) }}" placeholder="">
							    </div>
							</div>

							<div class="form-group">
							    <label for="billboardsize" class="col-sm-4 control-label">ขนาด<span style="color: red;"> *</span></label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="billboardsize" value="{{ old('billboardsize',$billboard->billboardsize) }}" placeholder="{{ $billboard->billboardsize }}">
							      	@if ($errors->has('billboardsize'))
		                            	<span style="color: red;">{{ $errors->first('billboardsize') }}</span>
		                            @endif
							    </div>
							</div>

							<div class="form-group">
							    <label for="billboardlight" class="col-sm-4 control-label">ไฟส่องสว่าง *</label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="billboardlight" value="{{ old('billboardlight',$billboard->billboardlight) }}" placeholder="30 ดวง">
							    </div>
							</div>

							<div class="form-group">
							    <label for="billboardflip" class="col-sm-4 control-label">จำนวนด้าน<span style="color: red;"> *</span></label>
							    <div class="col-sm-8">
							      	<select class="form-control" name="billboardflip">
							      		@foreach ($billboardflips as $billboardflip)
									  		<option value="{{ $billboardflip->id }}" {{ (old("billboardflip",$billboard->billboardflip) == $billboardflip->id ? "selected":"") }}>{{ $billboardflip->name }}</option>
									  	@endforeach
									</select>
							    </div>
							</div>

							<div class="form-group">
							    <label for="billboardcost" class="col-sm-4 control-label">ค่าเช่าต่อเดือน *</label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="billboardcost" value="{{ old('billboardcost',$billboard->billboardcost) }}" placeholder="">

							      	<div class="row">
							      		<div class="col-sm-6">
							      			<label class="radio-inline">
											  	<input type="radio" name="vat" value="vat" {{ (old("vat",$billboard->vat) == "vat" ? "checked":"") }}> ราคารวม VAT แล้ว
											  	<br>
											  	@if ($errors->has('vat'))
					                            	<span style="color: red;">{{ $errors->first('vat') }}</span>
					                            @endif
											</label>
							      		</div>
							      		<div class="col-sm-6">
							      			<label class="radio-inline">
											  	<input type="radio" name="vat" value="novat" {{ (old("vat",$billboard->vat) == "novat" ? "checked":"") }}> ราคายังไม่รวม VAT
											</label>
							      		</div>
									</div>
					
							      	<div class="row">
							      		<div class="col-sm-6">
											<label class="radio-inline">
											  	<input type="radio" name="tax" value="tax" {{ (old("tax",$billboard->tax) == "tax" ? "checked":"") }}> ราคารวมภาษีแล้ว
											  	<br>
											  	@if ($errors->has('tax'))
					                            	<span style="color: red;">{{ $errors->first('tax') }}</span>
					                            @endif
											</label>
										</div>
										<div class="col-sm-6">
											<label class="radio-inline">
											  	<input type="radio" name="tax" value="notax" {{ (old("tax",$billboard->tax) == "notax" ? "checked":"") }}> ราคายังไม่รวมภาษี
											</label>
										</div>
									</div>

							      	<div class="row">
							      		<div class="col-sm-6">
											<label class="radio-inline">
											  	<input type="radio" name="light" value="light" {{ (old("light",$billboard->light) == "light" ? "checked":"") }}> ราคารวมค่าไฟส่องสว่างแล้ว
											  	<br>
											  	@if ($errors->has('light'))
					                            	<span style="color: red;">{{ $errors->first('light') }}</span>
					                            @endif
											</label>
										</div>
										<div class="col-sm-6">
											<label class="radio-inline">
											  	<input type="radio" name="light" value="nolight" {{ (old("light",$billboard->light) == "nolight" ? "checked":"") }}> ราคายังไม่รวมค่าไฟส่องสว่าง
											</label>
										</div>
									</div>
							    </div>
							</div>

							<div class="form-group">
							    <label for="contact" class="col-sm-4 control-label">เบอร์โทรติดต่อ<span style="color: red;"> *</span></label>
							    <div class="col-sm-8">
							      	<input type="text" class="form-control" name="contact" value="{{ old('contact',$billboard->contact) }}" placeholder="">
							      	@if ($errors->has('contact'))
		                            	<span style="color: red;">{{ $errors->first('contact') }}</span>
		                            @endif
							    </div>
							</div>

							<div class="form-group">
							    <label for="moreinfo" class="col-sm-4 control-label">คำอธิบายเพิ่มเติม *</label>
							    <div class="col-sm-8">
							      	<textarea class="form-control" rows="4" name="moreinfo">{{ old('moreinfo',$billboard->moreinfo) }}</textarea>
							    </div>
							</div>

							<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;color: #000;">ตำแหน่งที่ตั้งของ "ป้ายโฆษณา"</span>
			                <hr>
			                
			                <div class="form-group">
							    <div class="col-sm-12 col-md-6">
							    	<label>Lat</label>
							      	<input type="text" class="form-control" id="lat" value="{{ old('lat',$billboard->lat) }}" name="lat" placeholder="">
							      	@if ($errors->has('lat'))
			                            <span style="color: red;">{{ $errors->first('lat') }}</span>
			                        @endif
							    </div>
							    <div class="col-sm-12 col-md-6">
							    	<label>Lng</label>
							      	<input type="text" class="form-control" id="lng" value="{{ old('lng',$billboard->lng) }}" name="lng" placeholder="">
							      	@if ($errors->has('lng'))
			                            <span style="color: red;">{{ $errors->first('lng') }}</span>
			                        @endif
							    </div>
							</div>

			                <div id="googlemap"></div>
			                <script>
						      	function initMap() {
						      		var bangkok = "";
						      		var latitude = Number( document.getElementById("lat").value );
						      		var longitude = Number( document.getElementById("lng").value );
						      		if(latitude == "") {
						      			bangkok = {lat: 13.736717, lng: 100.523186};
						      		} else {
						      			bangkok = {lat: latitude, lng: longitude};
						      		}
						        	
						        	var map = new google.maps.Map(document.getElementById('googlemap'), {
							          	zoom: 12,
							          	center: bangkok
							        });
						        	var marker = new google.maps.Marker({
							          	position: bangkok,
							          	map: map,
							          	draggable:true
						        	});
						        	google.maps.event.addListener(marker, 'dragend', function (evt) {
										document.getElementById("lat").value = evt.latLng.lat();
										document.getElementById("lng").value = evt.latLng.lng();
									});
						      	}
						    </script>
						    <script async defer
							  	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATNJJpdKgNySDftTdntRq2jkXPeKzv4go&callback=initMap">
							</script>

							<p style="margin-top: 25px;color: #e74c3c;">ระบบจะทำการระบุ Latitude กับ Longitude <u>อัตโนมัติ</u>เมื่อคุณ "<span style="color: black;">ปักหมุด</span>" ในแผนที่ของ Google Map</p>
							<p style="color: #e74c3c;">คุณสามารถแก้ข้อมูลทุกๆส่วนได้ในภายหลัง</p>

			                <i class="fa fa-file-image-o fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;color: #000;">รูปภาพประกอบ</span>
			                <hr>

		                	<center><h4 style="color: #e67e22;">รูปภาพที่คุณได้เพิ่มไว้ก่อนหน้านี้</h4></center>
		                	<div class="row">
		                	@if (count($billboard_pics) > 0)
			                	@foreach ($billboard_pics as $billboard_pic)
			                		<div id="p{{ $billboard_pic->id }}" class="col-sm-12 col-md-3 col-lg-3">
				                		<center><img src="/billboards/{{ $billboard_pic->billboard_id }}/{{ $billboard_pic->pic_name }}" class="media-object" style="width:150px;height: 150px;">
				                		<a style="cursor: pointer;" class="remove_pic" data-id="{{ $billboard_pic->id }}">ลบรูปภาพนี้</a></center>
				                	</div>
				                @endforeach
				            @else
				            	<center>ไม่มีรูปภาพที่ได้อัพโหลดไว้ก่อนหน้านี้</center>
				           	@endif
			                </div>

			                <center><h4 style="color: #e67e22;">Upload รูปภาพเพิ่มเติม</h4></center>
			                <div class="row">
				                <div class="col-sm-12 col-md-12 col-lg-12">
						            <input type="file" name="billboardpics[]" multiple><br/>
				                	1. กำหนดไฟล์รูปภาพประเภท jpg, jpeg และ png เท่านั้น<br/>
				                	2. ขนาดไม่เกิน 2 MB / 1 รูป<br/>
				                	3. สามารถอัพโหลดรูปภาพได้มากกว่า 1 รูป และ สามารถแก้ไขหรือเพิ่มในภายหลังได้<br/>
				                	@if ($errors->has('billboardpics.*'))
				                		<span style="color: red;">Opps !</span><br/>
			                            <span style="color: red;">คุณลักษณะของรูปภาพไม่เป็นไปตามที่ระบบกำหนด</span>
			                        @endif
			                    </div>
		                    </div>

		                    <div class="clearfix"></div>
				            <hr>

				            <div class="form-group">
		                        <center>
		                            <button type="submit" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; ยืนยันข้อมูล</button>
		                        </center>
							</div>
			            </div>
			        </div>
				</form>
			</div>
		    <div class="col-sm-12 col-md-3">
		    	<h4>* Tips</h4>
		    	<ul>
		    		<li></li>
		    		<li></li>
		    		<li></li>
		    		<li></li>
		    	</ul>
		    	<hr style="border: 1px solid #777;">
                <h5>Sponsored</h5>
                <img src="/img/addspacebg.jpg" style="width: 200px;height: 200px;">
		    </div>
		</div>

	    <hr style="border: 1px solid #000;">

	    <footer>
	        <p>worldadsth.com all right reserved.</p>
	    </footer>
	</div>
</div>

<script type="text/javascript">
	$( ".remove_pic" ).click(function() {

		var id = $(this).attr("data-id");

		var r = confirm("คุณต้องการลบรูปนี้ออกจากอัลบั้มนี้?");
	    if (r == true) {
	        $.ajaxSetup({
	        	headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		    });
		    jQuery.ajax({
		        url:'/home/upload/deletepic',
		        type: 'GET',
		        data: {
		            'id': id
		        },
		        success: function( data ){
		            if(data.data == 0){
		            	var removePic = document.getElementById('p'+id);
		            	removePic.parentNode.removeChild(removePic);
		            }
		        },
		        error: function (xhr, b, c) {
		            alert("ลบรูปภาพไม่สำเร็จ โปรดลองใหม่อีกครั้ง");
		        }
		    });
	    } else {
	        
	    }
	});
</script>

@endsection