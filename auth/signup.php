<?php
// Include the signup processing script
require_once '../includes/signup.php';
// The above line includes the signup.php file which contains the logic to handle the form submission and interact with the database.

?>

<!DOCTYPE html>
<html lang="en">

<?php include '../components/header.php'; ?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-8 w-full max-w-md">
    <div class="text-center">
      <h3 class="text-2xl font-bold text-gray-900">Sign up</h3>
      <p class="mt-2 text-sm text-gray-500">
        Already have an account?
        <a href="index.php" class="text-blue-600 hover:underline font-medium" href="#">
          Sign in here
        </a>
      </p>
    </div>

    <form class="mt-6 space-y-4" method="POST">
      <div>
        <label class="block text-sm mb-2 text-gray-700">Name</label>
        <input type="text" name="name"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm mb-2 text-gray-700">Email</label>
        <input type="email" name="email"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-sm mb-2 text-gray-700">Password</label>
        <input type="password" name="password"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>
      <div>
        <label class="block text-sm mb-2 text-gray-700">Confirm Password</label>
        <input type="password" name="confirm_password"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div class="flex items-center">
        <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
        <label class="ml-2 text-sm text-gray-600">Remember me</label>
      </div>

      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium transition">
        Sign in
      </button>
    </form>
  </div>

</body>

</html>