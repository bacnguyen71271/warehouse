@extends('layouts/fullLayoutMaster')

@section('title', 'Không có quyền truy cập')

@section('content')
<!-- maintenance -->
<section class="row flexbox-container">
    <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
            <div class="card-content">
                <div class="card-body text-center">
                    <img src="{{ asset('images/pages/not-authorized.png') }}" class="img-fluid align-self-center"
                        alt="branding logo">
                    <h1 class="font-large-2 my-2">Không có quyền truy cập!</h1>
                    <p class="p-2">Bạn đang truy cập một trang vượt quyền hạn của bạn, vui lòng kiểm tra và thử lại sau
                        !
                    </p>
                    <a class="btn btn-primary btn-lg mt-2" href="{{ url('/') }}">Trở về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- maintenance end -->
@endsection