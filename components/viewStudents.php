<?php
include '../includes/students.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="pb-4">
        <h1 class="text-3xl font-bold mb-6 text-[#3a83f6]">View Students</h1>
        <p class="text-gray-600 mb-4">Below is a list of all students currently enrolled in the school. You can view their details, edit their information, or remove them from the system.</p>
    </div>

    <!-- table for all students -->
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">admission_no</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Block</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit Student</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Remove Student</th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Sample student data - replace with actual data from database -->
            <?php foreach ($students as $student): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['admission_no']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['firstName'] . ' ' . $student['middleName'] . ' ' . $student['lastName']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['class']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['block']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['dateOfBirth']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['parentName']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($student['parentNumber']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="editStudent.php?id=<?php echo $student['id']; ?>" class="text-blue-600 hover:text-blue-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="deleteStudent.php?id=<?php echo $student['id']; ?>" class="text-red-600 hover:text-red-900">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</body>

</html>