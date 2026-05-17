<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Cinematic</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 for Nice Popups -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Animated Background Blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <!-- Main Card -->
    <div class="registration-card">
        <div class="text-center mb-4">
            <i class="fas fa-user-graduate fa-3x mb-3" style="background: -webkit-linear-gradient(var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
            <h2 class="fw-bold">Student Registration</h2>
            <p class="text-muted">Join our academic community today</p>
        </div>

        <form action="register.php" method="POST" id="registrationForm">
            
            <div class="form-group">
                <label class="form-label"><i class="fas fa-user me-1"></i> Full Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user text-secondary"></i></span>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-envelope me-1"></i> Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope text-secondary"></i></span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="student@example.com" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-phone me-1"></i> Phone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone text-secondary"></i></span>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="+123456789" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-lock me-1"></i> Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock text-secondary"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="********" required minlength="6">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-book me-1"></i> Select Program</label>
                <select class="form-select" name="program" id="program" required>
                    <option value="" selected disabled>-- Choose Your Course --</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Arts & Humanities">Arts & Humanities</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Science">Science</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-university me-1"></i> Year of Study</label>
                <select class="form-select" name="year" id="year">
                    <option value="1">Freshman (1st Year)</option>
                    <option value="2">Sophomore (2nd Year)</option>
                    <option value="3">Junior (3rd Year)</option>
                    <option value="4">Senior (4th Year)</option>
                    <option value="grad">Graduate</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-calendar-check me-1"></i> Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" class="form-check-input" id="terms" name="terms" required checked>
                <label for="terms" class="form-label mb-0">
                    I agree to the <a href="#" class="text-info" target="_blank">Terms & Conditions</a>
                </label>
            </div>

            <button type="submit" class="btn-submit" name="submit">
                <i class="fas fa-arrow-right me-2"></i> Register Now
            </button>

            <div id="msgBox"></div>
            
            <div class="text-center mt-4">
                <a href="#" class="text-muted small">Already have an account? <a href="#" class="text-info fw-bold">Login here</a></a>
            </div>
        </form>
    </div>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
