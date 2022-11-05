
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                 @foreach($theloai as $tl)
                <h3>
                    <a href="">{{$tl->Ten}}</a> | @foreach($tl->loaitin as $lt) 
                    <small><a href="loaitin/{{$lt->id}}/{{$lt->Ten}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                    @endforeach
                </h3>
                <a href=" ">
                    <img class="img-responsive" src="upload/tintuc/{{ $chosen_article['Hinh'] }}" alt="Hình ảnh đại diện của bài viết">
                </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>