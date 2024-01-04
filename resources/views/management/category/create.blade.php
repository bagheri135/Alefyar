@extends('management.layouts.app')
@section('header-title', "ایجاد دسته بندی جدید")
@section('content')
            <div class="col-md-6 ">
                <div class="card mt-5 ">
                    <div class="card-header">{{ __('Create new category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 d-flex justify-content-end ">
                                    <a type="submit" class="btn btn-info py-2 px-5 mx-2 text-white" href="{{ route('admin') }}">
                                        {{ __('cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary py-2 px-5 ">
                                        {{ __('Save') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
{{-- @include('front.layouts.footer') --}}
@section('script')

@endsection
