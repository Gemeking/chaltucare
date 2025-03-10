@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Appointment Management</h1>

    <!-- Book New Appointment Form -->
    <div class="appointment-form">
      <h2>Book New Appointment</h2>
      <form id="bookAppointmentForm">
        <label for="advisor">Advisor:</label>
        <select id="advisor" name="advisor" required>
          <option value="">Select Advisor</option>
          <option value="1">John Doe</option>
          <option value="2">Jane Smith</option>
        </select>

        <label for="appointmentDate">Date & Time:</label>
        <input type="datetime-local" id="appointmentDate" name="appointmentDate" required>

        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes" rows="3"></textarea>

        <button type="submit">Book Appointment</button>
      </form>
    </div>

    <!-- Upcoming Appointments -->
    <div class="appointment-list">
      <h2>Upcoming Appointments</h2>
      <table id="upcomingAppointments">
        <thead>
          <tr>
            <th>Advisor</th>
            <th>Date & Time</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be populated dynamically using JavaScript -->
        </tbody>
      </table>
    </div>

    <!-- Past Appointments -->
    <div class="appointment-list">
      <h2>Past Appointments</h2>
      <table id="pastAppointments">
        <thead>
          <tr>
            <th>Advisor</th>
            <th>Date & Time</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows will be populated dynamically using JavaScript -->
        </tbody>
      </table>
    </div>

    <!-- Appointment Details Modal -->
    <div id="appointmentModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Appointment Details</h2>
        <p><strong>Advisor:</strong> <span id="modalAdvisor"></span></p>
        <p><strong>Date & Time:</strong> <span id="modalDateTime"></span></p>
        <p><strong>Status:</strong> <span id="modalStatus"></span></p>
        <p><strong>Notes:</strong> <span id="modalNotes"></span></p>
        <button id="joinCallButton" style="display: none;">Join Video Call</button>
        <button id="cancelAppointmentButton" style="display: none;">Cancel Appointment</button>
      </div>
    </div>
  </div>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: 20px auto;
  background: #fff;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1, h2 {
  color: #333;
}

.appointment-form {
  margin-bottom: 30px;
}

label {
  display: block;
  margin: 10px 0 5px;
}

input, select, textarea, button {
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

.appointment-list table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 30px;
}

.appointment-list th, .appointment-list td {
  padding: 10px;
  border: 1px solid #ddd;
  text-align: left;
}

.appointment-list th {
  background-color: #f8f9fa;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fff;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  border-radius: 5px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover {
  color: #000;
}
</style>
<script>
// Sample Data (Replace with actual data from backend)
const appointments = [
  {
    id: 1,
    advisor: "John Doe",
    dateTime: "2023-10-15T10:00",
    status: "Confirmed",
    notes: "Discuss career options.",
    isUpcoming: true,
  },
  {
    id: 2,
    advisor: "Jane Smith",
    dateTime: "2023-09-25T11:00",
    status: "Completed",
    notes: "Reviewed resume.",
    isUpcoming: false,
  },
];

// DOM Elements
const bookAppointmentForm = document.getElementById("bookAppointmentForm");
const upcomingAppointmentsTable = document.getElementById("upcomingAppointments").getElementsByTagName("tbody")[0];
const pastAppointmentsTable = document.getElementById("pastAppointments").getElementsByTagName("tbody")[0];
const modal = document.getElementById("appointmentModal");
const closeModal = document.querySelector(".close");
const modalAdvisor = document.getElementById("modalAdvisor");
const modalDateTime = document.getElementById("modalDateTime");
const modalStatus = document.getElementById("modalStatus");
const modalNotes = document.getElementById("modalNotes");
const joinCallButton = document.getElementById("joinCallButton");
const cancelAppointmentButton = document.getElementById("cancelAppointmentButton");

// Render Appointments
function renderAppointments() {
  upcomingAppointmentsTable.innerHTML = "";
  pastAppointmentsTable.innerHTML = "";

  appointments.forEach((appointment) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${appointment.advisor}</td>
      <td>${new Date(appointment.dateTime).toLocaleString()}</td>
      <td>${appointment.status}</td>
      <td><button onclick="viewAppointmentDetails(${appointment.id})">View Details</button></td>
    `;

    if (appointment.isUpcoming) {
      upcomingAppointmentsTable.appendChild(row);
    } else {
      pastAppointmentsTable.appendChild(row);
    }
  });
}

// View Appointment Details
function viewAppointmentDetails(id) {
  const appointment = appointments.find((a) => a.id === id);
  if (appointment) {
    modalAdvisor.textContent = appointment.advisor;
    modalDateTime.textContent = new Date(appointment.dateTime).toLocaleString();
    modalStatus.textContent = appointment.status;
    modalNotes.textContent = appointment.notes;

    // Show/Hide buttons based on status
    if (appointment.status === "Confirmed" && appointment.isUpcoming) {
      joinCallButton.style.display = "inline-block";
      cancelAppointmentButton.style.display = "inline-block";
    } else {
      joinCallButton.style.display = "none";
      cancelAppointmentButton.style.display = "none";
    }

    modal.style.display = "block";
  }
}

// Close Modal
closeModal.onclick = () => {
  modal.style.display = "none";
};

// Book Appointment Form Submission
bookAppointmentForm.onsubmit = (e) => {
  e.preventDefault();
  const advisor = document.getElementById("advisor").value;
  const dateTime = document.getElementById("appointmentDate").value;
  const notes = document.getElementById("notes").value;

  // Add new appointment to the list
  appointments.push({
    id: appointments.length + 1,
    advisor: advisor === "1" ? "John Doe" : "Jane Smith",
    dateTime,
    status: "Pending",
    notes,
    isUpcoming: true,
  });

  renderAppointments();
  bookAppointmentForm.reset();
};

// Initial Render
renderAppointments();
</script>
@endsection