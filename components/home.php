<?php include '../includes/search.php'; ?>

<div class="w-full px-4 sm:px-6 lg:px-8 py-10 bg-gray-50">
  <!-- search bar -->
  <div class="mb-6">
    <form method="GET" class="flex items-center">
      <input type="text" name="search" placeholder="Search by name or admission number..."
        class="w-full sm:w-96 px-4 py-2.5 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
      <button type="submit" class="ml-2 px-4 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition text-sm font-medium">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>

    <!-- search results -->
    <div class="my-6">
      <?php if ($errorMessage): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm"><?php echo $errorMessage; ?></div>
      <?php elseif (!empty($getStudent)): ?>
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
          <table class="min-w-full bg-white rounded-lg">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Admission No</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">First Name</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Middle Name</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Class</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Block</th>
                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php foreach ($getStudent as $student): ?>
                <tr class="hover:bg-blue-50/40 transition">
                  <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo htmlspecialchars($student['admission_no']); ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($student['firstName']); ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($student['middleName']); ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($student['class_name']); ?></td>
                  <td class="px-4 py-3 text-sm text-gray-700"><?php echo htmlspecialchars($student['block']); ?></td>
                  <td class="px-4 py-3 text-sm">
                    <a href="?page=view_students" class="text-blue-600 hover:text-blue-800 font-medium">View</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

    <!-- Stats Cards -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition border border-gray-100">
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

      <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition border border-gray-100">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500">Total Fee</p>
            <h3 class="text-3xl font-bold text-green-600 mt-2">
              Ksh <?php echo number_format(array_sum(array_column($students, 'total_fee')), 2); ?>
            </h3>
          </div>
          <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-green-100">
            <i class="fa-solid fa-money-bill-wave text-green-600 text-xl"></i>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition border border-gray-100">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500">Unpaid Fee</p>
            <h3 class="text-3xl font-bold text-red-600 mt-2">
              Ksh <?php echo number_format(array_sum(array_column($students, 'fee_balance')), 2); ?>
            </h3>
          </div>
          <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-red-100">
            <i class="fa-solid fa-file-invoice-dollar text-red-600 text-xl"></i>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition border border-gray-100">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500">Classes</p>
            <h3 class="text-3xl font-bold text-purple-600 mt-2">
              <?php echo count(array_unique(array_column($students, 'class_name'))); ?>
            </h3>
          </div>
          <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-purple-100">
            <i class="fa-solid fa-school text-purple-600 text-xl"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>