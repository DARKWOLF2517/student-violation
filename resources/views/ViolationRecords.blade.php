@extends('SideNavBar')

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
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
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
            <h4> <i class="fas fa-list mt-2"></i>  Users</h4>
                <div class="student-buttons d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <button class="btn me-2" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-plus"></i> Add new Violation
                        </button>
                        <button class="btn me-2" id="download" onclick="  downloadTableData()">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>

            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Violations</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Queen Bahay Gwapa</td>
                            <td>Too cute</td>
                            <td>Active</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
                            </div>
                            <div class="modal-body">
                                <!-- Use dropdowns instead of input fields -->
                                <p>Student Name: Queen Bahay Gwapa</p>
                                <p>Violations:
                                    <select class="form-control">
                                        <option value="Too cute" selected>Too cute</option>
                                        <option value="Other violation">Other violation</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </p>
                                <p>Status:
                                    <select class="form-control">
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Add new violation slip Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Violation Report Slip</h3>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="college" class="form-label">College</label>
                        <select class="form-select" id="college" name="college" required>
                            <option value="" selected disabled>Select College</option>
                            <option value="College1">College 1</option>
                            <option value="College2">College 2</option>
                            <option value="College3">College 3</option>
                            <!-- Add more colleges as needed -->
                        </select>
                    </div>

                    <div class="flex-container">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="dateFiled" class="form-label">Date Filed</label>
                                <input type="date" class="form-control" id="dateFiled" name="dateFiled" required>
                            </div>
                            <div class="col-md-6">
                                <label for="dateViolation" class="form-label">Date Violation</label>
                                <input type="date" class="form-control" id="dateViolation" name="dateViolation" required>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="place" class="form-label">Place</label>
                        <input type="text" class="form-control" id="place" name="place" required>
                    </div>

                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" required>
                    </div>

                    <div class="mb-3">
                        <label for="courseYear" class="form-label">Course & Year</label>
                        <input type="text" class="form-control" id="courseYear" name="courseYear" required>
                    </div>

                    <div class="mb-3">
                        <label for="violationType" class="form-label">Type of Violation</label>
                        <select class="form-select" id="violationType" name="violationType" required>
                            <option value="NonWearingID">Non-wearing of School ID</option>
                            <option value="Littering">Littering</option>
                            <option value="GoodGrooming">Good Grooming</option>
                            <option value="Vandalism">Vandalism</option>
                            <option value="Smoking">Smoking</option>
                            <option value="OverSpeeding">Over Speeding</option>
                            <option value="Drunkenness">Drunkenness</option>
                            <option value="Contraband">Possession of Contraband</option>
                            <option value="Others">Others (Please specify)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks/Condition</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="reportingAuthority" class="form-label">Name of Reporting Authority</label>
                        <input type="text" class="form-control" id="reportingAuthority" name="reportingAuthority" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection