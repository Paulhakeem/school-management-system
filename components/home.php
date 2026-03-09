<?php
include '../includes/students.php';
include '../includes/search.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../components/header.php'; ?>


<body>
  <!-- Dashboard Stats -->
  <div class="w-full px-4 sm:px-6 lg:px-8 py-10 bg-gray-50">

    <!-- search bar -->
    <div class="mb-6">
      <form method="GET" class="flex items-center">
        <input type="text" name='search' placeholder="Search students..." class="w-full sm:w-1/2 lg:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>

      <!-- search results-->
      <div class="my-10">
        <?php if ($errorMessage): ?>
          <p class="text-red-500"><?php echo $errorMessage; ?></p>
        <?php elseif (!empty($getStudent)): ?>
          <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Admission No</th>
                <th class="py-2 px-4 border-b">First Name</th>
                <th class="py-2 px-4 border-b">Middle Name</th>
                <th class="py-2 px-4 border-b">Class</th>
                <th class="py-2 px-4 border-b">Block</th>
                <th class="py-2 px-4 border-b">Join Date</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($getStudent as $student): ?>
                <tr>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['admission_no']); ?></td>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['firstName']); ?></td>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['middleName']); ?></td>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['class']); ?></td>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['block']); ?></td>
                  <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($student['join_At']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Total Students</p>
              <h3 class="text-3xl font-bold text-gray-900 mt-2">
                <?php echo count($students); ?>
              </h3>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-blue-100">
              <i class="fa-solid fa-user-graduate text-blue-600 text-xl"></i>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Total Fee</p>
              <h3 class="text-3xl font-bold text-green-600 mt-2">ksh0</h3>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-green-100">
              <i class="fa-solid fa-money-bill-wave text-green-600 text-xl"></i>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Unpaid Fee</p>
              <h3 class="text-3xl font-bold text-red-600 mt-2">ksh0</h3>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-red-100">
              <i class="fa-solid fa-file-invoice-dollar text-red-600 text-xl"></i>
            </div>
          </div>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">Total Visitors</p>
              <h3 class="text-3xl font-bold text-purple-600 mt-2">0</h3>
            </div>

            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-purple-100">
              <i class="fa-solid fa-chart-line text-purple-600 text-xl"></i>
            </div>
          </div>
        </div>

      </div>

    </div>

</body>

</html>