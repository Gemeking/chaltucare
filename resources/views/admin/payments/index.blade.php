<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        .container-fluid {
            padding: 20px;
        }

        h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Card Styles */
        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.2);
            border-bottom: none;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
        }

        /* Table Styles */
        .table {
            color: #fff;
        }

        .table thead th {
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        .table tbody tr {
            background-color: rgba(255, 255, 255, 0.05);
            transition: background 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Badge Styles */
        .badge.bg-warning {
            background-color: #ffc107 !important;
            color: #000;
        }

        .badge.bg-success {
            background-color: #28a745 !important;
        }

        .badge.bg-danger {
            background-color: #dc3545 !important;
        }

        /* Button Styles */
        .btn-verify {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            transition: background 0.3s ease;
        }

        .btn-verify:hover {
            background-color: #218838;
        }

        .btn-reject {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            transition: background 0.3s ease;
        }

        .btn-reject:hover {
            background-color: #c82333;
        }

        /* Modal Styles */
        .modal-content {
            background-color: #1a1a1a;
            color: #fff;
            border-radius: 10px;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Nav Tabs */
        .nav-tabs .nav-link {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background-color: #3498db;
            color: #fff;
        }

        .nav-tabs .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2><i class="fas fa-money-check-alt me-2"></i>Payment Verification</h2>

                <!-- Tabs for Pending, Verified, and Rejected Payments -->
                <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="verified-tab" data-bs-toggle="tab" data-bs-target="#verified" type="button" role="tab" aria-controls="verified" aria-selected="false">Verified</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="paymentTabsContent">
                    <!-- Pending Payments -->
                    <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Pending Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User ID</th>
                                                <th>Appointment ID</th>
                                                <th>Receipt Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample Pending Payment 1 -->
                                            <tr>
                                                <td>1</td>
                                                <td>101</td>
                                                <td>201</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                        <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                                    </a>
                                                </td>
                                                <td><span class="badge bg-warning">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-verify btn-sm me-2" onclick="verifyPayment(1)">
                                                        <i class="fas fa-check"></i> Verify
                                                    </button>
                                                    <button class="btn btn-reject btn-sm" onclick="rejectPayment(1)">
                                                        <i class="fas fa-times"></i> Reject
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Verified Payments -->
                    <div class="tab-pane fade" id="verified" role="tabpanel" aria-labelledby="verified-tab">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Verified Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User ID</th>
                                                <th>Appointment ID</th>
                                                <th>Receipt Image</th>
                                                <th>Status</th>
                                                <th>Verified By</th>
                                                <th>Verified At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample Verified Payment 1 -->
                                            <tr>
                                                <td>2</td>
                                                <td>102</td>
                                                <td>202</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                        <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                                    </a>
                                                </td>
                                                <td><span class="badge bg-success">Verified</span></td>
                                                <td>Admin 1</td>
                                                <td>2023-10-01 12:34:56</td>
                                                <td>
                                                    <button class="btn btn-reject btn-sm" onclick="rejectPayment(2)">
                                                        <i class="fas fa-times"></i> Reject
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rejected Payments -->
                    <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Rejected Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User ID</th>
                                                <th>Appointment ID</th>
                                                <th>Receipt Image</th>
                                                <th>Status</th>
                                                <th>Rejected By</th>
                                                <th>Rejected At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample Rejected Payment 1 -->
                                            <tr>
                                                <td>3</td>
                                                <td>103</td>
                                                <td>203</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                        <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                                    </a>
                                                </td>
                                                <td><span class="badge bg-danger">Rejected</span></td>
                                                <td>Admin 2</td>
                                                <td>2023-10-02 14:56:78</td>
                                                <td>
                                                    <button class="btn btn-verify btn-sm" onclick="verifyPayment(3)">
                                                        <i class="fas fa-check"></i> Verify
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Image Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptModalLabel">Receipt Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="receiptImage" src="" alt="Receipt" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Function to verify a payment
        function verifyPayment(paymentId) {
            if (confirm('Are you sure you want to verify this payment?')) {
                console.log(`Payment ${paymentId} verified.`);
                alert(`Payment ${paymentId} has been verified.`);
                location.reload(); // Reload the page for demonstration
            }
        }

        // Function to reject a payment
        function rejectPayment(paymentId) {
            if (confirm('Are you sure you want to reject this payment?')) {
                console.log(`Payment ${paymentId} rejected.`);
                alert(`Payment ${paymentId} has been rejected.`);
                location.reload(); // Reload the page for demonstration
            }
        }

        // Function to show receipt image in modal
        function showReceipt(imageUrl) {
            document.getElementById('receiptImage').src = imageUrl;
        }
    </script>
</body>
</html>