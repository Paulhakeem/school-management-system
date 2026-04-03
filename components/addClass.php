<?php
include '../includes/create-classes.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../components/header.php'
?>

<body class="bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-school text-4xl text-blue-600 mr-3"></i>
                    <h1 class="text-3xl font-bold text-gray-900">Add New Class</h1>
                </div>
                <p class="text-gray-600">Fill in the details below to create a new class in the school management system.</p>
            </div>

            <!-- Form -->
            <form method="POST" class="space-y-6">
                <!-- Class Name -->
                <div>
                    <label for="class_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-tag mr-2 text-blue-500"></i>Class Name
                    </label>
                    <input type="text" name="class_name" id="class_name" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 sm:text-sm"
                        placeholder="Enter class name (e.g., Grade 1A)">
                </div>

                <!-- Level -->
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-layer-group mr-2 text-blue-500"></i>Level
                    </label>
                    <select name="level" id="level" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 sm:text-sm">
                        <option value="">Select level</option>
                        <option value="primary">Primary School</option>
                        <option value="highschool">High School</option>
                    </select>
                </div>

                <!-- Block -->
                <div>
                    <label for="block" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-building mr-2 text-blue-500"></i>Block
                    </label>
                    <input type="text" name="block" id="block" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 sm:text-sm"
                        placeholder="Enter block (e.g., Block A)">
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <!-- showing success or error messages -->
                    <?php if (!empty($success_message)) : ?>
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($errorMessage)) : ?>
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit"
                        class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Add Class
                    </button>
                </div>
            </form>
        </div>
    </div>

</html>