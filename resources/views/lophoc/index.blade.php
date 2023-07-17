<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<main id="main">
        <h1> Danh sách lớp học</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form>
                            <a href="{{ route('lophoc.create') }}" class="btn btn-info">Thêm mới
                            </a>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Học sinh học </th>
                        <th scope="col">Giáo viên phụ trách</th>
                        <th scope="col">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lophoc as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->student->name}}</td>
                            <td>{{ $team->teacher->name}}</td>
                            <td>
                                <form action="{{ route('lophoc.destroy', $team->id) }}" method="POST">
                                        <a href="{{ route('lophoc.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này hay không')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>



       
   <!-- đúng -->
   <main id="main">
        <h4> Sinh viên đăng ký nhiều hơn 1 lớp học</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Học sinh học </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->total_lophoc }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>






<!-- chưa đúng -->
    <main id="main">
        <h4> Sinh viên của từng lớp</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Học sinh học </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $key => $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->tenhocsinh }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>


    
<!-- đúng -->
<main id="main">
        <h4> Địa chỉ không ở Hà Nội của lớp có giáo viên phụ trách tên 'An'</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên giáo viên</th>
                        <th scope="col">Tên học sinh</th>
                        <th scope="col">Địa chỉ </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hanoi as $key => $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->tenhocsinh }}</td>
                            <td>{{ $team->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>





<!-- chưa đúng -->
    <main id="main">
        <h4> 2 sinh viên nam ở Hà Nội đăng ký học</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Tên học sinh</th>
                        <th scope="col">Địa chỉ </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hocsinhnam as $key => $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->total_male_students }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>

 
