@extends('theme.default')

@section('head')
<link href="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('heading')
عرض المؤلفين
@endsection

@section('content')
    <a href="{{route('authors.create')}}" role="button" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        أضف مؤلـفا جديـدا
    </a>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <table id="authors-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>خيـارات</th>
                    </tr> 
                </thead>

                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->name}}</td>
                            <td>{{$author->description}}</td>
                            
                            <td>
                                <a href="{{route('authors.edit', $author)}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                    تعديـل  
                                </a>
                                <form action="{{route('authors.destroy', $author)}}" class="d-inline-block" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متـأكـد؟')">
                                        <i class="fa fa-trash"></i>
                                        حـذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{asset('theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(() => {
        $('#authors-table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        })
    })
</script>
@endsection