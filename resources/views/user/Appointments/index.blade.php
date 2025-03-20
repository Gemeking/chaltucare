@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Book an Appointment</h1>

    <!-- Appointment Form -->
    <div class="appointment-form">
      <h2>Appointment Details</h2>
      <form id="appointmentForm">
        <!-- Advisor Selection -->
        <label for="advisor_id">Select Advisor:</label>
        <select id="advisor_id" name="advisor_id" required>
          <option value="">Select Advisor</option>
          <option value="1">John Doe</option>
          <option value="2">Jane Smith</option>
        </select>

        <!-- Appointment Date & Time -->
        <label for="appointment_date">Date & Time:</label>
        <input type="datetime-local" id="appointment_date" name="appointment_date" required>

        <!-- Notes -->
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes" rows="3"></textarea>

        <!-- Submit Button -->
        <button type="submit">Book Appointment</button>
      </form>
    </div>

    <!-- Payment Form (Hidden by Default) -->
    <div id="paymentFormSection" class="payment-form-section" style="display: none;">
      <h2>Payment Details</h2>
      <form id="paymentForm">
        <!-- Receipt Upload -->
        <label for="receipt_image">Upload Payment Receipt:</label>
        <input type="file" id="receipt_image" name="receipt_image" accept="image/*" required>

        <!-- Submit Button -->
        <button type="submit">Submit Payment</button>
      </form>
    </div>

    <!-- Appointment and Payment Summary (Hidden by Default) -->
    <div id="summarySection" class="summary-section" style="display: none;">
      <h2>Appointment and Payment Summary</h2>
      <div class="summary-content">
        <p><strong>Advisor:</strong> <span id="summaryAdvisor"></span></p>
        <p><strong>Date & Time:</strong> <span id="summaryDateTime"></span></p>
        <p><strong>Status:</strong> <span id="summaryStatus"></span></p>
        <p><strong>Payment Status:</strong> <span id="summaryPaymentStatus"></span></p>
        <p><strong>Receipt:</strong> <img id="summaryReceipt" src="" alt="Receipt" width="100"></p>
      </div>
    </div>

    <!-- Previous Appointments Section -->
    <div class="previous-appointments">
      <h2>Your Previous Appointments</h2>
      <table id="previousAppointmentsTable">
        <thead>
          <tr>
            <th>Advisor</th>
            <th>Date & Time</th>
            <th>Status</th>
            <th>Payment Status</th>
            <th>Receipt</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be populated dynamically using JavaScript -->
        </tbody>
      </table>
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

    .appointment-form, .payment-form-section, .summary-section, .previous-appointments {
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    input, select, textarea, button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
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

    .summary-content img {
      border: 2px solid #28a745;
      border-radius: 4px;
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

    .dark-theme input, .dark-theme select, .dark-theme textarea, .dark-theme button {
      background-color: #333;
      color: #ffffff;
      border-color: #555;
    }

    .dark-theme .summary-content img {
      border-color: #4caf50;
    }

    .dark-theme table th, .dark-theme table td {
      border-color: #555;
    }

    .dark-theme table th {
      background-color: #333;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
      .container {
        width: 95%;
        padding: 10px;
      }

      h1, h2 {
        font-size: 1.5rem;
      }

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
    let appointments = [];
    let payments = [];

    // DOM Elements
    const appointmentForm = document.getElementById("appointmentForm");
    const paymentFormSection = document.getElementById("paymentFormSection");
    const paymentForm = document.getElementById("paymentForm");
    const summarySection = document.getElementById("summarySection");
    const summaryAdvisor = document.getElementById("summaryAdvisor");
    const summaryDateTime = document.getElementById("summaryDateTime");
    const summaryStatus = document.getElementById("summaryStatus");
    const summaryPaymentStatus = document.getElementById("summaryPaymentStatus");
    const summaryReceipt = document.getElementById("summaryReceipt");
    const previousAppointmentsTable = document.getElementById("previousAppointmentsTable").getElementsByTagName("tbody")[0];

    // Render Previous Appointments
    function renderPreviousAppointments() {
      previousAppointmentsTable.innerHTML = "";

      appointments.forEach((appointment) => {
        const payment = payments.find((p) => p.appointment_id === appointment.appointment_id);
        const row = document.createElement("tr");
        row.innerHTML = `
          <td data-label="Advisor">${appointment.advisor}</td>
          <td data-label="Date & Time">${new Date(appointment.appointment_date).toLocaleString()}</td>
          <td data-label="Status">${appointment.status}</td>
          <td data-label="Payment Status">${payment ? payment.status : "N/A"}</td>
          <td data-label="Receipt">
            ${payment ? `<img src="${payment.receipt_image_url}" alt="Receipt" width="50">` : "N/A"}
          </td>
        `;
        previousAppointmentsTable.appendChild(row);
      });
    }

    // Appointment Form Submission
    appointmentForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const advisorId = document.getElementById("advisor_id").value;
      const appointmentDate = document.getElementById("appointment_date").value;
      const notes = document.getElementById("notes").value;

      // Simulate creating an appointment (Replace with actual API call)
      const newAppointment = {
        appointment_id: appointments.length + 1,
        user_id: 1, // Replace with logged-in user ID
        advisor_id: advisorId,
        advisor: advisorId === "1" ? "John Doe" : "Jane Smith",
        appointment_date: appointmentDate,
        status: "pending",
        notes,
      };
      appointments.push(newAppointment);

      // Show Payment Form
      appointmentForm.style.display = "none";
      paymentFormSection.style.display = "block";
    });

    // Payment Form Submission
    paymentForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const receiptImage = document.getElementById("receipt_image").files[0];

      if (!receiptImage) {
        alert("Please upload a receipt!");
        return;
      }

      // Simulate creating a payment (Replace with actual API call)
      const newPayment = {
        payment_id: payments.length + 1,
        user_id: 1, // Replace with logged-in user ID
        appointment_id: appointments[appointments.length - 1].appointment_id,
        receipt_image_url: URL.createObjectURL(receiptImage),
        status: "pending",
        verified_by: null,
        verified_at: null,
      };
      payments.push(newPayment);

      // Show Summary
      paymentFormSection.style.display = "none";
      summarySection.style.display = "block";

      // Populate Summary
      const latestAppointment = appointments[appointments.length - 1];
      summaryAdvisor.textContent = latestAppointment.advisor;
      summaryDateTime.textContent = new Date(latestAppointment.appointment_date).toLocaleString();
      summaryStatus.textContent = latestAppointment.status;
      summaryPaymentStatus.textContent = newPayment.status;
      summaryReceipt.src = newPayment.receipt_image_url;

      // Render Previous Appointments
      renderPreviousAppointments();
    });

    // Initial Render
    renderPreviousAppointments();
  </script>
@endsection