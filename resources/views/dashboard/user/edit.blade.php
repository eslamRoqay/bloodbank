@php($title='تعديل عميل')
@extends('adminLayouts.app')
@section('title')
    {{$title}}
@endsection
@section('header')

@endsection
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-success font-weight-bold my-1 mr-5">{{$title}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            @can('read-users')
                <li class="breadcrumb-item">
                    <a href="{{route('users')}}"
                       class="text-muted">العملاء</a>
                </li>
            @endcan
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}"
                   class="text-muted">الصفحة الرئيسية</a>
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@section('content')
    @can('update-users')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('users.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @include('dashboard.user.form')
            </form>
        </div>
    </div>
    @endcan
@endsection
@section('script')
    <script !src="">
        var avatar2 = new KTImageInput('kt_image_2');
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
    </script>
    <script>
        // tagging support
        $('#kt_select2_1_modal').select2({
            placeholder: "اختر المدينة",
            tags: false
        });
    </script>
    <script>
        // tagging support
        $('#kt_select2_2_modal').select2({
            placeholder: "اختر المدينة",
            tags: false
        });
    </script>
    <script>
        // tagging support
        $('#kt_select2_3_modal').select2({
            placeholder: "اختر المدينة",
            tags: false
        });
    </script>
    <script !src="">
        var avatar2 = new KTImageInput('kt_image_2');
    </script>
    <script !src="">
        $('#kt_datetimepicker_12').datetimepicker();
    </script>
@endsection

