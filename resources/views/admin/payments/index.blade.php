
    <title>Payment Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/payment.css') }}">

</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4"><i class="fas fa-money-check-alt me-2"></i>Payment Verification</h2>
                
                <!-- Doctor Profile Section -->
                <div class="doctor-profile">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Dr. Chaltu Regassa">
                        </div>
                        <div class="col-md-10">
                            <h3><i class="fas fa-user-md me-2"></i>Dr. Chaltu Regassa</h3>
                            <p class="mb-2"><i class="fas fa-graduation-cap me-2"></i>MD, Gondar University, Ethiopia</p>
                            <p class="mb-0"><i class="fas fa-heart me-2"></i>Specializing in Online Health Counseling</p>
                        </div>
                    </div>
                </div>

                <!-- Payment System Information -->
                <div class="payment-system-info mb-4">
                    <h4><i class="fas fa-info-circle me-2"></i>About Our Payment System</h4>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-shield-alt"></i>
                                <h5 class="mt-2">Secure Payments</h5>
                                <p class="small">All transactions are encrypted and secure</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-clock"></i>
                                <h5 class="mt-2">24/7 Verification</h5>
                                <p class="small">Our team verifies payments around the clock</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <h5 class="mt-2">Receipt Tracking</h5>
                                <p class="small">All payment receipts are stored securely</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs for Payment Status -->
                <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">
                            <i class="fas fa-clock me-1"></i> Pending
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="verified-tab" data-bs-toggle="tab" data-bs-target="#verified" type="button" role="tab">
                            <i class="fas fa-check-circle me-1"></i> Verified
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">
                            <i class="fas fa-times-circle me-1"></i> Rejected
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="paymentTabsContent">
                    <!-- Pending Payments -->
                    <div class="tab-pane fade show active" id="pending" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-hourglass-half me-2"></i>Pending Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User</th>
                                                <th>Appointment</th>
                                                <th>Amount</th>
                                                <th>Receipt</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#PAY-1001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-2" width="30" height="30">
                                                        <span>Jane Smith</span>
                                                    </div>
                                                </td>
                                                <td>Consultation - Oct 15</td>
                                                <td>$120.00</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/600x400')">
                                                        <img src="https://via.placeholder.com/600x400" alt="Receipt" class="receipt-thumbnail">
                                                    </a>
                                                </td>
                                                <td><span class="badge badge-pending">Pending</span></td>
                                                <td>
                                                    <button class="btn btn-verify btn-sm me-2" onclick="verifyPayment(1)">
                                                        <i class="fas fa-check me-1"></i> Verify
                                                    </button>
                                                    <button class="btn btn-reject btn-sm" onclick="rejectPayment(1)">
                                                        <i class="fas fa-times me-1"></i> Reject
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Verified Payments -->
                    <div class="tab-pane fade" id="verified" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-check-circle me-2"></i>Verified Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User</th>
                                                <th>Appointment</th>
                                                <th>Amount</th>
                                                <th>Receipt</th>
                                                <th>Status</th>
                                                <th>Verified By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#PAY-1002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="30" height="30">
                                                        <span>John Doe</span>
                                                    </div>
                                                </td>
                                                <td>Follow-up - Oct 10</td>
                                                <td>$80.00</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/600x400')">
                                                        <img src="https://via.placeholder.com/600x400" alt="Receipt" class="receipt-thumbnail">
                                                    </a>
                                                </td>
                                                <td><span class="badge badge-verified">Verified</span></td>
                                                <td>Admin (You)</td>
                                                <td>
                                                    <button class="btn btn-reject btn-sm" onclick="rejectPayment(2)">
                                                        <i class="fas fa-times me-1"></i> Reject
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rejected Payments -->
                    <div class="tab-pane fade" id="rejected" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-times-circle me-2"></i>Rejected Payments</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                <th>User</th>
                                                <th>Appointment</th>
                                                <th>Amount</th>
                                                <th>Receipt</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#PAY-1003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-2" width="30" height="30">
                                                        <span>Sarah Johnson</span>
                                                    </div>
                                                </td>
                                                <td>Consultation - Oct 5</td>
                                                <td>$120.00</td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receiptModal" onclick="showReceipt('https://via.placeholder.com/600x400')">
                                                        <img src="https://via.placeholder.com/600x400" alt="Receipt" class="receipt-thumbnail">
                                                    </a>
                                                </td>
                                                <td><span class="badge badge-rejected">Rejected</span></td>
                                                <td>Unclear receipt</td>
                                                <td>
                                                    <button class="btn btn-verify btn-sm" onclick="verifyPayment(3)">
                                                        <i class="fas fa-check me-1"></i> Verify
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Details Sidebar -->
            <div class="col-lg-4">
                <div class="payment-details">
                    <h4><i class="fas fa-chart-line me-2"></i>Payment Statistics</h4>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-clock text-warning me-2"></i>Pending</span>
                            <strong>5 Payments</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-check-circle text-success me-2"></i>Verified</span>
                            <strong>42 Payments</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-times-circle text-danger me-2"></i>Rejected</span>
                            <strong>3 Payments</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-dollar-sign text-primary me-2"></i>Total Revenue</span>
                            <strong>$5,240.00</strong>
                        </div>
                    </div>
                </div>

                <div class="payment-details">
                    <h4><i class="fas fa-question-circle me-2"></i>Verification Guidelines</h4>
                    <ul class="mt-3" style="padding-left: 20px;">
                        <li class="mb-2">Check receipt matches appointment details</li>
                        <li class="mb-2">Verify payment amount is correct</li>
                        <li class="mb-2">Ensure receipt is clear and readable</li>
                        <li class="mb-2">Confirm payment date is valid</li>
                        <li>Reject with clear reason if unsure</li>
                    </ul>
                </div>

                <div class="payment-details">
                    <h4><i class="fas fa-user-md me-2"></i>About Dr. Chaltu Regassa</h4>
                    <p class="mt-3">
                        Hello! I'm Dr. Chaltu Regassa, a graduate of Gondar University, Ethiopia, specializing in online health counseling. 
                        With over 8 years of experience, I provide professional and compassionate care to patients worldwide.
                    </p>
                    <p>
                        Our payment verification system ensures transparency and security for all transactions related to my practice.
                    </p>
                    <div class="d-flex">
                        <span class="me-3"><i class="fas fa-star text-warning me-1"></i>4.9/5</span>
                        <span class="me-3"><i class="fas fa-user-friends text-primary me-1"></i>1,240+ Patients</span>
                        <span><i class="fas fa-globe text-success me-1"></i>Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Image Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-receipt me-2"></i>Payment Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="receiptImage" src="" alt="Receipt" class="img-fluid rounded">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Close
                    </button>
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
                // In a real app, you would make an API call here
                showToast(`Payment #${paymentId} verified successfully`, 'success');
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        }

        // Function to reject a payment
        function rejectPayment(paymentId) {
            const reason = prompt('Please enter the reason for rejection:');
            if (reason) {
                // In a real app, you would make an API call here
                showToast(`Payment #${paymentId} rejected: ${reason}`, 'warning');
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        }

        // Function to show receipt image in modal
        function showReceipt(imageUrl) {
            document.getElementById('receiptImage').src = imageUrl;
        }

        // Toast notification function
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast show align-items-center text-white bg-${type}`;
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.style.borderRadius = '8px';
            toast.style.padding = '10px 20px';
            toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
                    <strong>${message}</strong>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
    </script>
</body>