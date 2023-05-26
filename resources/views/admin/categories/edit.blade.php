@extends('theme.default')

@section('heading')
    تعديل بيانات التصنيف
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                تعديل بيانات التصنيف {{$category->title}}

            <div class="card-body">
                <form action="{{route('categories.update', $category)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name"  class="col-md-4 col-form-label text-md-right">اسم التصنيف</label>

                        <div class="col-md-6">
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{$category->name}}"
                            autocomplete="name"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description"  class="col-md-4 col-form-label text-md-right">وصف التصنيف</label>

                        <div class="col-md-6">
                            <textarea 
                            type="text" 
                            id="description" 
                            name="description" 
                            class="form-control @error('description') is-invalid @enderror"
                            autocomplete="description"
                            >
                            {{$category->description}}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">حفظ التعديـلات</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection