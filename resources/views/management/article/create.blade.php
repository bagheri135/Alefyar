@extends('management.layouts.app')
@section('header-title', 'ایجاد دسته بندی جدید')
@section('content')
    <div class="col-md-6 ">
        <div class="carder " style="height: 100px;width: 100px;border:2px solid black"></div>
        <div class="card mt-5 ">
            <div class="card-header">{{ __('Create new article') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.article.store') }}">
                    @csrf
                    {{-- Name --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Slug --}}
                    {{-- <div class="row mb-3">
                        <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Slug') }}</label>

                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                name="slug" value="{{ old('slug') }}" autocomplete="slug">

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- Description --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                cols="30" rows="5">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Category --}}
                    <div class="row mb-3 form-group">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <div id="output"></div>
                            <select class="form-control chosen-select" name="categories" multiple id="">
                                <option value="1">اخبار علمی</option>
                                <option value="2">اخبار فرهنگی</option>
                                <option value="3">تکنولوژی</option>
                                <option value="4">سیاسی</option>
                            </select>
                        </div>
                    </div>


                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        {{-- Action --}}
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
@endsection
{{-- @include('front.layouts.footer') --}}
@section('script')

@endsection
