@extends('layouts.header')

@section('title', 'แหล่งรวมพื้นที่เช่าทำโฆษณา | ป้ายโฆษณาให้เช่า | ลงประกาศกับเราฟรี')

@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="worldadsth-user-dashboard">
            <div class="col-sm-12 col-md-8">
                <h4>Dashboard > ภาพรวม</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;">แผงเมนูและการจัดการส่วนตัว</span>
                                <hr>
                                <ul class="fa-ul">
                                    <li><i class="fa-li fa fa-pencil"></i><a href="/home/profile">แก้ไขข้อมูลส่วนตัว</a></li>
                                    <li><i class="fa-li fa fa-plus"></i><a data-toggle="modal" data-target="#createspacemodal">ลงประกาศพื้นที่โฆษณา</a></li>
                                    <li><i class="fa-li fa fa-plus"></i><a href="/home/addblog">เขียนข่าวสารและบล็อค</a></li>
                                    <li><i class="fa-li fa fa-plus"></i><a href="/home/createagentprofile">สร้างโปรไฟล์ ผู้รับเหมา ทำโฆษณา</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;">แถบตัวช่วย / เมนูแนะนำ</span>
                                <hr>
                                <ul class="fa-ul">
                                    <li><i class="fa-li fa fa-comment"></i><a href="/home/sendmsg">ติดต่อผู้ดูแลระบบ</a></li>
                                    <li><i class="fa-li fa fa-bookmark"></i><a href="/home/examplespace">ตัวอย่างการลงประกาศ</a></li>
                                    <li><i class="fa-li fa fa-child"></i><a href="/home/exampleprofile">ตัวอย่างการสร้างโปรไฟล์ ผู้รับเหมา</a></li>
                                    <li><i class="fa-li fa fa-cube"></i><a href="/home/exampleblog">ตัวอย่างการเขียนข่าวสาร</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i class="fa fa-user fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;">ข้อมูลส่วนตัว ( <a href="/home/profile">แก้ไขข้อมูลส่วนตัว</a> )</span>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <img src="/img/default-user-image.png" style="width: 150px;height: 150px;">
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <ul class="fa-ul">
                                    <li><i class="fa-li fa fa-user"></i> {{ Auth::user()->name }}</li>
                                    <li><i class="fa-li fa fa-envelope"></i> {{ Auth::user()->email }}</li>
                                    <li><i class="fa-li fa fa-home"></i> -</li>
                                    <li><i class="fa-li fa fa-phone"></i> -</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <i class="fa fa-photo fa-2x" aria-hidden="true"></i>&nbsp; <span style="font-size: 16px;text-align: center;">พื้นที่โฆษณา <span style="color: #2980b9;">( {{ count($billboards) }} )</span></span>
                        </div>
                        <div class="pull-right">
                            <a data-toggle="modal" data-target="#createspacemodal" style="cursor: pointer;"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>&nbsp; ลงประกาศเพิ่ม</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            @if (count($billboards) > 0)
                                @foreach ($billboards as $billboard)
                                    @if ($billboard->default_pic == '/img/uploadimage.jpg')
                                        <div class="col-sm-12 col-md-3" style="margin-bottom: 10px;">
                                            <a href="/home/edit/1"><img src="{{ $billboard->default_pic }}" style="width: 150px;height: 150px;"><center>{{ $billboard->title }}</center></a>
                                        </div>
                                    @else
                                        <div class="col-sm-12 col-md-3" style="margin-bottom: 10px;">
                                            <a href="/billboard/{{ $billboard->id }}"><img src="/billboards/{{ $billboard->id }}/{{ $billboard->default_pic }}" style="width: 150px;height: 150px;"><center>{{ $billboard->title }}</center></a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <center><i class="fa fa-info fa-5x" aria-hidden="true"></i></center>
                                <h5><center>คุณยังไม่มีพื้นที่โฆษณาในระบบ</center></h5>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="seeall">
                                    <a href="/home/upload/all" class="btn btn-default">ดูทั้งหมด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <h5>ตัวอย่างโปรไฟล์ ผู้รับเหมา ( <span style="color: red;"><u>สร้างฟรี</u></span> )</h5>
                <img src="/img/addspacebg.jpg" style="width: 300px;height: 300px;">
                <h5><a href="/profile/1">คลิกเพื่อดูตัวอย่างแบบเต็ม</a></h5>
                <hr style="border: 1px solid #777;">
                <h5>Sponsored</h5>
                <img src="/img/addspacebg.jpg" style="width: 200px;height: 200px;">
            </div>
        </div>
    </div>
    <hr style="border: 1px solid #000;">

    <footer>
        <p>worldadsth.com all right reserved.</p>
    </footer>
</div>

<!-- create space modal -->
<!-- Modal -->
<div class="modal fade" id="createspacemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เลือกประเภท พื้นที่โฆษณาของคุณได้เลยครับ</h4>
             </div>
            <div class="modal-body">
                <div class="row">
                    <div class="selecttypemodal">
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/billboardform"><i class="fa fa-object-group fa-3x" aria-hidden="true"></i><p>ป้ายโฆษณาว่าง ปล่อยให้เช่า</p></a>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/createpaperspace"><i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i><p>พื้นที่โฆษณาของวารสารและสิ่งพิมพ์</p></a>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/createwebsitespace"><i class="fa fa-globe fa-3x" aria-hidden="true"></i><p>พื้นที่โฆษณาบนเว็บไซต์</p></a>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/createcarspace"><i class="fa fa-bus fa-3x" aria-hidden="true"></i><p>พื้นที่โฆษณาติดรถ และวัตถุเคลื่อนที่</p></a>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/createchanelspace"><i class="fa fa-television fa-3x" aria-hidden="true"></i><p>พื้นที่โฆษณาของทีวี และช่องชาแนล</p></a>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <a href="/home/createradiospace"><i class="fa fa-signal fa-3x" aria-hidden="true"></i><p>พื้นที่โฆษณาของวิทยุ และการกระจายเสียง</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
