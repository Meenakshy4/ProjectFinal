<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahya Department Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="SahyaDD_CSS.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Sahya Department Dashboard</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-section="department-info">
                                <i class="fas fa-info-circle"></i> Department Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="events">
                                <i class="fas fa-calendar-alt"></i> Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="live-updates">
                                <i class="fas fa-broadcast-tower"></i> Live Updates
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="registrations">
                                <i class="fas fa-user-plus"></i> Registrations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="payments">
                                <i class="fas fa-money-bill-wave"></i> Payments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="reports">
                                <i class="fas fa-chart-bar"></i> Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-section="prize-distribution">
                                <i class="fas fa-trophy"></i> Prize Distribution
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div id="dashboard-content">
                    <!-- Dashboard content will be loaded here -->
                </div>
            </main>
        </div>
    </div>

    <!-- Modal for Add/Edit forms -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Add/Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="recordForm">
                        <!-- Form fields will be dynamically added here -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRecord">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="SahyaDD_JS.js"></script>
</body>
</html>