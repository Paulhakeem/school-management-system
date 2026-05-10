<?php
include '../includes/create-classes.php';
?>

<div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-school text-4xl text-blue-600 mr-3"></i>
                <h1 class="text-3xl font-bold text-gray-900">Add New Class</h1>
            </div>
            <p class="text-gray-500">Fill in the details below to create a new class.</p>
        </div>

        <!-- success / error messages -->
        <?php if ($success_message !== ''): ?>
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                <i class="fas fa-check-circle mr-2"></i><?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <?php if ($errorMessage !== ''): ?>
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                <i class="fas fa-exclamation-circle mr-2"></i><?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" class="space-y-6">
            <div>
                <label for="class_name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-blue-500"></i>Class Name
                </label>
                <input type="text" name="class_name" id="class_name" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition sm:text-sm"
                    placeholder="e.g. Grade 1A">
            </div>

            <div>
                <label for="level" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-layer-group mr-2 text-blue-500"></i>Level
                </label>
                <select name="level" id="level" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition sm:text-sm">
                    <option value="">Select level</option>
                    <option value="primary">Primary School</option>
                    <option value="highschool">High School</option>
                </select>
            </div>

            <div>
                <label for="block" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-building mr-2 text-blue-500"></i>Block
                </label>
                <input type="text" name="block" id="block" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition sm:text-sm"
                    placeholder="e.g. Block A">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    <i class="fas fa-plus mr-2"></i>
                    Add Class
                </button>
            </div>
        </form>
    </div>
</div>