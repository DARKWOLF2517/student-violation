@extends('admin.admin_navigation_bar')

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
                        <option value="inactive">Pending</option>
                    </select>
                </div>


                <div class="select-dropdown" id= "semester-btn" style="margin-left: 20px; width: 270px;">
                    <!-- Second dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center; ">
                        <option value="">Select School Year</option>
                        <option value="option1">1st Semester 2023-2024</option>
                    </select>
                </div>
            </div>
            <h4> <i class="fas fa-list mt-2"></i>  Violation records</h4>
                <div class="student-buttons d-flex justify-content-end">
                    <div class="btn-group" role="group">

                        <button class="btn me-2" data-toggle="modal" data-target="#addViolationModal">
                            <i class="fas fa-plus"></i> Add New Violation
                        </button>
                    </div>
                </div>

            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Violation Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Drunkenness</td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <button type="button" class="btn"  data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"></i> View</button>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#editModal"> <i class="fas fa-edit"></i> Edit</button>
                                    <button type="button" class="btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                <!-- Edit Violation Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="studentName" class="form-label">Name of Violation</label>
                                        <input type="text" class="form-control" id="violationName" name="violationName" placeholder="Drunkenness" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="testimonyDetails" class="form-label">Violation Description</label>
                                        <textarea class="form-control" id="violationDescription" name="violationDescription" rows="3"
                                        placeholder="lorem ipsum " required></textarea>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- View Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="violationName"> <b>Violation Name:</b></label>
                    <input type="text" class="form-control" id="violationName" value="Drunkenness" readonly>
                </div>
                <div class="form-group">
                    <label for="violationDescription"> <b> Violation Description: </b></label>
                    <p class="desciption">
                        Drunkenness - (page 68 #4)
                        1st offense 2-5 days suspension
                        2nd offense 3-7 days suspension
                        3rd offense 8-30 days suspension
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add new Violation Modal -->
<div class="modal" id="addViolationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Violation</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Violation</label>
                        <input type="text" class="form-control" id="violationName" name="violationName" required>
                    </div>

                    <div class="mb-3">
                        <label for="testimonyDetails" class="form-label">Violation Description</label>
                        <textarea class="form-control" id="violationDescription" name="violationDescription" rows="3" required></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
