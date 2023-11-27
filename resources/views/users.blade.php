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
    <user-table>
      
    </user-table>
</div>


{{-- 
  <!-- Modal for editing a user -->
  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Your form for editing user details goes here -->
                  <form>
                      <div class="form-group">
                          <label for="editUserName">User</label>
                          <input type="text" class="form-control" id="editUserName">
                      </div>

                      <div class="form-group">
                          <label for="editUserOffice">Office</label>
                          <input type="text" class="form-control" id="editUserOffice">
                      </div>

                      <div class="form-group">
                          <label for="editUserRole">Role</label>
                          <select class="form-control" id="editUserRole">
                              <option>OSA Discipline Officer</option>
                              <option>Violation Officer</option>
                          </select>
                      </div>

                      <!-- Add other fields for editing user details -->

                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save Changes</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div> --}}

@endsection

@section('custom-script')
<!-- jQuery -->

@endsection
