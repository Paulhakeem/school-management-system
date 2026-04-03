<?php
include '../includes/classes.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../components/header.php'
?>

<body class="bg-gray-50 min-h-screen">
    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <i class="fas fa-chalkboard text-4xl text-blue-600 mr-3"></i>
                    <h1 class="text-4xl font-bold text-gray-900">Classes Management</h1>
                </div>
                <a href="?page=add_class" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition duration-200 font-medium">
                    <i class="fas fa-plus mr-2"></i>Add New Class
                </a>
            </div>
            <p class="text-gray-600 text-lg">Manage and organize all classes in your school management system.</p>
        </div>

        <!-- Filter Buttons -->
        <div class="mb-8 flex flex-wrap gap-3">
        <!-- filter data according to level  -->
            <a href="?page=classes&level=all" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200 font-medium <?php echo (isset($_GET['level']) && $_GET['level'] === 'all') ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">
                <i class="fas fa-layer-group mr-1"></i>All Levels
            </a>
            <a href="?page=classes&level=primary" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200 font-medium <?php echo (isset($_GET['level']) && $_GET['level'] === 'primary') ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">
                <i class="fas fa-child mr-1"></i>Primary School
            </a>
            <a href="?page=classes&level=highschool" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200 font-medium <?php echo (isset($_GET['level']) && $_GET['level'] === 'highschool') ? 'bg-blue-600 text-white hover:bg-blue-700' : ''; ?>">
                <i class="fas fa-user-graduate mr-1"></i>High School
            </a>
        </div>

        <!-- Classes Container -->
        <div id="classesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $selectedLevel = isset($_GET['level']) && in_array($_GET['level'], ['all','primary','highschool']) ? $_GET['level'] : 'all';
            $classes = filterClasses($selectedLevel);
            if (count($classes) > 0) {
                foreach ($classes as $class) {
                    $levelIcon = $class['level'] === 'primary' ? 'fa-child' : 'fa-user-graduate';
                    $levelLabel = ucfirst($class['level']);
                    echo '<div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition duration-300 transform hover:scale-105">';
                    echo '    <div class="flex items-start justify-between mb-4">';
                    echo '        <div class="flex-1">';
                    echo '            <h2 class="text-2xl font-bold text-gray-900 mb-1">' . htmlspecialchars($class['class_name']) . '</h2>';
                    echo '            <p class="text-sm text-gray-500">Class Details</p>';
                    echo '        </div>';
                    echo '        <div class="text-blue-600">';
                    echo '            <i class="fas fa-door-open text-3xl"></i>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="border-t border-gray-100 pt-4 space-y-3">';
                    echo '        <div class="flex items-center">';
                    echo '            <i class="fas ' . $levelIcon . ' text-blue-500 mr-3 w-5"></i>';
                    echo '            <span class="text-gray-700"><strong>Level:</strong> ' . $levelLabel . '</span>';
                    echo '        </div>';
                    echo '        <div class="flex items-center">';
                    echo '            <i class="fas fa-map-marker-alt text-orange-500 mr-3 w-5"></i>';
                    echo '            <span class="text-gray-700"><strong>Block:</strong> ' . htmlspecialchars($class['block']) . '</span>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="mt-6 flex gap-2 pt-4 border-t border-gray-100">';
                    echo '        <button class="flex-1 px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition duration-200 font-medium text-sm">';
                    echo '            <i class="fas fa-edit mr-1"></i>Edit';
                    echo '        </button>';
                    echo '        <button class="flex-1 px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-200 font-medium text-sm">';
                    echo '            <i class="fas fa-trash mr-1"></i>Delete';
                    echo '        </button>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white shadow-lg rounded-xl p-12 text-center">';
                echo '    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>';
                echo '    <p class="text-gray-600 text-lg mb-4">No classes found. Start by adding a new class to manage your school.</p>';
                echo '    <a href="?page=add_class" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition duration-200 font-medium">';
                echo '        <i class="fas fa-plus mr-2"></i>Add First Class';
                echo '    </a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>