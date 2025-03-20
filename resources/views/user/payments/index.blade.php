@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Payment Management</h1>

    <!-- Upload Payment Receipt Section -->
    <div class="upload-payment-section">
      <h2>Upload Payment Receipt</h2>
      <form id="uploadPaymentForm">
        <!-- Appointment Selection -->
        <label for="appointment_id">Select Appointment:</label>
        <select id="appointment_id" name="appointment_id" required>
          <option value="">Select Appointment</option>
          <!-- Populate with user's appointments -->
          <option value="1">Appointment #1 - 2023-10-15 10:00 AM</option>
          <option value="2">Appointment #2 - 2023-10-20 02:00 PM</option>
        </select>

        <!-- Receipt Upload -->
        <label for="receipt_image">Upload Receipt:</label>
        <input type="file" id="receipt_image" name="receipt_image" accept="image/*" required>

        <!-- Submit Button -->
        <button type="submit">Upload Receipt</button>
      </form>
    </div>

    <!-- Payment History Section -->
    <div class="payment-history-section">
      <h2>Payment History</h2>
      <table id="paymentHistory">
        <thead>
          <tr>
            <th>Appointment</th>
            <th>Receipt</th>
            <th>Status</th>
            <th>Verified By</th>
            <th>Verified At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be populated dynamically using JavaScript -->
        </tbody>
      </table>
    </div>

    <!-- Receipt Pop-up -->
    <div id="receiptPopup" class="receipt-popup">
      <span class="close-popup" onclick="closeReceiptPopup()">&times;</span>
      <img id="popupReceipt" src="" alt="Enlarged Receipt">
    </div>
  </div>

  <style>
    /* Light Theme (Default) */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
      color: #28a745;
    }

    .upload-payment-section, .payment-history-section {
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    input, select, button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f8f9fa;
    }

    /* Receipt Pop-up */
    .receipt-popup {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
      text-align: center;
    }

    .receipt-popup img {
      max-width: 90%;
      max-height: 90%;
      margin-top: 5%;
    }

    .close-popup {
      position: absolute;
      top: 20px;
      right: 30px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }

    .close-popup:hover {
      color: #ccc;
    }

    /* Dark Theme */
    body.dark-theme {
      background-color: #121212;
      color: #ffffff;
    }

    .dark-theme .container {
      background-color: #1f1f1f;
      color: #ffffff;
    }

    .dark-theme h1, .dark-theme h2 {
      color: #4caf50;
    }

    .dark-theme input, .dark-theme select, .dark-theme button {
      background-color: #333;
      color: #ffffff;
      border-color: #555;
    }

    .dark-theme table th, .dark-theme table td {
      border-color: #555;
    }

    .dark-theme table th {
      background-color: #333;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      th {
        display: none;
      }

      tr {
        margin-bottom: 10px;
        border: 1px solid #ddd;
      }

      td {
        border: none;
        position: relative;
        padding-left: 50%;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: bold;
      }
    }
  </style>

  <script>
    // Sample Data (Replace with actual data from backend)
    const payments = [
      {
        payment_id: 1,
        appointment_id: 1,
        receipt_image_url: "{{ asset('images/receipt1.jpg') }}",
        status: "verified",
        verified_by: "Admin",
        verified_at: "2023-10-15 10:30 AM",
      },
      {
        payment_id: 2,
        appointment_id: 2,
        receipt_image_url: "{{ asset('images/receipt2.jpg') }}",
        status: "pending",
        verified_by: null,
        verified_at: null,
      },
    ];

    // DOM Elements
    const uploadPaymentForm = document.getElementById("uploadPaymentForm");
    const paymentHistoryTable = document.getElementById("paymentHistory").getElementsByTagName("tbody")[0];
    const receiptPopup = document.getElementById("receiptPopup");
    const popupReceipt = document.getElementById("popupReceipt");

    // Render Payment History
    function renderPaymentHistory() {
      paymentHistoryTable.innerHTML = "";

      payments.forEach((payment) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td data-label="Appointment">Appointment #${payment.appointment_id}</td>
          <td data-label="Receipt">
            <img src="${payment.receipt_image_url}" alt="Receipt" width="50" onclick="openReceiptPopup('${payment.receipt_image_url}')">
          </td>
          <td data-label="Status">${payment.status}</td>
          <td data-label="Verified By">${payment.verified_by || "N/A"}</td>
          <td data-label="Verified At">${payment.verified_at || "N/A"}</td>
          <td data-label="Actions">
            ${payment.status === "pending" ? `<button onclick="verifyPayment(${payment.payment_id})">Verify</button>` : ""}
            ${payment.status === "pending" ? `<button onclick="rejectPayment(${payment.payment_id})">Reject</button>` : ""}
          </td>
        `;
        paymentHistoryTable.appendChild(row);
      });
    }

    // Upload Payment Form Submission
    uploadPaymentForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const appointmentId = document.getElementById("appointment_id").value;
      const receiptImage = document.getElementById("receipt_image").files[0];

      if (!appointmentId || !receiptImage) {
        alert("Please fill out all fields!");
        return;
      }

      // Simulate uploading payment (Replace with actual API call)
      const newPayment = {
        payment_id: payments.length + 1,
        appointment_id: appointmentId,
        receipt_image_url: URL.createObjectURL(receiptImage),
        status: "pending",
        verified_by: null,
        verified_at: null,
      };
      payments.push(newPayment);
      renderPaymentHistory();
      alert("Payment receipt uploaded successfully!");
    });

    // Verify Payment
    function verifyPayment(paymentId) {
      const payment = payments.find((p) => p.payment_id === paymentId);
      if (payment) {
        payment.status = "verified";
        payment.verified_by = "Admin";
        payment.verified_at = new Date().toLocaleString();
        renderPaymentHistory();
        alert("Payment verified successfully!");
      }
    }

    // Reject Payment
    function rejectPayment(paymentId) {
      const payment = payments.find((p) => p.payment_id === paymentId);
      if (payment) {
        payment.status = "rejected";
        payment.verified_by = "Admin";
        payment.verified_at = new Date().toLocaleString();
        renderPaymentHistory();
        alert("Payment rejected!");
      }
    }

    // Receipt Pop-up Logic
    function openReceiptPopup(src) {
      popupReceipt.src = src;
      receiptPopup.style.display = "block";
    }

    function closeReceiptPopup() {
      receiptPopup.style.display = "none";
    }

    // Initial Render
    renderPaymentHistory();
  </script>
@endsection