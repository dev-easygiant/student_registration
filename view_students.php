<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { background: rgba(255,255,255,0.1); }
    </style>
</head>
<body>
    <div class="registration-card">
        <h2 class="text-center mb-4">Registered Students</h2>
        <div class="table-responsive">
            <?php
            require_once 'config/database.php';
            $stmt = $conn->query("SELECT * FROM students ORDER BY created_at DESC");
            $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Program</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?php echo $student['id']; ?></td>
                            <td><?php echo htmlspecialchars($student['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($student['email']); ?></td>
                            <td><?php echo htmlspecialchars($student['program']); ?></td>
                            <td><?php echo $student['year_of_study']; ?></td>
                            <td><span class="badge bg-success"><?php echo $student['status']; ?></span></td>
                            <td><?php echo $student['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(empty($students)): ?>
                <p class="text-center text-muted">No students registered yet.</p>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-info">← Back to Registration</a>
        </div>
    </div>
</body>
</html>
