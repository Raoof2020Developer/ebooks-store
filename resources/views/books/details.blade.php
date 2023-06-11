@extends('layouts.main')

@section('head')
<style>
    td {
        padding: 1rem !important;
        line-height: 1.8;
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

                        <tr>
                            <th>تقييم الكتـاب</th>
                            <td>
                                <span class="score">
                                    <div class="scrore-wrap">
                                        <span class="stars-active" style="width: {{$book->rate()*20}}%;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>

                                        <span class="stars-inactive">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </span>

                                <span>عدد التقييمـات:  {{$book->ratings()->count()}} تقييم</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection