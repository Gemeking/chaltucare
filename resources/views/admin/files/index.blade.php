  <link rel="stylesheet" href="{{ asset('css/admin/files.css') }}">
  <div class="container-fluid">
    <h1><i class="fas fa-file me-2"></i>Files</h1>

    <!-- File Component -->
    <div class="file-component">
      <h3>Send and Receive Files</h3>

      <!-- User Search and Selection -->
      <div class="user-search">
        <input type="text" id="user-search-input" placeholder="Search users..." oninput="filterUsers()">
      </div>
      <div class="user-list" id="user-list">
        <!-- Users will be dynamically added here -->
      </div>

      <!-- File Upload Form -->
      <div class="file-form">
        <input type="file" id="file-input" accept=".pdf,.doc,.docx,.jpg,.png">
        <button id="send-file-btn"><i class="fas fa-upload"></i> Send File</button>
      </div>

      <!-- File History -->
      <div class="file-history">
        <h4>File History</h4>
        <table>
          <thead>
            <tr>
              <th>File Name</th>
              <th>Sender</th>
              <th>Receiver</th>
              <th>Sent At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="file-history-body">
            <!-- File history rows will be dynamically added here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/admin/files.js') }}"></script>
