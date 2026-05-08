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

            <form class="space-y-8" method="post">

                <div class="rounded-[28px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-sky-600 font-semibold">Student details</p>
                            <h2 class="text-2xl font-semibold text-slate-900">Personal information</h2>
                        </div>
                        <p class="text-sm text-slate-500 max-w-xl">Enter the student’s name and registration details to create a new profile.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">First Name</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="firstName" placeholder="John"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Middle Name</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="middleName" placeholder="A." )
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Last Name</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="lastName" placeholder="Doe"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-sky-600 font-semibold">Class info</p>
                            <h2 class="text-2xl font-semibold text-slate-900">Class & block</h2>
                        </div>
                        <p class="text-sm text-slate-500 max-w-xl">Select the class group and block that this student belongs to.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Class</label>
                            <div class="relative">
                                <i class="fa-solid fa-school absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="class" placeholder="Class 5"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Level</label>
                            <div class="relative">
                                <i class="fa-solid fa-layer-group absolute left-3 top-4 text-slate-400"></i>
                                <select name="level"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                    <option value="" disabled selected>Select Level</option>
                                    <option value="primary">Primary</option>
                                    <option value="highschool">High School</option>
                                    <option value="junior">Junior</option>
                                    <option value="senior">Senior</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Block</label>
                            <div class="relative">
                                <i class="fa-solid fa-building absolute left-3 top-4 text-slate-400"></i>
                                <select name="block"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                    <option value="" disabled selected>Select Block</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-sky-600 font-semibold">Birth details</p>
                            <h2 class="text-2xl font-semibold text-slate-900">Date of birth & age</h2>
                        </div>
                        <p class="text-sm text-slate-500 max-w-xl">Use the official date of birth to calculate the student’s age.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Date of Birth</label>
                            <div class="relative">
                                <i class="fa-solid fa-calendar absolute left-3 top-4 text-slate-400"></i>
                                <input type="date" name="dateOfBirth"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Age</label>
                            <div class="relative">
                                <i class="fa-solid fa-hourglass-half absolute left-3 top-4 text-slate-400"></i>
                                <input type="number" name="age" placeholder="12"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-sky-600 font-semibold">Parent info</p>
                            <h2 class="text-2xl font-semibold text-slate-900">Parent contact details</h2>
                        </div>
                        <p class="text-sm text-slate-500 max-w-xl">Add the parent or guardian contact so we can reach them if needed.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Parent Name</label>
                            <div class="relative">
                                <i class="fa-solid fa-users absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="parentName" placeholder="Jane Doe"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Parent Contact</label>
                            <div class="relative">
                                <i class="fa-solid fa-phone absolute left-3 top-4 text-slate-400"></i>
                                <input type="text" name="parentNumber" placeholder="0800 000 000"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Parent Email</label>
                            <div class="relative">
                                <i class="fa-solid fa-envelope absolute left-3 top-4 text-slate-400"></i>
                                <input type="email" name="parentEmail" placeholder="parent@example.com"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-slate-50 focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-slate-50 p-6 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-sky-600 font-semibold">Fees</p>
                            <h2 class="text-2xl font-semibold text-slate-900">Fee details</h2>
                        </div>
                        <p class="text-sm text-slate-500 max-w-xl">Set the total fee and review the current balance for this student.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Total Fee</label>
                            <div class="relative">
                                <i class="fa-solid fa-money-bill absolute left-3 top-4 text-slate-400"></i>
                                <input type="number" name="total_fee" value="0.00" step="0.01" placeholder="0.00"
                                    class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-2xl bg-white focus:ring-2 focus:ring-sky-500 focus:outline-none">
                            </div>
                        </div>
                        <div class="rounded-3xl border border-slate-200 bg-white p-5 flex flex-col justify-between shadow-sm">
                            <div>
                                <p class="text-sm font-medium text-slate-500 mb-2">Fee Balance</p>
                                <h5 class="text-3xl font-semibold text-slate-900">0.00</h5>
                            </div>
                            <p class="text-xs text-slate-500 mt-4">Current outstanding balance</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-2xl bg-sky-600 px-8 py-3 text-base font-semibold text-white shadow-lg shadow-sky-200 transition duration-200 hover:bg-sky-700">
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