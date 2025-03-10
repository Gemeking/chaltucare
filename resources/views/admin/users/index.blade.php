<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
</head>
<body>
  <!-- Main Content -->
  <div class="main-content">
    <h1><i class="fas fa-users-cog"></i> User Management</h1>

    <!-- User Filters -->
    <div class="filters">
      <input type="text" id="search" placeholder="Search by username or email...">
    </div>

    <!-- User Table -->
    <table id="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Rows will be dynamically added here -->
      </tbody>
    </table>
  </div>

  <script>
    // Sample Data (Replace with API calls in a real application)
    let users = [
      {
        id: 1,
        username: "john_doe",
        email: "john@example.com",
        role: "user",
        created_at: "2023-10-01T12:00:00",
      },
      {
        id: 2,
        username: "jane_smith",
        email: "jane@example.com",
        role: "advisor",
        created_at: "2023-10-02T14:00:00",
      },
      {
        id: 3,
        username: "admin_user",
        email: "admin@example.com",
        role: "admin",
        created_at: "2023-10-03T09:00:00",
      },
    ];

    // Function to render users in the table
    function renderUsers(filteredUsers) {
      const tbody = document.querySelector("#users-table tbody");
      tbody.innerHTML = ""; // Clear existing rows

      filteredUsers.forEach((user) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${user.id}</td>
          <td>${user.username}</td>
          <td>${user.email}</td>
          <td>${user.role}</td>
          <td>${new Date(user.created_at).toLocaleDateString()}</td>
          <td class="action-buttons">
            <button class="edit-btn" onclick="editUser(${user.id})"><i class="fas fa-edit"></i> Edit</button>
            <button class="delete-btn" onclick="deleteUser(${user.id})"><i class="fas fa-trash"></i> Delete</button>
          </td>
        `;
        tbody.appendChild(row);
      });
    }

    // Function to filter users
    function filterUsers() {
      const searchText = document.getElementById("search").value.toLowerCase();

      const filtered = users.filter((user) => {
        return (
          user.username.toLowerCase().includes(searchText) ||
          user.email.toLowerCase().includes(searchText)
        );
      });

      renderUsers(filtered);
    }

    // Function to edit a user
    function editUser(id) {
      const user = users.find((u) => u.id === id);
      if (user) {
        const newUsername = prompt("Enter new username:", user.username);
        const newEmail = prompt("Enter new email:", user.email);
        const newRole = prompt("Enter new role (admin, user, advisor):", user.role);

        if (newUsername && newEmail && newRole) {
          user.username = newUsername;
          user.email = newEmail;
          user.role = newRole;
          renderUsers(users);
          alert("User updated successfully!");
        }
      }
    }

    // Function to delete a user
    function deleteUser(id) {
      if (confirm("Are you sure you want to delete this user?")) {
        users = users.filter((u) => u.id !== id);
        renderUsers(users);
        alert("User deleted successfully!");
      }
    }

    // Initial render
    renderUsers(users);

    // Event listener for search
    document.getElementById("search").addEventListener("input", filterUsers);
  </script>
</body>
</html>