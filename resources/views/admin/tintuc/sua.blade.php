
@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach          
                            </div>
                        @endif

                        @if(session('thongbao'))

                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group" >
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai"id="TheLoai">
                                    @foreach($theloai as $tl) 
                                    <option 

                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                    {{"selected"}}

                                    @endif

                                    value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>LoạiTin</label>
                                <select class="form-control" name="LoaiTin"id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                    <option 
                                     @if($tintuc->loaitin->id == $tl->id)
                                    {{"selected"}}

                                    @endif
                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề </label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo"class="form-control ckeditor"rows="3" name="TomTat">
                                   {{$tintuc->TomTat}} 
                                </textarea>
                                
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo"class="form-control ckeditor"rows="3"name="NoiDung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}">
                                </p>
                                <input name="Hinh" rows="5"type="file"class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                     @endif 
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if($tintuc->NoiBat == 1)
                                    {{"checked"}}
                                    @endif 
                                    type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>danh sách</small>
                        </h1>
                    </div>
                     @if(session('message'))

                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                    @endif      
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Người Bình Luận</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">Ngày Đăng</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $binhluan)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $binhluan->id }}</td>
                                <td>{{ $binhluan->user->name }}</td>
                                <td>{{ $binhluan->NoiDung }}</td>
                                <td>{{ $binhluan->created_at }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$binhluan->id}}/{{$tintuc->id}}"> Xóa</a></td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->



@endsection

@section('script')
    <script >
        $(document).ready(function){
            $("#TheLoai").change(function()){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                   
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection