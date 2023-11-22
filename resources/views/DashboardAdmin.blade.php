@extends('SideNavBar')
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
                                <p class="stat-label">Total Violations</p>
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
                                    <i class="fas fa-check feature-icon"></i>
                                    <div class="feature-text">Violation Tracking</div>
                                    <div class="feature-description">Track student violations in real-time</div>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-search feature-icon"></i>
                                    <div class="feature-text">Search and Filter</div>
                                    <div class="feature-description">Easily search and filter violations by various criteria</div>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-file feature-icon"></i>
                                    <div class="feature-text">Analytics and Reports</div>
                                    <div class="feature-description">Generate reports and analytics for better insights</div>
                                </div>
                            </div>
                        </div>
            </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.onreadystatechange = () => {
            if (document.readyState === "complete") {
                // Notification button and popover
                const notificationButton = document.querySelector('.notification-button');
                const popover = document.querySelector('.popover');

                // Sidebar and toggle button
                const toggleSidebarButton = document.getElementById('ssidebar-toggle');
                const sidebar = document.getElementById('sidebarCollapse');
                const content = document.querySelector('.content');
                const icon = document.querySelector('#sidebar-toggle i');

                // Buttons with chevron icons
                const rotateButtons = document.querySelectorAll('.rotate-icon');

                // Function to close any open btn-toggle elements
                function closeOpenBtnToggle() {
                    const btnToggle = document.querySelectorAll('.btn-toggle');
                    btnToggle.forEach((button) => {
                        const collapseTarget = button.getAttribute('data-bs-target');
                        const collapseElement = document.querySelector(collapseTarget);
                        if (collapseElement && collapseElement.classList.contains('show')) {
                            collapseElement.classList.remove('show');
                            rotateChevron(button);
                            button.classList.remove('collapsed');
                        }
                    });
                }

                // Function to rotate the chevron icon
                function rotateChevron(button) {
                    const chevron = button.querySelector('.link-arrow i');
                    chevron.classList.toggle('fa-chevron-down');
                    chevron.classList.toggle('fa-chevron-up');
                }

                // Event listener for toggling the sidebar
                toggleSidebarButton.addEventListener('click', function () {
                    const isCollapsed = sidebar.classList.contains('collapsed');
                    closeOpenBtnToggle();
                    sidebar.classList.toggle('collapsed');
                    content.classList.toggle('collapsed');
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-times');
                    if (!isCollapsed) {
                        rotateButtons.forEach((button) => {
                            if (!button.classList.contains('collapsed')) {
                                const collapseTarget = button.getAttribute('data-bs-target');
                                const collapseElement = document.querySelector(collapseTarget);
                                if (collapseElement) {
                                    collapseElement.classList.add('show');
                                }
                            }
                        });
                    }
                });

                // Event listener for rotating chevron icons on btn-toggle click
                rotateButtons.forEach((button) => {
                    button.addEventListener('click', function () {
                        this.classList.toggle('collapsed');
                        rotateChevron(this);
                        if (sidebar.classList.contains('collapsed')) {
                            sidebar.classList.remove('collapsed');
                            content.classList.remove('collapsed');
                            icon.classList.remove('fa-bars');
                            icon.classList.add('fa-times');
                        } else {
                            closeOpenBtnToggle();
                        }
                    });
                });

                // Event listener for toggling the notification popover
                notificationButton.addEventListener('click', () => {
                    popover.style.display = popover.style.display === 'block' ? 'none' : 'block';
                });
                     // Check screen width and collapse/expand sidebar accordingly
                     function checkScreenWidth() {
                    if (window.innerWidth <= 768) { // Adjust the breakpoint as needed
                        sidebar.classList.add('collapsed');
                        content.classList.add('collapsed');
                        icon.classList.add('fa-bars');
                        icon.classList.remove('fa-times');
                    } else {
                        sidebar.classList.remove('collapsed');
                        content.classList.remove('collapsed');
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    }
                }

                // Initial check on page load
                checkScreenWidth();
            }
        }
    </script>

