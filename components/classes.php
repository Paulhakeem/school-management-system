<?php
include '../includes/classes.php';

$selectedLevel = isset($_GET['level']) && in_array($_GET['level'], ['all', 'primary', 'highschool']) ? $_GET['level'] : 'all';
$classes = filterClasses($selectedLevel);

// Count students per class
$studentCounts = [];
try {
    $stmt = $pdo->query("SELECT class_name, COUNT(*) as count FROM students GROUP BY class_name");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $studentCounts[$row['class_name']] = $row['count'];
    }
} catch (PDOException $e) {
    // table may not exist yet
}
?>

<div class="w-full px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
            <div class="flex items-center gap-3">
                <i class="fas fa-chalkboard text-4xl text-blue-600"></i>
                <h1 class="text-3xl font-bold text-gray-900">Classes Management</h1>
            </div>
            <a href="?page=add_class"
                class="mt-4 sm:mt-0 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700">
                <i class="fas fa-plus"></i>Add New Class
            </a>
        </div>
        <p class="text-gray-500">Manage and organize all classes in your school management system.</p>
    </div>

    <!-- Filter Tabs -->
    <div class="mb-8 flex flex-wrap gap-2">
        <?php
        $filters = [
            ['level' => 'all', 'label' => 'All Levels', 'icon' => 'fa-layer-group'],
            ['level' => 'primary', 'label' => 'Primary School', 'icon' => 'fa-child'],
            ['level' => 'highschool', 'label' => 'High School', 'icon' => 'fa-user-graduate'],
        ];
        foreach ($filters as $f):
            $active = $selectedLevel === $f['level'];
        ?>
            <a href="?page=classes&level=<?php echo $f['level']; ?>"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition
               <?php echo $active ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'; ?>">
                <i class="fas <?php echo $f['icon']; ?>"></i>
                <?php echo $f['label']; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Classes Grid -->
    <?php if (count($classes) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($classes as $class):
                $levelIcon = $class['level'] === 'primary' ? 'fa-child' : 'fa-user-graduate';
                $levelLabel = ucfirst($class['level']);
                $studentCount = $studentCounts[$class['class_name']] ?? 0;
            ?>
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1 min-w-0">
                                <h2 class="text-xl font-bold text-gray-900 truncate first-letter:uppercase"><?php echo htmlspecialchars($class['class_name']); ?></h2>
                                <p class="text-sm text-gray-500 mt-0.5">Class Details</p>
                            </div>
                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center shrink-0 ml-3">
                                <i class="fas fa-door-open text-blue-600"></i>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 space-y-3">
                            <div class="flex items-center text-sm">
                                <i class="fas <?php echo $levelIcon; ?> text-blue-500 mr-3 w-4 text-center"></i>
                                <span class="text-gray-700"><span class="font-medium text-gray-900">Level:</span> <?php echo $levelLabel; ?></span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-map-marker-alt text-orange-500 mr-3 w-4 text-center"></i>
                                <span class="text-gray-700"><span class="font-medium text-gray-900">Block:</span> <?php echo htmlspecialchars($class['block']); ?></span>
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-user-graduate text-green-500 mr-3 w-4 text-center"></i>
                                <span class="text-gray-700"><span class="font-medium text-gray-900">Students:</span> <?php echo $studentCount; ?></span>
                            </div>
                            <?php if (!empty($class['total_fee'])): ?>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-money-bill-wave text-amber-500 mr-3 w-4 text-center"></i>
                                    <span class="text-gray-700"><span class="font-medium text-gray-900">Fee:</span> Ksh <?php echo number_format($class['total_fee'], 2); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex border-t border-gray-100">
                        <a href="?page=edit_class&id=<?php echo $class['id']; ?>"
                            class="flex-1 flex items-center justify-center gap-2 py-3 text-sm font-medium text-blue-700 bg-blue-50/50 hover:bg-blue-100 transition rounded-bl-xl">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#"
                            onclick="confirmDeleteClass(<?php echo $class['id']; ?>, '<?php echo htmlspecialchars($class['class_name'], ENT_QUOTES); ?>'); return false;"
                            class="flex-1 flex items-center justify-center gap-2 py-3 text-sm font-medium text-red-700 bg-red-50/50 hover:bg-red-100 transition rounded-br-xl">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-12 text-center">
            <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-600 text-lg mb-4">No classes found. Start by adding a new class.</p>
            <a href="?page=add_class"
                class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700">
                <i class="fas fa-plus"></i>Add First Class
            </a>
        </div>
    <?php endif; ?>
</div>

<script>
    function confirmDeleteClass(id, name) {
        if (confirm('Are you sure you want to delete "' + name + '"? This action cannot be undone.')) {
            window.location.href = '?page=delete_class&id=' + id;
        }
    }
</script>