@extends('SideNavBar')
@section('main-content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (Popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                        <option value="fines">Fines</option>
                        <option value="membership_fee">Membership Fee</option>
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
            <h4> <i class="fas fa-list mt-2"></i>  Student Records</h4>
            <div class="student-buttons d-flex justify-content-end">
                <div class="btn-group" role="group">
                    <!-- <button class="btn me-2" id="add-student-list-button" onclick="printTableData()">
                        <i class="fas fa-print"></i> Print
                    </button> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Add New User
                    </button>
                </div>
            </div>

<div class="table-container">
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Users</th>
        <th scope="col">Office</th>
        <th scope="col">Role</th>
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
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Add new User</h5>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-group">
              <label for="userId">User ID</label>
              <input type="text" class="form-control" id="userId">
            </div>

            <div class="form-group">
              <label for="userName">Name</label>
              <input type="text" class="form-control" id="userName">
            </div>

            <div class="form-group">
              <label for="userEmail">Email</label>
              <input type="email" class="form-control" id="userEmail">
            </div>

            <div class="form-group">
              <label for="userRole">Role</label>
              <select class="form-control" id="userRole">
                <option>OSA Discipline Officer</option>
                <option>Violation Officer</option>
              </select>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
