// Admin credentials for each department
const adminCredentials = {
    access: { email: "access@admin.com", password: "access123" },
    csc: { email: "csc@admin.com", password: "csc123" },
    chess: { email: "chess@admin.com", password: "chess123" },
    circuits: { email: "circuits@admin.com", password: "circuits123" },
    symbio: { email: "symbio@admin.com", password: "symbio123" },
    storm: { email: "storm@admin.com", password: "storm123" }
};

// Folder paths that match your directory structure
const folderPaths = {
    access: "ACCeSS-admin/ACCeSS-admin-page.html",
    csc: "CSC-admin/CSC-admin-page.html",
    chess: "Chess-admin/Chess-admin-page.html",
    circuits: "CircuiTs-admin/CircuiTs-admin-page.html",
    symbio: "Symbio-admin/Symbio-admin-page.html",
    storm: "Storm-admin/Storm-admin-page.html"
};

// Admin login button click event
document.getElementById('adminLoginBtn').addEventListener('click', function () {
    const email = document.getElementById('adminEmail').value.trim();
    const password = document.getElementById('adminPassword').value.trim();
    const errorElement = document.getElementById('adminError');

    errorElement.textContent = '';
    errorElement.style.display = 'none';

    if (!email || !password) {
        errorElement.textContent = 'Email and password are required.';
        errorElement.style.display = 'block';
        return;
    }

    // Determine which department the credentials belong to
    let redirectUrl = null;
    for (const [department, credentials] of Object.entries(adminCredentials)) {
        if (email === credentials.email && password === credentials.password) {
            redirectUrl = `admin/${folderPaths[department]}`;
            break;
        }
    }

    if (redirectUrl) {
        // Redirect to the specific admin page
        window.location.href = redirectUrl;
    } else {
        // Show error message for invalid credentials
        errorElement.textContent = 'Invalid email or password. Please try again.';
        errorElement.style.display = 'block';
    }
});
