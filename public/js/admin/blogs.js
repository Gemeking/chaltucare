let blogs = [
    {
      blog_id: 1,
      admin_id: 1,
      title: "Introduction to AI",
      content: "Artificial Intelligence is transforming the world...",
      image_url: "https://via.placeholder.com/150",
      tags: "AI, Technology",
      created_at: "2023-10-01 10:00 AM",
      updated_at: "2023-10-01 10:00 AM",
    },
    {
      blog_id: 2,
      admin_id: 1,
      title: "Web Development Trends",
      content: "The latest trends in web development include...",
      image_url: "https://via.placeholder.com/150",
      tags: "Web, Development",
      created_at: "2023-10-02 11:30 AM",
      updated_at: "2023-10-02 11:30 AM",
    },
  ];

  // DOM Elements
  const blogTitle = document.getElementById("blog-title");
  const blogContent = document.getElementById("blog-content");
  const blogTags = document.getElementById("blog-tags");
  const blogImageUrl = document.getElementById("blog-image-url");
  const createBlogBtn = document.getElementById("create-blog-btn");
  const blogListBody = document.getElementById("blog-list-body");

  // Function to render blogs
  function renderBlogs() {
    blogListBody.innerHTML = ""; // Clear existing blogs

    blogs.forEach((blog) => {
      const row = document.createElement("tr");

      row.innerHTML = `
        <td>${blog.title}</td>
        <td>${blog.content.substring(0, 50)}...</td>
        <td>${blog.tags}</td>
        <td><img src="${blog.image_url}" alt="${blog.title}" width="50"></td>
        <td class="blog-actions">
          <button onclick="editBlog(${blog.blog_id})"><i class="fas fa-edit"></i></button>
          <button onclick="deleteBlog(${blog.blog_id})"><i class="fas fa-trash"></i></button>
        </td>
      `;

      blogListBody.appendChild(row);
    });
  }

  // Function to create a new blog
  createBlogBtn.addEventListener("click", () => {
    const title = blogTitle.value.trim();
    const content = blogContent.value.trim();
    const tags = blogTags.value.trim();
    const imageUrl = blogImageUrl.value.trim();

    if (title && content && tags) {
      const newBlog = {
        blog_id: blogs.length + 1,
        admin_id: 1, // Simulate admin ID (replace with actual admin ID in real app)
        title,
        content,
        image_url: imageUrl || "https://via.placeholder.com/150", // Default image if none provided
        tags,
        created_at: new Date().toLocaleString(),
        updated_at: new Date().toLocaleString(),
      };

      blogs.push(newBlog);
      renderBlogs();
      alert("Blog created successfully!");
      blogTitle.value = "";
      blogContent.value = "";
      blogTags.value = "";
      blogImageUrl.value = "";
    } else {
      alert("Please fill in all required fields.");
    }
  });

  // Function to edit a blog
  function editBlog(blogId) {
    const blog = blogs.find((b) => b.blog_id === blogId);
    if (blog) {
      blogTitle.value = blog.title;
      blogContent.value = blog.content;
      blogTags.value = blog.tags;
      blogImageUrl.value = blog.image_url;

      // Update the create button to save changes
      createBlogBtn.innerHTML = `<i class="fas fa-save"></i> Save Changes`;
      createBlogBtn.onclick = () => saveBlogChanges(blogId);
    }
  }

  // Function to save changes to a blog
  function saveBlogChanges(blogId) {
    const title = blogTitle.value.trim();
    const content = blogContent.value.trim();
    const tags = blogTags.value.trim();
    const imageUrl = blogImageUrl.value.trim();

    if (title && content && tags) {
      const blog = blogs.find((b) => b.blog_id === blogId);
      if (blog) {
        blog.title = title;
        blog.content = content;
        blog.tags = tags;
        blog.image_url = imageUrl || "https://via.placeholder.com/150";
        blog.updated_at = new Date().toLocaleString();
        renderBlogs();
        alert("Blog updated successfully!");

        // Reset the form
        blogTitle.value = "";
        blogContent.value = "";
        blogTags.value = "";
        blogImageUrl.value = "";
        createBlogBtn.innerHTML = `<i class="fas fa-plus"></i> Create Blog`;
        createBlogBtn.onclick = () => createBlogBtn.click();
      }
    } else {
      alert("Please fill in all required fields.");
    }
  }

  // Function to delete a blog
  function deleteBlog(blogId) {
    if (confirm("Are you sure you want to delete this blog?")) {
      blogs = blogs.filter((b) => b.blog_id !== blogId);
      renderBlogs();
      alert("Blog deleted successfully!");
    }
  }

  // Initial render
  renderBlogs();