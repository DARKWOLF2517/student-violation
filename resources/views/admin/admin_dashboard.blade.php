@extends('admin.admin_navigation_bar')

@section('main-content')



<title>CMU-SVMS</title>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="v3_26">
                    <div class="overlay"></div>
                    <div class="v3_28">Welcome to Student Violation Monitoring System</div>
                    <div class="v3_29">Manage and track student violations with ease</div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="statistic">
                    <div class="d-flex align-items-center">
                        <span class="square-span">
                            <i class="icons"></i>
                        </span>
                        <div class="ml-3">
                        <p class="stat-label">Total Violations Recorded</p>
                        <b><p class="stat-number">10</p></b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="statistic">
                    <div class="d-flex align-items-center">
                        <span class="square-span">
                            <i class="icons"></i>
                        </span>
                        <div class="ml-3">
                        <p class="stat-label">Total  </p>
                        <b><p class="stat-number">10</p></b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="statistic">
                    <div class="d-flex align-items-center">
                        <span class="square-span">
                            <i class="icons"></i>
                        </span>
                        <div class="ml-3">
                        <p class="stat-label">Total Violations</p>
                        <b><p class="stat-number">10</p></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col key-features-container">
                <div class="card">
                    <div class="key-features-title">
                        <h2>Key Features</h2>
                    </div>

                    <div class="feature-container">
                        <div class="feature">
                            <i class="fas fa-clipboard-check feature-icon"></i>
                            <div class="feature-text">Violation Tracking</div>
                            <div class="feature-description">Track student violations in real-time</div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-search feature-icon"></i>
                            <div class="feature-text">Search and Filter</div>
                            <div class="feature-description">Easily search and filter violations by various criteria</div>
                        </div>
                        <div class="feature">
                            <i class="fas fa-clipboard feature-icon"></i>
                            <div class="feature-text">Record and Validate</div>
                            <div class="feature-description">Record and Validate in one Click</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

