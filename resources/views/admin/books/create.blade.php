@extends('theme.default')

@section('heading')
    إضـافة كتـاب جديـد
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                أضـف كتـابا جديـدا
            </div>

            <div class="card-body">
                <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title"  class="col-md-4 col-form-label text-md-right">عنـوان الكتـاب</label>

                        <div class="col-md-6">
                            <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{old('title')}}"
                            autocomplete="title"
                            >
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="isbn"  class="col-md-4 col-form-label text-md-right">الرقـم التسلسلي</label>

                        <div class="col-md-6">
                            <input 
                            type="text" 
                            id="isbn" 
                            name="isbn" 
                            class="form-control @error('isbn') is-invalid @enderror"
                            value="{{old('isbn')}}"
                            autocomplete="isbn"
                            >
                            @error('isbn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cover_img"  class="col-md-4 col-form-label text-md-right">صـورة الغلاف</label>

                        <div class="col-md-6">
                            <input 
                            type="file" 
                            id="cover_img" 
                            name="cover_img" 
                            class="form-control @error('cover_img') is-invalid @enderror"
                            value="{{old('cover_img')}}"
                            autocomplete="cover_img"
                            accept="image/*"
                            >
                            @error('cover_img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category"  class="col-md-4 col-form-label text-md-right">التصنيف</label>

                        <div class="col-md-6">
                            <select id="category" name="category" class="form-control" >
                                <option selected disabled>اختر تصنيفا</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select> 
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="authors"  class="col-md-4 col-form-label text-md-right">المؤلفون</label>

                        <div class="col-md-6">
                            <select id="authors" multiple name="authors" class="form-control" >
                                <option selected disabled>اختر المؤلفين</option>
                                @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                            @error('authors')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="publisher"  class="col-md-4 col-form-label text-md-right">الناشر</label>

                        <div class="col-md-6">
                            <select id="publisher" name="publisher" class="form-control" >
                                <option selected disabled>اختر ناشرا</option>
                                @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                            </select> 
                            @error('publisher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description"  class="col-md-4 col-form-label text-md-right">وصف الكتـاب</label>

                        <div class="col-md-6">
                            <textarea 
                            type="text" 
                            id="description" 
                            name="description" 
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{old('description')}}"
                            autocomplete="description"
                            >
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="publish_year"  class="col-md-4 col-form-label text-md-right">سنة النشـر</label>

                        <div class="col-md-6">
                            <input 
                            type="number" 
                            id="publish_year" 
                            name="publish_year" 
                            class="form-control @error('publish_year') is-invalid @enderror"
                            value="{{old('publish_year')}}"
                            autocomplete="publish_year"
                            >
                            @error('publish_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nbr_of_pages"  class="col-md-4 col-form-label text-md-right">عـدد الصفحـات</label>

                        <div class="col-md-6">
                            <input 
                            type="number" 
                            id="nbr_of_pages" 
                            name="nbr_of_pages" 
                            class="form-control @error('nbr_of_pages') is-invalid @enderror"
                            value="{{old('nbr_of_pages')}}"
                            autocomplete="nbr_of_pages"
                            >
                            @error('nbr_of_pages')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nbr_of_copies"  class="col-md-4 col-form-label text-md-right">عـدد النسخ</label>

                        <div class="col-md-6">
                            <input 
                            type="number" 
                            id="nbr_of_copies" 
                            name="nbr_of_copies" 
                            class="form-control @error('nbr_of_copies') is-invalid @enderror"
                            value="{{old('nbr_of_copies')}}"
                            autocomplete="nbr_of_copies"
                            >
                            @error('nbr_of_copies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price"  class="col-md-4 col-form-label text-md-right">السعـر</label>

                        <div class="col-md-6">
                            <input 
                            type="decimal" 
                            id="price" 
                            name="price" 
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{old('price')}}"
                            autocomplete="price"
                            >
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">أضـف الكتـاب</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection