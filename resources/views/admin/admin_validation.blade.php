@extends('admin.admin_navigation_bar')

@section('main-content')
<div class="content">
    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/login/org_dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Violation Officer</li>
            <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
        </ol>
        </nav>
    </div>
    <div class="mt-2">
        <div class="row head-container">
            <div class="col-md-6 col-sm-12">
                <div class="input-container">
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="col-md-4 col-sm-12" style="display: flex; align-items: center; justify-content: flex-end; margin-right: 20px;">
                <div class="select-dropdown">
                    <!-- First dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center;">
                        <option value="" disabled selected><i class="fas fa-filter"></i> Sort by</option>
                        <option value="approved">Approved</option>
                        <option value="declined">Declined</option>
                    </select>
                </div>


                <div class="select-dropdown" id= "semester-btn" style="margin-left: 20px; width: 270px;">
                    <!-- Second dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center; ">
                        <option value="">Select Semester</option>
                        <option value="option1">1st Semester 2023-2024</option>
                        <option value="option2">2nd Semester 2022-2023</option>
                        <option value="option3">1st Semester 2022-2023</option>
                    </select>
                </div>
            </div>
            <h4> <i class="fas fa-list mt-2"></i>  Testimony</h4>
                <div class="student-buttons d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <!-- <button class="btn me-2" id="add-student-list-button" onclick="printTableData()">
                            <i class="fas fa-print"></i> Print
                        </button> -->
                        {{-- <button class="btn me-2" id="add-student-button" onclick="  downloadTableData()">
                            <i class="fas fa-download"></i> Download
                        </button> --}}
                    </div>
                </div>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Violation</th>
                            <th scope="col">Violation Status</th>
                            <th scope="col">Testimony</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Queen Bahay Gwapa</td>
                                <td>Drunkenness</td>
                                <td style="color: green; font-weight:bold;">Active</td>
                                {{-- <td style="color: red; font-weight:bold;">Inactive</td>
                                <td style="color: yellow; font-weight:bold;">Pending</td> --}}
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                        {{-- <button type="button" class="btn" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"> View</i></button> --}}
                                        <button type="button" class="btn"  data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"></i> View</button>
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#editModal"> <i class="fas fa-check"></i> Approve</button>
                                        <button type="button" class="btn"><i class="fas fa-times"></i> Disapprove</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
</div>
</div>
</div>
<!-- View testimony Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Student Testimony</h5>
            </div>
            <div class="modal-body">
    <div class="form-group mb-3">
        <label for="violationOfficer">Student:</label>
        <input type="text" class="form-control" id="student_name" placeholder="Queen Bahay Gwapa" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="violationOfficer">Violation Officer:</label>
        <input type="text" class="form-control" id="violationOfficer" placeholder="Juan dela Cruz" readonly>
    </div>

    {{-- <div class="form-group mb-3">
        <label for="disciplineOfficer">Discipline Officer:</label>
        <input type="text" class="form-control" id="disciplineOfficer" placeholder="Enter Discipline Officer's Name">
    </div> --}}

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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
