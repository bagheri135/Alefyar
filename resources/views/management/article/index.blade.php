@extends('management.layouts.app')
@section('header-title', 'مدیریت مقالات')
@section('content')

    @php
        $count = ($articles->currentPage() - 1) * 10 + 1;
    @endphp

    <div class="card shadow-lg ">
        <div class="card-body">
            <h4 class="card-title">لیست مقالات</h4>
            <input class="form-control search_custom mb-5" id="myInput" type="text" placeholder="جستجو...">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">نامک</th>
                            <th scope="col">متن</th>
                            <th scope="col">نویسنده</th>
                            <th scope="col">بازدید</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">تاریخ ویرایش</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($articles as $article)
                            <tr class="">
                                <td scope="row">{{ $count++ }}</td>
                                <td>{{ $article->name }}</td>
                                <td>{{ $article->slug }}</td>
                                <td>{{ $article->description }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->hit }}</td>
                                <td>{{ $article->status ? 'فعال' : 'غیرفعال' }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary mx-2 p-2"
                                            href="{{ route('admin.article.edit', $article) }}" role="button">ویرایش</a>
                                        <form id="delete-user" action="{{ route('admin.article.destroy', $article) }}"
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
                                <td class="text-center bg-danger text-white py-4" colspan="8"><span class="fs-5">مقاله ای وجود ندارد</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center  ">
                    {{ $articles->links() }}
                    <span class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center mx-5"
                        style="height: 2rem;width: 2rem">{{ $articles->count() }}</span>
                </div>
                {{-- {!! $users->withQueryString()->links('pagination::bootstrap-5') !!} --}}
            </div>
        </div>
    </div>



@endsection
@section('script')
@endsection
