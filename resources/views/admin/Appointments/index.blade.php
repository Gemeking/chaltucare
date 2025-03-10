<link rel="stylesheet" href="{{ asset('css/admin/appointments.css') }}">
</head>
<body>
  <!-- Main Content -->
  <div class="main-content">
    <h1><i class="fas fa-calendar-alt me-2"></i>Appointments Management</h1>

    <!-- Appointment Filters -->
    <div class="filters">
      <input type="text" id="search" placeholder="Search by user or advisor...">
      <select id="status-filter">
        <option value="all">All Statuses</option>
        <option value="pending">Pending</option>
        <option value="confirmed">Confirmed</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
      </select>
      <button id="filter-btn">Apply Filters</button>
    </div>

    <!-- Appointment Table -->
    <table id="appointments-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Advisor</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Rows will be dynamically added here -->
      </tbody>
    </table>

    <!-- Add Appointment Form -->
    <div class="form-container">
      <h2><i class="fas fa-plus-circle me-2"></i>Add New Appointment</h2>
      <form id="add-appointment-form">
        <label for="user-id">User ID:</label>
        <input type="text" id="user-id" required>

        <label for="advisor-id">Advisor ID:</label>
        <input type="text" id="advisor-id" required>

        <label for="appointment-date">Date:</label>
        <input type="datetime-local" id="appointment-date" required>

        <label for="appointment-status">Status:</label>
        <select id="appointment-status">
          <option value="pending">Pending</option>
          <option value="confirmed">Confirmed</option>
          <option value="completed">Completed</option>
          <option value="cancelled">Cancelled</option>
        </select>

        <button type="submit">Add Appointment</button>
      </form>
    </div>
  </div>

  <script>
    // Sample Data (Replace with API calls in a real application)
    let appointments = [
      {
        id: 1,
        user: "John Doe",
        advisor: "Jane Smith",
        date: "2023-10-25T10:00",
        status: "pending",
      },
      {
        id: 2,
        user: "Alice Johnson",
        advisor: "Bob Brown",
        date: "2023-10-26T14:00",
        status: "confirmed",
      },
      {
        id: 3,
        user: "Charlie Davis",
        advisor: "Eve White",
        date: "2023-10-27T09:00",
        status: "completed",
      },
    ];

    // Function to render appointments in the table
    function renderAppointments(filteredAppointments) {
      const tbody = document.querySelector("#appointments-table tbody");
      tbody.innerHTML = ""; // Clear existing rows

      filteredAppointments.forEach((appointment) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${appointment.id}</td>
          <td>${appointment.user}</td>
          <td>${appointment.advisor}</td>
          <td>${new Date(appointment.date).toLocaleString()}</td>
          <td>${appointment.status}</td>
          <td class="action-buttons">
            <button class="edit-btn" onclick="editAppointment(${appointment.id})">
              <i class="fas fa-edit"></i> Edit
            </button>
            <button class="delete-btn" onclick="deleteAppointment(${appointment.id})">
              <i class="fas fa-trash"></i> Delete
            </button>
          </td>
        `;
        tbody.appendChild(row);
      });
    }

    // Function to filter appointments
    function filterAppointments() {
      const searchText = document.getElementById("search").value.toLowerCase();
      const statusFilter = document.getElementById("status-filter").value;

      const filtered = appointments.filter((appointment) => {
        const matchesSearch =
          appointment.user.toLowerCase().includes(searchText) ||
          appointment.advisor.toLowerCase().includes(searchText);
        const matchesStatus =
          statusFilter === "all" || appointment.status === statusFilter;
        return matchesSearch && matchesStatus;
      });

      renderAppointments(filtered);
    }

    // Function to add a new appointment
    document
      .getElementById("add-appointment-form")
      .addEventListener("submit", (e) => {
        e.preventDefault();
        const user = document.getElementById("user-id").value;
        const advisor = document.getElementById("advisor-id").value;
        const date = document.getElementById("appointment-date").value;
        const status = document.getElementById("appointment-status").value;

        const newAppointment = {
          id: appointments.length + 1,
          user,
          advisor,
          date,
          status,
        };

        appointments.push(newAppointment);
        renderAppointments(appointments);
        e.target.reset(); // Clear the form
      });

    // Function to edit an appointment
    function editAppointment(id) {
      const appointment = appointments.find((a) => a.id === id);
      if (appointment) {
        document.getElementById("user-id").value = appointment.user;
        document.getElementById("advisor-id").value = appointment.advisor;
        document.getElementById("appointment-date").value = appointment.date;
        document.getElementById("appointment-status").value = appointment.status;
      }
    }

    // Function to delete an appointment
    function deleteAppointment(id) {
      appointments = appointments.filter((a) => a.id !== id);
      renderAppointments(appointments);
    }

    // Initial render
    renderAppointments(appointments);

    // Event listeners for filters
    document.getElementById("filter-btn").addEventListener("click", filterAppointments);
    document.getElementById("search").addEventListener("input", filterAppointments);
    document.getElementById("status-filter").addEventListener("change", filterAppointments);
  </script>
</body>
</html>