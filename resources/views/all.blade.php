@extends('layouts.header')

@section('title', 'แหล่งรวมพื้นที่เช่าทำโฆษณา | ป้ายโฆษณาให้เช่า | ลงประกาศกับเราฟรี')

@section('content')

<div class="container" style="margin-top: 50px;">
	@if (session('status'))
	    <div class="alert alert-success" role="alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('status') }} <a href="#" class="alert-link">ประเมินการใช้งาน / แสดงความคิดเห็นเพิ่มเติม คลิกที่นี่</a>
		</div>
	@endif
	<h4><a href="/">Home</a> / <a href="/home">Dashbord</a> / All uploaded</h4>
	@if (count($billboards) > 0)
		<div class="row">
		@foreach ($billboards as $billboard)
			<div class="col-md-6 col-sm-12 col-lg-6" style="margin-top: 20px;margin-bottom: 30px;">
				<div class="media">
				  	<div class="media-left media-top">
				    	<img src="/img/uploadimage.jpg" class="media-object" style="width:150px;height: 150px;">
				  	</div>
				  	<div class="media-body">
				    	<h4 class="media-heading">{{ $billboard->title }}</h4>
				    	<p style="word-break: break-all;">{{ $billboard->billboardsize }} / {{ $billboard->contact }}</p>
				    	<div class="billboard-media-detail">
					    	<i>ลงประกาศเมื่อ {{ $billboard->updated_at }}</i><br/>
					    	<mark>สถานะ : รออนุมัติ</mark><br/>
					    	<a href="/billboard/{{ $billboard->id }}">ดู</a> / <a href="/home/upload/{{ $billboard->id }}/edit">แก้ไขข้อมูล</a> / <a href="">ลบ</a>
					    </div>
				  	</div>
				</div>
			</div>
		@endforeach
		</div>
	@else
		<center><i class="fa fa-info fa-5x" aria-hidden="true"></i></center>
		<h5><center>คุณยังไม่มีพื้นที่โฆษณาในระบบ</center></h5>
	@endif
	<div class="billboard-media-pagnigation">
		{{ $billboards->links() }}
	</div>
	<hr style="border: 1px solid #000;">

    <footer>
        <p>worldadsth.com all right reserved.</p>
    </footer>
</div>

@endsection