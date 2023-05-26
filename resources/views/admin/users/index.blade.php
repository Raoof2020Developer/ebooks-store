@extends('theme.default')

@section('head')
<link href="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('heading')
عرض المستخدمين
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="users-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>مستوى المستخدم</th>
                        <th>خيـارات</th>
                    </tr> 
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                {{
                                    $user->isSuperAdmin() ? 'مدير عام' : ($user->isAdmin() ? 'مستخدم عادي' : 'مدير')
                                }}
                            </td>
                            <td>
                                <form action="{{route('users.update', $user)}}" method="POST" class="ml-4 form-inline" style="display: inline-block">
                                    @method('PATCH')
                                    @csrf
                                    <select name="adminstration_level" id="admintration_level" class="form-control form-control-sm">
                                        <option selected disabled>-اختر نوع المستخدم-</option>
                                        <option value="0">مستخدم عادي</option>
                                        <option value="1">مدير</option>
                                        <option value="2">مدير عام</option>
                                    </select>
                                    <button class="btn btn-primary  btn-sm" type="submit">
                                        <i class="fa fa-edit"></i>
                                        تعديـل
                                    </button>
                                </form>

                                <form action="{{route('users.destroy', $user)}}" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf

                                    @if (auth()->user() != $user)
                                    <button class="btn btn-danger bgt-sm" type="submit" onclick="return confirm('هـل أنت متـأكد؟')">
                                        <i class="fa fa-trash"></i>
                                        حـذف
                                    </button>
                                    @else
                                    <div class="btn btn-danger btn-sm disabled" >
                                        <i class="fa fa-trash"></i>
                                        حـذف
                                    </div>
                                    @endif
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
        $('#users-table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        })
    })
</script>
@endsection