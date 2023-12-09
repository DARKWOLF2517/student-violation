@extends('clerk.clerk_navigation_bar')
@section('main-content')
<div class="content">
    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/clerk_dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Clerk</li>
            <li class="breadcrumb-item active" aria-current="page">Testimonies</li>
        </ol>
        </nav>
    </div>
    <violation-validation
    role_id = {{session()->get('role_id')}}
    >

    </violation-validation>
</div>

@endsection

@section('custom-script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
