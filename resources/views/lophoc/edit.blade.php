<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<main class="page-content">
<h2>Sửa lớp học</h2>
<div class="container">
<div class="row">
    <div class="col-lg-12 mx-auto">
     <div class="card">
         </div>
       <div class="card-body">
         <div class="border p-3 rounded">
         <form class="row g-3" action="{{ route('lophoc.update',[$lophoc->id]) }}" method="post"  enctype="multipart/form-data">
            @method('put')
            @csrf
           <div class="col-12">
             <label class="form-label">Tên lớp</label>
             <input type="text" class="form-control" value="{{$lophoc->name}}" name="name" placeholder="Tên lớp">
           </div>
          <label class="form-label">Chọn học sinh</label>
           <select name="student_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($student as $student)
            <option
                <?= $student->id == $lophoc->student_id ? 'selected' : '' ?>
                value="{{ $student->id }}">
                {{ $student->name }}</option>
        @endforeach
        </select>
        <label class="form-label">Chọn giáo viên</label>
           <select name="teacher_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($teacher as $teacher)
            <option
                <?= $teacher->id == $lophoc->teacher_id ? 'selected' : '' ?>
                value="{{ $teacher->id }}">
                {{ $teacher->name }}</option>
        @endforeach
        </select>
           <div class="col-12">
             <button class="btn btn-primary px-4">Hoàn thành</button>
            <a class="btn btn-primary px-4" href="{{ route('lophoc.index') }}" class="w3-button w3-red">Quay Lại</a>
        </div>
         </form>
        </div>
        </div>
       </div>
    </div>
 </div>
 </div>
</main>

