  <link rel="stylesheet" href="{{ asset('css/admin/blog.css') }}">
  <div class="container-fluid">
    <h1><i class="fas fa-blog me-2"></i>Admin Dashboard - Blog Component</h1>

    <!-- Blog Component -->
    <div class="blog-component">
      <h3>Create and Manage Blogs</h3>

      <!-- Blog Creation Form -->
      <div class="blog-form">
        <input type="text" id="blog-title" placeholder="Blog Title">
        <textarea id="blog-content" placeholder="Blog Content"></textarea>
        <input type="text" id="blog-tags" placeholder="Tags (comma-separated)">
        <input type="text" id="blog-image-url" placeholder="Image URL (optional)">
        <button id="create-blog-btn"><i class="fas fa-plus"></i> Create Blog</button>
      </div>

      <!-- Blog List -->
      <div class="blog-list">
        <h4>Blogs</h4>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Tags</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="blog-list-body">
            <!-- Blogs will be dynamically added here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/admin/blogs.js') }}"></script>