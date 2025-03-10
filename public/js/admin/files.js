 // Sample Data (Replace with API calls in a real application)
 const users = [
    { id: 1, name: "user 1" },
    { id: 2, name: "user 2" },
    { id: 3, name: "user 3" },
  ];

  const fileHistory = [
    {
      file_id: 1,
      file_name: "report.pdf",
      sender: "Admin",
      receiver: "Doctor 1",
      sent_at: "2023-10-01 10:00 AM",
    },
    {
      file_id: 2,
      file_name: "prescription.docx",
      sender: "Doctor 2",
      receiver: "Admin",
      sent_at: "2023-10-02 11:30 AM",
    },
  ];

  // DOM Elements
  const userSearchInput = document.getElementById("user-search-input");
  const userList = document.getElementById("user-list");
  const fileInput = document.getElementById("file-input");
  const sendFileBtn = document.getElementById("send-file-btn");
  const fileHistoryBody = document.getElementById("file-history-body");

  let selectedUser = null;

  // Function to render users
  function renderUsers(filteredUsers = users) {
    userList.innerHTML = ""; // Clear existing users

    filteredUsers.forEach((user) => {
      const userDiv = document.createElement("div");
      userDiv.textContent = user.name;
      userDiv.addEventListener("click", () => {
        selectedUser = user;
        alert(`Selected user: ${user.name}`);
      });
      userList.appendChild(userDiv);
    });
  }

  // Function to filter users based on search input
  function filterUsers() {
    const searchTerm = userSearchInput.value.toLowerCase();
    const filteredUsers = users.filter((user) =>
      user.name.toLowerCase().includes(searchTerm)
    );
    renderUsers(filteredUsers);
  }

  // Function to render file history
  function renderFileHistory() {
    fileHistoryBody.innerHTML = ""; // Clear existing rows

    fileHistory.forEach((file) => {
      const row = document.createElement("tr");

      row.innerHTML = `
        <td>${file.file_name}</td>
        <td>${file.sender}</td>
        <td>${file.receiver}</td>
        <td>${file.sent_at}</td>
        <td class="file-action">
          <button onclick="downloadFile(${file.file_id})"><i class="fas fa-download"></i></button>
          <button onclick="deleteFile(${file.file_id})"><i class="fas fa-trash"></i></button>
        </td>
      `;

      fileHistoryBody.appendChild(row);
    });
  }

  // Function to handle file upload
  sendFileBtn.addEventListener("click", () => {
    const file = fileInput.files[0];
    if (file && selectedUser) {
      const newFile = {
        file_id: fileHistory.length + 1,
        file_name: file.name,
        sender: "Admin",
        receiver: selectedUser.name,
        sent_at: new Date().toLocaleString(),
      };

      fileHistory.push(newFile);
      renderFileHistory();
      alert(`File sent to ${selectedUser.name} successfully!`);
      fileInput.value = ""; // Clear the file input
    } else {
      alert("Please select a file and a user to send.");
    }
  });

  // Function to simulate file download
  function downloadFile(fileId) {
    const file = fileHistory.find((f) => f.file_id === fileId);
    if (file) {
      alert(`Downloading ${file.file_name}...`);
      // Simulate download (replace with actual file download logic)
    }
  }

  // Function to simulate file deletion
  function deleteFile(fileId) {
    const index = fileHistory.findIndex((f) => f.file_id === fileId);
    if (index !== -1) {
      fileHistory.splice(index, 1);
      renderFileHistory();
      alert("File deleted successfully!");
    }
  }

  // Initial render
  renderUsers();
  renderFileHistory();
