@extends('theme.default')

@section('heading')
    عرض تفاصيـل الكتـاب 
@endsection

@section('head')
<style>
    table {
        table-layout: fixed
    }

    table tr th {
        width: 30%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">
                <div class="card-header">
                    عـرض تفاصيـل الكتاب
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>العنـوان</th>
                            <td class="lead">
                                <strong>{{ $book->title }}</strong>
                            </td>
                        </tr>

                        @if ($book->isbn != null)
                        <tr>
                            <th>الرقم التسـلسلـي</th>
                            <td>{{ $book->isbn }}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>صـورة الغلاف</th>
                            <td>
                                <img src="{{asset('storage/' . $book->cover_img)}}" alt="" class="img-fluid img-thumbnail">
                            </td>
                        </tr>

                        @if ($book->description)
                        <tr>
                            <th>الوصف</th>
                            <td>{{ $book->description}}</td>
                        </tr>
                        @endif

                        @if ($book->category != null)
                        <tr>
                            <th>التصنيف</th>
                            <td>{{ $book->category->name }}</td>
                        </tr>
                        @endif
                        
                        
                        @if ($book->authors()->count() > 0)
                        <tr>
                            <th>المؤلفـون</th>
                            <td>
                                @foreach($book->authors as $author)
                                    {{ $loop->first ? '' : 'و'}}
                                    {{$author->name}}
                                @endforeach
                            </td>
                        </tr>
                        @endif

                        
                        
                        @if ($book->publisher)
                        <tr>
                            <th>النـاشر</th>
                            <td>{{ $book->publisher->name}}</td>
                        </tr>
                        @endif

                        @if ($book->publish_year)
                        <tr>
                            <th>سنة النشـر</th>
                            <td>{{ $book->publish_year}}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>عدد الصفحـات</th>
                            <td>{{ $book->nbr_of_pages}}</td>
                        </tr>

                        <tr>
                            <th>الكمية المتوفـرة</th>
                            <td>{{ $book->nbr_of_copies}} كتـبا</td>
                        </tr>

                        <tr>
                            <th>السعـر</th>
                            <td>{{ $book->price}}$</td>
                        </tr>
                    </table>

                    <div>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection