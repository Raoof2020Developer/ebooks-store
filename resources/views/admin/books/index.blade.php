@extends('theme.default')

@section('head')
<link href="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('heading')
عرض الكتب
@endsection

@section('content')
    <a href="{{route('books.create')}}" role="button" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        أضف كتـابا جديـدا
    </a>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>العنـوان</th>
                        <th>الرقم التسلسلـي</th>
                        <th>التصنيـف</th>
                        <th>المؤلفـون</th>
                        <th>النـاشر</th>
                        <th>السعـر</th>
                        <th>خيـارات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>
                                <a href="{{route('books.show' , $book)}}">{{$book->title}}</a>
                            </td>
                            <td>{{$book->isbn}}</td>
                            <td>{{$book->category != null ? $book->category->name : ''}}</td>
                            <td>
                                @if($book->authors()->count() > 0)
                                    @foreach($book->authors as $author)
                                        {{$loop->first ? '' : 'و '}}
                                        {{$author->name}}
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $book->publisher != null ? $book->publisher->name : ''}}</td>
                            <td>{{$book->price}}</td>
                            <td>
                                <a href="{{route('books.edit', $book)}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                    تعديـل  
                                </a>
                                <form action="{{route('books.destroy', $book)}}" class="d-inline-block" method="POST">
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
        $('#books-table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        })
    })
</script>
@endsection