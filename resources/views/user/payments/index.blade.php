<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
        }
        .card {
            background-color:rgb(130, 130, 130); /* Dark gray card background */
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table {
            color: #fff; /* White text for table */
        }
        .table thead th {
            background-color: #343a40; /* Dark header background */
            color: #fff; /* White header text */
        }
        .table tbody tr {
            background-color: #262626; /* Dark row background */
        }
        .table tbody tr:hover {
            background-color: #333; /* Darker hover background */
        }
        .badge.bg-warning {
            background-color: #ffc107 !important; /* Yellow for pending */
            color: #000; /* Black text for warning badge */
        }
        .badge.bg-success {
            background-color: #28a745 !important; /* Green for verified */
        }
        .badge.bg-danger {
            background-color: #dc3545 !important; /* Red for rejected */
        }
        .modal-content {
            background-color: #1a1a1a; /* Dark modal background */
            color: #fff; /* White modal text */
        }
        .modal-body img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="my-4">My Payments</h2>

                <!-- Upload Receipt Form -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Upload Receipt</h5>
                    </div>
                    <div class="card-body">
                        <form id="uploadReceiptForm">
                            <div class="mb-3">
                                <label for="appointmentId" class="form-label">Appointment ID</label>
                                <input type="text" class="form-control" id="appointmentId" name="appointmentId" placeholder="Enter Appointment ID" required>
                            </div>
                            <div class="mb-3">
                                <label for="receiptImage" class="form-label">Upload Receipt</label>
                                <input type="file" class="form-control" id="receiptImage" name="receiptImage" accept="image/*" required>
                                <small class="form-text text-muted">Upload a clear image of your payment receipt.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i> Upload Receipt
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Payment List -->
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Payment History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Appointment ID</th>
                                        <th>Receipt Image</th>
                                        <th>Status</th>
                                        <th>Verified By</th>
                                        <th>Verified At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Payment 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>201</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                            </a>
                                        </td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <!-- Sample Payment 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>202</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                            </a>
                                        </td>
                                        <td><span class="badge bg-success">Verified</span></td>
                                        <td>Admin 1</td>
                                        <td>2023-10-01 12:34:56</td>
                                    </tr>
                                    <!-- Sample Payment 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>203</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/150')">
                                                <img src="https://via.placeholder.com/150" alt="Receipt" class="img-thumbnail" style="width: 100px;">
                                            </a>
                                        </td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                        <td>Admin 2</td>
                                        <td>2023-10-02 14:56:78</td>
                                    </tr>
                                </tbody>
                            </table>
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
        // Function to show receipt image in modal
        function showReceipt(imageUrl) {
            document.getElementById('receiptImage').src = imageUrl;
        }

        // Function to handle receipt upload
        document.getElementById('uploadReceiptForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const appointmentId = document.getElementById('appointmentId').value;
            const receiptImage = document.getElementById('receiptImage').files[0];

            if (appointmentId && receiptImage) {
                // Simulate an API call to upload the receipt
                console.log('Receipt uploaded for Appointment ID:', appointmentId);
                alert('Receipt uploaded successfully!');
                // Reset the form
                document.getElementById('uploadReceiptForm').reset();
            } else {
                alert('Please fill out all fields.');
            }
        });
    </script>
</body>
</html>