@extends('layouts.app')

@section('content')
<div class="blog-container">
    <!-- Hero Section -->
    <div class="blog-hero">
        <div class="hero-content">
            <h1><i class="fas fa-book-open"></i> Health & Wellness Stories</h1>
            <p>Discover insightful articles from our healthcare professionals</p>
            <div class="search-bar">
                <input type="text" placeholder="Search articles...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="blog-content">
        <!-- Featured Article -->
        <div class="featured-article">
            <div class="featured-image" style="background-image: url('https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                <div class="featured-badge">Featured</div>
            </div>
            <div class="featured-details">
                <div class="article-meta">
                    <span class="category-badge mental-health">Mental Health</span>
                    <span class="date">June 15, 2023</span>
                </div>
                <h2>Understanding Anxiety: Symptoms and Coping Strategies</h2>
                <p class="excerpt">Anxiety disorders affect millions worldwide. Learn to recognize the signs and discover evidence-based techniques to manage symptoms effectively in your daily life.</p>
                <div class="article-footer">
                    <div class="author-info">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Dr. Jane Smith" class="author-avatar">
                        <span>Dr. Jane Smith</span>
                    </div>
                    <div class="article-actions">
                        <button class="btn-read">Read More</button>
                        <div class="share-options">
                            <button class="btn-share" title="Share on Facebook"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn-share" title="Share on Twitter"><i class="fab fa-twitter"></i></button>
                            <button class="btn-share" title="Share on LinkedIn"><i class="fab fa-linkedin-in"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="articles-grid">
            <!-- Article Card 1 -->
            <div class="article-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                <div class="card-content">
                    <div class="article-meta">
                        <span class="category-badge nutrition">Nutrition</span>
                        <span class="date">June 10, 2023</span>
                    </div>
                    <h3>The Mediterranean Diet: Benefits Beyond Heart Health</h3>
                    <p class="excerpt">Explore how this popular diet can improve cognitive function, reduce inflammation, and promote longevity.</p>
                    <div class="card-footer">
                        <div class="author-info">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Michael Johnson" class="author-avatar">
                            <span>Dr. Michael Johnson</span>
                        </div>
                        <div class="card-actions">
                            <button class="btn-read-sm">Read</button>
                            <button class="btn-share-sm" title="Share"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="article-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                <div class="card-content">
                    <div class="article-meta">
                        <span class="category-badge fitness">Fitness</span>
                        <span class="date">June 5, 2023</span>
                    </div>
                    <h3>Strength Training for Beginners: A Complete Guide</h3>
                    <p class="excerpt">Start your fitness journey with these essential strength exercises and proper form techniques to prevent injury.</p>
                    <div class="card-footer">
                        <div class="author-info">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dr. Sarah Williams" class="author-avatar">
                            <span>Dr. Sarah Williams</span>
                        </div>
                        <div class="card-actions">
                            <button class="btn-read-sm">Read</button>
                            <button class="btn-share-sm" title="Share"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="article-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                <div class="card-content">
                    <div class="article-meta">
                        <span class="category-badge parenting">Parenting</span>
                        <span class="date">May 28, 2023</span>
                    </div>
                    <h3>Childhood Vaccinations: What Every Parent Should Know</h3>
                    <p class="excerpt">A comprehensive guide to vaccine schedules, safety, and common concerns addressed by pediatric specialists.</p>
                    <div class="card-footer">
                        <div class="author-info">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Dr. Robert Brown" class="author-avatar">
                            <span>Dr. Robert Brown</span>
                        </div>
                        <div class="card-actions">
                            <button class="btn-read-sm">Read</button>
                            <button class="btn-share-sm" title="Share"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Card 4 -->
            <div class="article-card">
                <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')"></div>
                <div class="card-content">
                    <div class="article-meta">
                        <span class="category-badge sleep">Sleep</span>
                        <span class="date">May 20, 2023</span>
                    </div>
                    <h3>The Science of Sleep: How to Improve Your Sleep Quality</h3>
                    <p class="excerpt">Discover evidence-based strategies to fall asleep faster, sleep deeper, and wake up refreshed.</p>
                    <div class="card-footer">
                        <div class="author-info">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dr. Emily Davis" class="author-avatar">
                            <span>Dr. Emily Davis</span>
                        </div>
                        <div class="card-actions">
                            <button class="btn-read-sm">Read</button>
                            <button class="btn-share-sm" title="Share"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Tags -->
        <div class="popular-tags">
            <h3>Popular Topics</h3>
            <div class="tags-container">
                <a href="#" class="tag">Mental Health</a>
                <a href="#" class="tag">Nutrition</a>
                <a href="#" class="tag">Fitness</a>
                <a href="#" class="tag">Preventive Care</a>
                <a href="#" class="tag">Chronic Conditions</a>
                <a href="#" class="tag">Healthy Aging</a>
                <a href="#" class="tag">Children's Health</a>
                <a href="#" class="tag">Women's Health</a>
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="newsletter-card">
            <div class="newsletter-content">
                <h3>Stay Updated with Health Insights</h3>
                <p>Subscribe to our newsletter for the latest articles and health tips</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <div class="newsletter-image">
                <i class="fas fa-envelope-open-text"></i>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="share-modal" id="shareModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Share This Article</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="share-options">
                    <button class="share-option facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </button>
                    <button class="share-option twitter">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </button>
                    <button class="share-option linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span>LinkedIn</span>
                    </button>
                    <button class="share-option link">
                        <i class="fas fa-link"></i>
                        <span>Copy Link</span>
                    </button>
                </div>
                <div class="link-container">
                    <input type="text" id="articleLink" value="https://example.com/blog/understanding-anxiety" readonly>
                    <button class="btn-copy" id="copyLink">Copy</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    :root {
        --primary-color: #3182CE;
        --primary-dark: #2C5282;
        --success-color: #38A169;
        --warning-color: #DD6B20;
        --danger-color: #E53E3E;
        --text-color: #2D3748;
        --text-light: #718096;
        --bg-light: #F7FAFC;
        --border-color: #E2E8F0;
        --card-bg: #FFFFFF;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .dark-mode {
        --text-color: #E2E8F0;
        --text-light: #A0AEC0;
        --bg-light: #1A202C;
        --border-color: #2D3748;
        --card-bg: #2D3748;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        color: var(--text-color);
    }

    /* Hero Section */
    .blog-hero {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
        border-radius: 0 0 10px 10px;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        padding: 0 20px;
    }

    .blog-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    .blog-hero p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    .search-bar {
        display: flex;
        max-width: 600px;
        margin: 0 auto;
    }

    .search-bar input {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 30px 0 0 30px;
        font-size: 1rem;
    }

    .search-bar button {
        background-color: white;
        color: var(--primary-color);
        border: none;
        padding: 0 20px;
        border-radius: 0 30px 30px 0;
        cursor: pointer;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .search-bar button:hover {
        background-color: #e6f0fa;
    }

    /* Featured Article */
    .featured-article {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 50px;
        background-color: var(--card-bg);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
    }

    @media (max-width: 900px) {
        .featured-article {
            grid-template-columns: 1fr;
        }
    }

    .featured-image {
        position: relative;
        min-height: 350px;
        background-size: cover;
        background-position: center;
    }

    .featured-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: var(--danger-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .featured-details {
        padding: 30px;
        display: flex;
        flex-direction: column;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .category-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mental-health {
        background-color: #B794F4;
        color: #44337A;
    }

    .nutrition {
        background-color: #68D391;
        color: #22543D;
    }

    .fitness {
        background-color: #F6AD55;
        color: #9C4221;
    }

    .parenting {
        background-color: #F687B3;
        color: #97266D;
    }

    .sleep {
        background-color: #63B3ED;
        color: #2C5282;
    }

    .date {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .featured-details h2 {
        font-size: 1.8rem;
        margin: 0 0 15px 0;
        line-height: 1.3;
    }

    .excerpt {
        color: var(--text-light);
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .article-footer {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .author-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .author-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .article-actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .btn-read {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-read:hover {
        background-color: var(--primary-dark);
    }

    .share-options {
        display: flex;
        gap: 10px;
    }

    .btn-share {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: var(--bg-light);
        color: var(--text-color);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-share:hover {
        background-color: var(--primary-color);
        color: white;
    }

    /* Articles Grid */
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .article-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .card-image {
        height: 180px;
        background-size: cover;
        background-position: center;
    }

    .card-content {
        padding: 20px;
    }

    .card-content h3 {
        font-size: 1.2rem;
        margin: 10px 0;
        line-height: 1.4;
    }

    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .card-actions {
        display: flex;
        gap: 10px;
    }

    .btn-read-sm {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.8rem;
        transition: background-color 0.3s ease;
    }

    .btn-read-sm:hover {
        background-color: var(--primary-dark);
    }

    .btn-share-sm {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--bg-light);
        color: var(--text-color);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-share-sm:hover {
        background-color: var(--primary-color);
        color: white;
    }

    /* Popular Tags */
    .popular-tags {
        margin-bottom: 50px;
    }

    .popular-tags h3 {
        font-size: 1.3rem;
        margin-bottom: 20px;
    }

    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tag {
        background-color: var(--bg-light);
        color: var(--text-color);
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .tag:hover {
        background-color: var(--primary-color);
        color: white;
    }

    /* Newsletter */
    .newsletter-card {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border-radius: 10px;
        display: grid;
        grid-template-columns: 1fr auto;
        overflow: hidden;
        margin-bottom: 50px;
    }

    @media (max-width: 600px) {
        .newsletter-card {
            grid-template-columns: 1fr;
        }
    }

    .newsletter-content {
        padding: 30px;
    }

    .newsletter-content h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .newsletter-content p {
        opacity: 0.9;
        margin-bottom: 20px;
    }

    .newsletter-form {
        display: flex;
        max-width: 500px;
    }

    .newsletter-form input {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 5px 0 0 5px;
        font-size: 1rem;
        color: var(--text-color);
    }

    .newsletter-form button {
        background-color: white;
        color: var(--primary-color);
        border: none;
        padding: 0 20px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .newsletter-form button:hover {
        background-color: #e6f0fa;
    }

    .newsletter-image {
        width: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        opacity: 0.8;
    }

    @media (max-width: 600px) {
        .newsletter-image {
            display: none;
        }
    }

    /* Share Modal */
    .share-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .share-modal.active {
        display: flex;
    }

    .modal-content {
        background-color: var(--card-bg);
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .modal-header h3 {
        margin: 0;
        color: var(--text-color);
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--text-light);
    }

    .modal-body {
        padding: 20px;
    }

    .share-options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .share-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .share-option i {
        font-size: 1.5rem;
        margin-bottom: 8px;
    }

    .share-option.facebook {
        background-color: #E7F3FF;
        color: #1877F2;
    }

    .share-option.twitter {
        background-color: #E8F5FD;
        color: #1DA1F2;
    }

    .share-option.linkedin {
        background-color: #E8F3F8;
        color: #0077B5;
    }

    .share-option.link {
        background-color: var(--bg-light);
        color: var(--text-color);
    }

    .link-container {
        display: flex;
        margin-top: 20px;
    }

    .link-container input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid var(--border-color);
        border-radius: 5px 0 0 5px;
        background-color: var(--bg-light);
        color: var(--text-color);
    }

    .btn-copy {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 0 15px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .blog-hero h1 {
            font-size: 2rem;
        }
        
        .featured-details {
            padding: 20px;
        }
        
        .featured-details h2 {
            font-size: 1.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const shareButtons = document.querySelectorAll('.btn-share, .btn-share-sm');
        const shareModal = document.getElementById('shareModal');
        const modalClose = document.querySelector('.modal-close');
        const copyLinkBtn = document.getElementById('copyLink');
        const articleLink = document.getElementById('articleLink');

        // Share button click handler
        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                shareModal.classList.add('active');
            });
        });

        // Close modal
        modalClose.addEventListener('click', function() {
            shareModal.classList.remove('active');
        });

        // Copy link handler
        copyLinkBtn.addEventListener('click', function() {
            articleLink.select();
            document.execCommand('copy');
            
            // Show feedback
            const originalText = copyLinkBtn.textContent;
            copyLinkBtn.textContent = 'Copied!';
            
            setTimeout(() => {
                copyLinkBtn.textContent = originalText;
            }, 2000);
        });

        // Close modal when clicking outside
        shareModal.addEventListener('click', function(e) {
            if (e.target === shareModal) {
                shareModal.classList.remove('active');
            }
        });

        // Simulate share actions
        document.querySelectorAll('.share-option').forEach(option => {
            option.addEventListener('click', function() {
                const platform = this.classList.contains('facebook') ? 'Facebook' :
                                this.classList.contains('twitter') ? 'Twitter' :
                                this.classList.contains('linkedin') ? 'LinkedIn' : 'link';
                
                alert(`Article would be shared on ${platform} in a real implementation`);
                shareModal.classList.remove('active');
            });
        });

        // Simulate article clicks
        document.querySelectorAll('.btn-read, .btn-read-sm').forEach(button => {
            button.addEventListener('click', function() {
                alert('This would open the full article in a real implementation');
            });
        });

        // Simulate newsletter submission
        document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for subscribing to our newsletter!');
            this.reset();
        });

        // Simulate search
        document.querySelector('.search-bar button').addEventListener('click', function() {
            const query = document.querySelector('.search-bar input').value;
            if (query) {
                alert(`Searching for: "${query}"`);
            }
        });
    });
</script>
@endsection