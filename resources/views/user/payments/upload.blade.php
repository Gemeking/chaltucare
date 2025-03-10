            <!-- Upload Payment Section -->
            <div class="card shadow-sm mb-4" style="background-color: rgba(135, 206, 235, 0.8); backdrop-filter: blur(10px); border: none; border-radius: 15px;">
                <div class="card-header" style="background-color: rgba(135, 206, 235, 0.9); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="card-title mb-0 text-white">Upload New Payment</h5>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="senderName" class="form-label text-white">Sender Name</label>
                            <input type="text" class="form-control" id="senderName" name="senderName" placeholder="Enter sender's name" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label text-white">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentProof" class="form-label text-white">Payment Proof (Screenshot/Document)</label>
                            <input type="file" class="form-control" id="paymentProof" name="paymentProof" accept="image/*,.pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </form>
                </div>
            </div>
