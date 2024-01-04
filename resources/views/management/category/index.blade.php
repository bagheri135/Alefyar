@extends('management.layouts.app')
@section('header-title', 'مدیریت کاربران')
@section('content')
    
    @php
        $count = ($categories->currentPage() - 1) * 10 + 1;
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
                            <th scope="col">نام</th>
                            <th scope="col">نامک</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($categories as $category)
                            <tr class="">
                                <td scope="row">{{ $count++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary mx-2 p-2" href="{{ route('admin.category.edit',$category) }}" role="button">ویرایش</a>
                                        <form id="delete-user" action="{{ route('admin.category.destroy', $category) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <input class="btn btn-danger mx-2 p-2"
                                                onclick="return confirm('آیا از حذف این دسته مطمئن هستید؟')" type="submit"
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
                    {{ $categories->links() }}
                    <span class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center mx-5"
                        style="height: 2rem;width: 2rem">{{ $categories->count() }}</span>
                </div>
                {{-- {!! $users->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
    </div>



@endsection
@section('script')
@endsection
