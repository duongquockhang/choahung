<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<main id="main">
        <h1> Danh sách giáo viên</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form>
                            <a href="{{ route('teachers.create') }}" class="btn btn-info">Thêm mới
                            </a>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên giáo viên</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>
                                <form action="{{ route('teachers.destroy', $team->id) }}" method="POST">
                                        <a href="{{ route('teachers.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa ko giáo viên này không')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>