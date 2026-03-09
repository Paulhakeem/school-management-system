<?php
include '../includes/create-students.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../components/header.php'; ?>

<body>
    <div class="w-full bg-gradient-to-br from-gray-50 to-blue-50 py-14 px-4 sm:px-6 lg:px-12">

        <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 lg:p-12">

            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">
                    <i class="fa-solid fa-user-graduate text-blue-600 mr-2"></i>
                    Add New Student
                </h1>
                <p class="text-gray-500 mt-2">Fill the form below to register a student</p>
            </div>

            <form class="space-y-6" method="post">

                <!-- Names -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-3 top-4 text-gray-400"></i>
                            <input type="text" name="firstName"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Middle Name</label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-3 top-4 text-gray-400"></i>
                            <input type="text" name="middleName"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Class & Block -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Class</label>
                        <div class="relative">
                            <i class="fa-solid fa-school absolute left-3 top-4 text-gray-400"></i>
                            <input type="text" name="class"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Block</label>
                        <div class="relative">
                            <i class="fa-solid fa-building absolute left-3 top-4 text-gray-400"></i>

                            <select name="block" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                                <option value="" disabled selected>Select Block</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>


                </div>

                <!-- DOB & Age -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar absolute left-3 top-4 text-gray-400"></i>
                            <input type="date" name="dateOfBirth"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                        <div class="relative">
                            <i class="fa-solid fa-hourglass-half absolute left-3 top-4 text-gray-400"></i>
                            <input type="number" name="age"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                </div>

                <!-- Parent -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Parent Name</label>
                        <div class="relative">
                            <i class="fa-solid fa-users absolute left-3 top-4 text-gray-400"></i>
                            <input type="text" name="parentName"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Parent Contact</label>
                        <div class="relative">
                            <i class="fa-solid fa-phone absolute left-3 top-4 text-gray-400"></i>
                            <input type="text" name="parentNumber"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Parent Email</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute left-3 top-4 text-gray-400"></i>
                            <input type="email" name="parentEmail"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                </div>

                <!-- Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition">

                        <i class="fa-solid fa-plus mr-2"></i>
                        Add Student

                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- End Hire Us -->
</body>

</html>