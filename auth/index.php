<?php
include '../includes/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../components/header.php'; ?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-8 w-full max-w-md">
    <div class="text-center">
      <h3 class="text-2xl font-bold text-gray-900">Sign in</h3>
      <p class="mt-2 text-sm text-gray-500">
        Don't have an account yet?
        <a href="signup.php" class="text-blue-600 hover:underline font-medium" href="#">
          Sign up here
        </a>
      </p>
    </div>

    <form class="mt-6 space-y-4" method="POST">
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

      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium transition">
        Sign in
      </button>
    </form>
  </div>

</body>

</html>