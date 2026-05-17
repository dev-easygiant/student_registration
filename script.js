
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = document.querySelector('.btn-submit');
    const msgBox = document.getElementById('msgBox');

    // Toggle password visibility
    const passwordToggle = document.querySelector('.toggle-password');
    if(passwordToggle) {
        passwordToggle.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            if(passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    }

    // Form Submission Handler
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if(!validateForm()) {
            return;
        }

        // UI: Loading State
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

        // Get form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        // Send data to PHP
        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Show success message
                msgBox.innerHTML = `
                    <div class="alert alert-success mt-4">
                        <i class="fas fa-check-circle"></i> ${data.message}
                    </div>
                `;
                
                // Reset form after delay
                setTimeout(() => {
                    form.reset();
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Register Now';
                }, 3000);
            } else {
                msgBox.innerHTML = `
                    <div class="alert alert-danger mt-4">
                        <i class="fas fa-exclamation-circle"></i> ${data.error}
                    </div>
                `;
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Register Now';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            msgBox.innerHTML = `
                <div class="alert alert-danger mt-4">
                    <i class="fas fa-exclamation-triangle"></i> An unexpected error occurred.
                </div>
            `;
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Register Now';
        });
    });

    // Client-side validation helper
    function validateForm() {
        const email = document.querySelector('input[type="email"]');
        const password = document.querySelector('input[type="password"]');
        
        // Email pattern
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (!emailPattern.test(email.value)) {
            alert('Please enter a valid email address');
            return false;
        }

        if (password.value.length < 6) {
            alert('Password must be at least 6 characters');
            return false;
        }

        return true;
    }
});
