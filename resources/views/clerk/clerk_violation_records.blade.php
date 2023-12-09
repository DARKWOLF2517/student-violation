@extends('clerk.clerk_navigation_bar')

@section('main-content')

<div class="content">
    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/login/org_dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Violation Officer</li>
            <li class="breadcrumb-item active" aria-current="page">Records</li>
        </ol>
        </nav>
    </div>
        <violation-list
        user_id = {{Auth::id()}}
        role_id = {{session()->get('role_id')}}
        >

        </violation-list>
    </div>

{{-- <!-- View testimony Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Student Testimony</h5>
            </div>
            <div class="modal-body">
    <div class="form-group mb-3">
        <label for="violationOfficer">Student:</label>
        <input type="text" class="form-control" id="student_name" placeholder="Taylor Swift" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="violationOfficer">Violation Officer:</label>
        <input type="text" class="form-control" id="violationOfficer" placeholder="Juan dela Cruz" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="typeOfViolation">Type of Violation:</label>
        <input type="text" class="form-control" id="typeOfViolation" placeholder="Drunkenness" readonly>
    </div>

    <div class="form-group">
        <label for="violationDescription">Description:</label>
        <input type="text" class="form-control" id="violationDescription" value="Static Text" readonly>
    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('custom-script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
