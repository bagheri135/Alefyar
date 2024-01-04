@extends('management.layouts.app')
@section('header-title', 'مدیریت کاربران')
@section('content')
    
    @php
        $count = ($users->currentPage() - 1) * 10 + 1;
    @endphp

    <div class="card shadow-lg ">
        <div class="card-body">
            <h4 class="card-title">لیست کاربران</h4>
            <input class="form-control search_custom mb-5" id="myInput" type="text" placeholder="جستجو...">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام کاربر</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">نقش</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تلفن</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($users as $user)
                            <tr class="">
                                <td scope="row">{{ $count++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role < 2 ? 'مدیر' : 'کاربر' }}</td>
                                <td><a href="{{ route('admin.user.status',$user) }}" class="btn {{ $user->status < 1 ? 'btn-danger' : 'btn-success' }}">{{ $user->status < 1 ? 'غیرفعال' : 'فعال' }}</a></td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary mx-2 p-2" href="{{ route('admin.user.edit',$user) }}" role="button">ویرایش</a>
                                        <form id="delete-user" action="{{ route('admin.user.destroy', $user) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <input class="btn btn-danger mx-2 p-2"
                                                onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟')" type="submit"
                                                value="حذف">
                                        </form>
                                    </div>


                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td class="text-center " colspan="4">کاربری وجود ندارد</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center  ">
                    {{ $users->links() }}
                    <span class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center mx-5"
                        style="height: 2rem;width: 2rem">{{ Auth::user()->count() }}</span>
                </div>
                {{-- {!! $users->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
    </div>



@endsection
@section('script')
@endsection
