@extends('theme.default')

@section('heading')
    إضـافة نـاشر جديـد
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                أضـف نـاشر جديـدا
            </div>

            <div class="card-body">
                <form action="{{route('publishers.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name"  class="col-md-4 col-form-label text-md-right">اسم النـاشر</label>

                        <div class="col-md-6">
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{old('name')}}"
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
                        <label for="address"  class="col-md-4 col-form-label text-md-right">عنوان الناشـر</label>

                        <div class="col-md-6">
                            <textarea 
                            type="text" 
                            id="address" 
                            name="address" 
                            class="form-control @error('address') is-invalid @enderror"
                            value="{{old('address')}}"
                            autocomplete="address"
                            >
                            </textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">أضـف النـاشر</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection