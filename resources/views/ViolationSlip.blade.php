@extends('SideNavBar')
@section('main-content')

<div class="content">
    <div class="container card-container">
        <h2 class="text-center">Violation Report Slip</h2>
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
                <div class="mb-3">
                    <label for="dateFiled" class="form-label">Date Filed</label>
                    <input type="date" class="form-control" id="dateFiled" name="dateFiled" required>
                </div>

                <div class="mb-3">
                        <label for="dateViolation" class="form-label">Date Violation</label>
                        <input type="date" class="form-control" id="dateViolation" name="dateViolation" required>
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

@endsection

