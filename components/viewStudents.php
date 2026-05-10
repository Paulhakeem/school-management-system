<div class="pb-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">View Students</h1>
            <p class="text-gray-500 mt-1">Manage all enrolled students</p>
        </div>
        <a href="?page=create_student"
            class="mt-4 sm:mt-0 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i>
            Add New Student
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-blue-100 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-user-graduate text-blue-600 text-lg"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Total Students</p>
                <p class="text-xl font-bold text-gray-900"><?php echo count($students); ?></p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-green-100 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-school text-green-600 text-lg"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Classes</p>
                <p class="text-xl font-bold text-gray-900">
                    <?php
                    $uniqueClasses = array_unique(array_column($students, 'class_name'));
                    echo count($uniqueClasses);
                    ?>
                </p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-purple-100 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-layer-group text-purple-600 text-lg"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Blocks</p>
                <p class="text-xl font-bold text-gray-900">
                    <?php
                    $uniqueBlocks = array_unique(array_column($students, 'block'));
                    echo count($uniqueBlocks);
                    ?>
                </p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-center gap-4">
            <div class="w-11 h-11 rounded-lg bg-amber-100 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-wallet text-amber-600 text-lg"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Total Fees</p>
                <p class="text-xl font-bold text-gray-900">
                    <?php
                    $totalFees = array_sum(array_column($students, 'total_fee'));
                    echo 'Ksh ' . number_format($totalFees, 2);
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" id="studentSearch" placeholder="Search by name, admission no, class..."
            class="w-full sm:w-96 px-4 py-2.5 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
    </div>

    <!-- Table -->
    <?php if (count($students) > 0): ?>
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200" id="studentsTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Admission No</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Class</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Block</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date of Birth</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Parent</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Fee</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Fee Balance</th>
                        <th class="px-5 py-3.5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($students as $student): ?>
                        <tr class="hover:bg-blue-50/40 transition">
                            <td class="px-5 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($student['admission_no']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['firstName'] . ' ' . $student['middleName'] . ' ' . $student['lastName']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['class_name']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['block']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['dateOfBirth']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['parentName']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($student['parentNumber']); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700">Ksh <?php echo number_format($student['total_fee'], 2); ?></td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm <?php echo $student['fee_balance'] > 0 ? 'text-red-600 font-medium' : 'text-green-600 font-medium'; ?>">
                                Ksh <?php echo number_format($student['fee_balance'], 2); ?>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="?page=edit_student&id=<?php echo $student['id']; ?>"
                                        class="inline-flex items-center gap-1 rounded-lg bg-blue-50 px-3 py-1.5 text-blue-700 hover:bg-blue-100 transition text-xs font-medium">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>
                                    <a href="#"
                                        onclick="confirmDelete(<?php echo $student['id']; ?>, '<?php echo htmlspecialchars($student['firstName'] . ' ' . $student['lastName'], ENT_QUOTES); ?>'); return false;"
                                        class="inline-flex items-center gap-1 rounded-lg bg-red-50 px-3 py-1.5 text-red-700 hover:bg-red-100 transition text-xs font-medium">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Remove
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-16 bg-white rounded-xl border border-gray-200">
            <i class="fa-solid fa-user-graduate text-gray-300 text-5xl mb-4"></i>
            <h3 class="text-lg font-semibold text-gray-700">No Students Found</h3>
            <p class="text-gray-500 mt-1 mb-6">Get started by adding your first student.</p>
            <a href="?page=create_student"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700">
                <i class="fa-solid fa-plus"></i>
                Add New Student
            </a>
        </div>
    <?php endif; ?>
</div>

<script>
    function confirmDelete(id, name) {
        if (confirm('Are you sure you want to remove "' + name + '" (' + id + ')? This action cannot be undone.')) {
            window.location.href = '?page=delete_student&id=' + id;
        }
    }

    // Live search filter
    document.getElementById('studentSearch')?.addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#studentsTable tbody tr');
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    });
</script>