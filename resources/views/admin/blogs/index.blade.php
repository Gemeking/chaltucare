<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3182CE;
            --primary-light: rgba(49, 130, 206, 0.1);
            --secondary: #2C5282;
            --accent: #38B2AC;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --light: #F7FAFC;
            --dark: #1A202C;
            --gray: #E2E8F0;
            --text-color: #2D3748;
            --card-bg: #FFFFFF;
            --header-bg: #FFFFFF;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode {
            --text-color: #E2E8F0;
            --card-bg: #2D3748;
            --header-bg: #2D3748;
            --gray: #4A5568;
            background-color: #1A202C;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: none;
            margin-bottom: 24px;
            background-color: var(--card-bg);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .card-header {
            background-color: var(--header-bg);
            border-bottom: 1px solid var(--gray);
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--gray);
        }

        .nav-tabs .nav-link {
            color: var(--text-color);
            font-weight: 500;
            border: none;
            padding: 12px 20px;
            position: relative;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary);
            background: transparent;
            border-bottom: 3px solid var(--primary);
            opacity: 1;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary);
            opacity: 1;
        }

        .badge {
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .badge-published {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10B981;
        }

        .badge-draft {
            background-color: rgba(156, 163, 175, 0.1);
            color: #9CA3AF;
        }

        .badge-archived {
            background-color: rgba(239, 68, 68, 0.1);
            color: #EF4444;
        }

        .btn-edit {
            background-color: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-delete {
            background-color: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-view {
            background-color: rgba(139, 92, 246, 0.1);
            color: #8B5CF6;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit:hover, .btn-delete:hover, .btn-view:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .doctor-profile {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .doctor-profile i {
            color: white !important;
        }

        .blog-details, .blog-system-info {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .blog-system-info i {
            color: var(--primary);
        }

        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Dark mode specific fixes */
        body.dark-mode .table {
            color: var(--text-color);
        }

        body.dark-mode .table-hover tbody tr:hover {
            color: var(--text-color);
            background-color: rgba(255, 255, 255, 0.05);
        }

        body.dark-mode .form-control, 
        body.dark-mode .form-select,
        body.dark-mode .form-textarea {
            background-color: #1A202C;
            color: var(--text-color);
            border-color: #4A5568;
        }

        body.dark-mode .modal-content {
            background-color: var(--card-bg);
            color: var(--text-color);
        }

        body.dark-mode .btn-close {
            filter: invert(1);
        }

        .blog-image {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .blog-image:hover {
            transform: scale(1.05);
        }

        .tag {
            display: inline-block;
            background-color: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            border-radius: 8px;
            padding: 10px 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: none;
            align-items: center;
        }

        .toast.show {
            display: flex;
            animation: fadeIn 0.3s ease-in-out;
        }

        .toast-success {
            background-color: var(--success);
            color: white;
        }

        .toast-warning {
            background-color: var(--warning);
            color: white;
        }

        .toast-info {
            background-color: var(--primary);
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .nav-tabs .nav-link {
                padding: 10px 12px;
                font-size: 14px;
            }
            
            .blog-image {
                width: 80px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon" id="theme-icon"></i>
    </button>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4"><i class="fas fa-blog me-2"></i>Blog Management</h2>
                
                <!-- Doctor Profile Section -->
                <div class="doctor-profile">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Dr. Chaltu Regassa">
                        </div>
                        <div class="col-md-10">
                            <h3><i class="fas fa-user-md me-2"></i>Dr. Chaltu Regassa</h3>
                            <p class="mb-2"><i class="fas fa-graduation-cap me-2"></i>MD, Gondar University, Ethiopia</p>
                            <p class="mb-0"><i class="fas fa-heart me-2"></i>Specializing in Online Health Counseling</p>
                        </div>
                    </div>
                </div>

                <!-- Blog System Information -->
                <div class="blog-system-info mb-4">
                    <h4><i class="fas fa-info-circle me-2"></i>About Our Blog System</h4>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-pen-fancy"></i>
                                <h5 class="mt-2">Health Articles</h5>
                                <p class="small">Educational content for patients</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-share-alt"></i>
                                <h5 class="mt-2">Social Sharing</h5>
                                <p class="small">Easy sharing to social media</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-tags"></i>
                                <h5 class="mt-2">Tagged Content</h5>
                                <p class="small">Organized by health topics</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs for Blog Status -->
                <ul class="nav nav-tabs mb-4" id="blogTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="published-tab" data-bs-toggle="tab" data-bs-target="#published" type="button" role="tab">
                            <i class="fas fa-check-circle me-1"></i> Published
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="drafts-tab" data-bs-toggle="tab" data-bs-target="#drafts" type="button" role="tab">
                            <i class="fas fa-edit me-1"></i> Drafts
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="archived-tab" data-bs-toggle="tab" data-bs-target="#archived" type="button" role="tab">
                            <i class="fas fa-archive me-1"></i> Archived
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="blogTabsContent">
                    <!-- Published Blogs -->
                    <div class="tab-pane fade show active" id="published" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0"><i class="fas fa-check-circle me-2"></i>Published Blogs</h5>
                                <button class="btn btn-primary btn-sm" onclick="showAddBlogModal()">
                                    <i class="fas fa-plus me-1"></i> Add Blog
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Blog ID</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Tags</th>
                                                <th>Status</th>
                                                <th>Shares</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#BLOG-1001</td>
                                                <td>10 Tips for Healthy Living</td>
                                                <td>
                                                    <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="blog-image">
                                                </td>
                                                <td>
                                                    <span class="tag">nutrition</span>
                                                    <span class="tag">wellness</span>
                                                </td>
                                                <td><span class="badge badge-published">Published</span></td>
                                                <td>
                                                    <span class="me-2"><i class="fas fa-share-alt"></i> 24</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-view btn-sm me-2" onclick="viewBlog(1001)">
                                                        <i class="fas fa-eye me-1"></i> View
                                                    </button>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editBlog(1001)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="archiveBlog(1001)">
                                                        <i class="fas fa-archive me-1"></i> Archive
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#BLOG-1002</td>
                                                <td>Understanding Mental Health</td>
                                                <td>
                                                    <img src="https://images.unsplash.com/photo-1593814681464-eef5af2b0628?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="blog-image">
                                                </td>
                                                <td>
                                                    <span class="tag">mental health</span>
                                                    <span class="tag">psychology</span>
                                                </td>
                                                <td><span class="badge badge-published">Published</span></td>
                                                <td>
                                                    <span class="me-2"><i class="fas fa-share-alt"></i> 42</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-view btn-sm me-2" onclick="viewBlog(1002)">
                                                        <i class="fas fa-eye me-1"></i> View
                                                    </button>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editBlog(1002)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="archiveBlog(1002)">
                                                        <i class="fas fa-archive me-1"></i> Archive
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Draft Blogs -->
                    <div class="tab-pane fade" id="drafts" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-edit me-2"></i>Draft Blogs</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Blog ID</th>
                                                <th>Title</th>
                                                <th>Last Updated</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#BLOG-1003</td>
                                                <td>Exercise Routines for Seniors</td>
                                                <td>2 days ago</td>
                                                <td><span class="badge badge-draft">Draft</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editBlog(1003)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-primary btn-sm me-2" onclick="publishBlog(1003)">
                                                        <i class="fas fa-check me-1"></i> Publish
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteBlog(1003)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Archived Blogs -->
                    <div class="tab-pane fade" id="archived" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-archive me-2"></i>Archived Blogs</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Blog ID</th>
                                                <th>Title</th>
                                                <th>Archived On</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#BLOG-1004</td>
                                                <td>Winter Health Tips</td>
                                                <td>Mar 15, 2023</td>
                                                <td><span class="badge badge-archived">Archived</span></td>
                                                <td>
                                                    <button class="btn btn-view btn-sm me-2" onclick="viewBlog(1004)">
                                                        <i class="fas fa-eye me-1"></i> View
                                                    </button>
                                                    <button class="btn btn-primary btn-sm me-2" onclick="restoreBlog(1004)">
                                                        <i class="fas fa-undo me-1"></i> Restore
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteBlog(1004)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Statistics Sidebar -->
            <div class="col-lg-4">
                <div class="blog-details">
                    <h4><i class="fas fa-chart-pie me-2"></i>Blog Statistics</h4>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-check-circle text-success me-2"></i>Published</span>
                            <strong>24</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-edit text-secondary me-2"></i>Drafts</span>
                            <strong>5</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-archive text-warning me-2"></i>Archived</span>
                            <strong>12</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-share-alt text-primary me-2"></i>Total Shares</span>
                            <strong>1,240</strong>
                        </div>
                    </div>
                </div>

                <div class="blog-details">
                    <h4><i class="fas fa-question-circle me-2"></i>Blogging Guidelines</h4>
                    <ul class="mt-3" style="padding-left: 20px;">
                        <li class="mb-2">Use clear, patient-friendly language</li>
                        <li class="mb-2">Cite medical sources when possible</li>
                        <li class="mb-2">Include relevant tags for discoverability</li>
                        <li class="mb-2">Add high-quality images when appropriate</li>
                        <li>Review content before publishing</li>
                    </ul>
                </div>

                <div class="blog-details">
                    <h4><i class="fas fa-user-md me-2"></i>About Dr. Chaltu Regassa</h4>
                    <p class="mt-3">
                        Hello! I'm Dr. Chaltu Regassa, a graduate of Gondar University, Ethiopia, specializing in online health counseling. 
                        Our blog provides valuable health information to empower patients and promote wellness.
                    </p>
                    <p>
                        Through educational content, we aim to improve health literacy and make medical knowledge accessible to all.
                    </p>
                    <div class="d-flex">
                        <span class="me-3"><i class="fas fa-star me-1"></i>4.9/5</span>
                        <span class="me-3"><i class="fas fa-user-friends me-1"></i>1,240+ Patients</span>
                        <span><i class="fas fa-globe me-1"></i>Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Add New Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBlogForm">
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="blogTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="blogContent" class="form-label">Content</label>
                            <textarea class="form-control form-textarea" id="blogContent" rows="8" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="blogImage" class="form-label">Image URL</label>
                                <input type="text" class="form-control" id="blogImage">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="blogTags" class="form-label">Tags (comma separated)</label>
                                <input type="text" class="form-control" id="blogTags" placeholder="nutrition, wellness, exercise">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="blogStatus" class="form-label">Status</label>
                            <select class="form-select" id="blogStatus">
                                <option value="draft">Draft</option>
                                <option value="published">Publish Now</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="addBlog()">
                        <i class="fas fa-save me-1"></i> Save Blog
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Blog Modal -->
    <div class="modal fade" id="viewBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewBlogTitle"><i class="fas fa-eye me-2"></i>Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="viewBlogImage" class="img-fluid rounded mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
                    <div id="viewBlogContent"></div>
                    <div class="mt-3">
                        <h6>Tags:</h6>
                        <div id="viewBlogTags"></div>
                    </div>
                    <div class="mt-3">
                        <h6>Share:</h6>
                        <button class="btn btn-sm btn-outline-primary me-2" onclick="shareBlog('facebook')">
                            <i class="fab fa-facebook-f me-1"></i> Facebook
                        </button>
                        <button class="btn btn-sm btn-outline-info me-2" onclick="shareBlog('twitter')">
                            <i class="fab fa-twitter me-1"></i> Twitter
                        </button>
                        <button class="btn btn-sm btn-outline-primary" onclick="shareBlog('linkedin')">
                            <i class="fab fa-linkedin-in me-1"></i> LinkedIn
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Sample blog data
        const blogs = [
            {
                id: 1001,
                title: "10 Tips for Healthy Living",
                content: "<p>Maintaining good health is essential for a happy life. Here are 10 tips to help you stay healthy:</p><ol><li>Eat a balanced diet with plenty of fruits and vegetables</li><li>Exercise regularly, at least 30 minutes per day</li><li>Get 7-8 hours of quality sleep each night</li><li>Stay hydrated by drinking enough water</li><li>Manage stress through meditation or relaxation techniques</li><li>Avoid smoking and limit alcohol consumption</li><li>Maintain a healthy weight</li><li>Practice good hygiene</li><li>Get regular health check-ups</li><li>Stay socially connected with friends and family</li></ol>",
                image: "https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                tags: ["nutrition", "wellness"],
                status: "published",
                shares: 24,
                created_at: "2023-10-15",
                updated_at: "2023-10-15"
            },
            {
                id: 1002,
                title: "Understanding Mental Health",
                content: "<p>Mental health is just as important as physical health. It affects how we think, feel, and act. Good mental health helps us handle stress, relate to others, and make choices.</p><p>Common mental health conditions include:</p><ul><li>Anxiety disorders</li><li>Depression</li><li>Bipolar disorder</li><li>Schizophrenia</li><li>Eating disorders</li></ul><p>If you're struggling with mental health issues, don't hesitate to seek professional help. Treatment can include therapy, medication, or a combination of both.</p>",
                image: "https://images.unsplash.com/photo-1593814681464-eef5af2b0628?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                tags: ["mental health", "psychology"],
                status: "published",
                shares: 42,
                created_at: "2023-10-10",
                updated_at: "2023-10-10"
            },
            {
                id: 1003,
                title: "Exercise Routines for Seniors",
                content: "<p>Regular exercise is crucial for seniors to maintain mobility, strength, and overall health. Here are some safe exercises for older adults:</p><p><strong>1. Walking:</strong> A low-impact way to improve cardiovascular health</p><p><strong>2. Chair Yoga:</strong> Improves flexibility and balance without putting stress on joints</p><p><strong>3. Water Aerobics:</strong> Gentle on joints while providing resistance</p><p><strong>4. Resistance Band Workouts:</strong> Builds strength without heavy weights</p><p><strong>5. Tai Chi:</strong> Improves balance and reduces stress</p><p>Always consult with a doctor before starting a new exercise program.</p>",
                image: "",
                tags: ["senior health", "exercise"],
                status: "draft",
                created_at: "2023-10-05",
                updated_at: "2023-10-18"
            },
            {
                id: 1004,
                title: "Winter Health Tips",
                content: "<p>Winter brings unique health challenges. Stay healthy during the colder months with these tips:</p><ul><li>Get a flu vaccine</li><li>Wash hands frequently to prevent colds</li><li>Dress in layers to stay warm</li><li>Stay active indoors</li><li>Eat seasonal fruits and vegetables</li><li>Stay hydrated - you still lose water in winter</li><li>Use moisturizer to prevent dry skin</li><li>Be careful of icy surfaces to prevent falls</li></ul>",
                image: "https://images.unsplash.com/photo-1518604666860-9ed391f76460?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                tags: ["seasonal", "winter"],
                status: "archived",
                shares: 15,
                created_at: "2023-01-10",
                archived_at: "2023-03-15"
            }
        ];

        // Theme toggle functionality
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const icon = document.getElementById('theme-icon');
            const isDarkMode = document.body.classList.contains('dark-mode');
            
            if (isDarkMode) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        }

        // Check for saved theme preference
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
                const icon = document.getElementById('theme-icon');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        });

        // Show add blog modal
        function showAddBlogModal() {
            const modal = new bootstrap.Modal(document.getElementById('addBlogModal'));
            modal.show();
        }

        // Add a new blog
        function addBlog() {
            const title = document.getElementById('blogTitle').value;
            const content = document.getElementById('blogContent').value;
            const image = document.getElementById('blogImage').value;
            const tags = document.getElementById('blogTags').value.split(',').map(tag => tag.trim());
            const status = document.getElementById('blogStatus').value;
            
            if (title && content) {
                // In a real app, you would make an API call here
                showToast(`Blog "${title}" ${status === 'published' ? 'published' : 'saved as draft'} successfully`, 'success');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addBlogModal'));
                modal.hide();
                document.getElementById('addBlogForm').reset();
                // You would typically refresh the blog list here
            } else {
                showToast('Please fill all required fields', 'warning');
            }
        }

        // View blog
        function viewBlog(blogId) {
            const blog = blogs.find(b => b.id === blogId);
            if (blog) {
                document.getElementById('viewBlogTitle').textContent = blog.title;
                document.getElementById('viewBlogContent').innerHTML = blog.content;
                
                const imageElement = document.getElementById('viewBlogImage');
                if (blog.image) {
                    imageElement.src = blog.image;
                    imageElement.style.display = 'block';
                } else {
                    imageElement.style.display = 'none';
                }
                
                const tagsContainer = document.getElementById('viewBlogTags');
                tagsContainer.innerHTML = '';
                blog.tags.forEach(tag => {
                    const span = document.createElement('span');
                    span.className = 'tag';
                    span.textContent = tag;
                    tagsContainer.appendChild(span);
                });
                
                const modal = new bootstrap.Modal(document.getElementById('viewBlogModal'));
                modal.show();
            }
        }

        // Edit blog
        function editBlog(blogId) {
            const blog = blogs.find(b => b.id === blogId);
            if (blog) {
                // In a real app, you would populate an edit form
                showToast(`Editing blog #${blogId}`, 'info');
            }
        }

        // Publish blog
        function publishBlog(blogId) {
            if (confirm('Are you sure you want to publish this blog?')) {
                // In a real app, you would make an API call here
                showToast(`Blog #${blogId} published`, 'success');
                // You would typically refresh the blog list here
            }
        }

        // Archive blog
        function archiveBlog(blogId) {
            if (confirm('Are you sure you want to archive this blog?')) {
                // In a real app, you would make an API call here
                showToast(`Blog #${blogId} archived`, 'success');
                // You would typically refresh the blog list here
            }
        }

        // Restore blog
        function restoreBlog(blogId) {
            if (confirm('Are you sure you want to restore this blog?')) {
                // In a real app, you would make an API call here
                showToast(`Blog #${blogId} restored`, 'success');
                // You would typically refresh the blog list here
            }
        }

        // Delete blog
        function deleteBlog(blogId) {
            if (confirm('Are you sure you want to permanently delete this blog?')) {
                // In a real app, you would make an API call here
                showToast(`Blog #${blogId} deleted`, 'success');
                // You would typically refresh the blog list here
            }
        }

        // Share blog
        function shareBlog(platform) {
            // In a real app, this would open the share dialog for the platform
            showToast(`Blog shared on ${platform.charAt(0).toUpperCase() + platform.slice(1)}`, 'info');
        }

        // Show toast notification
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast show align-items-center text-white bg-${type}`;
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.style.borderRadius = '8px';
            toast.style.padding = '10px 20px';
            toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
                    <strong>${message}</strong>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>